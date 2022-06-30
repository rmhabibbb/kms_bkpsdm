
    
<section class="content">
    <div class="container-fluid">
            <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
                 
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
                <ol class="breadcrumb breadcrumb-bg-blue align-left">
                    <li><a href="<?=base_url()?>"><i class="material-icons">apps</i> Beranda</a></li>
                    <li><i class="material-icons">list</i> Kategori </li> 
                </ol>
                <div class="card">
                      <div class="header">
                            <center><h2>DATA KATEGORI</h2></center>                          
                        </div>
                        <div class="body">
                        <a data-toggle="modal" data-target="#tambah"  href=""><button class="btn bg-blue">Tambah Kategori</button></a>
                        <br>

                            <div class="table-responsive">
                                 <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>   
                                            <th>NO</th> 
                                            <th>Nama Kategori</th> 
                                            <th>Aksi</th>  
                                        </tr>
                                    </thead> 
                                    <tbody>
                                      <?php $i = 1; foreach ($list_kat as $row): ?> 
                                          <tr>   
                                              <td><?=$i?></a></td>   
                                              <td> <?=$row->nama_kategori?></td>  
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
                            <h4 class="modal-title" id="defaultModalLabel"><center>FORM TAMBAH KATEGORI</center></h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url('admin/kategori')?>" method="Post"  >  
                        
                          <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">assignment</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nama" placeholder="Nama Kategori" required autofocus  >
                                    </div>
                          </div>  

                        <input  type="submit" class="btn bg-blue btn-block btn-lg"  name="tambah" value="Tambah">  <br><br>
                  
                            <?php echo form_close() ?> 
                        </div> 
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
</div> 


<?php $i = 1; foreach ($list_kat as $row): ?>  
<div class="modal fade" id="Edit-<?=$i?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>FORM EDIT KATEGORI</center></h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url('admin/kategori')?>" method="Post"  >  
                            <input type="hidden" class="form-control" name="id"  required autofocus value="<?=$row->id_kategori?>"  >
                          <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">account_box</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nama" placeholder="Nama kategori" required autofocus value="<?=$row->nama_kategori?>"  >
                                    </div>
                          </div>  
                          
                          
                         <?php $i++?>
                          
                        <input  type="submit" class="btn bg-blue btn-block btn-lg"  name="edit" value="Simpan">  <br><br>
                   
                            <?php echo form_close()   ?>  
 
                        </div> 
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
</div> 
<?php endforeach; ?>

<?php $i = 1; foreach ($list_kat as $row): ?>  
<div class="modal fade" id="Hapus-<?=$i++?>" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header"> 
                          <h4 class="modal-title" id="defaultModalLabel"><center>Hapus data kategori?</center></h4> 
                          <center><span style="color :red"><i>Semua data yang terkait dengan kategori ini akan dihapus.</i></span></center>
                      </div>
                      <div class="modal-body"> 
                      <table class="table table-bordered table-striped table-hover" style="max-height: 300px">

                              <tbody> 
                                  <tr>
                                       <th style="width: 30%">
                                          ID Kategori
                                       </th>
                                       <td> 
                                          <?=$row->id_kategori?>
                                       </td>
                                   </tr>
                                   <tr>
                                       <th style="width: 30%">
                                          Nama Kategori
                                       </th>
                                       <td> 
                                          <?=$row->nama_kategori?>
                                       </td>
                                   </tr> 
                              </tbody>
                      </table>  
                       <div class="row">
                                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                      <form action="<?= base_url('admin/kategori')?>" method="Post" >  
                                      <input type="hidden" value="<?=$row->id_kategori?>" name="id">
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