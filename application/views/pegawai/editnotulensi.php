
    
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
                 <ol class="breadcrumb breadcrumb-bg-blue align-left">
                    <li><a href="<?=base_url()?>"><i class="material-icons">apps</i> Beranda</a></li>
                    <li> <a href="<?=base_url('pegawai/notulensi')?>"><i class="material-icons">assignment</i> Notulensi </a></li> 
                    <li>   Edit Notulensi </li> 
                </ol>
            <?= $this->session->flashdata('msg') ?>
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
                
                <div class="card">
                      <div class="header">
                          <center><h2>FORM EDIT NOTULENSI</h2></center>                          
                      </div>
                        <div class="body">
                          <form   action="<?=base_url('pegawai/notulensi')?>" method="POST" enctype="multipart/form-data">  
                            <input type="hidden" name="id_notulensi" value="<?=$notulensi->id_notulensi?>">
                              
                              <table class="table table-bordered table-striped table-hover" style="max-height: 300px">

                                <tbody>
                                 
                                   
                                      <tr>
                                         <th style="width: 30%">
                                             Agenda Rapat
                                         </th>
                                         <td> 
                                           <input type="text" class="form-control" name="agenda_rapat"  required autofocus value="<?=$notulensi->agenda_rapat?>" >
                                         </td> 
                                     </tr>
                                     <tr>
                                         <th style="width: 30%">
                                             Tempat 
                                         </th>
                                         <td> 
                                           <input type="text" class="form-control" name="tempat"  required autofocus value="<?=$notulensi->tempat?>" >
                                         </td> 
                                     </tr>
                                     <tr>
                                         <th style="width: 30%">
                                             Tanggal Rapat
                                         </th>
                                         <td> 
                                           <input type="date" class="form-control" name="tanggal_rapat"  required autofocus value="<?=$notulensi->tanggal_rapat?>" >
                                         </td> 
                                     </tr> 
 
                                </tbody>

                            </table>  
                              <br>

                            <input  type="submit" class="btn bg-blue btn-block btn-lg"  name="edit" value="Simpan">  <br><br>
                          </form>
                          </div>
                    </div>
            </div>
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
                
                <div class="card">
                      <div class="header">
                          <center><h2>POKOK PEMBAHASAN</h2></center>                          
                      </div>
                        <div class="body">
                          
                            <a data-toggle="modal" data-target="#tambah"  href=""><button class="btn bg-blue">Tambah</button></a>
                        <br>

                            <div class="table-responsive">
                                 <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>   
                                            <th>NO</th> 
                                            <th>Pokok Pembahasan</th> 
                                            <th>Catatan Diskusi</th> 
                                            <th>Tindakan dan Keputusan</th> 
                                            <th>Aksi</th>  
                                        </tr>
                                    </thead> 
                                    <tbody>
                                      <?php $i = 1; foreach ($list_pb as $row): ?> 
                                          <tr>   
                                              <td><?=$i?></a></td>   
                                              <td> <?=$row->pokok_pembahasan?></td>  
                                              <td> <?=$row->catatan_diskusi?></td>  
                                              <td> <?=$row->keputusan_tindakan?></td>  
                                              <td>
                                                 <a data-toggle="modal" data-target="#Edit-<?=$i?>" href="" >
                                                    <button class="btn bg-blue">Edit</button>
                                                  </a>
                                                  <a data-toggle="modal" data-target="#Hapus-<?=$i++?>" href=""  >
                                                    <button class="btn bg-red">Hapus</button>
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
                            <h4 class="modal-title" id="defaultModalLabel"><center>FORM TAMBAH POKOK PEMBAHASAN</center></h4>
                        </div>
                        <div class="modal-body">
                         <form action="<?= base_url('pegawai/editnotulensi')?>" method="Post"  >  
                          <table class="table table-bordered table-striped table-hover" style="max-height: 300px">

                                <tbody>
                                 
                                   <input type="hidden" name="id_notulensi" value="<?=$notulensi->id_notulensi?>">
                                     <tr>
                                         <th style="width: 30%">
                                             Pokok Pembahasan
                                         </th>
                                         <td> 
                                           <textarea  class="form-control" name="pokok_pembahasan"  required autofocus  ></textarea>
                                         </td> 
                                     </tr>
                                     <tr>
                                         <th style="width: 30%">
                                             Catatan Diskusi 
                                         </th>
                                         <td>  
                                           <textarea  class="form-control" name="catatan_diskusi"  required autofocus  ></textarea>
                                         </td> 
                                     </tr>
                                     <tr>
                                         <th style="width: 30%">
                                             Keputusan dan Tindakan
                                         </th>
                                         <td> 
                                           
                                           <textarea  class="form-control" name="keputusan_tindakan"  required autofocus  ></textarea>
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
