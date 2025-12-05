<?= $this->extend('template') ?>
<?= $this->section('conteudo') ?>
<div class="container py-5 text-secondary">
<!-- Conteúdo personalizado -->

<h1 class="pb-2 text-dark"><strong>Documentation</strong></h1>
<hr>
<h3 class="pt-4 pb-1">What is Propedia?</h3>
<p>PROPEDIA is a database of peptide-protein complexes clusterized in three methodologies: based on peptide sequences; based on structure interface; and based on binding sites. PROPEDIA main goal is to give new insights into peptide design of biotechnological interests.</p>

<h3 class="pt-4 pb-1">Propedia 26 stats</h3>

<div class="table-responsive">
  <table class="table table-striped table-bordered table-hover table-sm align-middle text-end">
    <caption class="text-muted">Entries summary</caption>
    <thead class="table-light">
      <tr>
        <th scope="col"></th>
        <th scope="col">pep-pro complexes</th>
        <th scope="col">multipro</th>
        <th scope="col">Total</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">Unique entries</th>
        <td>51,082</td>
        <td>0</td>
        <td>51,082</td>
      </tr>
      <tr>
        <th scope="row">Duplicated entries</th>
        <td>27,066</td>
        <td>20,632</td>
        <td>47,698</td>
      </tr>
    </tbody>
    <tfoot class="table-light">
      <tr>
        <th scope="row">Total</th>
        <td>78,148</td>
        <td>20,632</td>
        <td><strong>98,780</strong></td>
      </tr>
    </tfoot>
  </table>
</div>

<h3 class="pt-4 pb-1"> Overview</h3>
Propedia is a publicly accessible, curated database dedicated to protein-peptide interactions. It serves as a central repository for structural, thermodynamic, and functional data of complexes formed between proteins and peptide ligands. Derived from the Protein Data Bank (PDB), Propedia offers a robust platform for researchers in bioinformatics, structural biology, and drug discovery to explore, analyze, and derive insights from these critical molecular interactions.
Protein-peptide interactions are fundamental to numerous cellular processes, including signal transduction, immune response, and enzyme regulation. Understanding the principles that govern these interactions is crucial for deciphering biological mechanisms and developing novel therapeutics. Propedia addresses this need by providing a systematically organized and enriched dataset that goes beyond the raw structural data available in the PDB.
The database is equipped with a user-friendly web interface and powerful search tools, allowing users to query complexes by PDB ID, peptide sequence, protein sequence, specific interaction motifs, or thermodynamic parameters. Furthermore, Propedia integrates advanced analytical capabilities, such as multiple sequence alignment and clustering based on peptide similarity, enabling comparative studies and the identification of binding patterns.
Key Highlights:
Curated Dataset: A comprehensive collection of protein-peptide complexes from the PDB, carefully validated and annotated.
Dual Search Modes: Supports both text-based queries (e.g., PDB ID, UniProt ID) and sequence-based similarity searches (BLAST).
Advanced Filtering: Enables refinement of results by experimental method, resolution, interaction energy, and more.
Integrated Analysis Tools: Built-in tools for visualizing interfaces, aligning sequences, and clustering complexes.
Open Access: All data is freely available for download, supporting reproducible research.
1.2 What's new in version 26
Propedia 26 introduces major updates that significantly expand the database and enhance its analytical power.
1.2.1 Expanded dataset
Increased complex count: The updated version of Propedia now includes 78,148 protein-peptide complexes, representing nearly a fourfold increase in data coverage compared to the previous release (19,813 complexes), an increase of approximately 3.9-fold, as shown in Figure 1.
Updated PDB sources: Includes structures from the Protein Data Bank up to 2023, ensuring researchers have access to the most recent structural data.

<img src="<?= base_url('img/docs/fig1.png') ?>" class="border mx-5 mt-4 mb-2 p-2 border-1 rounded w-75 shadow"><br>

Figure 1. Expanding the dataset. (A) Latest version of Propedia (2026, Propedia v26); (B) Original version of Propedia (2021, Propedia-legacy). 

<h3 class="pt-4 pb-1">Redesigned user interface</h3>
Modernized layout: Complete visual overhaul with improved navigation and responsive design (Figure 2).
Enhanced search page: More intuitive organization of search options and filters.
Advanced results page: Redesigned results table with better sorting capabilities and immediate access to key complex information.

<img src="<?= base_url('img/docs/fig2.png') ?>" class="border mx-5 mt-4 mb-2 p-2 border-1 rounded w-75 shadow"><br>

Figure 2. Propedia user interface. (A) Latest version of Propedia (2026, Propedia v26); (B) Original version of Propedia (2021, Propedia-legacy). 

<h3 class="pt-4 pb-1">New analytical tools</h3>
Peptide clustering: Implementation of a novel peptide similarity clustering algorithm that groups complexes based on peptide sequence similarity, enabling evolutionary and functional analysis (Figure 3), more details in section X.

<img src="<?= base_url('img/docs/fig3.png') ?>" class="border mx-5 mt-4 mb-2 p-2 border-1 rounded w-75 shadow"><br>

Figure 3. Propedia peptide clustering. (A) Latest version of Propedia (2026, Propedia v26); (B) Original version of Propedia (2021, Propedia-legacy). 

<h3 class="pt-4 pb-1">Improved search capabilities</h3>
BLAST Search: Updated sequence search with better performance and more configurable parameters (Figure 4).

<img src="<?= base_url('img/docs/fig4.png') ?>" class="border mx-5 mt-4 mb-2 p-2 border-1 rounded w-75 shadow"><br>

Figure 4. New tool in Propedia v26: BLAST.

<h3 class="pt-4 pb-1">Technical improvements</h3>
In version 26, the complex details page has been extensively redesigned to offer a much deeper interaction analysis: it now displays atomic data with precise distance measurements and clear categorization of interaction types (hydrogen bonds, hydrophobic contacts, etc.). In addition, complete structural metrics, such as interface area and interaction energy, which were previously absent or very basic, have been incorporated. The presentation of the data has also been reorganized: in v26, the information is distributed across tabs (structure, energy, sequence) for greater clarity; in the old version, everything was on a single page with less organization. From a computational standpoint, energy calculations have been improved with updated algorithms (e.g., NACCESS) with more refined parameterization, while the previous version applied basic calculations with limited validation. These topics are shown in Table 1 and they will be discussed in more detail in section X.
Table 1. News in Propedia's property


<h3 class="pt-4 pb-1"> How to cite and license</h3>
To cite PROPEDIA, we recommend referencing both the original article and the most recent publication in the database. If specific features or previous versions are used, the respective publications may also be cited. The original 2021 article presents the first description of the database:
Martins, P.M., Santos, L.H., Mariano, D. et al. Propedia: a database for protein–peptide identification based on a hybrid clustering algorithm. BMC Bioinformatics 22, 1 (2021). doi: 10.1186/s12859-020-03881-z.
Version 2.3, published in 2023, introduces a new representation approach based on structural signatures:
Martins P, Mariano D, Carvalho FC, Bastos LL, Moraes L, Paixão V, and Cardoso de Melo-Minardi R (2023). Propedia v2.3: A novel representation approach for the peptide-protein interaction database using graph-based structural signatures. Front. Bioinform. 3:1103103. doi: 10.3389/fbinf.2023.1103103.
Propedia v26 is derived from data originally published in articles from 2021 and 2023, both available under Creative Commons licenses that allow for redistribution and broad reuse, provided that the attribution requirements defined by the original authors are met. Below we detail each license to ensure transparency and legal compliance.

<h3 class="pt-4 pb-1">Introduction to using the platform</h3>
PROPEDIA v26 can be accessed directly through the official website at:
https://bioinfo.dcc.ufmg.br/propedia26/
Upon accessing the home page, users will find an intuitive navigation panel that allows them to quickly explore the main features of the database, including complex search, structural visualization, interaction analysis, and access to download tools. The initial interface features a top navigation bar that directs users to the Home, About, Browse, Clusters, Downloads, and Help pages. In addition, there is a quick search field that allows users to directly search for PDB IDs, peptides, or proteins. The page also includes a highlights panel with information about new features and updates incorporated into version 26. These details are shown in Figure 5.
In addition, the home page features a highlights/statistics panel that displays, in a visual and objective manner, the main figures from the database, such as the number of complexes available, the number of clusters, and the total size of the database. This section gives users an immediate perception of the scale and informational value of Propedia, allowing them to understand the magnitude of the repository upon their first visit. The page features a section dedicated to the credibility and authorship of the project, which identifies the developers responsible for Propedia. In a further step, the page includes an area dedicated to use cases and practical examples, illustrating how the user can search using an input code. Users can enter the code for a protein-peptide complex, also known as a “Propeedia code” (e.g., 1WRZ-B-A, where the first four characters correspond to the PDB code, the fifth character corresponds to the peptide chain, and the sixth character corresponds to the protein chain) or a multicomplex (e.g., 1MT1-A), which does not specify the protein chain.

<img src="<?= base_url('img/docs/fig5.png') ?>" class="border mx-5 mt-4 mb-2 p-2 border-1 rounded w-75 shadow"><br>

Figure 5. Propedia home page.
At the bottom of the page, institutional support and funding sources linked to the development of Propedia are also indicated, such as the Bioinformatics and Systems Laboratory (LBS), the Department of Computer Science (DCC), and the Federal University of Minas Gerais (UFMG), reinforcing the transparency and academic origin of the platform.

<h3 class="pt-4 pb-1"> BLAST tool</h3>
The BLAST (Basic Local Alignment Search Tool) identifies local similarities between protein sequences. It compares a query sequence with sequences stored in a database, evaluating the statistical relevance of the matches found (Mariano et al., 2015; Wheeler; Bhagwat, 2016). The BLAST tool available in PROPEDIA allows users to search for peptides or proteins similar to those present in the database, using local alignment based on sequence similarity. This functionality is essential for identifying structurally or functionally related complexes, locating similar peptides already described in the database, and facilitating comparative studies, evolutionary analyses, and functional inference.
The Propedia sequence search system is implemented using the BLAST+ package, as described in Altschul et al. (1990) and Camacho et al. (2009). The tool compares the sequence provided by the user with all sequences deposited in PROPEDIA 2.6, returning the best local alignments, along with identifiers of the associated complexes, similarity metrics, and coverage and identity information.
The search can be performed for both peptides and proteins, and each type of query uses different parameters, adjusted for greater sensitivity according to the size of the sequence analyzed.
<h3 class="pt-4 pb-1">Parameters and Configuration</h3>
Peptides have short sequences and require specialized parameters to ensure good sensitivity. For this reason, Propedia uses:
·   	word_size 2
The word-size is a NCBI parameter which determines the minimum size of the fragment (“word”) that must match between the query sequence and the database sequences for the algorithm to initiate an alignment extension. A word is the smallest sequence block that BLAST uses to identify possible regions of similarity between the query sequence and the database. The sequence is fragmented into all possible word sizes. For example, if word-size = 3, the protein ACDEFG becomes: ACD, CDE, DEF, EFG. BLAST searches the database for identical or similar occurrences of these words.
As described in the NCBI documentation (“BLAST Search Parameters - BlastTopics 0.1.1 documentation”, [s.d.]), BLAST operates heuristically, first identifying “hot spots,” i.e., short local matches, which can then expand into more complete alignments. In protein searches, these matches do not need to be identical and may involve similarity based on the substitution matrix. According to BLAST logic, reducing the word size increases sensitivity, as it allows relevant matches to be detected even when the comparison space is limited. Thus, using word size = 2 favors the detection of small hot spots capable of initiating extensions in peptide queries.
·   	task blastp-short
The task blastp-short parameter activates an optimized version of BLASTP specifically configured to handle short protein sequences, typically with fewer than 30 amino acids (Table C3: [blastp application options. The blastp...].”, 2021). This mode automatically adjusts various internal aspects of the algorithm to maximize sensitivity and detection of real similarity, even when the amount of information (sequence length) is very low.
In implementing the sequence search system in PROPEDIA, -word_size 2 was used in conjunction with -task blastp-short. This choice is directly aligned with the expected behavior for searches involving short peptides, whose sequences have few positions for forming larger “words.”
 
·   	seg no
A tool designed to filter low-complexity segments in amino acid sequences. In alignments, residues that have been masked are displayed as “X.” SEG filtering is no longer the default option in the NCBI blastp service due to the adoption of compositional adjustments for estimating BLAST statistics (Fassler; Cooper, 2011). The -seg no parameter disables complexity masking, which would be undesirable in such short sequences.
·   	evalue 100000
The E-value represents the probability that an observed alignment arose by chance. Under normal conditions, values close to zero indicate highly significant alignments, while high values tend to be discarded because they represent statistical noise. However, the behavior of the E-value changes dramatically for short sequences, such as peptides, which is exactly the case with Propedia. These settings allow minimal peptides, including fragments with only 5-10 amino acids, to find significant matches in the database.
For complete proteins, Propedia uses a more conservative set of parameters that are better suited for long sequences:
·   	word_size 3
When dealing with full-length protein sequences, the search behavior differs substantially from searches involving short peptides. Longer sequences contain a much larger amount of information, allowing BLAST to reliably detect similarity using more stringent initial seeds. In this context, the parameter word_size 3 is more appropriate because it requires longer contiguous matches (3 amino acids) before extending an alignment. This choice reduces noise, improves specificity, and accelerates the search, as larger words decrease the number of initial “hotspots” generated during the seeding phase. Since full proteins typically range from hundreds to thousands of residues, a word-size of 3 does not compromise sensitivity: even distantly related proteins usually share enough local similarity to satisfy this requirement.
Therefore, for protein-versus-protein searches, PROPEDIA adopts a more conservative configuration to balance sensitivity and performance. This contrasts with peptide searches, where shorter sequences require extremely permissive parameters. The distinction ensures that each type of query, short peptides versus complete proteins, is processed using criteria tailored to its biological characteristics and statistical behavior under the BLAST algorithm.
A summary of all parameters is illustrated in Figure 6. It is important to note that BLAST alignment will always search for peptides if the input is a peptide sequence, or proteins if the input is a protein sequence.

<img src="<?= base_url('img/docs/fig6.png') ?>" class="border mx-5 mt-4 mb-2 p-2 border-1 rounded w-75 shadow"><br>

Figure 6. Parameters used for the development of the BLAST tool. On the left are examples of peptide sequence algorithms. The peptide sequence of 9VEI-F-A (available in the Propedia database) was used as input, and the sequence used as a response is a real example of a BLAST run performed by Propedia. The right side shows an example of the protein sequence algorithm (the total sequence has been omitted for better image visualization). The protein sequence 9VEI-F-A was used as input, and the sequence used as a response is a real example of a BLAST run performed by Propedia.



<!-- / FIM Conteúdo personalizado -->
</div>
<?= $this->endSection() ?>