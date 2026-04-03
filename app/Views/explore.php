<?= $this->extend('template') ?>
<?= $this->section('conteudo') ?>
<!-- Conteúdo personalizado -->

<div id="loading">
    <div class="text-center">
        <img src="<?= base_url('/img/cocadito-loading.png') ?>" width="200px"><br>
        <div class="spinner-border spinner-border-sm" role="status"></div>
        <strong class="ms-2">Loading...</strong>
    </div>
</div>

<div class="container-fluid py-4 px-4">

    <h1 class="text-dark">Explore</h1>

    <form class="row row-cols-lg-auto align-items-center p-3 bg-light rounded small">
        <!-- Min peptide size -->
        <div class="col-12">
            <label class="form-label mb-1" for="minSize">Min peptide size</label>
            <input type="number" class="form-control form-control-sm" id="minSize" name="minSize" placeholder="e.g. 2" min="2">
        </div>

        <!-- Max peptide size -->
        <div class="col-12">
            <label class="form-label mb-1" for="maxSize">Max peptide size</label>
            <input type="number" class="form-control form-control-sm" id="maxSize" name="maxSize" placeholder="e.g. 50" min="2">
        </div>

        <!-- Classification -->
        <div class="col-12">
            <label class="form-label mb-1" for="classification">PDB Classification</label>
            <select class="form-select form-select-sm" id="classification" name="classification">
                <option value="">All</option>
                <option value="ALLERGEN">ALLERGEN (33)</option>
                <option value="ANTIBIOTIC">ANTIBIOTIC (81)</option>
                <option value="ANTIBIOTIC/LIPID TRANSPORT">ANTIBIOTIC/LIPID TRANSPORT (10)</option>
                <option value="ANTIMICROBIAL PROTEIN">ANTIMICROBIAL PROTEIN (138)</option>
                <option value="ANTITOXIN">ANTITOXIN (13)</option>
                <option value="ANTITUMOR PROTEIN">ANTITUMOR PROTEIN (110)</option>
                <option value="ANTITUMOR PROTEIN/LIGASE">ANTITUMOR PROTEIN/LIGASE (17)</option>
                <option value="ANTIVIRAL PROTEIN">ANTIVIRAL PROTEIN (58)</option>
                <option value="ANTIVIRAL PROTEIN, IMMUNE SYSTEM">ANTIVIRAL PROTEIN, IMMUNE SYSTEM (10)</option>
                <option value="APOPTOSIS">APOPTOSIS (591)</option>
                <option value="APOPTOSIS INHIBITOR">APOPTOSIS INHIBITOR (33)</option>
                <option value="APOPTOSIS/APOPTOSIS INHIBITOR">APOPTOSIS/APOPTOSIS INHIBITOR (12)</option>
                <option value="APOPTOSIS/APOPTOSIS REGULATOR">APOPTOSIS/APOPTOSIS REGULATOR (39)</option>
                <option value="Apoptosis/Inhibitor">Apoptosis/Inhibitor (43)</option>
                <option value="BIOSYNTHETIC PROTEIN">BIOSYNTHETIC PROTEIN (226)</option>
                <option value="BIOSYNTHETIC PROTEIN, LIGASE">BIOSYNTHETIC PROTEIN, LIGASE (198)</option>
                <option value="BIOSYNTHETIC PROTEIN,Structural Protein">BIOSYNTHETIC PROTEIN,Structural Protein (16)</option>
                <option value="BIOTIN BINDING PROTEIN">BIOTIN BINDING PROTEIN (109)</option>
                <option value="BLOOD CLOTTING">BLOOD CLOTTING (269)</option>
                <option value="BLOOD CLOTTING, hydrolase">BLOOD CLOTTING, hydrolase (14)</option>
                <option value="BLOOD CLOTTING,HYDROLASE/INHIBITOR">BLOOD CLOTTING,HYDROLASE/INHIBITOR (10)</option>
                <option value="BLOOD CLOTTING/hydrolase inhibitor">BLOOD CLOTTING/hydrolase inhibitor (44)</option>
                <option value="BLOOD COAGULATION">BLOOD COAGULATION (15)</option>
                <option value="CALCIUM BINDING PROTEIN">CALCIUM BINDING PROTEIN (16)</option>
                <option value="CALCIUM-BINDING PROTEIN">CALCIUM-BINDING PROTEIN (35)</option>
                <option value="CALCIUM-BINDING PROTEIN/MEMBRANE PROTEIN">CALCIUM-BINDING PROTEIN/MEMBRANE PROTEIN (30)</option>
                <option value="CARBOHYDRATE">CARBOHYDRATE (12)</option>
                <option value="CELL ADHESION">CELL ADHESION (579)</option>
                <option value="CELL ADHESION/IMMUNE SYSTEM">CELL ADHESION/IMMUNE SYSTEM (27)</option>
                <option value="CELL ADHESION/IMMUNE SYSTEM/PEPTIDE">CELL ADHESION/IMMUNE SYSTEM/PEPTIDE (27)</option>
                <option value="CELL ADHESION/PROTEIN BINDING">CELL ADHESION/PROTEIN BINDING (16)</option>
                <option value="CELL ADHESION/STRUCTURAL PROTEIN">CELL ADHESION/STRUCTURAL PROTEIN (15)</option>
                <option value="CELL CYCLE">CELL CYCLE (1054)</option>
                <option value="CELL CYCLE/DNA">CELL CYCLE/DNA (11)</option>
                <option value="CELL CYCLE/Peptide">CELL CYCLE/Peptide (12)</option>
                <option value="CELL CYCLE/SIGNALING PROTEIN">CELL CYCLE/SIGNALING PROTEIN (24)</option>
                <option value="CELL INVASION">CELL INVASION (25)</option>
                <option value="CHAPERONE">CHAPERONE (718)</option>
                <option value="CHAPERONE, HYDROLASE">CHAPERONE, HYDROLASE (58)</option>
                <option value="Chaperone, Peptide Binding Protein">Chaperone, Peptide Binding Protein (26)</option>
                <option value="CHAPERONE/Antibiotic">CHAPERONE/Antibiotic (15)</option>
                <option value="CHAPERONE/HYDROLASE">CHAPERONE/HYDROLASE (36)</option>
                <option value="CHAPERONE/PEPTIDE">CHAPERONE/PEPTIDE (36)</option>
                <option value="CHAPERONE/PEPTIDE BINDING PROTEIN">CHAPERONE/PEPTIDE BINDING PROTEIN (27)</option>
                <option value="Chaperone/protein binding">Chaperone/protein binding (25)</option>
                <option value="CHOLINE BINDING PROTEIN/TOXIN">CHOLINE BINDING PROTEIN/TOXIN (10)</option>
                <option value="CHOLINE-BINDING PROTEIN">CHOLINE-BINDING PROTEIN (10)</option>
                <option value="COMPLEX (BIOTIN-BINDING PROTEIN/PEPTIDE)">COMPLEX (BIOTIN-BINDING PROTEIN/PEPTIDE) (25)</option>
                <option value="COMPLEX (HYDROLASE/INHIBITOR)">COMPLEX (HYDROLASE/INHIBITOR) (12)</option>
                <option value="COMPLEX (ISOMERASE/PEPTIDE)">COMPLEX (ISOMERASE/PEPTIDE) (21)</option>
                <option value="COMPLEX (OXIDOREDUCTASE/PEPTIDE)">COMPLEX (OXIDOREDUCTASE/PEPTIDE) (30)</option>
                <option value="COMPLEX (SERINE PROTEASE/COAGULATION)">COMPLEX (SERINE PROTEASE/COAGULATION) (10)</option>
                <option value="COMPLEX (SERINE PROTEASE/INHIBITOR)">COMPLEX (SERINE PROTEASE/INHIBITOR) (34)</option>
                <option value="COMPLEX (SIGNAL TRANSDUCTION/PEPTIDE)">COMPLEX (SIGNAL TRANSDUCTION/PEPTIDE) (21)</option>
                <option value="COMPLEX (TRANSFERASE/PEPTIDE)">COMPLEX (TRANSFERASE/PEPTIDE) (24)</option>
                <option value="CONTRACTILE PROTEIN">CONTRACTILE PROTEIN (139)</option>
                <option value="CONTRACTILE PROTEIN/ACTIN BINDING PROTEIN">CONTRACTILE PROTEIN/ACTIN BINDING PROTEIN (24)</option>
                <option value="CONTRACTILE PROTEIN/peptide">CONTRACTILE PROTEIN/peptide (37)</option>
                <option value="Contractile Protein/Protein binding">Contractile Protein/Protein binding (48)</option>
                <option value="CYTOKINE">CYTOKINE (30)</option>
                <option value="CYTOKINE, HORMONE/GROWTH FACTOR receptor">CYTOKINE, HORMONE/GROWTH FACTOR receptor (12)</option>
                <option value="CYTOSOLIC PROTEIN">CYTOSOLIC PROTEIN (139)</option>
                <option value="DE NOVO PROTEIN">DE NOVO PROTEIN (200)</option>
                <option value="DNA BINDING PROTEIN">DNA BINDING PROTEIN (665)</option>
                <option value="DNA BINDING PROTEIN/DNA">DNA BINDING PROTEIN/DNA (155)</option>
                <option value="DNA BINDING PROTEIN/DNA/RNA">DNA BINDING PROTEIN/DNA/RNA (28)</option>
                <option value="DNA BINDING PROTEIN/RNA/DNA">DNA BINDING PROTEIN/RNA/DNA (16)</option>
                <option value="DNA BINDING PROTEIN/TRANSFERASE">DNA BINDING PROTEIN/TRANSFERASE (10)</option>
                <option value="ELECTRON TRANSPORT">ELECTRON TRANSPORT (2009)</option>
                <option value="ELECTRON TRANSPORT, PHOTOSYNTHESIS">ELECTRON TRANSPORT, PHOTOSYNTHESIS (467)</option>
                <option value="ELECTRON TRANSPORT,PHOTOSYNTHESIS">ELECTRON TRANSPORT,PHOTOSYNTHESIS (278)</option>
                <option value="ELECTRON TRANSPORT/INHIBITOR">ELECTRON TRANSPORT/INHIBITOR (12)</option>
                <option value="ENDOCYTOSIS">ENDOCYTOSIS (187)</option>
                <option value="ENDOCYTOSIS/EXOCYTOSIS">ENDOCYTOSIS/EXOCYTOSIS (28)</option>
                <option value="ENTEROTOXIN">ENTEROTOXIN (36)</option>
                <option value="EXOCYTOSIS">EXOCYTOSIS (17)</option>
                <option value="GENE REGULATION">GENE REGULATION (548)</option>
                <option value="GENE REGULATION/DNA">GENE REGULATION/DNA (42)</option>
                <option value="HISTOCOMPATIBILITY ANTIGEN">HISTOCOMPATIBILITY ANTIGEN (24)</option>
                <option value="HORMONE">HORMONE (109)</option>
                <option value="HORMONE RECEPTOR">HORMONE RECEPTOR (73)</option>
                <option value="HORMONE RECEPTOR/HORMONE ACTIVATOR">HORMONE RECEPTOR/HORMONE ACTIVATOR (11)</option>
                <option value="HORMONE RECEPTOR/HORMONE/IMMUNE SYSTEM">HORMONE RECEPTOR/HORMONE/IMMUNE SYSTEM (21)</option>
                <option value="HORMONE RECEPTOR/PEPTIDE">HORMONE RECEPTOR/PEPTIDE (36)</option>
                <option value="HORMONE,TOXIN">HORMONE,TOXIN (32)</option>
                <option value="HORMONE/GROWTH FACTOR">HORMONE/GROWTH FACTOR (26)</option>
                <option value="HORMONE/GROWTH FACTOR RECEPTOR">HORMONE/GROWTH FACTOR RECEPTOR (39)</option>
                <option value="HYDROLASE">HYDROLASE (3793)</option>
                <option value="HYDROLASE (SERINE PROTEINASE)">HYDROLASE (SERINE PROTEINASE) (28)</option>
                <option value="HYDROLASE ACTIVATOR">HYDROLASE ACTIVATOR (14)</option>
                <option value="HYDROLASE INHIBITOR">HYDROLASE INHIBITOR (16)</option>
                <option value="HYDROLASE INHIBITOR/HYDROLASE">HYDROLASE INHIBITOR/HYDROLASE (10)</option>
                <option value="HYDROLASE RECEPTOR">HYDROLASE RECEPTOR (16)</option>
                <option value="HYDROLASE/ANTIBIOTIC">HYDROLASE/ANTIBIOTIC (319)</option>
                <option value="HYDROLASE/DNA">HYDROLASE/DNA (14)</option>
                <option value="HYDROLASE/DNA BINDING PROTEIN">HYDROLASE/DNA BINDING PROTEIN (12)</option>
                <option value="HYDROLASE/HORMONE">HYDROLASE/HORMONE (34)</option>
                <option value="hydrolase/hydrolase activator">hydrolase/hydrolase activator (17)</option>
                <option value="HYDROLASE/HYDROLASE INHIBITOR">HYDROLASE/HYDROLASE INHIBITOR (2238)</option>
                <option value="HYDROLASE/HYDROLASE INHIBITOR/DNA">HYDROLASE/HYDROLASE INHIBITOR/DNA (12)</option>
                <option value="hydrolase/hydrolase product">hydrolase/hydrolase product (14)</option>
                <option value="HYDROLASE/HYDROLASE REGULATOR">HYDROLASE/HYDROLASE REGULATOR (18)</option>
                <option value="HYDROLASE/HYDROLASE SUBSTRATE">HYDROLASE/HYDROLASE SUBSTRATE (46)</option>
                <option value="HYDROLASE/INHIBITOR">HYDROLASE/INHIBITOR (110)</option>
                <option value="HYDROLASE/LIGASE">HYDROLASE/LIGASE (13)</option>
                <option value="Hydrolase/Peptide">Hydrolase/Peptide (158)</option>
                <option value="HYDROLASE/PROTEIN BINDING">HYDROLASE/PROTEIN BINDING (54)</option>
                <option value="Hydrolase/RNA">Hydrolase/RNA (14)</option>
                <option value="HYDROLASE/substrate">HYDROLASE/substrate (15)</option>
                <option value="HYDROLASE/TRANSPORT PROTEIN">HYDROLASE/TRANSPORT PROTEIN (75)</option>
                <option value="hydrolase/viral protein">hydrolase/viral protein (25)</option>
                <option value="IMMUNE RESPONSE">IMMUNE RESPONSE (21)</option>
                <option value="IMMUNE SYSTEM">IMMUNE SYSTEM (6756)</option>
                <option value="Immune system/agonist">Immune system/agonist (18)</option>
                <option value="IMMUNE SYSTEM/ANTIGEN">IMMUNE SYSTEM/ANTIGEN (16)</option>
                <option value="Immune system/INHIBITOR">Immune system/INHIBITOR (58)</option>
                <option value="IMMUNE SYSTEM/PEPTIDE">IMMUNE SYSTEM/PEPTIDE (30)</option>
                <option value="IMMUNE SYSTEM/TOXIN">IMMUNE SYSTEM/TOXIN (21)</option>
                <option value="IMMUNE SYSTEM/TRANSCRIPTION">IMMUNE SYSTEM/TRANSCRIPTION (14)</option>
                <option value="IMMUNE SYSTEM/VIRAL PROTEIN">IMMUNE SYSTEM/VIRAL PROTEIN (190)</option>
                <option value="IMMUNOGLOBULIN">IMMUNOGLOBULIN (24)</option>
                <option value="ISOMERASE">ISOMERASE (97)</option>
                <option value="ISOMERASE, CHAPERONE">ISOMERASE, CHAPERONE (28)</option>
                <option value="ISOMERASE/ISOMERASE INHIBITOR">ISOMERASE/ISOMERASE INHIBITOR (19)</option>
                <option value="LECTIN">LECTIN (87)</option>
                <option value="LIGASE">LIGASE (507)</option>
                <option value="Ligase, chaperone">Ligase, chaperone (45)</option>
                <option value="Ligase/APOPTOSIS">Ligase/APOPTOSIS (10)</option>
                <option value="LIGASE/LIGASE INHIBITOR">LIGASE/LIGASE INHIBITOR (69)</option>
                <option value="LIGASE/PEPTIDE">LIGASE/PEPTIDE (20)</option>
                <option value="Ligase/protein binding">Ligase/protein binding (15)</option>
                <option value="LIGASE/SIGNALING PROTEIN">LIGASE/SIGNALING PROTEIN (13)</option>
                <option value="LIGASE/TRANSFERASE/DNA">LIGASE/TRANSFERASE/DNA (20)</option>
                <option value="LIGHT HARVESTING COMPLEX">LIGHT HARVESTING COMPLEX (10)</option>
                <option value="LIPID BINDING PROTEIN">LIPID BINDING PROTEIN (30)</option>
                <option value="LYASE">LYASE (305)</option>
                <option value="Lyase/protein binding">Lyase/protein binding (10)</option>
                <option value="MAJOR HISTOCOMPATIBILITY COMPLEX">MAJOR HISTOCOMPATIBILITY COMPLEX (12)</option>
                <option value="MEMBRANE PROTEIN">MEMBRANE PROTEIN (3432)</option>
                <option value="MEMBRANE PROTEIN, HYDROLASE/INHIBITOR">MEMBRANE PROTEIN, HYDROLASE/INHIBITOR (10)</option>
                <option value="MEMBRANE PROTEIN, PHOTOSYNTHESIS">MEMBRANE PROTEIN, PHOTOSYNTHESIS (28)</option>
                <option value="MEMBRANE PROTEIN, PROTEIN TRANSPORT">MEMBRANE PROTEIN, PROTEIN TRANSPORT (17)</option>
                <option value="MEMBRANE PROTEIN/EXOCYTOSIS">MEMBRANE PROTEIN/EXOCYTOSIS (62)</option>
                <option value="Membrane protein/Immune system">Membrane protein/Immune system (56)</option>
                <option value="MEMBRANE PROTEIN/INHIBITOR">MEMBRANE PROTEIN/INHIBITOR (14)</option>
                <option value="MEMBRANE PROTEIN/SIGNALING PROTEIN">MEMBRANE PROTEIN/SIGNALING PROTEIN (17)</option>
                <option value="MEMBRANE PROTEIN/TRANSCRIPTION">MEMBRANE PROTEIN/TRANSCRIPTION (10)</option>
                <option value="Membrane protein/TRANSPORT PROTEIN">Membrane protein/TRANSPORT PROTEIN (36)</option>
                <option value="METAL BINDING PROTEIN">METAL BINDING PROTEIN (296)</option>
                <option value="METAL BINDING PROTEIN/TOXIN">METAL BINDING PROTEIN/TOXIN (41)</option>
                <option value="METAL TRANSPORT">METAL TRANSPORT (17)</option>
                <option value="microtubule binding protein">microtubule binding protein (21)</option>
                <option value="MOTOR PROTEIN">MOTOR PROTEIN (759)</option>
                <option value="MOTOR PROTEIN, HYDROLASE/PROTEIN BINDING">MOTOR PROTEIN, HYDROLASE/PROTEIN BINDING (22)</option>
                <option value="MOTOR PROTEIN/HYDROLASE">MOTOR PROTEIN/HYDROLASE (12)</option>
                <option value="MOTOR PROTEIN/SIGNALING PROTEIN">MOTOR PROTEIN/SIGNALING PROTEIN (12)</option>
                <option value="NUCLEAR PROTEIN">NUCLEAR PROTEIN (299)</option>
                <option value="NUCLEAR PROTEIN/DNA">NUCLEAR PROTEIN/DNA (12)</option>
                <option value="NUCLEAR PROTEIN/INHIBITOR">NUCLEAR PROTEIN/INHIBITOR (15)</option>
                <option value="NUCLEAR PROTEIN/PROTEIN BINDING">NUCLEAR PROTEIN/PROTEIN BINDING (21)</option>
                <option value="NUCLEAR TRANSPORT">NUCLEAR TRANSPORT (16)</option>
                <option value="ONCOPROTEIN">ONCOPROTEIN (52)</option>
                <option value="OXIDOREDUCTASE">OXIDOREDUCTASE (2662)</option>
                <option value="OXIDOREDUCTASE (CYTOCHROME(C)-OXYGEN)">OXIDOREDUCTASE (CYTOCHROME(C)-OXYGEN) (18)</option>
                <option value="Oxidoreductase, Electron transport">Oxidoreductase, Electron transport (78)</option>
                <option value="OXIDOREDUCTASE/ELECTRON TRANSPORT">OXIDOREDUCTASE/ELECTRON TRANSPORT (49)</option>
                <option value="OXIDOREDUCTASE/MEMBRANE PROTEIN">OXIDOREDUCTASE/MEMBRANE PROTEIN (33)</option>
                <option value="OXIDOREDUCTASE/OXIDOREDUCTASE INHIBITOR">OXIDOREDUCTASE/OXIDOREDUCTASE INHIBITOR (13)</option>
                <option value="OXIDOREDUCTASE/peptide">OXIDOREDUCTASE/peptide (21)</option>
                <option value="OXIDOREDUCTASE/PROTEIN BINDING">OXIDOREDUCTASE/PROTEIN BINDING (40)</option>
                <option value="OXIDOREDUCTASE/STRUCTURAL PROTEIN">OXIDOREDUCTASE/STRUCTURAL PROTEIN (13)</option>
                <option value="OXIDOREDUCTASE/TRANSCRIPTION">OXIDOREDUCTASE/TRANSCRIPTION (10)</option>
                <option value="OXIDOREDUCTASE/TRANSFERASE">OXIDOREDUCTASE/TRANSFERASE (20)</option>
                <option value="PEPTIDE BINDING PROTEIN">PEPTIDE BINDING PROTEIN (1063)</option>
                <option value="PEPTIDE BINDING PROTEIN/PROTEIN BINDING">PEPTIDE BINDING PROTEIN/PROTEIN BINDING (15)</option>
                <option value="PHOTOSYNTHESIS">PHOTOSYNTHESIS (12796)</option>
                <option value="PHOTOSYNTHESIS,ELECTRON TRANSPORT">PHOTOSYNTHESIS,ELECTRON TRANSPORT (161)</option>
                <option value="PLANT PROTEIN">PLANT PROTEIN (283)</option>
                <option value="PLANT PROTEIN, Lyase">PLANT PROTEIN, Lyase (32)</option>
                <option value="PROTEIN BINDING">PROTEIN BINDING (1785)</option>
                <option value="PROTEIN BINDING/HYDROLASE">PROTEIN BINDING/HYDROLASE (22)</option>
                <option value="Protein binding/Immune System">Protein binding/Immune System (11)</option>
                <option value="PROTEIN BINDING/INHIBITOR">PROTEIN BINDING/INHIBITOR (37)</option>
                <option value="PROTEIN BINDING/LIPID BINDING PROTEIN">PROTEIN BINDING/LIPID BINDING PROTEIN (17)</option>
                <option value="PROTEIN BINDING/METAL BINDING PROTEIN">PROTEIN BINDING/METAL BINDING PROTEIN (28)</option>
                <option value="PROTEIN BINDING/PEPTIDE">PROTEIN BINDING/PEPTIDE (36)</option>
                <option value="PROTEIN BINDING/SIGNALING PROTEIN">PROTEIN BINDING/SIGNALING PROTEIN (12)</option>
                <option value="PROTEIN BINDING/TRANSFERASE">PROTEIN BINDING/TRANSFERASE (44)</option>
                <option value="PROTEIN FIBRIL">PROTEIN FIBRIL (121)</option>
                <option value="PROTEIN TRANSPORT">PROTEIN TRANSPORT (840)</option>
                <option value="PROTEIN TRANSPORT, TRANSCRIPTION">PROTEIN TRANSPORT, TRANSCRIPTION (15)</option>
                <option value="PROTEIN TRANSPORT/Hydrolase">PROTEIN TRANSPORT/Hydrolase (11)</option>
                <option value="PROTEIN TRANSPORT/INHIBITOR">PROTEIN TRANSPORT/INHIBITOR (54)</option>
                <option value="PROTEIN TRANSPORT/Ligase">PROTEIN TRANSPORT/Ligase (17)</option>
                <option value="PROTEIN TRANSPORT/VIRAL PROTEIN">PROTEIN TRANSPORT/VIRAL PROTEIN (22)</option>
                <option value="PROTON TRANSPORT">PROTON TRANSPORT (212)</option>
                <option value="RECEPTOR">RECEPTOR (12)</option>
                <option value="RECEPTOR/INHIBITOR">RECEPTOR/INHIBITOR (10)</option>
                <option value="RECEPTOR/TOXIN">RECEPTOR/TOXIN (37)</option>
                <option value="RECOMBINATION">RECOMBINATION (109)</option>
                <option value="RECOMBINATION/DNA">RECOMBINATION/DNA (20)</option>
                <option value="RECOMBINATION/INHIBITOR">RECOMBINATION/INHIBITOR (52)</option>
                <option value="REPLICATION">REPLICATION (199)</option>
                <option value="REPLICATION/DNA">REPLICATION/DNA (12)</option>
                <option value="RIBOSOMAL PROTEIN">RIBOSOMAL PROTEIN (53)</option>
                <option value="RIBOSOME">RIBOSOME (3622)</option>
                <option value="RIBOSOME,TRANSCRIPTION/TRANSLATION">RIBOSOME,TRANSCRIPTION/TRANSLATION (56)</option>
                <option value="RIBOSOME/ANTIBIOTIC">RIBOSOME/ANTIBIOTIC (102)</option>
                <option value="RIBOSOME/INHIBITOR">RIBOSOME/INHIBITOR (28)</option>
                <option value="RIBOSOME/LIGASE">RIBOSOME/LIGASE (11)</option>
                <option value="RIBOSOME/RNA">RIBOSOME/RNA (30)</option>
                <option value="RIBOSOME/VIRAL PROTEIN">RIBOSOME/VIRAL PROTEIN (13)</option>
                <option value="RIM-BINDING PROTEIN">RIM-BINDING PROTEIN (45)</option>
                <option value="RNA">RNA (28)</option>
                <option value="RNA BINDING PROTEIN">RNA BINDING PROTEIN (315)</option>
                <option value="RNA BINDING PROTEIN/RNA">RNA BINDING PROTEIN/RNA (26)</option>
                <option value="RNA BINDING PROTEIN/TRANSCRIPTION">RNA BINDING PROTEIN/TRANSCRIPTION (15)</option>
                <option value="RNA BINDING/Metal Binding protein">RNA BINDING/Metal Binding protein (10)</option>
                <option value="SERINE PROTEASE">SERINE PROTEASE (30)</option>
                <option value="SIGNALING PROTEIN">SIGNALING PROTEIN (1894)</option>
                <option value="SIGNALING PROTEIN/CELL ADHESION">SIGNALING PROTEIN/CELL ADHESION (14)</option>
                <option value="SIGNALING PROTEIN/HORMONE">SIGNALING PROTEIN/HORMONE (78)</option>
                <option value="SIGNALING PROTEIN/IMMUNE SYSTEM">SIGNALING PROTEIN/IMMUNE SYSTEM (90)</option>
                <option value="SIGNALING PROTEIN/INHIBITOR">SIGNALING PROTEIN/INHIBITOR (65)</option>
                <option value="SIGNALING PROTEIN/PEPTIDE">SIGNALING PROTEIN/PEPTIDE (90)</option>
                <option value="SIGNALING PROTEIN/PROTEIN BINDING">SIGNALING PROTEIN/PROTEIN BINDING (36)</option>
                <option value="SIGNALING PROTEIN/SIGNALING PROTEIN">SIGNALING PROTEIN/SIGNALING PROTEIN (16)</option>
                <option value="SIGNALING PROTEIN/TRANSFERASE">SIGNALING PROTEIN/TRANSFERASE (19)</option>
                <option value="SPLICING">SPLICING (351)</option>
                <option value="SPLICING/RNA">SPLICING/RNA (11)</option>
                <option value="structural genomics, unknown function">structural genomics, unknown function (13)</option>
                <option value="STRUCTURAL PROTEIN">STRUCTURAL PROTEIN (1128)</option>
                <option value="STRUCTURAL PROTEIN, SIGNALING PROTEIN">STRUCTURAL PROTEIN, SIGNALING PROTEIN (15)</option>
                <option value="STRUCTURAL PROTEIN/DNA">STRUCTURAL PROTEIN/DNA (30)</option>
                <option value="STRUCTURAL PROTEIN/PROTEIN BINDING">STRUCTURAL PROTEIN/PROTEIN BINDING (15)</option>
                <option value="STRUCTURAL PROTEIN/VIRUS LIKE PARTICLE">STRUCTURAL PROTEIN/VIRUS LIKE PARTICLE (10)</option>
                <option value="SUGAR BINDING PROTEIN">SUGAR BINDING PROTEIN (467)</option>
                <option value="SUGAR BINDING PROTEIN, PLANT PROTEIN">SUGAR BINDING PROTEIN, PLANT PROTEIN (13)</option>
                <option value="SUGAR BINDING PROTEIN/INHIBITOR">SUGAR BINDING PROTEIN/INHIBITOR (15)</option>
                <option value="TOXIN">TOXIN (219)</option>
                <option value="TOXIN/ANTITOXIN">TOXIN/ANTITOXIN (57)</option>
                <option value="Toxin/CELL Adhesion">Toxin/CELL Adhesion (19)</option>
                <option value="TRANSCRIPTION">TRANSCRIPTION (4137)</option>
                <option value="TRANSCRIPTION REGULATOR">TRANSCRIPTION REGULATOR (43)</option>
                <option value="TRANSCRIPTION REPRESSOR">TRANSCRIPTION REPRESSOR (22)</option>
                <option value="Transcription, Peptide binding protein">Transcription, Peptide binding protein (12)</option>
                <option value="TRANSCRIPTION, TRANSFERASE/DNA">TRANSCRIPTION, TRANSFERASE/DNA (40)</option>
                <option value="TRANSCRIPTION, TRANSFERASE/DNA-RNA HYBRID">TRANSCRIPTION, TRANSFERASE/DNA-RNA HYBRID (26)</option>
                <option value="TRANSCRIPTION, TRANSFERASE/DNA/RNA">TRANSCRIPTION, TRANSFERASE/DNA/RNA (30)</option>
                <option value="TRANSCRIPTION, TRANSFERASE/RNA/DNA">TRANSCRIPTION, TRANSFERASE/RNA/DNA (55)</option>
                <option value="TRANSCRIPTION,TRANSFERASE/DNA-RNA HYBRID">TRANSCRIPTION,TRANSFERASE/DNA-RNA HYBRID (48)</option>
                <option value="TRANSCRIPTION,TRANSFERASE/DNA/RNA HYBRID">TRANSCRIPTION,TRANSFERASE/DNA/RNA HYBRID (24)</option>
                <option value="Transcription/Agonist">Transcription/Agonist (12)</option>
                <option value="TRANSCRIPTION/DNA">TRANSCRIPTION/DNA (93)</option>
                <option value="TRANSCRIPTION/DNA-RNA HYBRID">TRANSCRIPTION/DNA-RNA HYBRID (20)</option>
                <option value="transcription/dna/rna">transcription/dna/rna (193)</option>
                <option value="TRANSCRIPTION/INHIBITOR">TRANSCRIPTION/INHIBITOR (67)</option>
                <option value="TRANSCRIPTION/PEPTIDE">TRANSCRIPTION/PEPTIDE (28)</option>
                <option value="TRANSCRIPTION/PROTEIN BINDING">TRANSCRIPTION/PROTEIN BINDING (29)</option>
                <option value="transcription/RNA">transcription/RNA (25)</option>
                <option value="TRANSCRIPTION/RNA/DNA">TRANSCRIPTION/RNA/DNA (150)</option>
                <option value="TRANSCRIPTION/STRUCTURAL PROTEIN">TRANSCRIPTION/STRUCTURAL PROTEIN (10)</option>
                <option value="TRANSCRIPTION/TOXIN">TRANSCRIPTION/TOXIN (12)</option>
                <option value="TRANSCRIPTION/TRANSCRIPTION ACTIVATOR">TRANSCRIPTION/TRANSCRIPTION ACTIVATOR (13)</option>
                <option value="TRANSCRIPTION/TRANSCRIPTION INHIBITOR">TRANSCRIPTION/TRANSCRIPTION INHIBITOR (45)</option>
                <option value="TRANSCRIPTION/TRANSCRIPTION REGULATOR">TRANSCRIPTION/TRANSCRIPTION REGULATOR (10)</option>
                <option value="TRANSCRIPTION/TRANSFERASE">TRANSCRIPTION/TRANSFERASE (51)</option>
                <option value="TRANSFERASE">TRANSFERASE (2152)</option>
                <option value="TRANSFERASE/ANTIBIOTIC">TRANSFERASE/ANTIBIOTIC (25)</option>
                <option value="TRANSFERASE/CIRCADIAN CLOCK PROTEIN">TRANSFERASE/CIRCADIAN CLOCK PROTEIN (10)</option>
                <option value="TRANSFERASE/DNA">TRANSFERASE/DNA (25)</option>
                <option value="Transferase/DNA BINDING PROTEIN">Transferase/DNA BINDING PROTEIN (15)</option>
                <option value="TRANSFERASE/DNA/RNA">TRANSFERASE/DNA/RNA (28)</option>
                <option value="TRANSFERASE/INHIBITOR">TRANSFERASE/INHIBITOR (114)</option>
                <option value="TRANSFERASE/LIPID BINDING PROTEIN">TRANSFERASE/LIPID BINDING PROTEIN (12)</option>
                <option value="TRANSFERASE/PEPTIDE">TRANSFERASE/PEPTIDE (94)</option>
                <option value="Transferase/Protein binding">Transferase/Protein binding (49)</option>
                <option value="Transferase/RNA">Transferase/RNA (13)</option>
                <option value="TRANSFERASE/SIGNALING PROTEIN">TRANSFERASE/SIGNALING PROTEIN (65)</option>
                <option value="TRANSFERASE/STRUCTURAL PROTEIN">TRANSFERASE/STRUCTURAL PROTEIN (25)</option>
                <option value="TRANSFERASE/TRANSCRIPTION">TRANSFERASE/TRANSCRIPTION (52)</option>
                <option value="Transferase/Transferase Inhibitor">Transferase/Transferase Inhibitor (340)</option>
                <option value="TRANSFERASE/TRANSFERASE SUBSTRATE">TRANSFERASE/TRANSFERASE SUBSTRATE (14)</option>
                <option value="Transferase/unknown function">Transferase/unknown function (58)</option>
                <option value="TRANSLATION">TRANSLATION (536)</option>
                <option value="TRANSLOCASE">TRANSLOCASE (205)</option>
                <option value="TRANSPORT PROTEIN">TRANSPORT PROTEIN (807)</option>
                <option value="TRANSPORT PROTEIN,STRUCTURAL PROTEIN">TRANSPORT PROTEIN,STRUCTURAL PROTEIN (10)</option>
                <option value="TRANSPORT PROTEIN/SIGNALING PROTEIN">TRANSPORT PROTEIN/SIGNALING PROTEIN (27)</option>
                <option value="TRANSPORT PROTEIN/STRUCTURAL PROTEIN">TRANSPORT PROTEIN/STRUCTURAL PROTEIN (28)</option>
                <option value="TRANSPORT PROTEIN/TOXIN">TRANSPORT PROTEIN/TOXIN (20)</option>
                <option value="transport protein/viral protein">transport protein/viral protein (11)</option>
                <option value="UNKNOWN FUNCTION">UNKNOWN FUNCTION (64)</option>
                <option value="VIRAL PROTEIN">VIRAL PROTEIN (2081)</option>
                <option value="Viral protein, hydrolase">Viral protein, hydrolase (11)</option>
                <option value="VIRAL PROTEIN, TRANSFERASE">VIRAL PROTEIN, TRANSFERASE (18)</option>
                <option value="VIRAL PROTEIN/APOPTOSIS">VIRAL PROTEIN/APOPTOSIS (10)</option>
                <option value="VIRAL PROTEIN/DNA">VIRAL PROTEIN/DNA (14)</option>
                <option value="VIRAL PROTEIN/DNA/INHIBITOR">VIRAL PROTEIN/DNA/INHIBITOR (64)</option>
                <option value="Viral protein/Immune system">Viral protein/Immune system (222)</option>
                <option value="VIRAL PROTEIN/IMMUNE SYSTEM/INHIBITOR">VIRAL PROTEIN/IMMUNE SYSTEM/INHIBITOR (22)</option>
                <option value="VIRAL PROTEIN/INHIBITOR">VIRAL PROTEIN/INHIBITOR (77)</option>
                <option value="VIRAL PROTEIN/PEPTIDE">VIRAL PROTEIN/PEPTIDE (34)</option>
                <option value="VIRAL PROTEIN/PROTEIN TRANSPORT">VIRAL PROTEIN/PROTEIN TRANSPORT (75)</option>
                <option value="VIRAL PROTEIN/RNA">VIRAL PROTEIN/RNA (10)</option>
                <option value="VIRAL PROTEIN/TRANSFERASE">VIRAL PROTEIN/TRANSFERASE (34)</option>
                <option value="VIRUS">VIRUS (1253)</option>
                <option value="VIRUS LIKE PARTICLE">VIRUS LIKE PARTICLE (215)</option>
                <option value="VIRUS LIKE PARTICLE/PROTEIN BINDING">VIRUS LIKE PARTICLE/PROTEIN BINDING (24)</option>
                <option value="Virus/Immune system">Virus/Immune system (37)</option>
                <option value="Virus/Receptor">Virus/Receptor (10)</option>
                <option value="Virus/RNA">Virus/RNA (11)</option>
                <option value="VIRUS/VIRAL PROTEIN">VIRUS/VIRAL PROTEIN (10)</option>
            </select>
        </div>

        <!-- Only canonical amino acids -->
        <div class="col-12 d-flex align-items-center">
            <div class="form-check mt-4">
                <input class="form-check-input" type="checkbox" id="onlyCanonical" name="onlyCanonical">
                <label class="form-check-label" for="onlyCanonical">
                    Only canonical amino acids
                </label>
            </div>
        </div>

        <!-- Only canonical amino acids -->
        <div class="col-12 d-flex align-items-center">
            <div class="form-check mt-4">
                <input class="form-check-input" type="checkbox" id="onlyUnique" name="onlyUnique">
                <label class="form-check-label" for="onlyUnique">
                    Remove redundance
                </label>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="col-12 d-flex align-items-end">
            <!-- <button type="button" id="btn-clear" class="btn btn-outline-secondary mt-4 me-2">Clear</button> -->
            <button type="button" id="btn-filtrar" class="btn btn-primary mt-3">Apply filters</button>
        </div>
    </form>

    <div id="explore">
        <div class="container-fluid mt-2">
            <div class="table-responsive small">
                <table id="table_explore" class="table table-striped table-hover " style="width:100%; ">
                    <thead>
                        <tr class="tableheader">
                            <th class="dt-center" style="width: 8%">ID <sup><a class="badge bg-dark" href="#" data-bs-placement="top" data-bs-toggle="tooltip" data-bs-title="Propedia ID: PDB - Peptide chain - Protein chain">?</a></sup></th><!-- 0 -->

                            <th>PROTEIN SIZE</th>
                            <th>PEPTIDE SIZE</th>
                            <th>PEPTIDE SEQUENCE</th>
                            <th style="width: 30%">TITLE</th>
                            <th>CLASSIFICATION</th>
                            <th>Unique<sup><a class="badge bg-dark" href="#" data-bs-placement="top" data-bs-toggle="tooltip" data-bs-title="We clustered structures with similar sequence. Unique sequences are described as 'unique' or 'leader'.">?</a></sup></th>
                            <th class="dt-center">Download</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <center id="loading-data">
                    <p class="text-center text-muted small">Wait... loading data...</p>
                    <div class="spinner-border spinner-border-sm me-2" role="status"></div>
                </center>
            </div>
        </div>
    </div>

</div>
<!-- / FIM Conteúdo personalizado -->
<?= $this->endSection() ?>


<?= $this->section('scripts') ?>

<?php $entrada = 'data/propedia26_v13.tsv'; ?>


<script>
    $(() => {
        // Base URL gerada pelo servidor (útil para templates)
        const BASE_URL = '<?= base_url() ?>';

        // captura o parâmetro de busca da URL (?q= ou ?query=)
        const urlParams = new URLSearchParams(window.location.search);
        const initialQuery = (urlParams.get('q') || urlParams.get('query') || '').trim();

        const lerDados = (arquivo) => {
            $.ajax({
                url: arquivo,
                dataType: 'text',
                success: (dados) => {
                    try {
                        const dados_formatados = formatarTabela(dados);
                        plotar(dados_formatados, initialQuery);
                    } catch (err) {
                        console.error('Erro ao processar dados:', err);
                    }
                },
                error: (xhr, status, err) => {
                    console.error('Erro na requisição AJAX:', status, err);
                }
            });
        };

        // formatar tabela --> INÍCIO 
        const formatarTabela = (dados) => {
            const dados_tabelados = [];
            const linhas = dados.split(/\r?\n/);

            for (let linha of linhas) {
                linha = linha.trim();
                if (!linha) continue;

                const celulas = linha.split("\t");
                const id = (celulas[0] || '').trim();
                if (!id) continue;

                celulas[0] = `<strong><a href="${BASE_URL}entry/${id}">${id}</a></strong>`;

                if (celulas[6] && typeof celulas[6] === 'string') {
                    const val6 = celulas[6].trim().toLowerCase();
                    if (val6 === 'yes') {
                        celulas[6] = `<label class='badge bg-primary'>${celulas[6]}</label>`;
                    } else if (val6 === 'no') {
                        const ref = celulas[7] ? celulas[7] : id;
                        celulas[6] = `<a class="badge bg-danger link-light" href="${BASE_URL}entry/${ref}" data-bs-placement="top" data-bs-toggle="tooltip" data-bs-title="Similar to ${ref}">${celulas[6]}</a>`;
                    }
                }

                celulas[7] = `<a class="text-center" href="${BASE_URL}data/db/pdb/${id[0]}/${id}.pdb" data-bs-placement="top" data-bs-toggle="tooltip" data-bs-title="Click to download the file: ${id}.pdb"><strong><i class="bi bi-download"></i></strong></a>`;

                dados_tabelados.push(celulas);
            }

            return dados_tabelados;
        };
        // formatar tabela --> FIM 

        // plotando a tabela (agora aceita search inicial)
        const plotar = (dados, initialSearch = '') => {
            // destrói se já existir DataTable
            if ($.fn.DataTable.isDataTable('#table_explore')) {
                $('#table_explore').DataTable().clear().destroy();
                $('#table_explore tbody').empty();
            }

            // inicializa DataTable
            const table = $("#table_explore").DataTable({
                data: dados,
                paging: true,
                pageLength: 10,
                deferRender: true,
                processing: true,
                // outras opções que achar necessárias...
                dom: 'Bfrtip',
                "buttons": [
                    'csv', 'excel',
                ],
                initComplete: function () {
                    $('#loading-data').hide(); // remove "Wait..."
                }
            });

            // aplica busca inicial se tiver query na URL
            if (initialSearch) {
                // define valor no input de busca (interface)
                const filterInput = $('#table_explore_filter input');
                if (filterInput.length) filterInput.val(initialSearch);

                // aplica a busca e redesenha
                table.search(initialSearch).draw();
            }

            // --- FILTRO NUMÉRICO CUSTOM ---
            $('#btn-filtrar').off('click').on('click', function() {
                const min = parseFloat($('#minSize').val());
                const max = parseFloat($('#maxSize').val());
                const pdb_classification = $('#classification').val();
                const onlyCanonical = $('#onlyCanonical').is(':checked'); // checkbox
                const onlyUnique = $('#onlyUnique').is(':checked'); // checkbox

                // função de filtro customizada
                $.fn.dataTable.ext.search.push(function(settings, data) {
                    const valor = parseFloat(data[2]) || 0; // coluna 2 (index 1)
                    if ((!isNaN(min) && valor < min) || (!isNaN(max) && valor > max)) {
                        return false;
                    }
                    // --- FILTRO POR CLASSIFICAÇÃO ---
                    if (pdb_classification) {
                        const classificationValue = (data[5] || '').trim(); // coluna 6 (index 5)
                        if (classificationValue !== pdb_classification) {
                            return false;
                        }
                    }
                    // --- FILTRO POR CHECKBOX (excluir linhas com "x" na coluna 4) ---
                    if (onlyCanonical) {
                        const col4 = (data[3] || '').toLowerCase(); // coluna 4 (index 3)
                        if (col4.includes('x')) {
                            return false;
                        }
                    }
                    // --- FILTRO POR CHECKBOX (excluir linhas com "x" na coluna 4) ---
                    if (onlyUnique) {
                        const col4 = (data[6] || '').toLowerCase(); // coluna 4 (index 3)
                        if (col4.includes('no')) {
                            return false;
                        }
                    }
                    return true;
                });

                table.draw();
                // remove o filtro para evitar duplicação em cliques futuros
                $.fn.dataTable.ext.search.pop();

                const alert = `
                <div class="alert alert-success alert-dismissible fade show mb-0 small text-center rounded-0" role="alert">
                    Filters applied successfully!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>`;
                $('#alert-container').html(alert);
                setTimeout(() => { $('.alert').alert('close') }, 3000);

            });


            // Função para ativar tooltips/popovers (com fallback)
            const activatePopovers = () => {
                if (typeof loadPopover === 'function') {
                    try {
                        loadPopover();
                    } catch (e) {
                        console.warn('loadPopover falhou:', e);
                    }
                    return;
                }
                // fallback para tooltips do Bootstrap
                const ttTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                ttTriggerList.forEach(function(el) {
                    if (el._tooltipInstance) {
                        try {
                            el._tooltipInstance.dispose();
                        } catch (_) {}
                    }
                    const inst = bootstrap.Tooltip.getOrCreateInstance(el);
                    el._tooltipInstance = inst;
                });
            };

            activatePopovers();

            // re-ativar após redraw / page
            $('#table_explore').off('draw.dt').on('draw.dt', function() {
                activatePopovers();
            });
            $('#table_explore').off('page.dt').on('page.dt', function() {
                activatePopovers();
            });

            return table;
        };

        // executar leitura do arquivo (vindo do PHP)
        lerDados("<?= base_url($entrada) ?>");
    });
</script>


<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<script>
    $(() => {
        setTimeout(() => $('#loading').fadeOut(), 1000);
    });
</script>

<!-- DataTables JS + botões de exportação -->
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<?= $this->endSection() ?>