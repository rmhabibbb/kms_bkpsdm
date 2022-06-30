
    
<section class="content">
    <div class="container-fluid">
            <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
                 
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
                <ol class="breadcrumb breadcrumb-bg-blue align-left">
                    <li><a href="<?=base_url()?>"><i class="material-icons">apps</i> Beranda</a></li>
                    <li> <i class="material-icons">assignment</i> Notulensi</li> 
                </ol>
                <div class="card">
                      <div class="header">
                            <center><h2>DATA NOTULENSI</h2></center>                          
                        </div>
                        <div class="body">
                            <a data-toggle="modal" data-target="#tambah"  href=""><button class="btn bg-blue">Tambah Notulensi</button></a>
                          <br>
                           <div class="table-responsive">
                            <table class="table table-bordered  table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>    
                                        <th>#</th>  
                                        <th>Agenda Rapat</th>  
                                        <th>Tanggal Rapat</th> 
                                        <th>Tempat</th> 
                                        <th>Status</th> 
                                        <th>Aksi</th>   
                                    </tr>
                                </thead> 
                                <tbody>
                                                        
                                  <?php $i = 1; foreach ($notulensi as $row): ?> 
                                            <tr>    
                                       
                                                <td><?=$i++?></td>  
                                                 <td> 
                                                   <?=$row->agenda_rapat?> 
                                                </td>  
                                                 <td> 
                                                   <?=date('d-m-Y',strtotime($row->tanggal_rapat))?> 
                                                </td>  
                                                 <td> 
                                                   <?=$row->tempat?> 
                                                </td> 
                                                <td> 
                                                  <?php if ($row->status == 0) { 
                                                    echo "Draft";
                                                  }elseif ($row->status == 1) {
                                                    echo "Selesai";
                                                  } ?>
                                                </td>  

                                                <td> 
                                                  <?php if ($row->id_pegawai == $profil->id_pegawai) { ?>
                                                    <a href="<?=base_url('pegawai/editnotulensi/'.$row->id_notulensi)?>">
                                                     <button class="btn bg-cyan" >Edit</button>
                                                    </a>
                                                    <a data-toggle="modal" data-target="#Hapus-<?=$row->id_notulensi?>" href=""  > <button class="btn bg-red">Hapus</button>
                                                    </a> 
                                                    <?php   } ?>
                                                    <a href="<?=base_url('pegawai/notulensi/'.$row->id_notulensi)?>">
                                                      <button class="btn bg-blue" >Lihat Detail</button>
                                                    </a> 
                                                  
 
                                                </td>
                                            </tr>
                                  <?php endforeach; ?> 
 
                                </tbody>
                            </table>
                          </div>  
                        </div>
                    </div>
            </div>
           
          </div>
        </div>
    </section>
  
   <div class="modal fade" id="tambah" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>FORM TAMBAH NOTULENSI</center></h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url('pegawai/notulensi')?>" method="Post"  >  
                          <table class="table table-bordered table-striped table-hover" style="max-height: 300px">

                                <tbody>
                                 
                                   
                                     <tr>
                                         <th style="width: 30%">
                                             Agenda Rapat
                                         </th>
                                         <td> 
                                           <input type="text" class="form-control" name="agenda_rapat"  required autofocus  >
                                         </td> 
                                     </tr>
                                     <tr>
                                         <th style="width: 30%">
                                             Tempat 
                                         </th>
                                         <td> 
                                           <input type="text" class="form-control" name="tempat"  required autofocus  >
                                         </td> 
                                     </tr>
                                     <tr>
                                         <th style="width: 30%">
                                             Tanggal Rapat
                                         </th>
                                         <td> 
                                           <input type="date" class="form-control" name="tanggal_rapat"  required autofocus  >
                                         </td> 
                                     </tr> 
                                </tbody>

                            </table> 

                        <input  type="submit" class="btn bg-blue btn-block btn-lg"  name="tambah" value="Tambah">  <br><br>
                  
                            <?php echo form_close() ?> 
                        </div> 
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
</div> 


<?php $i = 1; foreach ($notulensi as $row): ?>  
<div class="modal fade" id="Hapus-<?=$i++?>" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header"> 
                          <h4 class="modal-title" id="defaultModalLabel"><center>Hapus data notulensi?</center></h4> 
                          <center><span style="color :red"><i>Semua data yang terkait dengan notulensi ini akan dihapus.</i></span></center>
                      </div>
                      <div class="modal-body"> 
                      <table class="table table-bordered table-striped table-hover" style="max-height: 300px">

                              <tbody> 
                                  <tr>
                                       <th style="width: 30%">
                                          ID Notulensi
                                       </th>
                                       <td> 
                                          <?=$row->id_notulensi?>
                                       </td>
                                   </tr>
                                   <tr>
                                       <th style="width: 30%">
                                          Agenda Rapat
                                       </th>
                                       <td> 
                                          <?=$row->agenda_rapat?>
                                       </td>
                                   </tr> 
                              </tbody>
                      </table>  
                       <div class="row">
                                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                      <form action="<?= base_url('pegawai/hapusnotulensi')?>" method="Post" >  
                                      <input type="hidden" value="<?=$row->id_notulensi?>" name="id_notulensi">
                                      <input  type="submit" class="btn bg-red btn-block "  name="hapus" value="YA">
                                       
                                  </div>
                                   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <button type="button"  class="btn bg-blue btn-block" data-dismiss="modal">TIDAK</button>
                                  </div>
                          <?php echo form_close() ?> 
                              </div>
                      </div> 
                  </div>
              </div>
  </div>
<?php endforeach; ?>