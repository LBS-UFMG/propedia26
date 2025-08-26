<!doctype html>
<html lang="pt-br">
<head>
    <title>Propedia – The Protein-Peptide Interaction Database</title>
    <?php $version = "25.825 BETA"; // 25-ago-2025 ?> 

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="<?= base_url('img/favicon.png') ?>" type="image/x-icon">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="<?= base_url('css/estilo.css') ?>">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
   
    <nav class="py-2 bg-body-tertiary menu link-light">
        <div class="px-5 container-fluid d-flex flex-wrap">
        <ul class="nav me-auto">
            <li class="nav-item"><a href="<?= base_url('/') ?>" class="nav-link link-body-emphasis px-2"><i class="bi bi-house-door-fill"></i></a></li>
            <li class="nav-item"><a href="#" data-bs-toggle="modal" data-bs-target="#about" class="nav-link link-body-emphasis px-2">About</a></li>
            <li class="nav-item"><a href="#" data-bs-toggle="modal" data-bs-target="#about" class="nav-link link-body-emphasis px-2">BLAST</a></li>
            <li class="nav-item"><a href="#" data-bs-toggle="modal" data-bs-target="#about" class="nav-link link-body-emphasis px-2">Clusters</a></li>
            <li class="nav-item"><a href="<?= base_url('documentation') ?>" class="nav-link link-body-emphasis px-2">Documentation</a></li>
            <li class="nav-item"><a href="<?= base_url('download') ?>" class="nav-link link-body-emphasis px-2">Download</a></li>
            <li class="nav-item"><a href="<?= base_url('explore') ?>" class="nav-link link-body-emphasis px-2">Explore</a></li> 
            <li class="nav-item"><a href="#" data-bs-toggle="modal" data-bs-target="#about" class="nav-link link-body-emphasis px-2">Search</a></li>
        </ul>
        <ul class="nav">
            <li class="nav-item"><a href="<?=base_url('#cite')?>"
            class="nav-link link-body-emphasis px-2">How to cite Propedia</a></li>
        </ul>
        </div>
    </nav>
    <header class="py-3 mb-4 border-bottom bg-light">
        <div class="px-5 container-fluid d-flex flex-wrap justify-content-center">
        <a href="<?= base_url() ?>" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto link-body-emphasis text-decoration-none">
            <img src="<?= base_url('/img/logo_propedia2.svg') ?>" width="250">
            <label class="bg-dark badge">v26-beta</label>
        </a>
        <form class="col-12 col-md-auto mb-3 mb-md-0" role="search">
            <input type="search" class="form-control form-control-md mt-2" placeholder="Search by PDB ID..." aria-label="Search" onkeydown="redirectToURL(event)" id="urlInput">
        </form>
        </div>
    </header>

    <!-- PARTE DINÂMICA -->
    <main class="container-fluid">
        <?= $this->renderSection('conteudo') ?> 
    </main>
    <!-- / FIM PARTE DINÂMICA -->

    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-6 ps-5">
                    <img src="<?= base_url('/img/logo_propedia.svg') ?>" width="200px">
                    <p class="text-light small pt-3 col-9">PROPEDIA is a database of peptide-protein complexes clusterized in three methodologies: based on peptide sequences; based on structure interface; and based on binding sites. PROPEDIA main goal is to give new insights into peptide design of biotechnological interests.</p>

                    <p style="font-size: 0.6em;color:#ccc">©<?=date('Y')?> Propedia v<?= $version ?> | Laboratory of Bioinformatics and Systems, UFMG (Brazil) | <a class="text-white" href="https://github.com/LBS-UFMG/propedia">GitHub</a>
                </div>

                <div class="col-12 col-md-6">
                    <div class="row pt-5">
                        <div class="col"><a href="http://bioinfo.dcc.ufmg.br" target="_blank"><img src="<?= base_url('/img/lbs.svg') ?>" width="220px"></a></div>
                        <div class="col"><img src="<?= base_url('/img/dcc_w.svg') ?>" width="170px"></div>
                        <div class="col"><img src="<?= base_url('/img/ufmg_w.svg') ?>" width="200px"></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- MODAL: SOBRE -->
    <div class="modal fade" tabindex="-1" id="about" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
        <div class="modal-header bg-dark">
            <div class="text-center">
            <img width="150" class="me-3" src="<?php echo base_url('/img/logo_propedia.svg'); ?>">
            </div>
            <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body small">
            <div class="row">
            <p class="text-muted">
            PROPEDIA is a database of peptide-protein complexes clusterized in three methodologies: based on peptide sequences; based on structure interface; and based on binding sites. PROPEDIA main goal is to give new insights into peptide design of biotechnological interests.
            </p>
            </div>
            <div class="row text-secondary">
                <div class="col-md-8">

                    <strong># Created by:</strong><br>
                    Pedro Martins / Diego Mariano / Raquel C. de Melo-Minardi<br><br>

                    <strong># Backend/frontend:</strong><br>
                    Diego Mariano
                </div>
            </div>

            <span><label class="badge bg-dark mt-3">Cite:</label></span>
            <p class="small text-muted border-start border-dark mx-3 col-11 bg-light p-2">
                Martins, P.M., Santos, L.H., Mariano, D. et al. Propedia: a database for protein–peptide identification based on a hybrid clustering algorithm. BMC Bioinformatics 22, 1 (2021). https://doi.org/10.1186/s12859-020-03881-z
            </p>
        </div>
        <div class="modal-footer">
            <img height="50" class="me-3" src="<?php echo base_url('/img/dcc_b.svg'); ?>">
            <img height="50"  class="me-3" src="<?php echo base_url('/img/ufmg_b.svg'); ?>">

            <button type="button" class="btn btn-dark py-4 px-5" data-bs-dismiss="modal">Fechar</button>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal SOBRE -->

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

    <script src="<?php echo base_url('DataTables/datatables.min.js'); ?>"></script>
    <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>

    <script src="<?php echo base_url('js/3dmol.js'); ?>"></script>


    <script>
        function redirectToURL(event) {
            // Verificar se a tecla pressionada foi Enter (código 13)
            if (event.keyCode === 13) {
                event.preventDefault(); // Prevenir o envio do formulário
                let url = document.getElementById('urlInput').value;
                url = url.toUpperCase();
                if (url) {
                    if(url.length != 4){
                        window.location.href = '<?= base_url("/entry/404") ?>';
                    }
                    window.location.href = '<?= base_url() ?>pep-pro/'+url;
                }
            }
        }
        
    </script>

    <?= $this->renderSection('scripts') ?> 

</body>
</html>
