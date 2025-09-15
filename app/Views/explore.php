<?= $this->extend('template') ?>
<?= $this->section('conteudo') ?>
<!-- Conteúdo personalizado -->

<div id="loading">
    <div class="text-center">
        <img src="<?=base_url('/img/cocadito-loading.png')?>" width="200px"><br>
        <div class="spinner-border spinner-border-sm" role="status"></div>
        <strong class="ms-2">Loading...</strong>
    </div>
</div>

<div class="container-fluid py-4 px-4">

    <h1 class="text-dark">Explore</h1>

    <div id="explore">
        <div class="container-fluid">
            <div class="table-responsive small">
                <table id="table_explore" class="table table-striped table-hover" style="width:100%; ">
                    <thead>
                        <tr class="tableheader">
                            <th class="dt-center" style="width: 8%">ID <sup><a class="badge bg-dark" href="#" data-bs-placement="top" data-bs-toggle="tooltip" data-bs-title="Propedia ID: PDB - Peptide chain - Protein chain">?</a></sup></th><!-- 0 -->
                        
                            <th>PROTEIN SIZE</th><th>PEPTIDE SIZE</th><th>PEPTIDE SEQUENCE</th>
                            <th style="width: 30%">TITLE</th>
                            <th>CLASSIFICATION</th>
                            <th>Unique<sup><a class="badge bg-dark" href="#" data-bs-placement="top" data-bs-toggle="tooltip" data-bs-title="We clustered structures with similar sequence. Unique sequences are described as 'unique' or 'leader'.">?</a></sup></th>
                            <th class="dt-center" >Download</th>
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

<?php $entrada = 'data/propedia26_v6.tsv'; ?>

<script>
    // $(() => {

    //     const lerDados = (arquivo) => {
    //         // ler arquivo usando jQuery
    //         $.ajax({
    //             url: arquivo,
    //             success: (dados) => {
    //                 dados_formatados = formatarTabela(dados)
    //                 plotar(dados_formatados)
    //                 loadPopover();
    //                 $('.dt-paging-button').on('click',()=>{
    //                     loadPopover();
    //                 });
    //             }
    //         });
    //     }

    //     // formatar tabela --> INÍCIO 
    //     const formatarTabela = (dados) => {
    //         let dados_tabelados = [];
    //         // separa as linhas
    //         let linhas = dados.split("\n")
    //         // para cada linha
    //         for (let linha of linhas) {
    //             // remove caracteres especiais 
    //             linha = linha.replace("\r", "")
    //             // separa as células
    //             if(linha!=""){
    //                 celulas = linha.split("\t")
    //             }
    //             let id = celulas[0];
    //             celulas[0] = `<strong><a href="<?=base_url()?>entry/${id}">${id}</a></strong>`;
    //             if(celulas[6] == 'yes'){ celulas[6] = `<label class='badge bg-primary'>${celulas[6]}</label>`; }
    //             if(celulas[6] == 'no'){ celulas[6] = `<a class="badge bg-danger" href="<?=base_url()?>entry/${celulas[7]}" data-bs-placement="top" data-bs-toggle="tooltip" data-bs-title="Similar to ${celulas[7]}" class="link-light">
    //                     ${celulas[6]}
    //                 </a>
    //             `; }

    //             celulas[7] = `<a class="text-center" href="<?=base_url()?>data/db/pdb/${id[0]}/${id}.pdb" data-bs-placement="top" data-bs-toggle="tooltip" data-bs-title="Click to download the file: ${id}.pdb"><strong><i class="bi bi-download"></i></strong></a>`

    //             // remove algumas colunas
    //             //[3, 5, 6].sort((a,b) => b - a).forEach(i => celulas.splice(i, 1));
    //             // salva células
    //             dados_tabelados.push(celulas)
    //         }
    //         return dados_tabelados
    //     }
    //     // formatar tabela --> FIM 

    //     // plotando a tabela
    //     const plotar = (dados) => {
    //         // ativar datatable
    //         const table = $("#table_explore").DataTable({
    //             "data": dados,
    //             // "order": [ [0, 'asc'] ] // ordena pela coluna 0
    //         })
    //         // $('#pep-pro').click(function() { table.columns(12).search("pep-pro", true, false).draw();});
    //     }
    //     lerDados("<?= base_url($entrada) ?>");
    // })

    
</script>

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
            pageLength: 25,
            deferRender: true,
            // outras opções que achar necessárias...
        });

        // aplica busca inicial se tiver query na URL
        if (initialSearch) {
            // define valor no input de busca (interface)
            const filterInput = $('#table_explore_filter input');
            if (filterInput.length) filterInput.val(initialSearch);

            // aplica a busca e redesenha
            table.search(initialSearch).draw();
        }

        // Função para ativar tooltips/popovers (com fallback)
        const activatePopovers = () => {
            if (typeof loadPopover === 'function') {
                try { loadPopover(); } catch (e) { console.warn('loadPopover falhou:', e); }
                return;
            }
            // fallback para tooltips do Bootstrap
            const ttTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            ttTriggerList.forEach(function (el) {
                if (el._tooltipInstance) {
                    try { el._tooltipInstance.dispose(); } catch(_) {}
                }
                const inst = bootstrap.Tooltip.getOrCreateInstance(el);
                el._tooltipInstance = inst;
            });
        };

        activatePopovers();

        // re-ativar após redraw / page
        $('#table_explore').off('draw.dt').on('draw.dt', function () {
            activatePopovers();
        });
        $('#table_explore').off('page.dt').on('page.dt', function () {
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
        $(()=>setTimeout(() => $('#loading').fadeOut(), 1000));
// tooltips
function loadPopover(){
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
};
loadPopover();
    
</script>
<?= $this->endSection() ?>
