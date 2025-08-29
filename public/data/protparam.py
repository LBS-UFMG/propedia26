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

# Função para calcular composição atômica e fórmula
def calc_atomic_composition(seq):
    atomic_weights = {'A': 'C3H5N1O1', 'R': 'C6H12N4O1', 'N': 'C4H6N2O2', 'D': 'C4H5N1O3',
                      'C': 'C3H5N1O1S1', 'Q': 'C5H8N2O2', 'E': 'C5H7N1O3', 'G': 'C2H3N1O1',
                      'H': 'C6H7N3O1', 'I': 'C6H11N1O1', 'L': 'C6H11N1O1', 'K': 'C6H12N2O1',
                      'M': 'C5H9N1O1S1', 'F': 'C9H9N1O1', 'P': 'C5H7N1O1', 'S': 'C3H5N1O2',
                      'T': 'C4H7N1O2', 'W': 'C11H10N2O1', 'Y': 'C9H9N1O2', 'V': 'C5H9N1O1'}
    atom_counter = Counter()
    for aa in seq:
        if aa in atomic_weights:
            formula = atomic_weights[aa]
            for atom in ['C','H','N','O','S']:
                if atom in formula:
                    start = formula.index(atom)+1
                    num = ''
                    while start < len(formula) and formula[start].isdigit():
                        num += formula[start]
                        start += 1
                    count = int(num) if num else 1
                    atom_counter[atom] += count
    formula_str = ''.join([f"{atom}{atom_counter[atom]}" for atom in ['C','H','N','O','S'] if atom_counter[atom]>0])
    return atom_counter, formula_str, sum(atom_counter.values())

# Função para calcular coeficiente de extinção
def calc_extinction(aa_counts):
    extinction_trp = aa_counts.get('W',0) * 5500
    extinction_tyr = aa_counts.get('Y',0) * 1490
    extinction_cys = aa_counts.get('C',0) * 125
    ext_with_disulfide = extinction_trp + extinction_tyr + (extinction_cys // 2)
    ext_without_disulfide = extinction_trp + extinction_tyr + extinction_cys
    return ext_with_disulfide, ext_without_disulfide

# Função para calcular percentual hidrofóbico
def calc_hydrophobic_percent(seq):
    hydrophobic_aas = set(['A','V','I','L','M','F','W','Y'])
    count_hydrophobic = sum(seq.count(aa) for aa in hydrophobic_aas)
    return (count_hydrophobic / len(seq)) * 100

# Cabeçalho TSV
with open(output_tsv, "w") as out:
    out.write("ID\tLength\tMW\tpI\tInstabilityIndex\tAliphaticIndex\tGRAVY\tHydrophobicPercent\t"
              "PositiveResidues\tNegativeResidues\tC\tH\tN\tO\tS\tFormula\tTotalAtoms\t"
              "ExtCoeff_Disulfide\tExtCoeff_NoDisulfide\n")

    # Processar cada sequência no FASTA
    for record in SeqIO.parse(input_fasta, "fasta"):
        seq = str(record.seq).upper()
        analisador = ProteinAnalysis(seq)

        length = len(seq)
        mw = analisador.molecular_weight()
        pI = analisador.isoelectric_point()
        instability = analisador.instability_index()
        aliphatic = analisador.aliphatic_index()
        gravy = analisador.gravy()
        hydrophobic_percent = calc_hydrophobic_percent(seq)

        aa_counts = analisador.count_amino_acids()
        pos_res = aa_counts.get('R',0) + aa_counts.get('K',0)
        neg_res = aa_counts.get('D',0) + aa_counts.get('E',0)

        atoms, formula, total_atoms = calc_atomic_composition(seq)
        ext_dsf, ext_nodsf = calc_extinction(aa_counts)

        # Escrever linha TSV
        out.write(f"{record.id}\t{length}\t{mw:.2f}\t{pI:.2f}\t{instability:.2f}\t{aliphatic:.2f}\t"
                  f"{gravy:.3f}\t{hydrophobic_percent:.2f}\t{pos_res}\t{neg_res}\t"
                  f"{atoms['C']}\t{atoms['H']}\t{atoms['N']}\t{atoms['O']}\t{atoms['S']}\t"
                  f"{formula}\t{total_atoms}\t{ext_dsf}\t{ext_nodsf}\n")

print(f"Análise concluída. Resultados salvos em: {output_tsv}")
