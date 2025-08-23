<!-- modelo para criação de views: copie este arquivo e apague os comentários -->
<?= $this->extend('template') ?>

<?= $this->section('scripts') ?>
<!-- adicione links para scripts aqui -->
<?= $this->endSection() ?>

<?= $this->section('conteudo') ?>

<div class="container col-xxl-10 px-2 py-0">
  <div class="row flex-lg-row-reverse align-items-center g-5 py-4">
    <div class="col-10 col-sm-8 col-md-6">
      <img src="<?= base_url('/img/home.png') ?>" class="d-block mx-lg-auto img-fluid" width="450" loading="lazy">
    </div>
    <div class="col-md-6">
      <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">The Protein-Peptide interaction database</h1>

      <p class="lead">PROPEDIA is a database of peptide-protein complexes clusterized in three methodologies: based on peptide sequences; based on structure interface; and based on binding sites. PROPEDIA main goal is to give new insights into peptide design of biotechnological interests.</p>

      <div class="d-grid gap-2 d-md-flex justify-content-md-start mt-1">

        <a class="btn btn-primary btn-lg px-4 me-md-2 azul" href="#explore">Explore Propedia</button>
          <a href="http://bioinfo.dcc.ufmg.br/propedia" class="btn btn-outline-dark btn-lg px-4 me-md-2">Back to Propedia-legacy</a>
      </div>
    </div>
  </div>
</div>

<div class="bg-light my-5 py-5">
  <div id="info" class="container">
    <div class="row">
      <div class="col-xs-12 col-md-3">
        <div class="card p-2 tabs-home" style="border-left: #031430 5px solid; color: #ccc">
          <div class="caption">
            <div class="row">
              <div class="col-md-3 text-dark" style="font-size: 72px">
                <i class="bi bi-database-fill-add"></i>
              </div>
              <div class="col-md-9 text-end">
                <h3 class="mt-4">
                  <strong class="texto-azul">
                    <?= $h1 ?>
                  </strong>
                </h3>
                <p class="text-muted small"><strong>TOTAL ENTRIES*</strong></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-md-3">
        <div class="card p-2 tabs-home" style="border-left: #031430 5px solid; color: #ccc">
          <div class="caption">
            <div class="row">
              <div class="col-md-3 text-dark" style="font-size: 72px">
                <i class="bi bi-node-minus-fill"></i>
              </div>
              <div class="col-md-9 text-end">
                <h3 class="mt-4">
                  <strong class="texto-azul">
                    <?= $h2 ?>
                  </strong>
                </h3>
                <p class="text-muted small"><strong>PEP-PRO COMPLEXES</strong></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-md-3">
        <div class="card p-2 tabs-home" style="border-left: #031430 5px solid; color: #ccc">
          <div class="caption">
            <div class="row">
              <div class="col-md-3 text-dark" style="font-size: 72px">
                <i class="bi bi-pause"></i>
              </div>
              <div class="col-md-9 text-end">
                <h3 class="mt-4"><strong class="texto-azul">
                    <?= $h3 ?>
                  </strong>
                </h3>
                <p class="text-muted small"><strong>PEP-PEP COMPLEXES</strong></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-md-3">
        <div class="card p-2 tabs-home" style="border-left: #031430 5px solid; color: #ccc">
          <div class="caption">
            <div class="row">
              <div class="col-md-3 text-dark" style="font-size: 72px">
                
                <i class="bi bi-ui-radios-grid"></i>
              </div>
              <div class="col-md-9 text-end">
                <h3 class="mt-4">
                  <strong class="texto-azul">
                    <?= $h4 ?>
                  </strong>
                </h3>
                <p class="text-muted small"><strong>PEP-MULTIPRO COMPLEXES</strong></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <h5 class="text-muted small mt-1 text-end">* Counting duplicate sequences. <span class="ms-5">** Last updated on: <?= $update ?></span></h5>
  </div>
</div>

<div class="container mt-5" id="cite">
  <div class="row">
    <div class="col-xs-12 col-lg-12">
      <div class="alert alert-light shadow my-4" style="border-left: #031430 5px solid">
        <div class="caption">
          <div class="row">
            <div class="col-md-12 p-4">
              <h4 class="" style="color:#031430"><strong>How to cite:</strong></h4>
              <p class="small" id="browse"> Martins, P.M., Santos, L.H., Mariano, D. et al. <strong>Propedia: a database for protein–peptide identification based on a hybrid clustering algorithm.</strong> BMC Bioinformatics 22, 1 (2021). https://doi.org/10.1186/s12859-020-03881-z
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ************************ EXAMPLES ************************ -->

<div class="container mt-5 my-5 px-5 pb-5" id="examples">
  <h1 class="pt-5"><strong>Examples</strong></h1>
  <hr>
  <p class="text-muted">Click on one of the following Propedia-IDs to explore the corresponding entry:</p>

  <div class="row">
    <div class="col">
      <label class="badge bg-dark orange">pep-pro</label>
      <label class="badge bg-light text-dark">Protein-Peptide entry</label>
      <a href="<?= base_url('/pep-pro/1WRZ-B-A') ?>" class="badge bg-primary azul">1WRZ-B-A</a>
    </div>
  </div>

  <div class="row">
    <div class="col">
      <label class="badge bg-dark orange">pep-pep</label>
      <label class="badge bg-light text-dark">Peptide-Peptide entry</label>
      <a href="<?= base_url('/entry/1A1M') ?>" class="badge bg-primary azul">...</a>
    </div>
  </div>

  <div class="row">
    <div class="col">
      <label class="badge bg-dark orange">pep-multipro</label>
      <label class="badge bg-light text-dark">Multiprotein-Peptide entry</label>
      <a href="<?= base_url('/entry/4PMI') ?>" class="badge bg-primary azul">...</a>
    </div>
  </div>
</div>

<script>
  const go = document.getElementById('go');

  go.addEventListener('click', () => {
    let url = document.getElementById('pdb_go').value;
    url = url.toUpperCase();
    if (url) {
      if (url.length != 4) {
        window.location.href = '<?= base_url("/entry/404") ?>';
      }
      window.location.href = '<?= base_url() ?>entry/' + url;
    }
  });

  function redirectToURL2(event) {
    // Verificar se a tecla pressionada foi Enter (código 13)
    if (event.keyCode === 13) {
      event.preventDefault(); // Prevenir o envio do formulário
      let url = document.getElementById('pdb_go').value;
      url = url.toUpperCase();
      if (url) {
        if (url.length != 4) {
          window.location.href = '<?= base_url("/entry/404") ?>';
        }
        window.location.href = '<?= base_url() ?>entry/' + url;
      }
    }
  }
</script>

<?= $this->endSection() ?>