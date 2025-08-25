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
    <div class="container-fluid px-5">
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
                                <li><a class="dropdown-item mt-2" href="<?php echo base_url(); ?>data/pdb/<?= substr($id, 0, 1) ?>/<?= $id ?>/<?= $id ?>_contacts.csv">Contacts</a></li>
                                <li><a class="dropdown-item" href="https://files.rcsb.org/download/<?php echo $id; ?>.cif">PDB file</a></li>
                                <hr>
                                <li><a class="dropdown-item" href="<?= base_url("/export/pdb-to-pymol/$id") ?>">Export to PyMOL</a></li>
                            </ul>
                        </div>
                    </div>

                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#contactMap">
                        Contact map <i class="bi bi-image"></i>
                    </button>
                </h1>

                <div class="mb-3">
                    <a target="_blank" style="text-decoration:none" title="Search in PDB" href="https://www.rcsb.org/structure/<?=$pdb_id?>">
                        <span class="badge bg-dark text-light">PDB</span>
                    </a>

                    <a target="_blank" style="text-decoration:none" title="Search in UniProt" href="https://www.uniprot.org/uniprot/?query=<?=$pdb_id?>+database:pdb">
                        <span class="badge bg-dark">UniProt</span>
                    </a>

                    <a target="_blank" style="text-decoration:none" title="Search in PubMed" href="https://www.ncbi.nlm.nih.gov/pubmed/?term=<?=$pdb_id?>">
                        <span class="badge bg-dark">PubMed</span>
                    </a>

                    <!-- <a title="Classified in the sequence cluster number 967" style="text-decoration:none" href="http://bioinfo.dcc.ufmg.br/propedia2/cluster/sequence/967"><span class="badge bg-dark">Cluster S967</span></a>
                    <a title="Classified in the binding cluster number 35" style="text-decoration:none" href="http://bioinfo.dcc.ufmg.br/propedia2/cluster/binding/35"><span class="badge bg-dark">Cluster C35</span></a>
                    <a title="Classified in the interface cluster number 243" style="text-decoration:none" href="http://bioinfo.dcc.ufmg.br/propedia2/cluster/interface/243"><span class="badge bg-dark">Cluster I243</span></a> -->
                </div>

                <div class="row mb-1">
                    <div class="col">
                        <strong>PDB ID: </strong><span><?=$info[1]?></span>
                    </div>
                    <div class="col">
                        <strong>Structure method: </strong><span><?=$info[6]?></span>
                    </div>
                    <div class="col">
                        <strong>Resolution: </strong><span><?=$info[3]?></span>
                    </div>
                    <div class="col">
                        <strong>Cluster leader: </strong><span><?=$info[15]?></span>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col">
                        <strong>Peptide chain: </strong><span><?=$info[8]?></span>
                    </div>
                    <div class="col">
                        <strong>Peptide length: </strong><span><?=$info[10]?></span>
                    </div>
                    <div class="col">
                        <strong>Protein chain: </strong><span><?=$info[7]?></span>
                    </div>
                    <div class="col">
                        <strong>Protein length: </strong><span><?=$info[9]?></span>
                    </div>
                    <!-- <div class="col">
                        <sup class="ms-2"><label class="badge bg-dark rounded" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="HB: Hydrogen Bonds | AT: Attractive  | RE: Repulsive | HY: Hydrophobic | AS: Aromatic Stacking | SB: Salt Bridge | DS: Disulfide Bond | u: uncertain">?</label></sup>
                    </div> -->
                </div>

                <div class="row mb-4">
                    <div class="col-12 col-md-8">
                        <p><strong>Description: </strong> Calmodulin complexed with a peptide from a human death-associated protein kinase <?= $info[1] ?></p>
                    </div>
                    <div class="col-12 col-md-4">
                        <strong>Classification: </strong><span><?=$info[4]?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid px-5">
    <div class="row">
        <div class="col-md-9 col-12" ng-if="cttlok" id="col1">

            <div class="row">
                <!-- # 0 ID; 1 PDB_ID; 2 TITLE; 3 RESOLUTION; 4 CLASSIFICATION; 5 DEPOSITION_DATE; 6 STRUCTURE_METHOD;7 PROTEIN_CHAIN;8 PEPTIDE_CHAIN; 9 PROTEIN_SIZE; 10 PEPTIDE_SIZE; 11 PROTEIN_DESC; 12 PEPTIDE_DESC; 13 PROTEIN_SEQ; 14 PEPTIDE_SEQ;15 leader_id; 16 is_leader; 17 db -->

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th><h2>Protein</h2></th>
                            <th><h2>Peptide</h2></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Description</th>
                            <td><?=$info[11]?></td>
                            <td><?=$info[12]?></td>
                        </tr>
                        <tr>
                            <th>Organism</th>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Chain</th>
                            <td><?=$info[7]?></td>
                            <td><?=$info[8]?></td>
                        </tr>
                        <tr>
                            <th>Length</th>
                            <td><?=$info[9]?></td>
                            <td><?=$info[10]?></td>
                        </tr>
                        <tr>
                            <th>Hydrophobic (% a.a.)</th>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Molecular Weight</th>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Aromaticity</th>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Instability</th>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Isoelectric Point</th>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Sequence</th>
                            <td><pre><?=$info[13]?></pre></td>
                            <td><pre><?=$info[14]?></pre></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row mt-5">
                <div class="col-12">
                    <h2>Clustering classification</h2>
                </div>
                <hr>
                <div class="col-12">
                    <p>Unavailable</p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-2 col-12">
                    <h2>Contacts</h2>
                </div>
                <div class="col"><label class="badge bg-secondary small">Powered by COCaDA</label></h2>
                </div>
            </div>
            <hr>
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

            <div class="table-responsive">
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

                    </tbody>
                </table>
            </div>
        </div>


        <div class="col-md-3" id="col2">

            <style>
                .affix {
                    top: 100px;
                    z-index: 9999 !important;
                }
            </style>

            <style>
                #pdb canvas {
                    position: relative !important;
                }
            </style>
            <div data-spy="affix" id="affix" data-offset-top="240" data-offset-bottom="250">
                <p class="text-end my-0 text-muted small" style=""><i class="bi bi-arrows-fullscreen"></i></p>
                <div id="pdb" style="min-height: 400px; height: 50vh; min-width:280px; width: 100%">

                </div>
                <p style="color:#ccc; text-align: right" class="small">
                    <a href="<?= base_url("/export/pdb-to-pymol/$id") ?>" class="me-2">Export to PyMOL</a> | <button class="btn btn-link btn-sm pt-0" onclick="reset()">Clear</button>
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

                <style>
                    canvas {
                        max-width: calc(100vh - 150px) !important;
                    }
                </style>
                <div class="row">

                    <div class="col">
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

<!-- Return to Top -->
<a href="#" title="Return to top" style="position:fixed; right:10px; bottom:10px; color:#cccccc77"><span class="glyphicon glyphicon-chevron-up small" aria-hidden="true">Return to top</span></a>

<script>
    // loading
    $(() => setTimeout(() => $('#loading').fadeOut(), 1000));

    $(document).ready(function() {
        var table = $('#mut').DataTable({
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

        glviewer.setStyle({}, {
            line: {
                color: 'grey'
            },
            cartoon: {
                color: 'white'
            }
        }); /* Cartoon multi-color */
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

    $(document).ready(function() {

        const txt = "<?php echo base_url('/data/' . $db . '/' . $id[0] . '/' . $id . '.pdb'); ?>";

        $.get(txt, function(d) {

            moldata = data = d;

            /* Creating visualization */
            glviewer = $3Dmol.createViewer("pdb", {
                defaultcolors: $3Dmol.rasmolElementColors
            });

            /* Color background */
            glviewer.setBackgroundColor(0xffffff);

            receptorModel = m = glviewer.addModel(data, "pqr");

            // Defina um array de cores
            const colors = ["grey", "orangered", "deepskyblue", "green", "purple", "cyan"];

            const atomsx = m.selectedAtoms({});
            const chains = [...new Set(atomsx.map(atom => atom.chain))]; // lista única de cadeias

            // Define cartoon e superfície para cada cadeia
            chains.forEach((chain, i) => {
                const color = colors[i % colors.length];

                // Estilo cartoon com cor
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

                // Adiciona superfície com a mesma cor do cartoon
                glviewer.addSurface($3Dmol.SurfaceType.VDW, {
                    opacity: 0.8,
                    color: color
                }, {
                    chain: chain
                });
            });

            /* Name of the atoms */
            atoms = m.selectedAtoms({});
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
    // tooltips
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));


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
        chainX.value = 'A';
        chainY.value = 'A';
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

    fetch('<?php echo base_url(); ?>data/pdb/<?= substr($id, 0, 1) ?>/<?= $id ?>/<?= $id ?>_contacts.csv')
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
                        data: allDataPoints.filter(p => p.c1 === 'A' && p.c2 === 'A'),
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
                            min: 1,
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Chain A'
                            },
                            beginAtZero: false,
                            min: 1,
                        }
                    }
                }
            });


        })
        .catch(error => console.error('Erro ao carregar o arquivo CSV:', error));
</script>
<?= $this->endSection() ?>