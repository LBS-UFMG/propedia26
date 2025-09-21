<?= $this->extend('template') ?>
<?= $this->section('conteudo') ?>
<!-- Conteúdo personalizado -->

<div class="container-fluid">
   <div class="row">
      <div class="col-md-4 col-12">
         <h1 class="text-muted text-center mt-2">Query</h1>
         <div id="3Dmol_query" style="min-height: 550px; width: 100%; position: relative;">
            
         </div>    
      </div>
      <div class="col-md-4 col-12">
         <h1 class="text-muted text-center mt-2">Target</h1>
         <div id="3Dmol_subject" style="min-height: 550px; width: 100%; position: relative;">
         </div>         
      </div>
      <div class="col-md-4 col-12" style="overflow: auto; height: 1000px;">
         <div class="row">
            <div class="col-md-12">
               <div class="thumbnail" style="border-left: #001858ff 5px solid; color: #ccc; padding:20px">
                  <div class="caption">   
                     <div class="row"> 
                        <h3 class="text-dark">Project ID: <a href='<?=base_url()?>project/<?=$id?>'><strong><?=$id?></a></strong></h3>
                        <br>
                        <?php if ($status != 1) {?>
                           <p><strong>Status</strong></p>
                           <p style="width: 400px; display: inline-block; word-wrap:break-word;" class="text-muted"><?=$log?></p>
                        <?php } ?>                        
                        
                        <?php if ($status == 1) {?>
                           <p style="width: 600px; display: inline-block; word-wrap:break-word;" class="text-muted">
                              <strong>PDB: </strong><?=$pdb?><br>
                              <strong>Chain: </strong><?=$chain?>
                              <br>
                              <strong>Residues: </strong><span class="small"><?=$residues?></span>
                        </p>               
                           
                        <?php } ?>

                        <input id="project_id" value="<?=$id?>" hidden></input>
                        <input id="query_chain" value="<?=$chain?>" hidden></input>
                        <input id="query_residues_list" value="<?=$residues?>" hidden></input>
                        <input id="status" value="<?=$status?>" hidden></input>
                       
                     </div>
                  </div>
               </div>
            </div>
         </div>
            
         <?php if ($status == 1) {?>
            <!-- <div class="row">
               <div class="col-md-4 col-sm-12">
                  <a class="btn btn-success btn-block" href='<?=base_url() . "public/probis/projects/" . $id . "/result.csv";?>'>
                  Result CSV&nbsp;<i class="fas fa-download"></i>
                  </a>
               </div>
               <div class="col-md-4 col-sm-12">
                  <a id="btn_download_selected" class="btn btn-info btn-block" href="#" data-toggle="modal" data-target="#modal_download_
selected">
                     Download complex&nbsp;<i class="fas fa-download"></i>
                  </a>                  
               </div>            
               <div class="col-md-4 col-sm-12">
                  <a id="btn_advanced_search" class="btn btn-warning btn-block" href="#" data-toggle="modal">
                     Advanced search&nbsp;<i class="fas fa-filter"></i>
                  </a>
               </div>
            </div> -->
            <div class="row">
               <div class="col-md-12">
                  <table id="dt_probis" class="table table-striped table-bordered">
                     <thead>
                        <tr class="tableheader">
                           
                           <th class="dt-center"><i class="fa fa-eye"></i></th>

                           <th class="dt-center">Complex<sup><a class="tip" href="#"  data-placement="top" data-toggle="tooltip" title="P
DB - peptide chain - receptor chain">?</a></sup></th>

                           <!-- <th class="dt-center">Clusters</th> -->
                           
                           <th class="dt-center">Alignment Score<sup></sup></th>

                           <th class="dt-center">RMSD<sup></sup></th>                     

                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach($results as $r):?>
                           <?php if(count($r) == 5): ?>
                           <tr>
                              <!-- [0] COMPLEX NAME;
                               ALIGNMENT SCORE;
                               RMSD;
                               QUERY ALIGNED RESIDUES;
                               SUBJECT ALIGNED RESIDUES -->
                              <td><input type="radio" name="compare" value="<?=$r['COMPLEX NAME']?>"></td>
                              <td><?=$r['COMPLEX NAME']?></td>
                              <td><?=$r['ALIGNMENT SCORE']?></td>
                              <td><?=$r['RMSD']?></td>
                           </tr>
                           <?php endif; ?> 
                        <?php endforeach; ?> 
                     </tbody>
                  </table>
               </div>
            </div>
         <?php } ?>         
      </div>
   </div>
</div>

<script>

    $(() => {
        const pdb_data = "<?php echo base_url("/data/projects/{$id}/{$pdb}.pdb"); ?>";

        $.get(pdb_data, function(d) {
            const data = d;
            // Cria viewer
            glviewer = $3Dmol.createViewer("3Dmol_query", {
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