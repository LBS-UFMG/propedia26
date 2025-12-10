<?= $this->extend('template') ?>
<?= $this->section('conteudo') ?>
<!-- Conteúdo personalizado -->

<link rel="stylesheet" href="<?php echo base_url('/css/dt.css'); ?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div id="loading">
    <div class="text-center">
        <img src="<?= base_url('/img/cocadito-loading.png') ?>" width="200px"><br>
        <div class="spinner-border spinner-border-sm" role="status"></div>
        <strong class="ms-2">Loading...</strong>
    </div>
</div>
<div style="background-color:#e4e4e4; min-height:180px; margin: -25px -10px 20px -10px;">
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-12 pt-2">
                <h1 class="title_h2 pt-4">
                    <strong><?php echo $id; ?></strong>
                    <div class="dropdown d-inline ms-2" title="Export files">
                        <div class="dropdown d-inline">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Download
                            </button>
                            <ul class="dropdown-menu">
                                <li><b class="ms-3">Download</b></li>
                                <hr>
                                <li><a class="dropdown-item mt-2" href="<?php echo base_url(); ?>data/db/contacts/<?= $id ?>/<?= substr($id,0,4) ?>_contacts.csv">Contacts</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url('/data/' . $db . '/pdb/' . $id[0] . '/' . $id . '.pdb'); ?>">PDB file</a></li>
                                <hr>
                                <li><a class="dropdown-item" href="<?php echo base_url('/data/' . $db . '/csv/' . $id[0] . '/' . $id . '.csv'); ?>">Complex data</a></li>

                                <!-- <li><a class="dropdown-item" href="<?= base_url("/export/pdb-to-pymol/$id") ?>">Export to PyMOL</a></li> -->
                            </ul>
                        </div>
                    </div>

                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#contactMap">
                        Contact map <i class="bi bi-image"></i>
                    </button>
                </h1>

                <div class="mb-3">
                    <a target="_blank" style="text-decoration:none" title="Search in PDB" href="https://www.rcsb.org/structure/<?= $pdb_id ?>">
                        <span class="badge bg-dark text-light">PDB</span>
                    </a>

                    <a target="_blank" style="text-decoration:none" title="Search in UniProt" href="https://www.uniprot.org/uniprot/?query=<?= $pdb_id ?>+database:pdb">
                        <span class="badge bg-dark">UniProt</span>
                    </a>

                    <a target="_blank" style="text-decoration:none" title="Search in PubMed" href="https://www.ncbi.nlm.nih.gov/pubmed/?term=<?= $pdb_id ?>">
                        <span class="badge bg-dark">PubMed</span>
                    </a>
                </div>

                <div class="row mb-1">
                    <div class="col">
                        <strong>PDB ID: </strong><span><?= $info[22] ?></span>
                    </div>
                    <div class="col">
                        <strong>Structure method: </strong><span><?= $info[38] ?></span>
                    </div>
                    <div class="col">
                        <strong>Resolution: </strong><span><?= $info[36] ?></span>
                    </div>
                    <div class="col">
                        <strong>Complex: </strong>
                        <span>
                            <a class="badge bg-primary" href="<?=base_url('/multipro/'.substr($info[0],0,6))?>">
                                <?= substr($info[0],0,6) ?>
                            </a>
                        </span>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col">
                        <strong>Peptide chain: </strong><span><?= $info[23] ?></span>
                    </div>
                    <div class="col">
                        <strong>Peptide length: </strong><span><?= $info[26] ?></span>
                    </div>
                    <div class="col">
                        <strong>Protein chain: </strong><span><?= $info[27] ?></span>
                    </div>
                    <div class="col">
                        <strong>Protein length: </strong><span><?= $info[30] ?></span>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-12">
                        <strong>Description: </strong> <?= $info[39] ?>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12">
                        <strong>Organism: </strong><span><?= $info[44] ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid px-4">
    <div class="row">
        <div class="col-md-8 col-12" ng-if="cttlok" id="col1">

            <div class="row"><!--
            0 id, 1 AAP, 2 ABP, 3 ACP, 4 AIP
            5 ASA_Complex, 6 ASA_Peptide, 7 ASA_Protein, 8 BPP%, 9 BPepA
            10 BProA, 11 BSA, 12 CLASSIFICATION, 13 DEPOSITION_DATE, 14 Interface Residues
            15 No. of apolar-apolar contacts, 16 No. of apolar-polar contacts, 17 No. of charged-apolar contacts, 18 No. of charged-charged contacts, 19 No. of charged-polar contacts
            20 No. of intermolecular contacts, 21 No. of polar-polar contacts, 22 PDB_ID, 23 PEPTIDE_CHAIN, 24 PEPTIDE_DESC
            25 PEPTIDE_SEQ, 26 PEPTIDE_SIZE, 27 PROTEIN_CHAIN, 28 PROTEIN_DESC, 29 PROTEIN_SEQ
            30 PROTEIN_SIZE, 31 Percentage of apolar NIS residues, 32 Percentage of charged NIS residues, 33 Predicted binding affinity (kcal.mol-1), 34 Predicted dissociation constant (M) at 25.0
            35 QSP, 36 RESOLUTION, 37 SBP, 38 STRUCTURE_METHOD, 39 TITLE
            40 binding-cluster, 41 interface-cluster, 42 is_leader, 43 leader_id, 44 organism
            45 peptide_AliphaticIndex, 46 peptide_ExtCoeff_Disulfide, 47 peptide_ExtCoeff_NoDisulfide, 48 peptide_Formula, 49 peptide_GRAVY
            50 peptide_HydrophobicPercent, 51 peptide_InstabilityIndex, 52 peptide_MW, 53 peptide_NegativeResidues, 54 peptide_PositiveResidues
            55 peptide_TotalAtoms, 56 peptide_pI, 57 protein_AliphaticIndex, 58 protein_ExtCoeff_Disulfide, 59 protein_ExtCoeff_NoDisulfide
            60 protein_Formula, 61 protein_GRAVY, 62 protein_HydrophobicPercent, 63 protein_InstabilityIndex, 64 protein_MW
            65 protein_NegativeResidues, 66 protein_PositiveResidues, 67 protein_TotalAtoms, 68 protein_pI, 69 seq100_clusters
            70 sequence-cluster
            -->
                <div class="table-responsive">

                    <table class="table table-striped small">
                        <thead>
                            <tr>
                                <th style="width: 20%;"></th>
                                <th style="width: 40%;">
                                    <h2>Protein</h2>
                                </th>
                                <th style="width: 40%;">
                                    <h2>Peptide</h2>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Chain 
                                    <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Chain: Unique identifier assigned to each molecular chain within the same crystallographic structure or PDB entry."><i class="bi bi-question-circle-fill opacity-25"></i></a>
                                </th>
                                <td><?= $info[27] ?></td>
                                <td><?= $info[23] ?></td>
                            </tr>
                            <tr>
                                <th>Description
                                    <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Description: Annotated name or description of the polymer chain, as defined in the PDB file (e.g., 'Chain A - Insulin')."><i class="bi bi-question-circle-fill opacity-25"></i></a>
                                </th>
                                <td><?= $info[28] ?></td>
                                <td><?= $info[24] ?></td>
                            </tr>
                            <tr>
                                <th>Length (residues)
                                    <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Length (residues): Total number of amino acid residues observed in the polymer chain."><i class="bi bi-question-circle-fill opacity-25"></i></a>
                                </th>
                                <td><?= $info[30] ?></td>
                                <td><?= $info[26] ?></td>
                            </tr>
                            <tr>
                                <th>Molecular Weight (Da)
                                    <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Molecular Weight (Da): Total molecular mass of the chain, expressed in Daltons (Da), calculated as the sum of the atomic masses of all atoms in the protein."><i class="bi bi-question-circle-fill opacity-25"></i></a>
                                </th>
                                <td><?= $info[64] ?></td>
                                <td><?= $info[52] ?></td>
                            </tr>
                            <tr>
                                <th>Isoelectric Point (pI)
                                    <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Isoelectric Point (pI): The pH value at which the protein carries no net electrical charge, resulting in minimal electrophoretic mobility."><i class="bi bi-question-circle-fill opacity-25"></i></a>
                                </th>
                                <td><?= $info[68] ?></td>
                                <td><?= $info[56] ?></td>
                            </tr>
                            <tr>
                                <th>Instability Index
                                    <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Instability Index: A computed value that estimates the in vitro stability of a protein. Proteins with an instability index greater than 40 are predicted to be unstable, while lower values indicate greater stability."><i class="bi bi-question-circle-fill opacity-25"></i></a>
                                </th>
                                <td><?= $info[63] ?></td>
                                <td><?= $info[51] ?></td>
                            </tr>
                            <tr>
                                <th>Aliphatic Index
                                    <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Aliphatic Index: A measure of the relative volume occupied by aliphatic side chains (Ala, Val, Ile, and Leu). It is often correlated with the thermostability of the protein."><i class="bi bi-question-circle-fill opacity-25"></i></a>
                                </th>
                                <td><?= $info[57] ?></td>
                                <td><?= $info[45] ?></td>
                            </tr>
                            <tr>
                                <th>GRAVY
                                    <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="GRAVY (Grand Average of Hydropathy): The average hydropathy score of all amino acids in the sequence, based on the Kyte-Doolittle scale. Positive values indicate a more hydrophobic protein, while negative values suggest a more hydrophilic character."><i class="bi bi-question-circle-fill opacity-25"></i></a>
                                </th>
                                <td><?= $info[61] ?></td>
                                <td><?= $info[49] ?></td>
                            </tr>
                            <tr>
                                <th>Hydrophobic (%)
                                    <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Hydrophobic (%): The proportion of residues in the sequence that are classified as hydrophobic (e.g., Ala, Val, Leu, Ile, Phe, Trp, Met), expressed as a percentage of the total number of residues."><i class="bi bi-question-circle-fill opacity-25"></i></a>
                                </th>
                                <td><?= $info[62] ?></td>
                                <td><?= $info[50] ?></td>
                            </tr>
                            <tr>
                                <th>Positive Residues
                                    <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Positive Residues: Total number of positively charged amino acids in the sequence (Lys, Arg, and His)."><i class="bi bi-question-circle-fill opacity-25"></i></a>
                                </th>
                                <td><?= $info[66] ?></td>
                                <td><?= $info[54] ?></td>
                            </tr>
                            <tr>
                                <th>Negative Residues
                                    <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Negative Residues: Total number of negatively charged amino acids in the sequence (Asp and Glu)."><i class="bi bi-question-circle-fill opacity-25"></i></a>
                                </th>
                                <td><?= $info[65] ?></td>
                                <td><?= $info[53] ?></td>
                            </tr>                           
                            <tr>
                                <th>Atomic Formula
                                    <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Atomic Formula: The complete elemental formula representing the protein’s overall atomic composition (e.g., C₂₆₄₄H₄₂₀₅N₇₅₇O₈₁₆S₁₂)."><i class="bi bi-question-circle-fill opacity-25"></i></a>
                                </th>
                                <?php function formata_formula($f){
                                    preg_match('/([0-9]*[+-]+)$/', $f, $m); $c = $m[1] ?? ''; if($c) $f = substr($f, 0, -strlen($c));
                                    return preg_replace('/(\d+)/','<sub>$1</sub>',htmlspecialchars($f)).($c?'<sup>'.$c.'</sup>':'');
                                }?>
                                <td><?= formata_formula($info[60]) ?></td>
                                <td><?= formata_formula($info[48]) ?></td>
                            </tr>
                            <tr>
                                <th>Total Atoms
                                    <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Total Atoms: The total number of atoms constituting the polypeptide chain."><i class="bi bi-question-circle-fill opacity-25"></i></a>
                                </th>
                                <td><?= $info[67] ?></td>
                                <td><?= $info[55] ?></td>
                            </tr>
                            <tr>
                                <th>Extinction Coeff. (with disulfide)
                                    <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Extinction Coefficient (with disulfide): Molar extinction coefficient (in M⁻¹ cm⁻¹) calculated assuming all cysteine residues form disulfide bonds (Cys–Cys). This value indicates the protein’s absorbance at 280 nm under these conditions."><i class="bi bi-question-circle-fill opacity-25"></i></a>
                                </th>
                                <td><?= $info[58] ?></td>
                                <td><?= $info[46] ?></td>
                            </tr>
                            <tr>
                                <th>Extinction Coeff. (no disulfide)
                                    <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Extinction Coefficient (no disulfide): Molar extinction coefficient (in M⁻¹ cm⁻¹) calculated assuming no disulfide bond formation, i.e., all cysteine residues remain in the reduced form."><i class="bi bi-question-circle-fill opacity-25"></i></a>
                                </th>
                                <td><?= $info[59] ?></td>
                                <td><?= $info[47] ?></td>
                            </tr>
                            <?php function quebra40($text) { return wordwrap($text, 40, "<br>", true); } ?>
                            <tr>
                                <th>Sequence
                                    <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Sequence: The primary amino acid structure of the protein or peptide, defining its linear arrangement of residues."><i class="bi bi-question-circle-fill opacity-25"></i></a>
                                </th>
                                <td>
                                    <pre><?= quebra40($info[29]) ?></pre>
                                </td>
                                <td>
                                    <pre><?= quebra40($info[25]) ?></pre>
                                </td>
                            </tr>
                        </tbody>
                    </table>


                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12">
                    <h2>Clustering classification</h2>
                </div>
                <hr>
                <div class="col-12">
                    <h4>Structural similiarities  <sup><a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="This section presents entries that have structural similarities to this entry."><i class="bi bi-question-circle-fill opacity-25"></i></a></sup></h4>
                    <ul class="bg-light p-3 rounded small">
                        <li class="ms-4"><strong>Unique complex <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Unique complex: Indicates whether or not a protein-peptide pair exists with both sequences identical."><i class="bi bi-question-circle-fill opacity-25"></i></a>: </strong><span><label class="badge bg-<?php if ($info[42] == 'yes') { echo 'primary'; } else { echo 'danger'; } ?>"><?= $info[42] ?></span></li>
                        
                        <li class="ms-4"><strong>Similar complex <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Similar complex: If there is an identical sequence, it indicates which is the main entry with an exact sequence (if the sequence is unique, the entry itself will be considered the leader)."><i class="bi bi-question-circle-fill opacity-25"></i></a>: </strong><a href=""><?= $info[43] ?></a></li>

                        <li class="ms-4"><strong>Similar peptide <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Similar peptide: Indicates a complex that has a peptide with the exact same sequence."><i class="bi bi-question-circle-fill opacity-25"></i></a>: </strong><a href=""><?= $info[69] ?></a></li>

                        <li class="ms-4"><strong>PDB classification <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="PDB classification: Molecular classification according to PDB."><i class="bi bi-question-circle-fill opacity-25"></i></a>: </strong><span><?= $info[12] ?></span></li>
                    </ul>

                    <?php function avalia($valor) {
                        // Se for maior ou igual a 0.9 → sucesso
                        if ($valor >= 0.9) {
                            echo "✅";
                        } else {
                            echo "❌";
                        }
                    }?>
                    <h4>CSM-peptides classes  <sup><a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="CSM-peptides classes: CSM-peptides (https://biosig.lab.uq.edu.au/csm_peptides) is a web tool and machine learning model that predicts peptide classes based on their sequence. Using a machine learning model inspired by CSM-peptides, Propedia built six models to predict the function of therapeutic peptides. See the documentation for details on how the AI ​​models were developed. Here, we present the probability that the current peptide belongs to each class, as calculated by our models. Predictive classification of peptide therapeutic functions, index range from 0 to 1, where 0 indicates a low likelihood of belonging to the class and 1 indicates a high probability. For more details, see http://doi.org/10.1002/pro.4442"><i class="bi bi-question-circle-fill opacity-25"></i></a></sup></h4>
                    <ul class="bg-light p-3 rounded small">
                        <li class="ms-4"><strong>Anti-Angiogenic (AAP) <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Anti-Angiogenic (AAP): This value indicates the probability that the peptide sequence belongs to this class. Propedia 26 uses a minimum cutoff value of 0.9 to indicate a high likelihood of belonging to the Anti-Angiogenic class. About Anti-Angiogenic peptide class – Function: They inhibit angiogenesis, that is, the formation of new blood vessels. Importance: Blocking angiogenesis is a strategy used to prevent tumor growth, since cancer depends on blood supply to obtain nutrients. Example of use: Development of antitumor and antiviral therapies. See the documentation for details on how this machine learning model was developed."><i class="bi bi-question-circle-fill opacity-25"></i></a>: </strong><span><?= avalia($info[1]).' '.$info[1] ?></span></li>
                        <li class="ms-4"><strong>Anti-Bacterial (ABP) <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Anti-Bacterial (ABP): This value indicates the probability that the peptide sequence belongs to this class. Propedia 26 uses a minimum cutoff value of 0.9 to indicate a high likelihood of belonging to the Anti-Bacterial class. About Anti-Bacterial peptide class – Function: They are antimicrobial peptides that destroy or inhibit the growth of bacteria. Common mechanism: They interact with bacterial membranes, leading to cell lysis (rupture). Importance: They are promising alternatives to traditional antibiotics, especially in the face of bacterial resistance. See the documentation for details on how this machine learning model was developed. "><i class="bi bi-question-circle-fill opacity-25"></i></a>: </strong><span><?= avalia($info[2]).' '.$info[2] ?></span></li>
                        <li class="ms-4"><strong>Anti-Cancer (ACP) <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Anti-Cancer (ACP): This value indicates the probability that the peptide sequence belongs to this class. Propedia 26 uses a minimum cutoff value of 0.9 to indicate a high likelihood of belonging to the Anti-Cancer class. About Anti-Cancer peptide class – Function: They induce selective death of tumor cells without significantly affecting normal cells. Mechanism: They can act by altering the permeability of cancer cell membranes, activating apoptosis, or modulating signaling pathways. Application: Development of next-generation antineoplastic therapies. See the documentation for details on how this machine learning model was developed. "><i class="bi bi-question-circle-fill opacity-25"></i></a>: </strong><span><?= avalia($info[3]).' '.$info[3] ?></span></li>

                        <li class="ms-4"><strong>Anti-Inflammatory (AIP) <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Anti-Inflammatory (AIP): This value indicates the probability that the peptide sequence belongs to this class. Propedia 26 uses a minimum cutoff value of 0.9 to indicate a high likelihood of belonging to the Anti-Inflammatory class. About Anti-Inflammatory peptide class – Function: They reduce or regulate exaggerated inflammatory responses. Mechanism: They can inhibit pro-inflammatory cytokines (such as TNF-α, IL-6) or modulate macrophage activity. Application: Treatment of chronic inflammatory and autoimmune diseases. See the documentation for details on how this machine learning model was developed. "><i class="bi bi-question-circle-fill opacity-25"></i></a>: </strong><span><?= avalia($info[4]).' '.$info[4] ?></span></li>
                        <li class="ms-4"><strong>Quorum Sensing (QSP) <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Quorum Sensing (QSP): This value indicates the probability that the peptide sequence belongs to this class. Propedia 26 uses a minimum cutoff value of 0.9 to indicate a high likelihood of belonging to the Quorum Sensing class. About Quorum Sensing peptide class – Function: They participate in bacterial communication (quorum sensing), regulating collective behaviors such as biofilm formation and virulence. Importance: Understanding and manipulating these peptides can lead to strategies to control bacterial infections without necessarily killing the bacteria (reducing selective pressure for resistance). See the documentation for details on how this machine learning model was developed. "><i class="bi bi-question-circle-fill opacity-25"></i></a>: </strong><span><?= avalia($info[35]).' '.$info[35] ?></span></li>
                        <li class="ms-4"><strong>Surface Binding (SBP) <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Surface Binding (SBP): This value indicates the probability that the peptide sequence belongs to this class. Propedia 26 uses a minimum cutoff value of 0.9 to indicate a high likelihood of belonging to the Surface Binding class. About Surface Binding peptide class – Function: They bind to biological surfaces or materials, such as metals, polymers, or minerals. Biotechnological use: They can be used to immobilize enzymes, design biomaterials, biosensors, or nanodevices. Example: Peptides that bind strongly to gold, silica, or metal oxides for use in nanotechnology. See the documentation for details on how this machine learning model was developed. "><i class="bi bi-question-circle-fill opacity-25"></i></a>: </strong><span><?= avalia($info[37]).' '.$info[37] ?></span></li>
                    </ul>
                    <h4>Propedia v1 classes <sup><a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Classes inherited from Propedia 1.  For more details, see https://doi.org/10.1186/s12859-020-03881-z"><i class="bi bi-question-circle-fill opacity-25"></i></a></sup></h4>
                    <ul class="bg-light p-3 rounded small">
                        <li class="ms-4"><strong>Binding site <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Structures with similar binding site. For more details, see https://doi.org/10.1186/s12859-020-03881-z"><i class="bi bi-question-circle-fill opacity-25"></i></a>: </strong><span><?= $info[40] ?></span></li>
                        <li class="ms-4"><strong>Interface <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Structures with similar interface. For more details, see https://doi.org/10.1186/s12859-020-03881-z"><i class="bi bi-question-circle-fill opacity-25"></i></a>: </strong><span><?= $info[41] ?></span></li>
                        <li class="ms-4"><strong>Sequence <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Structures with sequences with high identity. For more details, see https://doi.org/10.1186/s12859-020-03881-z"><i class="bi bi-question-circle-fill opacity-25"></i></a>: </strong><span><?= $info[70] ?></span></li>
                    </ul>
                </div>
            </div>
            <div class="row mt-4">
                <h2>Protein-peptide interactions</h2>
            </div>
            <hr>
            <h4>Surface (calculated using Naccess) <sup><a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="We used naccess to calculate the protein-peptide interaction interface. To more details, see https://www.bioinf.manchester.ac.uk/naccess/nac_intro.html"><i class="bi bi-question-circle-fill opacity-25"></i></a></sup></h4>
            <ul class="bg-light p-3 rounded small">

                <li class="ms-4"><strong>ASA (complex)<a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="ASA: Accessible Surface Area (ASA) is the measure of the entire surface area of the molecule that is exposed and can come into contact with the solvent, usually water (value given in Å²)"><i class="bi bi-question-circle-fill opacity-25"></i></a>: </strong><span><?= (int)$info[5] ?></span></li>

                <li class="ms-4"><strong>ASA (protein) <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="ΔASA (protein): ΔASA_protein represents the surface area that is no longer exposed to the solvent upon complex formation and is calculated by the equation: ΔASA = ASA_unbound - ASA_bound. (Value given in Å²)"><i class="bi bi-question-circle-fill opacity-25"></i></a>: </strong><span><?= (int)$info[7] ?></span></li>

                <li class="ms-4"><strong>ASA (peptide) <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="ΔASA (peptide): ΔASA_peptide represents the surface area that is no longer exposed to the solvent upon complex formation and is calculated by the equation: ΔASA = ASA_unbound - ASA_bound. (Value given in Å²)"><i class="bi bi-question-circle-fill opacity-25"></i></a>: </strong><span><?= (int)$info[6] ?></span></li>
                
                <li class="ms-4"><strong>BProA <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Buried protein area (value given in Å²)"><i class="bi bi-question-circle-fill opacity-25"></i></a>: </strong><span><?= (int)$info[10] ?></span></li>

                <li class="ms-4"><strong>BPepA <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Buried peptide area (value given in Å²)"><i class="bi bi-question-circle-fill opacity-25"></i></a>: </strong><span><?= (int)$info[9] ?></span></li>

                <li class="ms-4"><strong>BPP% <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Buried Peptide Percentage (%)"><i class="bi bi-question-circle-fill opacity-25"></i></a>: </strong><span><?= (int)$info[8] ?>%</span></li>

                <li class="ms-4"><strong>BSA <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Buried Surface Area represents the area effectively shared at the binding interface and was calculated according to the expression. It can be calculated using the formula: BSA = (ASA_protein + ASA_peptide − ASA_complex) / 2 (value given in Å²)"><i class="bi bi-question-circle-fill opacity-25"></i></a>: </strong><span><?= (int)$info[11] ?></span></li>
            </ul>

            <h4>Interaction energy (calculated using Prodigy) <sup><a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Estimated binding free energy (ΔG) of the protein–peptide complex, predicted by the PRODIGY command line tool. See the documentation to obtain more details. Check the Prodigy website for details about their methodology:  https://rascar.science.uu.nl/prodigy. For more details, see https://doi.org/10.7554/eLife.07454"><i class="bi bi-question-circle-fill opacity-25"></i></a></sup></h4>
            <ul class="bg-light p-3 rounded small">
                <li class="ms-4"><strong>Number of intermolecular contacts <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Number of Intermolecular Contacts: Total number of atomic contacts between the protein and the peptide within a specified cutoff distance (typically ≤ 5.5 Å). A higher number of contacts usually indicates a more extensive interaction interface.
"><i class="bi bi-question-circle-fill opacity-25"></i></a>: </strong><span><?= (int)$info[20] ?></span></li>
                <li class="ms-4"><strong>Number of charged-charged contacts <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Number of Charged–Charged Contacts: Number of interactions between oppositely charged residues (e.g., Lys–Asp, Arg–Glu) across the binding interface, contributing significantly to electrostatic stabilization."><i class="bi bi-question-circle-fill opacity-25"></i></a>: </strong><span><?= (int)$info[18] ?></span></li>
                <li class="ms-4"><strong>Number of charged-polar contacts <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Number of Charged–Polar Contacts: Count of contacts between charged residues and polar uncharged residues (e.g., Lys–Ser, Asp–Thr), which often form hydrogen bonds or dipole interactions."><i class="bi bi-question-circle-fill opacity-25"></i></a>: </strong><span><?= (int)$info[19] ?></span></li>
                <li class="ms-4"><strong>Number of charged-apolar contacts <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Number of Charged–Apolar Contacts: Number of contacts between charged residues and hydrophobic residues (e.g., Arg–Leu, Lys–Val). These interactions typically contribute less to stability but may influence interface geometry."><i class="bi bi-question-circle-fill opacity-25"></i></a>: </strong><span><?= (int)$info[17] ?></span></li>
                <li class="ms-4"><strong>Number of polar-polar contacts <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Number of Polar–Polar Contacts: Number of interactions between polar uncharged residues (e.g., Ser–Thr, Asn–Gln), frequently involving hydrogen bonding or dipole alignment across the interface."><i class="bi bi-question-circle-fill opacity-25"></i></a>: </strong><span><?= (int)$info[21] ?></span></li>
                <li class="ms-4"><strong>Number of apolar-polar contacts <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Number of Apolar–Polar Contacts: Count of interactions between hydrophobic and polar residues at the interface, which can contribute to partial desolvation and interface packing."><i class="bi bi-question-circle-fill opacity-25"></i></a>: </strong><span><?= (int)$info[16] ?></span></li>
                <li class="ms-4"><strong>Number of apolar-apolar contacts <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Number of Apolar–Apolar Contacts: Number of hydrophobic–hydrophobic interactions (e.g., Leu–Val, Phe–Ile) that promote interface stabilization through the exclusion of water molecules (hydrophobic effect)."><i class="bi bi-question-circle-fill opacity-25"></i></a>: </strong><span><?= (int)$info[15] ?></span></li>
                <li class="ms-4"><strong>Percentage of apolar NIS residues <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Percentage of Apolar NIS Residues (%): Proportion of residues in the Non-Interacting Surface (NIS) that are classified as apolar, expressed as a percentage. This value helps assess the hydrophobic character of the exposed surface outside the binding interface."><i class="bi bi-question-circle-fill opacity-25"></i></a>: </strong><span><?= $info[31] ?>%</span></li>
                <li class="ms-4"><strong>Percentage of charged NIS residues <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Percentage of Charged NIS Residues (%): Proportion of residues in the Non-Interacting Surface that are charged (either positively or negatively), expressed as a percentage. It reflects the electrostatic nature of the surface not involved in binding."><i class="bi bi-question-circle-fill opacity-25"></i></a>: </strong><span><?= $info[32] ?>%</span></li>
                <li class="ms-4"><strong>Predicted binding affinity (kcal/mol) <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Predicted Binding Affinity (kcal·mol⁻¹): Estimated Gibbs free energy of binding (ΔG), in kilocalories per mole. More negative values indicate stronger predicted binding between the protein and peptide."><i class="bi bi-question-circle-fill opacity-25"></i></a>: </strong><span><?= $info[33] ?></span></li>
                <li class="ms-4"><strong>Predicted dissociation constant (M) at 25.0˚C <a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Predicted Dissociation Constant (M) at 25.0 °C: Predicted equilibrium dissociation constant (K_d), expressed in molar units (M), at 25 °C. It represents the expected concentration of the complex at which half of the binding sites are occupied. Lower values correspond to higher binding affinity."><i class="bi bi-question-circle-fill opacity-25"></i></a>: </strong><span><?= $info[34] ?></span></li>
            </ul>

            <h4>Interface residues <sup><a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Interface Residues (distmax ≤ 6 Å): List of residues located within 6 Å of the interacting partner, defining the binding interface between the protein and peptide."><i class="bi bi-question-circle-fill opacity-25"></i></a></sup></h4>

            <p class="bg-light p-3 rounded small">
                <label class="badge bg-dark">Interface: <?= substr_count($info[14],",")+1 ?> residues</label>
                <label class="badge bg-secondary">Chain: <?= $info[27] ?></label><br>
                <span class="pt-2"><?= str_replace(',', ', ', str_replace('<br>','',$info[14])) ?></span>
            </p>

            <h4>Contacts (calculated using COCaDA)  <sup><a data-bs-toggle="popover" data-bs-title="Help" data-bs-trigger="hover focus" data-bs-content="Contacts (calculated using COCaDA): Number and type of interatomic contacts calculated by the COCaDA tool (https://bioinfo.dcc.ufmg.br/cocada-web), used to characterize specific atom–atom interactions across the interface."><i class="bi bi-question-circle-fill opacity-25"></i></a></sup></h4>
            <center>
                <div class="btn-group btn-group-sm" role="group" aria-label="...">
                    <span class="btn btn-outline-dark" id="basic-addon1">
                        <span class="d-none d-md-inline"><b><i class="bi bi-funnel-fill"></i> Filter results: </b></span>
                        <span class="d-md-none"><i class="bi bi-funnel-fill"></i></span>
                    </span>
                    <button type="button" id="show_all" class="btn btn-dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Default">
                        <span class="d-none d-md-inline">Show all contacts</span>
                        <span class="d-md-none">All</span>
                    </button>
                    <button type="button" id="hb" class="btn btn-success border-dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Hydrogen Bonds">HB</button>
                    <button type="button" id="at" class="btn btn-info border-dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Attractive">AT</button>
                    <button type="button" id="re" class="btn btn-danger border-dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Repulsive">RE</button>
                    <button type="button" id="hy" class="btn btn-warning border-dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Hydrophobic">HY</button>
                    <button type="button" id="ar" class="btn btn-secondary border-dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Aromatic">AR</button>
                    <button type="button" id="sb" class="btn btn-primary border-dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Salt Bridge">SB</button>
                    <button type="button" id="ds" class="btn btn-light border border-dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Disulfide Bond">DS</button>
                    <button type="button" id="un" class="btn btn-white border border-dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Uncertain contact (depends on pH; can be attractive, repulsive, or salt bridge)">UN</button>
                </div>

                <span class="small text-muted"><input type="checkbox" id="side_chain" class="btn btn-light border ms-1"> Only side chain contacts</span>

            </center>

            <div class="table-responsive small">
                <table class="display" id="mut">
                    <thead>
                        <tr>
                            <th>Contact</th>
                            <th>Chain1</th>
                            <th>R1</th>
                            <th>Atom1</th>
                            <th>Chain2</th>
                            <th>R2</th>
                            <th>Atom2</th>
                            <th>Distance</th>
                            <th>Local</th>
                            <th>Type</th>
                            <th>Show</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($contacts as $contact) {  ?>
                            <?php
                            $m = explode(',', $contact);
                            $len_mut = count($m);
                            if (($len_mut < 5) or ($m[0] == 'Chain1')) {
                                continue;
                            }
                            ?>
                            <tr onclick="selectID(
                            glviewer,
                            this.children[0].innerHTML, // residues, 
                            this.children[8].innerHTML, // type, => inter ou intra
                            this.children[1].innerHTML,  // chain 1, 
                            this.children[4].innerHTML,  // chain 2, 
                            this.children[3].innerHTML,  // a1, 
                            this.children[6].innerHTML  // a2
                            )" id="<?php echo $m[2] . $m[1] . '/' . $m[6] . $m[5]; ?>">
                                <td><?php echo $m[2] . $m[1] . '/' . $m[6] . $m[5]; ?></td>
                                <td><?php echo $m[0]; // chain 1 
                                    ?></td>
                                <td><?php echo $m[2];
                                    echo $m[1]; // res 1 
                                    ?></td>
                                <td><?php echo $m[3]; // atom 1 
                                    ?></td>
                                <td><?php echo $m[4]; // chain 2 
                                    ?></td>
                                <td><?php echo $m[6];
                                    echo $m[5]; // res2 
                                    ?></td>
                                <td><?php echo $m[7]; // atom2 
                                    ?></td>
                                <td><?php echo $m[8]; // dist 
                                    ?></td>
                                <td>
                                    <?php // local = INTRA ou PPI
                                    if ($m[0] == $m[4]) {
                                        echo "<span class='badge text-bg-dark'>INTRA</hb>";
                                    } else {
                                        echo "<span class='badge text-bg-secondary'>INTER</hb>";
                                    }
                                    ?>
                                </td>
                                <td><?php
                                    //echo $m[9];  // type
                                    switch (trim($m[9])) {
                                        case "HB":
                                            echo "<span class='badge text-bg-success'>HB</hb>";
                                            break;
                                        case "HY":
                                            echo "<span class='badge text-bg-warning'>HY</hb>";
                                            break;
                                        case "AT":
                                            echo "<span class='badge text-bg-info'>AT</hb>";
                                            break;
                                        case "RE":
                                            echo "<span class='badge text-bg-danger'>RE</hb>";
                                            break;
                                        case "SB":
                                            echo "<span class='badge text-bg-primary'>SB</hb>";
                                            break;
                                        case "DS":
                                            echo "<span class='badge text-bg-dark text-white'>DS</hb>";
                                            break;
                                        default:
                                            echo "<span class='badge text-bg-light'>$m[9]</hb>";
                                            break;
                                    }

                                    ?>
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0);"><i class="bi bi-eye-fill"></i></a>
                                </td>


                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>


        <div class="col-md-4 col-12" id="col2">
            <div class="bd-toc" data-spy="affix" id="affix" data-offset-top="240" data-offset-bottom="250">
                <div class="row">
                    <div class="col">
                        <div>
                            <label class="badge bg-secondary" for="opacityRange">Surface: <span class="badge bg-dark" id="opacityValue">30%</span></label>
                        </div>
                    </div>
                    <div class="col-6">
                        <input class="form-range" type="range" id="opacityRange" min="0" max="1" step="0.1" value="0.3">
                    </div>
                    <div class="col">
                        <p class="text-end my-0 text-muted small" style="">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#zoom" class="text-muted" id="click_zoom">
                                <i class="bi bi-arrows-fullscreen" title="See 3D structure in full screen"></i>
                            </a>
                        </p>
                    </div>
                </div>

                <div id="pdb" style="min-height: 400px; height: 80vh; min-width:280px; width: 100%">

                </div>
                <p style="color:#ccc; text-align: right" class="small">
                    <!-- <a href="<?= base_url("/export/pdb-to-pymol/$id") ?>" class="me-2">Export to PyMOL</a> | --><button class="btn btn-link btn-sm pt-0" onclick="reset()">Clear</button>
                </p>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="contactMap" tabindex="-1" aria-labelledby="contactMap" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-3 text-center w-100" id="contactMapTitle"><strong>Contacts map for <?= $id ?></strong></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div id="controls">
                    <div class="row px-4">
                        <div class="col">
                            <label for="chainX">X-axis Chain:</label>
                            <select id="chainX" class="form-select" onchange="updateChart()"></select>
                        </div>
                        <div class="col">
                            <label for="chainY">Y-axis Chain:</label>
                            <select id="chainY" class="form-select" onchange="updateChart()"></select>
                        </div>
                        <!-- <div class="col">
                                <button class="btn btn-primary w-100 mt-4" onclick="updateChart()">Update chart</button>
                            </div> -->
                        <div class="col">
                            <button id="saveButton" class="btn btn-success w-100 mt-4" onclick="saveChart()">Save figure</button>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col" id="scatter">
                        <canvas id="scatterChart" class="p-4"></canvas>
                        <div id="legend" class="pb-3"></div>
                    </div>
                </div>
            </div>

            <div class="modal-footer bg-white">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="zoom" tabindex="-1" aria-labelledby="title3d" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="title3d">3D structure</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Contêiner do 3Dmol -->
                <div id="pdbModalViewer" style="width: 1100px; height: 650px;" class=""></div>
            </div>

        </div>
    </div>
</div>
<script>
    let glviewerModal; // variável global para o viewer do modal

    $('#click_zoom').on('click', function() {
        // Inicializa viewer só na primeira vez
        if (!glviewerModal) {
            glviewerModal = $3Dmol.createViewer("pdbModalViewer", {
                defaultcolors: $3Dmol.rasmolElementColors
            });

            // Adiciona modelo
            $.get('<?php echo base_url('/data/' . $db . '/pdb/' . $id[0] . '/' . $id . '.pdb'); ?>', function(data) {
                const m2 = glviewerModal.addModel(data, "pdb");
                glviewerModal.setBackgroundColor(0xffffff);

                glviewerModal.setStyle({}, {
                    line: {
                        colorscheme: 'greyCarbon'
                    },
                    cartoon: {
                        color: 'grey'
                    }
                });

                glviewerModal.setStyle({
                    chain: '<?= substr($id, 5, 1) ?>'
                }, {
                    stick: {
                        colorscheme: 'orangeredCarbon'
                    },
                    cartoon: {
                        color: 'orangered'
                    }
                });

                function three_to_one(a) {
                    const code = a.toUpperCase();

                    // Dicionário de conversão 3 letras -> 1 letra
                    const map = {
                        ALA: "A",
                        ARG: "R",
                        ASN: "N",
                        ASP: "D",
                        CYS: "C",
                        GLN: "Q",
                        GLU: "E",
                        GLY: "G",
                        HIS: "H",
                        ILE: "I",
                        LEU: "L",
                        LYS: "K",
                        MET: "M",
                        PHE: "F",
                        PRO: "P",
                        SER: "S",
                        THR: "T",
                        TRP: "W",
                        TYR: "Y",
                        VAL: "V",
                        SEC: "U",
                        PYL: "O" // aminoácidos especiais
                    };

                    // Retorna o código de 1 letra ou "X" para desconhecido
                    return map[code] || "X";
                }
                const atoms21 = m2.selectedAtoms({});
                for (let i in atoms21) {
                    let atom = atoms21[i];
                    if (atom.elem == 'N') {
                        glviewerModal.addLabel(three_to_one(atom.resn) + atom.resi, {
                            fontSize: 9,
                            position: {
                                x: atom.x,
                                y: atom.y,
                                z: atom.z
                            },
                            backgroundColor: "grey",
                            fontColor: 'black',
                            backgroundOpacity: 0,

                        });

                    }
                }

                glviewerModal.zoomTo();
                glviewerModal.render();
            });
        } else {
            glviewerModal.render(); // re-render se modal for aberto novamente
        }
    });
    let lastZoomValue = 100; // valor inicial do slider
</script>

<!-- Return to Top -->
<a href="#" title="Return to top" style="position:fixed; right:10px; bottom:10px; color:#cccccc77"><span class="glyphicon glyphicon-chevron-up small" aria-hidden="true">Top</span></a>

<script>
    // loading
    $(() => setTimeout(() => $('#loading').fadeOut(), 1000));

    $(() => {
        let table = $('#mut').DataTable({
            "paging": true
        });

        $('#side_chain').click(function() {
            if ($("#side_chain").prop("checked")) {
                table
                    .columns(3).search("CB|CG|CG1|CG2|CD|CD1|CD2|CE|CE1|CE2|CE3|CZ|CZ2|CZ3|CH2|ND1|ND2|NE|NE1|NE2|NZ|OD1|OD2|OE1|OE2|OG|OG1|OH|SD|SG", true, false)
                    .columns(6).search("CB|CG|CG1|CG2|CD|CD1|CD2|CE|CE1|CE2|CE3|CZ|CZ2|CZ3|CH2|ND1|ND2|NE|NE1|NE2|NZ|OD1|OD2|OE1|OE2|OG|OG1|OH|SD|SG", true, false)
                    .draw();
            } else {
                table.columns(3).search(".*", true, false)
                    .columns(6).search(".*", true, false).draw();
            }
        });

        $('#at').click(function() {
            table.columns(9).search("AT", true, false).draw();
        });
        $('#hb').click(function() {
            table.columns(9).search("HB", true, false).draw();
        });
        $('#re').click(function() {
            table.columns(9).search("RE", true, false).draw();
        });
        $('#ar').click(function() {
            table.columns(9).search("AS|SPA|SPE|SOT", true, false).draw();
        });
        $('#hy').click(function() {
            table.columns(9).search("HY", true, false).draw();
        });
        $('#sb').click(function() {
            table.columns(9).search("SB", true, false).draw();
        });
        $('#ds').click(function() {
            table.columns(9).search("DS", true, false).draw();
        });
        $('#un').click(function() {
            table.columns(9).search("u", true, false).draw();
        });
        $('#show_all').click(function() {
            table.columns(9).search(".*", true, false).draw();
        });


    });


    $('nav').css('position', 'relative');

    function highlight(pos) {
        $(pos).css("background-color", "#f2dede");
    }

    // 3DMOL **********************************************************************
    /* Select ID */
    function selectID(glviewer, residues, type, chain1, chain2, a1, a2) {

        residues = residues.split("/");

        var res1 = residues[0].substr(1);
        var res2 = residues[1].substr(1);

        // glviewer.setStyle({}, {
        //     line: {
        //         color: 'grey'
        //     },
        //     cartoon: {
        //         color: 'white'
        //     }
        // }); /* Cartoon multi-color */
        glviewer.setStyle({
            resi: res1,
            chain: chain1
        }, {
            cartoon: {
                opacity: 0.7
            },
            stick: {
                colorscheme: 'whiteCarbon'
            }
        });

        glviewer.setStyle({
            resi: res2,
            chain: chain2
        }, {
            cartoon: {
                opacity: 0.7
            },
            stick: {
                colorscheme: 'whiteCarbon'
            }
        });

        if (type.includes('INTRA')) {
            glviewer.zoomTo({
                resi: [res1, res2],
                chain: chain1
            });
        } else if (type.includes('INTER')) {
            glviewer.zoomTo({
                resi: res1,
                chain: chain1
            });
        }

        // linha tracejada
        let atm1 = glviewer.selectedAtoms({
            resi: res1,
            atom: a1,
            chain: chain1
        }); // Resíduo 10, átomo O
        let atm2 = glviewer.selectedAtoms({
            resi: res2,
            atom: a2,
            chain: chain2
        }); // Resíduo 20, átomo N

        // Garantir que os átomos foram encontrados antes de desenhar a linha
        if (atm1.length > 0 && atm2.length > 0) {
            var atom1 = atm1[0]; // Primeiro átomo correspondente
            var atom2 = atm2[0]; // Primeiro átomo correspondente

            //console.log(atom2,'aqui')

            // Adicionar a linha tracejada entre os átomos
            glviewer.addLine({
                dashed: true,
                start: {
                    x: atom1.x,
                    y: atom1.y,
                    z: atom1.z
                },
                end: {
                    x: atom2.x,
                    y: atom2.y,
                    z: atom2.z
                },
                color: "red",
                dashLength: 0.2, // Comprimento dos traços
                linewidth: 5, // Define a grossura da linha
                gapLength: 0.1
            });
        }
        // fim linha tracejada

        glviewer.render();

    }


    function selectPDB(id) {

        var ids = id.split("_");
        var mut = ids[1].replace("/", "_");

        try {
            var pos = mut.split("_");
            var pos1 = pos[0].substr(1, pos[0].length - 2);
            var pos2 = pos[1].substr(1, pos[1].length - 2);
            var pos1a = Number(pos1) - 1;
            var pos1d = Number(pos1) + 1;
            var pos2a = Number(pos2) - 1;
            var pos2d = Number(pos2) + 1;
            pos1a = pos1a.toString();
            pos1d = pos1d.toString();
            pos2a = pos2a.toString();
            pos2d = pos2d.toString();
        } catch (err) {
            var erro = 1;
        }


        var atomcallback = function(atom, viewer) {
            if (atom.clickLabel === undefined ||
                !atom.clickLabel instanceof $3Dmol.Label) {
                atom.clickLabel = viewer.addLabel(atom.resn + " " + atom.resi + " (" + atom.elem + ")", {
                    fontSize: 10,
                    position: {
                        x: atom.x,
                        y: atom.y,
                        z: atom.z
                    },
                    backgroundColor: "black"
                });
                atom.clicked = true;
            }

            //toggle label style
            else {

                if (atom.clicked) {
                    var newstyle = atom.clickLabel.getStyle();
                    newstyle.backgroundColor = 0x66ccff;

                    viewer.setLabelStyle(atom.clickLabel, newstyle);
                    atom.clicked = !atom.clicked;
                } else {
                    viewer.removeLabel(atom.clickLabel);
                    delete atom.clickLabel;
                    atom.clicked = false;
                }
            }
        };
    }

    function reset() {
        console.log("Reiniciando visualização")
        location.reload();
    }

    $(() => {
        const pdb_data = "<?php echo base_url('/data/' . $db . '/pdb/' . $id[0] . '/' . $id . '.pdb'); ?>";

        $.get(pdb_data, function(d) {
            const data = d;
            // Cria viewer
            glviewer = $3Dmol.createViewer("pdb", {
                defaultcolors: $3Dmol.rasmolElementColors
            });
            glviewer.setBackgroundColor(0xffffff);

            // Adiciona modelo
            const m = glviewer.addModel(data, "pqr");

            // Cores e cadeias
            const colors = ["grey", "orangered", "deepskyblue", "green", "purple", "cyan"];
            const atomsx = m.selectedAtoms({});
            const chains = [...new Set(atomsx.map(atom => atom.chain))];

            // Função utilitária debounce
            const debounce = (fn, wait = 80) => {
                let t;
                return function(...args) {
                    clearTimeout(t);
                    t = setTimeout(() => fn.apply(this, args), wait);
                };
            };

            // Função segura para remover todas as superfícies
            function removeAllSurfacesSafe(viewer) {
                // Preferir método pronto, se existir
                if (typeof viewer.removeAllSurfaces === 'function') {
                    viewer.removeAllSurfaces();
                    return;
                }
                // Fallback: iterar sobre viewer.surfaces (se existir) e tentar remover
                if (Array.isArray(viewer.surfaces) && viewer.surfaces.length) {
                    // copie a lista porque removeSurface pode mutar viewer.surfaces
                    const existing = viewer.surfaces.slice();
                    for (const s of existing) {
                        try {
                            // tentamos remover pelo objeto/handle — envolver em try para não quebrar
                            viewer.removeSurface(s);
                        } catch (err) {
                            // Algumas versões esperam um índice ou outro formato; ignorar se falhar
                            console.warn('removeSurface failed for', s, err);
                        }
                    }
                }
            }

            // Função que (re)cria todas as superfícies com a opacidade passada
            function createSurfacesWithOpacity(opacity) {
                chains.forEach((chain, i) => {
                    const color = colors[i % colors.length];
                    glviewer.setStyle({
                        chain: chain
                    }, {
                        line: {
                            colorscheme: 'greyCarbon'
                        },
                        cartoon: {
                            color: color
                        }
                    });
                    glviewer.addSurface($3Dmol.SurfaceType.VDW, {
                        opacity: opacity,
                        color: color
                    }, {
                        chain: chain
                    });
                });
            }

            // Cria superfícies iniciais usando o valor atual do slider (fallback 0.3)
            const initialOpacity = parseFloat($('#opacityRange').val()) || 0.3;
            createSurfacesWithOpacity(initialOpacity);

            // Handler único, debounced, que remove e recria superfícies
            $('#opacityRange').on('input', debounce(function() {
                const newOpacity = parseFloat($(this).val());
                $('#opacityValue').text((newOpacity * 100).toFixed(0) + "%");

                // remove todas as superfícies de forma segura
                removeAllSurfacesSafe(glviewer);

                // (re)cria todas as superfícies com a nova opacidade
                createSurfacesWithOpacity(newOpacity);

                glviewer.render();
            }, 60));

            // restante: marca átomos como clicáveis etc.
            const atoms = m.selectedAtoms({});
            for (let i in atoms) {
                let atom = atoms[i];
                atom.clickable = true;
                atom.callback = atomcallback;
            }

            glviewer.mapAtomProperties($3Dmol.applyPartialCharges);
            glviewer.zoomTo();
            glviewer.render();
        });

        const atomcallback = function(atom, viewer) {
            if (atom.clickLabel === undefined || !(atom.clickLabel instanceof $3Dmol.Label)) {
                atom.clickLabel = viewer.addLabel(atom.resn + " " + atom.resi + " (" + atom.elem + ")", {
                    fontSize: 10,
                    position: {
                        x: atom.x,
                        y: atom.y,
                        z: atom.z
                    },
                    backgroundColor: "black"
                });
                atom.clicked = true;
            } else {
                if (atom.clicked) {
                    let newstyle = atom.clickLabel.getStyle();
                    newstyle.backgroundColor = 0x66ccff;
                    viewer.setLabelStyle(atom.clickLabel, newstyle);
                    atom.clicked = !atom.clicked;
                } else {
                    viewer.removeLabel(atom.clickLabel);
                    delete atom.clickLabel;
                    atom.clicked = false;
                }
            }
        };
    });
</script>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

    // MAPA DE CONTATOS
    let allChains = new Set();
    let allDataPoints = [];
    let scatterChart;
    let colorMap = {};
    const cat10Colors = [
        '#1f77b4', '#ff7f0e', '#2ca02c', '#d62728', '#9467bd',
        '#8c564b', '#e377c2', '#7f7f7f', '#bcbd22', '#17becf'
    ];

    function populateChainSelectors() {
        const chainX = document.getElementById('chainX');
        const chainY = document.getElementById('chainY');
        chainX.innerHTML = "";
        chainY.innerHTML = "";
        allChains.forEach(chain => {
            const optionX = document.createElement("option");
            optionX.value = optionX.textContent = chain;
            const optionY = document.createElement("option");
            optionY.value = optionY.textContent = chain;
            chainX.appendChild(optionX);
            chainY.appendChild(optionY);
        });
        chainX.value = '<?= substr($id, 5, 1) ?>';
        chainY.value = '<?= substr($id, 7, 1) ?>';
    }

    function updateChart() {
        const selectedX = document.getElementById('chainX').value;
        const selectedY = document.getElementById('chainY').value;
        const filteredData = allDataPoints.filter(p => p.c1 === selectedX && p.c2 === selectedY);

        scatterChart.data.datasets[0].data = filteredData;
        scatterChart.data.datasets[0].pointBackgroundColor = filteredData.map(p => p.backgroundColor);
        scatterChart.options.scales.x.title.text = `Chain ${selectedX}`;
        scatterChart.options.scales.y.title.text = `Chain ${selectedY}`;
        scatterChart.update();
    }

    function saveChart() {
        const canvas = document.getElementById('scatterChart');
        const link = document.createElement('a');
        link.href = canvas.toDataURL('image/png');
        link.download = 'contacts_<?= $id ?>.png';
        link.click();
    }

    fetch('<?php echo base_url(); ?>data/<?= $db ?>/contacts/<?= $id ?>/<?= substr($id, 0, 4) ?>_contacts.csv')
        .then(response => response.text())
        .then(text => {
            const lines = text.split('\n').map(line => line.trim()).filter(line => line);
            lines.shift(); // Ignorar a primeira linha
            let colorIndex = 0;
            let legendHTML = "<strong>Caption:</strong>";

            lines.forEach(line => {
                const values = line.split(',');
                if (values.length >= 10) {
                    const c1 = values[0];
                    const x = parseFloat(values[1]);
                    const aa1 = values[2];
                    const at1 = values[3];
                    const c2 = values[4];
                    const y = parseFloat(values[5]);
                    const aa2 = values[6];
                    const at2 = values[7];
                    const category = values[9].trim();
                    const label = `${category} | ${c1}:${aa1}${x} (${at1}) - ${c2}:${aa2}${y} (${at2})`;

                    allChains.add(c1);
                    allChains.add(c2);

                    if (!colorMap[category]) {
                        colorMap[category] = cat10Colors[colorIndex % cat10Colors.length];
                        legendHTML += `<div style='display: flex; align-items: center; gap: 5px;'>
                    <div style='width: 20px; height: 20px; background-color: ${colorMap[category]};'></div>${category}</div>`;
                        colorIndex++;
                    }

                    allDataPoints.push({
                        x,
                        y,
                        c1,
                        c2,
                        backgroundColor: colorMap[category],
                        label
                    });
                }
            });

            document.getElementById('legend').innerHTML = legendHTML;
            populateChainSelectors();

            const ctx = document.getElementById('scatterChart').getContext('2d');
            scatterChart = new Chart(ctx, {
                type: 'scatter',
                data: {
                    datasets: [{
                        label: 'Dispersão CSV',
                        data: allDataPoints.filter(p => p.c1 === '<?= substr($id, 5, 1) ?>' && p.c2 === '<?= substr($id, 7, 1) ?>'),
                        pointBackgroundColor: allDataPoints.map(p => p.backgroundColor),
                        borderWidth: 0,
                        pointRadius: 5,
                        pointHoverRadius: 7,
                    }]
                },
                options: {
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.raw.label;
                                }
                            }
                        },
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Chain A'
                            },
                            beginAtZero: false,
                            // min: 1,
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Chain A'
                            },
                            beginAtZero: false,
                            // min: 1,
                        }
                    }
                }
            });


        })
        .catch(error => console.error('Erro ao carregar o arquivo CSV:', error));
</script>
<?= $this->endSection() ?>