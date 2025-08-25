<?= $this->extend('template') ?>
<?= $this->section('conteudo') ?>
<!-- Conteúdo personalizado -->

<div id="loading">
    <div class="text-center">
        <img src="<?=base_url('/img/pepetito.png')?>" width="200px"><br>
        <div class="spinner-border spinner-border-sm" role="status"></div>
        <strong class="ms-2">Loading...</strong>
    </div>
</div>

<div class="container-fluid py-4 px-5">

    <h1 class="text-dark">Explore</h1>

    <div class="pb-1 text-center">
        <label class="btn btn-sm bg-light text-dark border">Propedia 26 is composed of three subdatasets:</label>
        <a class="btn btn-lg btn-outline-primary" data-bs-placement="top" data-bs-toggle="tooltip" data-bs-title="Traditional Propedia entry. Composed of a pair of protein-peptide structures" id="pep-pro">pep-pro</a>
        <a class="btn btn-lg btn-outline-success" data-bs-placement="top" data-bs-toggle="tooltip" data-bs-title="NEW! Entry composed of a peptide-peptide complex. Peptides must be between 2 and 50 amino acids long." id="pep-pep">pep-pep</a>
        <a class="btn btn-lg btn-outline-danger" data-bs-placement="top" data-bs-toggle="tooltip" data-bs-title="NEW! Complex formed by a peptide interacting with multiple protein chains." id="pep-multipro">pep-multipro</a>
    </div>

    <div id="explore">
        <div class="container-fluid">
            <div class="table-responsive small">
                <table id="table_explore" class="table table-striped table-hover" style="width:100%; ">
                    <thead>
                        <tr class="tableheader">
                            <th class="dt-center">ID <sup><a class="badge bg-dark" href="#" data-bs-placement="top" data-bs-toggle="tooltip" data-bs-title="Propedia ID: PDB - Peptide chain - Protein chain">?</a></sup></th><!-- 0 -->

                            <th>PDB ID</th><th>TITLE</th><!--<th>RESOLUTION</th>--><!-- 3 -->
                            <th>CLASSIFICATION</th><!--<th>DEPOSITION DATE</th><th>STRUCTURE METHOD</th>-->
                            <th>PRO CHAIN</th><th>PEP CHAIN</th><th>PRO SIZE</th> <!-- 9 -->
                            <th>PEP SIZE</th><th>PRO DESC</th><th>PEP DESC</th>
                            <th>Leader ID</th><th>Is the cluster leader?</th><th>Database</th> <!-- 15 -->
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- / FIM Conteúdo personalizado -->
<?= $this->endSection() ?>


<?= $this->section('scripts') ?>

<?php $entrada = 'data/propedia26-full.tsv'; ?>

<script>
    $(() => {

        const lerDados = (arquivo) => {
            // ler arquivo usando jQuery
            $.ajax({
                url: arquivo,
                success: (dados) => {
                    dados_formatados = formatarTabela(dados)
                    plotar(dados_formatados)
                }
            });
        }

        // formatar tabela --> INÍCIO 
        const formatarTabela = (dados) => {
            let dados_tabelados = [];
            // separa as linhas
            let linhas = dados.split("\n")
            // para cada linha
            for (let linha of linhas) {
                // remove caracteres especiais 
                linha = linha.replace("\r", "")
                // separa as células
                if(linha!=""){
                    celulas = linha.split("\t")
                }

                celulas[0] = celulas[0].replace(":","_")
                celulas[0] = `<strong><a href="<?=base_url()?>${celulas[15]}/${celulas[0]}">${celulas[0]}</a></strong>`;

                if(celulas[15] == 'pep-pro'){ celulas[15] = '<label class="bg-primary badge">pep-pro</label>'; }
                else if(celulas[15] == 'pep-pep'){ celulas[15] = '<label class="bg-success badge">pep-pep</label>'; }
                else if(celulas[15] == 'pep-multipro'){ celulas[15] = '<label class="bg-danger badge">pep-multipro</label>'; }
                // remove algumas colunas
                [3, 5, 6].sort((a,b) => b - a).forEach(i => celulas.splice(i, 1));
                // salva células
                dados_tabelados.push(celulas)
            }
            return dados_tabelados
        }
        // formatar tabela --> FIM 

        // plotando a tabela
        const plotar = (dados) => {
            // console.log(dados)
            // ativar datatable
            const table = $("#table_explore").DataTable({
                "data": dados,
                // "order": [
                //     [0, 'asc']
                // ] // ordena pela coluna 0
            })

            $('#pep-pro').click(function() {
                table.columns(12).search("pep-pro", true, false).draw();
            });
            $('#pep-pep').click(function() {
                table.columns(12).search("pep-pep", true, false).draw();
            });
            $('#pep-multipro').click(function() {
                table.columns(12).search("pep-multipro", true, false).draw();
            });
        }
        lerDados("<?= base_url($entrada) ?>");
    })

    
</script>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<script>
        $(()=>setTimeout(() => $('#loading').fadeOut(), 1000));

// tooltips
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
</script>
<?= $this->endSection() ?>
