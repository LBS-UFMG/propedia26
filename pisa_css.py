#!/usr/bin/env python3
"""
Roda o PISA nas estruturas COMPLETAS do PDB e extrai o CSS de todas as
interfaces -- o score que distingue interface biologica de contato de
empacotamento cristalino.

Saida: uma linha por INTERFACE (nao por estrutura), com as duas cadeias
envolvidas. O cruzamento com os pares do Propedia e feito depois, fora daqui.

Pre-requisito: CCP4 instalado. Nao precisa do 'source ccp4.setup-sh' -- basta
apontar --ccp4 para a raiz da instalacao.

Uso:
    python3 pisa_css.py pdb_full --check                       # testa 1 estrutura
    nohup python3 pisa_css.py pdb_full -o pisa_css.csv -j 120 \
          --ccp4 /opt/xtal/ccp4-9 > css.log 2>&1 &

Retomavel: rode o mesmo comando de novo que ele pula o que ja esta no CSV.
"""
import argparse, csv, gzip, itertools, os, shutil, subprocess, sys, tempfile, threading, time
import xml.etree.ElementTree as ET
from concurrent.futures import ThreadPoolExecutor, as_completed

CONTADOR = itertools.count()
CCP4_PADROES = ["/opt/xtal/ccp4-9", "/opt/ccp4-9", "/usr/local/ccp4-9", "/Applications/ccp4-8.0"]

COLUNAS = ["pdb_id", "status", "assembly_done", "n_interfaces", "interface_id",
           "chain_1", "chain_2", "css", "area", "solv_en", "pvalue", "tipo",
           "n_hbonds", "n_saltbridges", "erro"]


def texto(node, *tags):
    for tag in tags:
        x = node.find(tag) if node is not None else None
        if x is not None and x.text:
            return x.text.strip()
    return ""


def escreve_cfg(modelo, data_root, destino):
    """Copia o pisa.cfg trocando DATA_ROOT, para isolar as sessoes paralelas."""
    linhas = open(modelo, encoding="utf-8", errors="replace").read().splitlines()
    saida, trocar = [], False
    for l in linhas:
        if trocar and l.strip() and not l.lstrip().startswith("#"):
            saida.append(data_root); trocar = False; continue
        saida.append(l)
        if l.strip() == "DATA_ROOT":
            trocar = True
    open(destino, "w", encoding="utf-8").write("\n".join(saida) + "\n")
    return destino


def descompacta(origem, pasta):
    """Descompacta .gz para um arquivo temporario. Devolve o caminho."""
    base = os.path.basename(origem)
    if base.endswith(".gz"):
        alvo = os.path.join(pasta, base[:-3])
        with gzip.open(origem, "rb") as fin, open(alvo, "wb") as fout:
            shutil.copyfileobj(fin, fout)
        return alvo
    return origem


def processa(pisa_bin, caminho, timeout, cfg, data_root, tmp_root):
    pdb_id = os.path.basename(caminho).split(".")[0].upper()
    base = {c: "" for c in COLUNAS}
    base["pdb_id"] = pdb_id
    sessao = "c%d_%d" % (threading.get_ident(), next(CONTADOR))
    tmpdir = tempfile.mkdtemp(dir=tmp_root)
    try:
        arq = descompacta(caminho, tmpdir)
        r = subprocess.run([pisa_bin, sessao, "-analyse", arq, cfg],
                           capture_output=True, text=True, timeout=timeout)
        saida_txt = (r.stdout or "") + (r.stderr or "")
        assembly = "sim" if "assembly analysis: done" in saida_txt else "nao"
        if r.returncode != 0 or "quit" in saida_txt:
            base["status"] = "erro"
            base["assembly_done"] = assembly
            base["erro"] = saida_txt.strip().splitlines()[-1][:200] if saida_txt.strip() else "rc=%d" % r.returncode
            return [base]
        x = subprocess.run([pisa_bin, sessao, "-xml", "interfaces", cfg],
                           capture_output=True, text=True, timeout=timeout)
        if x.returncode != 0:
            base["status"] = "erro"; base["assembly_done"] = assembly
            base["erro"] = "xml rc=%d" % x.returncode
            return [base]
        root = ET.fromstring(x.stdout)
        linhas = []
        interfaces = list(root.iter("interface"))
        for i in interfaces:
            mols = i.findall("molecule")
            ch = [texto(m, "chain_id") for m in mols[:2]]
            l = {c: "" for c in COLUNAS}
            l.update({
                "pdb_id": pdb_id, "status": "ok", "assembly_done": assembly,
                "n_interfaces": len(interfaces),
                "interface_id": texto(i, "id"), "tipo": texto(i, "type"),
                "chain_1": ch[0] if ch else "", "chain_2": ch[1] if len(ch) > 1 else "",
                "css": texto(i, "css"), "area": texto(i, "int_area"),
                "solv_en": texto(i, "int_solv_en"), "pvalue": texto(i, "pvalue"),
                "n_hbonds": texto(i.find("h-bonds"), "n_bonds") if i.find("h-bonds") is not None else "",
                "n_saltbridges": texto(i.find("salt-bridges"), "n_bonds") if i.find("salt-bridges") is not None else "",
            })
            linhas.append(l)
        if not linhas:
            base["status"] = "sem_interface"; base["assembly_done"] = assembly
            base["n_interfaces"] = 0
            return [base]
        return linhas
    except subprocess.TimeoutExpired:
        base["status"] = "timeout"; base["erro"] = "excedeu %ds" % timeout
        return [base]
    except ET.ParseError as e:
        base["status"] = "xml_invalido"; base["erro"] = str(e)[:200]
        return [base]
    except Exception as e:
        base["status"] = "erro"; base["erro"] = str(e)[:200]
        return [base]
    finally:
        shutil.rmtree(tmpdir, ignore_errors=True)
        for nome in os.listdir(data_root):
            if nome.endswith(sessao):
                shutil.rmtree(os.path.join(data_root, nome), ignore_errors=True)


def main():
    ap = argparse.ArgumentParser(description=__doc__,
                                 formatter_class=argparse.RawDescriptionHelpFormatter)
    ap.add_argument("pasta", help="pasta com as estruturas (.pdb.gz / .cif.gz / .pdb / .cif)")
    ap.add_argument("-o", "--output", default="pisa_css.csv")
    ap.add_argument("-j", "--jobs", type=int, default=8)
    ap.add_argument("--ccp4", help="raiz do CCP4 (padrao: $CCP4 ou caminhos usuais)")
    ap.add_argument("--cfg", help="pisa.cfg (padrao: <ccp4>/share/pisa/pisa.cfg)")
    ap.add_argument("--timeout", type=int, default=900)
    ap.add_argument("--limit", type=int)
    ap.add_argument("--check", action="store_true", help="roda em 1 estrutura e mostra o resultado")
    args = ap.parse_args()

    ccp4 = args.ccp4 or os.environ.get("CCP4") or next((c for c in CCP4_PADROES if os.path.isdir(c)), None)
    if not ccp4:
        sys.exit("ERRO: informe --ccp4 /caminho/para/ccp4-N")
    pisa_bin = shutil.which("pisa") or os.path.join(ccp4, "bin", "pisa")
    if not (os.path.isfile(pisa_bin) and os.access(pisa_bin, os.X_OK)):
        sys.exit("ERRO: 'pisa' nao encontrado em %s/bin" % ccp4)
    cfg_modelo = args.cfg or os.path.join(ccp4, "share", "pisa", "pisa.cfg")
    if not os.path.isfile(cfg_modelo):
        sys.exit("ERRO: pisa.cfg nao encontrado: %s" % cfg_modelo)
    os.environ.setdefault("CCP4", ccp4)
    os.environ.setdefault("CLIBD", os.path.join(ccp4, "lib", "data"))
    os.environ.setdefault("CCP4_SCR", tempfile.mkdtemp(prefix="ccp4_scr_"))

    if not os.path.isdir(args.pasta):
        sys.exit("ERRO: pasta nao encontrada: %s" % args.pasta)
    arqs = sorted(os.path.join(args.pasta, f) for f in os.listdir(args.pasta)
                  if f.endswith((".pdb.gz", ".cif.gz", ".pdb", ".cif", ".ent.gz")))
    if not arqs:
        sys.exit("ERRO: nenhuma estrutura em %s" % args.pasta)

    data_root = tempfile.mkdtemp(prefix="pisa_css_")
    tmp_root = tempfile.mkdtemp(prefix="pisa_tmp_")
    cfg = escreve_cfg(cfg_modelo, data_root, os.path.join(data_root, "pisa.cfg"))

    if args.check:
        alvo = arqs[0]
        print("pisa    : %s" % pisa_bin)
        print("estrutura: %s\n" % alvo, flush=True)
        for l in processa(pisa_bin, alvo, args.timeout, cfg, data_root, tmp_root)[:12]:
            print("  " + "  ".join("%s=%s" % (c, l[c]) for c in
                  ("status", "assembly_done", "n_interfaces", "interface_id", "chain_1", "chain_2", "css", "area")))
        shutil.rmtree(data_root, ignore_errors=True); shutil.rmtree(tmp_root, ignore_errors=True)
        return

    feitos = set()
    if os.path.isfile(args.output):
        with open(args.output, newline="") as fh:
            for row in csv.DictReader(fh):
                if row.get("pdb_id"):
                    feitos.add(row["pdb_id"])
    if feitos:
        antes = len(arqs)
        arqs = [a for a in arqs if os.path.basename(a).split(".")[0].upper() not in feitos]
        print("retomando: %d estruturas ja no CSV, %d restantes" % (antes - len(arqs), len(arqs)))
    if args.limit:
        arqs = arqs[:args.limit]

    print("estruturas: %d | CCP4: %s | paralelo: %d" % (len(arqs), ccp4, args.jobs))
    print("saida     : %s\n" % os.path.abspath(args.output), flush=True)

    novo = not feitos
    lock = threading.Lock()
    cont = {"ok": 0, "falha": 0, "interfaces": 0, "assembly": 0}
    inicio = time.time()
    with open(args.output, "w" if novo else "a", newline="") as saida:
        w = csv.DictWriter(saida, fieldnames=COLUNAS)
        if novo:
            w.writeheader()
        with ThreadPoolExecutor(max_workers=args.jobs) as pool:
            futs = [pool.submit(processa, pisa_bin, a, args.timeout, cfg, data_root, tmp_root) for a in arqs]
            for n, fut in enumerate(as_completed(futs), 1):
                linhas = fut.result()
                with lock:
                    for l in linhas:
                        w.writerow(l)
                    saida.flush()
                    if linhas[0]["status"] == "ok":
                        cont["ok"] += 1; cont["interfaces"] += len(linhas)
                        if linhas[0]["assembly_done"] == "sim":
                            cont["assembly"] += 1
                    else:
                        cont["falha"] += 1
                if n % 100 == 0 or n == len(arqs):
                    dec = time.time() - inicio
                    taxa = n / dec if dec else 0
                    print("  %d/%d  ok=%d falha=%d  assembly=%d  %d interfaces  %.1f est/s  faltam ~%.0f min"
                          % (n, len(arqs), cont["ok"], cont["falha"], cont["assembly"],
                             cont["interfaces"], taxa, (len(arqs) - n) / taxa / 60 if taxa else 0), flush=True)

    shutil.rmtree(data_root, ignore_errors=True); shutil.rmtree(tmp_root, ignore_errors=True)
    print("\nconcluido em %.1f min" % ((time.time() - inicio) / 60))
    print("estruturas ok: %d | falhas: %d | com assembly analysis: %d | interfaces: %d"
          % (cont["ok"], cont["falha"], cont["assembly"], cont["interfaces"]))
    print("CSV: %s" % os.path.abspath(args.output))


if __name__ == "__main__":
    main()
