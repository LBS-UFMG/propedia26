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
          Martins, P.M., Santos, L.H., Mariano, D. et al. <strong>Propedia: a database for protein–peptide identification based on a hybrid clustering algorithm</strong>. BMC Bioinformatics 22, 1 (2021). https://doi.org/10.1186/s12859-020-03881-z
        </p>
      </div>
      <div class="modal-footer">
        <img height="50" class="me-3" src="<?php echo base_url('/img/dcc_b.svg'); ?>">
        <img height="50" class="me-3" src="<?php echo base_url('/img/ufmg_b.svg'); ?>">

        <button type="button" class="btn btn-dark py-4 px-5" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal SOBRE -->

<!-- /.modal BLAST -->
<div class="modal fade" tabindex="-1" id="blast" role="dialog">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <form id="form_blast_run" action="<?php echo base_url('/blast'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <div>
            <h3><b><i class="bi bi-search me-2"></i> Search for similar protein or peptide sequences using BLAST</b></h3>
          </div>
          <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12 col-md-6">

              <p class="small text-muted"><strong>BLAST algorithm</strong> searches for similar protein or peptide sequences by identifying short local matches (words) between the query and database sequences <a class="badge bg-dark" href="#" data-bs-placement="top" data-bs-toggle="tooltip" data-bs-title="Then extending these matches in both directions to form high-scoring segment pairs (HSPs), and finally scoring and ranking the alignments based on a substitution matrix and statistical significance. Parameters used for peptides search: -word_size 2 -task blastp-short -seg no -evalue 100000">?</a>.</p>
              <h5><b>Input sequence</b></h5>
              <textarea id="txt_sequence" class="form-control" form="form_blast_run" name="sequence" rows="5" placeholder="Insert the sequence here (e.g.: TPYDINQML)"></textarea>
              <div hidden id="feedback_blast" class="alert alert-danger" role="alert">
                Sequence cannot be empty!
              </div>
              <br>
              <h5><b>Search for:</b></h5>

              <input type="radio" class="btn-check" name="search" value="peptides" id="blast_peptides" autocomplete="off" checked>
              <label class="btn btn-lg" for="blast_peptides">Peptides</label>

              <input type="radio" class="btn-check" name="search" value="receptors" id="blast_proteins" autocomplete="off">
              <label class="btn btn-lg" for="blast_proteins">Proteins</label>

              <input type="button" class="btn btn-primary w-100 btn-lg mt-5 mb-4" id="loading_blast" value="Run BLAST">

            </div>

            <div class="col text-center mt-5">
              <img class="w-75 img-thumbnail shadow p-3" src="<?= base_url('/img/blast.png') ?>">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light " data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- loading blast -->
<div id="loading-blast">
  <div class="text-center">
    <img src="<?= base_url('/img/cocadito-loading.png') ?>" width="200px"><br>
    <div class="spinner-border spinner-border-sm" role="status"></div>
    <strong class="ms-2">Loading...</strong>
  </div>
</div>

<script>
  // Intercepta o submit do formulário
  document.getElementById("loading_blast").addEventListener("click", e => {
    $('#loading-blast').css('visibility', 'visible').css('display', 'block');
    document.getElementById("form_blast_run").submit();
  });
</script>
<!-- /.modal BLAST -->

<!-- /.modal PROBIS -->
<div class="modal fade" tabindex="-1" id="probis" role="dialog">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <form id="form_probis_run" action="<?php echo base_url('/probis'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <div>
            <h3><b><i class="bi bi-search me-2"></i> Search for similar binding sites</b></h3>
          </div>
          <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form id="form_probis_run" action="<?php echo base_url(); ?>search/binding" method="post" enctype="multipart/form-data">

            <div class="row">
              <div class="col">
                <p class="small text-muted">
                  The search for similar binding sites in Propedia employs the <a class="link-dark" href="#" data-bs-placement="bottom" data-bs-toggle="tooltip" data-bs-title="ProBiS achieves this by aligning surface patches based on geometric and physicochemical properties, followed by statistical scoring of the alignments, thereby enabling the identification of proteins that share structurally conserved binding sites with the protein indicated here."><strong>ProBiS algorithm</strong></a>, which detects local structural similarities by comparing the three-dimensional surface of the queried protein binding site with those of proteins stored in the database.
                </p>
                <p class="small text-muted"><strong>Enter the PDB code, target protein chain, and binding site residue numbers separated by commas (use hyphens to indicate ranges) <a class="badge bg-dark" href="#" data-bs-placement="top" data-bs-toggle="tooltip" data-bs-title="E.g.: 100,101,105-110 (i.e.: 100,101,105,106,107,108,109,110)">?</a>.</strong></p>

                <p>
                  <label class="badge bg-secondary">PDB ID</label>
                  <input name="pdb" type="text" class="form-control" placeholder="e.g.: 1a1m" required>
                </p>
                <p>
                  <label class="badge bg-secondary">Chain</label>
                  <input name="chain" type="text" class="form-control" placeholder="e.g.: A" required>
                </p>
                <p>
                  <label class="badge bg-secondary">Binding site residues</label>
                  <textarea name="residues" class="form-control" placeholder="e.g.: 60,62-82,146-171" rows="3" required></textarea>
                </p>

                <input name="search_binding_sites" type="submit" value="Search for proteins with similar binding sites" class="btn w-100 btn-primary mb-5 mt-3 btn-lg">

              </div>
              <div class="col text-end">
                <img src="<?= base_url('/img/bindingsite.png') ?>" class="w-75 ">
              </div>
            </div>
            <div id="feedback_upload" class="alert" role="alert" hidden></div>
            <div id="fields" class="row" hidden>
              <div class="col-md-12">
                <h4><b>Protein chain select</b></h4>
                <select id="selected_chain" name="selected_chain" class="form-control" style="width: 100%"></select>
                <h4><b>Input residues id</b></h4>
                <p style="color:gray;font-size:12px;">Separated by comma (',')</p>
                <div class="row">
                  <div class="col-md-8">
                    <textarea id="residues_list" class="form-control" form="form_probis_run" name="residues_list" rows="3" placeho
                      lder=""></textarea>
                  </div>
                  <div class="col-md-4">
                    <label id="highlight_residues" class="btn btn-block btn-primary">Highlight residues surface
                      <br>
                      <i class="fa fa-eye"></i>
                    </label>
                  </div>
                </div>
                <h4><b>Search scope</b></h4>
                <label class="radio-inline">
                  <input type="radio" name="scope" value="ccd" checked>Only CCD <sup><a class="tip" href="#" data-placement="top" dat
                      a-toggle="tooltip" title="Search in <?= number_format(1) //$ccd_number)
                                                          ?> complex of Clustered Complex Dataset (faster).">?</a></sup>
                </label>
                <label class="radio-inline">
                  <input type="radio" name="scope" value="all">Whole database <sup><a class="tip" href="#" data-placement="top" data-
                      toggle="tooltip" title="Search in <?= number_format(1) //$complex_number)
                                                        ?> complex (slower).">?</a></sup>
                </label>
                <div hidden id="feedback_probis" class="alert alert-danger" role="alert">
                  PDB file and residue list cannot by empty!
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <input id="run_probis_btn" type="submit" class="btn btn-success" value="Run ProBiS NOW" style="display: none;">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- MODAL: CITE -->
<div class="modal fade" tabindex="-1" id="cite-propedia" role="dialog">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <div class="text-center">
          <!-- <img width="150" class="me-3" src="<?php echo base_url('/img/logo_propedia.svg'); ?>"> -->
          <h3 class="orange mb-0">Please, cite Propedia in your publication</h3>
        </div>
        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <p class="small text-muted">We ask that you cite both the original article and the most recent published article from the database.</p>
        <label class="badge bg-dark mt-3">Original paper (2021)</label>
        <p class="small" id="browse1"> Martins, P.M., Santos, L.H., Mariano, D. et al. <strong>Propedia: a database for protein–peptide identification based on a hybrid clustering algorithm.</strong> BMC Bioinformatics 22, 1 (2021). doi: <a href="https://doi.org/10.1186/s12859-020-03881-z" target="_blank">10.1186/s12859-020-03881-z</a>
        </p>

        <label class="badge bg-dark mt-3">Propedia v2.3 (2023)</label>
        <p class="small" id="browse2"> Martins P, Mariano D, Carvalho FC, Bastos LL, Moraes L, Paixão V and Cardoso de Melo-Minardi R (2023). <strong>Propedia v2.3: A novel representation approach for the peptide-protein interaction database using graph-based structural signatures</strong>. Front. Bioinform. 3:1103103. doi: <a href="https://doi.org/10.3389/fbinf.2023.1103103" target="_blank">10.3389/fbinf.2023.1103103</a>
        </p>

        <label class="badge bg-dark mt-3">Propedia 26 (2026)</label>
        <p class="small" id="browse3"><em>In development.</em>
        </p>
      </div>

      <div class="modal-footer">
        <img height="50" class="me-3" src="<?php echo base_url('/img/dcc_b.svg'); ?>">
        <img height="50" class="me-3" src="<?php echo base_url('/img/ufmg_b.svg'); ?>">

        <button type="button" class="btn btn-dark py-4 px-5" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal cite -->