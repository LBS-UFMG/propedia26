<?= $this->extend('template') ?>
<?= $this->section('conteudo') ?>
<!-- Conteúdo personalizado -->

<div class="container-fluid">
   <div class="row">
      <div class="col-md-6 col-sm-12">
         <div id="3Dmol_query" style="min-height: 350px; width: 100%; position: relative;">
            <h1 class="text-muted text-center" style="padding:100px 50px 0 50px; color:#ddd"></h1>
         </div>    
         <div id="3Dmol_subject" style="min-height: 350px; width: 100%; position: relative;">
            <h1 class="text-muted text-center" style="padding:0 50px; color:#ddd"></h1>
         </div>         
      </div>
      <div class="col-md-6 col-sm-12" style="overflow: auto; height: 1000px;">
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
                              <td><input type="checkbox"></td>
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

<?= $this->endSection() ?>