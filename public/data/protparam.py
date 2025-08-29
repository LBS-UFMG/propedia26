from Bio import SeqIO
from Bio.SeqUtils.ProtParam import ProteinAnalysis
from collections import Counter
import sys

# Uso: python protparam_custom.py input.fasta output.tsv
if len(sys.argv) < 3:
    print("Uso: python protparam_custom.py input.fasta output.tsv")
    sys.exit(1)

input_fasta = sys.argv[1]
output_tsv = sys.argv[2]

def calc_atomic_composition(seq):
    # Fórmulas de resíduos livres (aproximação simples)
    atomic_formula = {
        'A': 'C3H5N1O1', 'R': 'C6H12N4O1', 'N': 'C4H6N2O2', 'D': 'C4H5N1O3',
        'C': 'C3H5N1O1S1', 'Q': 'C5H8N2O2', 'E': 'C5H7N1O3', 'G': 'C2H3N1O1',
        'H': 'C6H7N3O1', 'I': 'C6H11N1O1', 'L': 'C6H11N1O1', 'K': 'C6H12N2O1',
        'M': 'C5H9N1O1S1', 'F': 'C9H9N1O1', 'P': 'C5H7N1O1', 'S': 'C3H5N1O2',
        'T': 'C4H7N1O2', 'W': 'C11H10N2O1', 'Y': 'C9H9N1O2', 'V': 'C5H9N1O1'
    }
    atoms = Counter()
    for aa in seq:
        if aa in atomic_formula:
            f = atomic_formula[aa]
            for el in ['C','H','N','O','S']:
                if el in f:
                    i = f.index(el) + 1
                    num = ''
                    while i < len(f) and f[i].isdigit():
                        num += f[i]
                        i += 1
                    atoms[el] += int(num) if num else 1
    formula_str = ''.join(f"{el}{atoms[el]}" for el in ['C','H','N','O','S'] if atoms[el] > 0)
    return atoms, formula_str, sum(atoms.values())

def calc_extinction(aa_counts):
    # 280 nm em água: Trp=5500, Tyr=1490, Cys(cistina)=125/2 por Cys emparelhado
    trp = aa_counts.get('W', 0) * 5500
    tyr = aa_counts.get('Y', 0) * 1490
    cys = aa_counts.get('C', 0) * 125
    with_disulfide = trp + tyr + (cys // 2)          # assume pares de Cys formam pontes
    without_disulfide = trp + tyr + cys              # Cys reduzidas
    return with_disulfide, without_disulfide

def calc_hydrophobic_percent(seq):
    hydrophobic = {'A','V','I','L','M','F','W','Y'}
    return (sum(seq.count(a) for a in hydrophobic) / len(seq)) * 100 if seq else 0.0

def calc_aliphatic_index(seq):
    # Ikai (1980): AI = 100*(X(A) + 2.9*X(V) + 3.9*(X(I)+X(L))), X = fração molar
    if not seq:
        return 0.0
    pa = ProteinAnalysis(seq)
    frac = pa.get_amino_acids_percent()  # frações que somam 1.0
    A = frac.get('A', 0.0)
    V = frac.get('V', 0.0)
    I = frac.get('I', 0.0)
    L = frac.get('L', 0.0)
    return 100.0 * (A + 2.9*V + 3.9*(I + L))

with open(output_tsv, "w") as out:
    out.write(
        "ID\tLength\tMW\tpI\tInstabilityIndex\tAliphaticIndex\tGRAVY\tHydrophobicPercent\t"
        "PositiveResidues\tNegativeResidues\tC\tH\tN\tO\tS\tFormula\tTotalAtoms\t"
        "ExtCoeff_Disulfide\tExtCoeff_NoDisulfide\n"
    )

    for record in SeqIO.parse(input_fasta, "fasta"):
        seq = str(record.seq).upper().replace('*','').replace('U','')  # remove * e U (selenocisteína) se houver
        if not seq:
            continue

        pa = ProteinAnalysis(seq)
        length = len(seq)
        mw = pa.molecular_weight()
        pI = pa.isoelectric_point()
        instability = pa.instability_index()
        aliphatic = calc_aliphatic_index(seq)          # <<< substitui o método ausente
        gravy = pa.gravy()
        hydrophobic_percent = calc_hydrophobic_percent(seq)

        aa_counts = pa.count_amino_acids()
        pos_res = aa_counts.get('R', 0) + aa_counts.get('K', 0)
        neg_res = aa_counts.get('D', 0) + aa_counts.get('E', 0)

        atoms, formula, total_atoms = calc_atomic_composition(seq)
        ext_dsf, ext_nodsf = calc_extinction(aa_counts)

        out.write(
            f"{record.id}\t{length}\t{mw:.2f}\t{pI:.2f}\t{instability:.2f}\t{aliphatic:.2f}\t"
            f"{gravy:.3f}\t{hydrophobic_percent:.2f}\t{pos_res}\t{neg_res}\t"
            f"{atoms['C']}\t{atoms['H']}\t{atoms['N']}\t{atoms['O']}\t{atoms['S']}\t"
            f"{formula}\t{total_atoms}\t{ext_dsf}\t{ext_nodsf}\n"
        )

print(f"OK: resultados escritos em {output_tsv}")
