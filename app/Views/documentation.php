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
        <th scope="col">pep-pro</th>
        <th scope="col">pep-pep</th>
        <th scope="col">pep-multipro</th>
        <th scope="col">Total</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">Unique entries</th>
        <td>48,050</td>
        <td>8,230</td>
        <td>18,030</td>
        <td>74,310</td>
      </tr>
      <tr>
        <th scope="row">Duplicated entries</th>
        <td>29,522</td>
        <td>27,171</td>
        <td>4,918</td>
        <td>61,611</td>
      </tr>
    </tbody>
    <tfoot class="table-light">
      <tr>
        <th scope="row">Total</th>
        <td>77,572</td>
        <td>35,401</td>
        <td>22,948</td>
        <td><strong>135,921</strong></td>
      </tr>
    </tfoot>
  </table>
</div>


<!-- / FIM Conteúdo personalizado -->
</div>
<?= $this->endSection() ?>