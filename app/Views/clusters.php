<?= $this->extend('template') ?>
<?= $this->section('conteudo') ?>
<!-- Conteúdo personalizado -->

<div class="container-fluid">
    <h1><strong>Clusters</strong></h1>
    <p class="text-muted small">
        Propedia is a database geared toward machine learning applications. Therefore, it presents data grouped using different clustering methods.
    </p>

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-1" type="button" role="tab" aria-selected="true">Redundant sequences</button>

            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-2" type="button" role="tab" aria-selected="false">Classifications (PDB)</button>

            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-3" type="button" role="tab" aria-selected="false">Sequence (Propedia v1)</button>

            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-4" type="button" role="tab" aria-selected="false">Interface (Propedia v1)</button>

            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-5" type="button" role="tab" aria-selected="false">Binding site (Propedia v1)</button>

            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-6" type="button" role="tab" aria-selected="false">CSM-peptides</button>
        </div>
    </nav>

    <div class="tab-content small" id="nav-tabContent">
        <!-- REDUNDANT SEQUENCES -->
        <div class="tab-pane fade show active p-4" id="nav-1" role="tabpanel" tabindex="0">
            <table class="table table-hover table-striped table-condensed" id="redundant">
                <thead>
                    <th>Leader</th>
                    <th><em>n</em>
                    <th>Redundant sequences (+leader)</th>
                </thead>
                <tbody></tbody>
            </table>

            <a href="<?=base_url('/data/clusters/redundant.tsv')?>" class="btn btn-primary btn-lg mt-5 w-100">Download redundant sequences (tsv file: ~1MB)</a>
        </div>
        <!-- PDB CLASSES -->
        <div class="tab-pane fade p-4" id="nav-2" role="tabpanel" tabindex="0">
            <table class="table table-hover table-striped table-condensed w-100" id="pdb_classes">
                <thead>
                    <th>Class</th>
                    <th><em>n</em>
                    <th class="w-75">Structures</th>
                </thead>
                <tbody></tbody>
            </table>
            <a href="<?=base_url('/data/clusters/pdb_classes.tsv')?>" class="btn btn-primary btn-lg mt-5 w-100">Download PDB classes (tsv file: ~800KB)</a>
        </div>
        <!-- sequence -->
        <div class="tab-pane fade p-4" id="nav-3" role="tabpanel" tabindex="0">
            <table class="table table-hover table-striped table-condensed w-100" id="sequence">
                <thead>
                    <th>Cluster</th>
                    <th><em>n</em>
                    <th class="w-75">Structures</th>
                </thead>
                <tbody></tbody>
            </table>
            <a href="<?=base_url('/data/clusters/sequence.tsv')?>" class="btn btn-primary btn-lg mt-5 w-100">Download sequence clusters (tsv file: ~72KB)</a>
        </div>
        <!-- interface -->
        <div class="tab-pane fade p-4" id="nav-4" role="tabpanel" tabindex="0">
            <table class="table table-hover table-striped table-condensed w-100" id="interface">
                <thead>
                    <th>Cluster</th>
                    <th><em>n</em>
                    <th class="w-75">Structures</th>
                </thead>
                <tbody></tbody>
            </table>
            <a href="<?=base_url('/data/clusters/interface.tsv')?>" class="btn btn-primary btn-lg mt-5 w-100">Download interface clusters (tsv file: ~72KB)</a>
        </div>
        <!-- binding -->
        <div class="tab-pane fade p-4" id="nav-5" role="tabpanel" tabindex="0">
            <table class="table table-hover table-striped table-condensed w-100" id="binding">
                <thead>
                    <th>Cluster</th>
                    <th><em>n</em>
                    <th class="w-75">Structures</th>
                </thead>
                <tbody></tbody>
            </table>
            <a href="<?=base_url('/data/clusters/binding.tsv')?>" class="btn btn-primary btn-lg mt-5 w-100">Download binding clusters (tsv file: ~70KB)</a>
        </div>
        <!-- csm-peptide -->
        <div class="tab-pane fade p-4" id="nav-6" role="tabpanel" tabindex="0">...</div>
    </div>
</div><!-- / container fluid -->


<script>
    // REDUNDANT CLASSES
    const tabela_redundante = fetch('<?=base_url('/data/clusters/redundant.tsv')?>');
    tabela_redundante.then(d => d.text()).then((dados)=>{
        const linhas = dados.trim().split('\n').map(linha => linha.split('\t'));
        const table = $("#redundant").DataTable({
            data: linhas,
            paging: true,
            pageLength: 10,
            deferRender: true,
            processing: true,
            columnDefs: [
                {
                targets: 0, // primeira coluna
                render: function (data, type, row) {
                    return `<a href="<?=base_url('/entry')?>/${data}" target="_blank">${data}</a>`;
                }
                }
            ]
        });
    });

    // PDB CLASSES
    const tabela_pdb_classes = fetch('<?=base_url('/data/clusters/pdb_classes.tsv')?>');
    tabela_pdb_classes.then(d => d.text()).then((dados)=>{
        const linhas = dados.trim().split('\n').map(linha => linha.split('\t'));
        const table = $("#pdb_classes").DataTable({
            data: linhas,
            paging: true,
            pageLength: 10,
            deferRender: true,
            processing: true,
            columnDefs: [
                {
                targets: 0, // primeira coluna
                render: function (data, type, row) {
                    // return `<a href="<?=base_url('/entry')?>/${data}" target="_blank">${data}</a>`;
                    return '<strong>'+data+'</strong>';
                }
                }
            ]
        });
    });

    // sequences
    const tabela_sequence = fetch('<?=base_url('/data/clusters/sequence.tsv')?>');
    tabela_sequence.then(d => d.text()).then((dados)=>{
        const linhas = dados.trim().split('\n').map(linha => linha.split('\t'));
        const table = $("#sequence").DataTable({
            data: linhas,
            paging: true,
            pageLength: 10,
            deferRender: true,
            processing: true,
            order: [[1, 'desc']],
            columnDefs: [
                {
                targets: 0, // primeira coluna
                render: function (data, type, row) {
                    // return `<a href="<?=base_url('/entry')?>/${data}" target="_blank">${data}</a>`;
                    return '<strong>'+data+'</strong>';
                }
                }
            ]
        });
    });

    // interface
    const tabela_interface = fetch('<?=base_url('/data/clusters/interface.tsv')?>');
    tabela_interface.then(d => d.text()).then((dados)=>{
        const linhas = dados.trim().split('\n').map(linha => linha.split('\t'));
        const table = $("#interface").DataTable({
            data: linhas,
            paging: true,
            pageLength: 10,
            deferRender: true,
            processing: true,
            order: [[1, 'desc']],
            columnDefs: [
                {
                targets: 0, // primeira coluna
                render: function (data, type, row) {
                    // return `<a href="<?=base_url('/entry')?>/${data}" target="_blank">${data}</a>`;
                    return '<strong>'+data+'</strong>';
                }
                }
            ]
        });
    });

    // binding
    const tabela_binding = fetch('<?=base_url('/data/clusters/binding.tsv')?>');
    tabela_binding.then(d => d.text()).then((dados)=>{
        const linhas = dados.trim().split('\n').map(linha => linha.split('\t'));
        const table = $("#binding").DataTable({
            data: linhas,
            paging: true,
            pageLength: 10,
            deferRender: true,
            processing: true,
            order: [[1, 'desc']],
            columnDefs: [
                {
                targets: 0, // primeira coluna
                render: function (data, type, row) {
                    // return `<a href="<?=base_url('/entry')?>/${data}" target="_blank">${data}</a>`;
                    return '<strong>'+data+'</strong>';
                }
                }
            ]
        });
    });
    
</script>
<!-- / FIM Conteúdo personalizado -->
<?= $this->endSection() ?>