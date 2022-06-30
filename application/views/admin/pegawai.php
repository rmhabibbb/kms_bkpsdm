
    
<section class="content">
    <div class="container-fluid">
            <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
                 
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
                <ol class="breadcrumb breadcrumb-bg-blue align-left">
                    <li><a href="<?=base_url()?>"><i class="material-icons">apps</i> Beranda</a></li>
                    <li> <i class="material-icons">people</i> Pegawai</li> 
                </ol>
                <div class="card">
                      <div class="header">
                            <center><h2>DATA PEGAWAI</h2></center>                          
                        </div>
                        <div class="body">
                        <a data-toggle="modal" data-target="#tambah"  href=""><button class="btn bg-blue">Tambah Pegawai</button></a>
                        <br>

                            <div class="table-responsive">
                                 <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>   
                                            <th>No.</th>  
                                            <th>Nama Dokter</th> 
                                            <th>Jabatan</th> 
                                            <th>Jenis Kelamin</th> 
                                            <th>Email</th> 
                                            <th>Kontak</th> 
                                            <th>Alamat</th> 
                                            <th>Aksi</th>   
                                        </tr>
                                    </thead> 
                                    <tbody>
                                      <?php $i = 1; foreach ($list_pegawai as $row): ?> 
                                          <tr>   
                                              <td> <?=$i?></a></td>   
                                              <td> <?=$row->nama_pegawai?></td>  
                                              <td> <?=$row->jabatan?></td>  
                                              <td> <?=$row->jk?></td>  
                                              <td> <?=$row->email?></td>  
                                              <td> <?=$row->kontak?></td>  
                                              <td> <?=$row->alamat?></td>   
                                              <td style="width: 150px">
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
                            <h4 class="modal-title" id="defaultModalLabel"><center>FORM TAMBAH PEGAWAI</center></h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url('admin/pegawai')?>" method="Post"  >  
                        
                          <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">account_box</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="email" class="form-control" name="email" placeholder="Email" required autofocus  >
                                    </div>
                          </div> 
                           <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">account_box</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="password" class="form-control" name="password" placeholder="Password" required autofocus  >
                                    </div>
                          </div>
                          <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">account_box</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nama" placeholder="Nama Pegawai" required autofocus  >
                                    </div>
                          </div> 
                          <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">account_box</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="jabatan" placeholder="Jabatan Pegawai" required autofocus  >
                                    </div>
                          </div> 
                          <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">wc</i>
                                    </span>
                                    <div class="form-line">
                                          <input name="jk" type="radio" id="jk1"  value="Laki-Laki" /> 
                                          <label  for="jk1">Laki - Laki</label>
                                          <input name="jk" type="radio" id="jk2"   value="Perempuan" />
                                          <label  for="jk2">Perempuan</label>
                                    </div>
                          </div> 
                          <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">account_box</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="kontak" placeholder="Kontak Pegawai" required autofocus  >
                                    </div>
                          </div> 
                          <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">account_box</i>
                                    </span>
                                    <div class="form-line">
                                        <textarea class="form-control" name="alamat" required placeholder="Alamat Pegawai"></textarea>  
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


<?php $i = 1;$j = 1; foreach ($list_pegawai as $row): ?>  
<div class="modal fade" id="Edit-<?=$i?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>FORM EDIT PEGAWAI</center></h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url('admin/pegawai')?>" method="Post"  >  
                            <input type="hidden" class="form-control" name="id"  required autofocus value="<?=$row->id_pegawai?>"  >
                            <input type="hidden" class="form-control" name="emailx"  value="<?=$row->email?>" >
                             <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">account_box</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="email" placeholder="email" required autofocus  value="<?=$row->email?>" >
                                    </div>
                          </div>  

                          <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">account_box</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nama" placeholder="Nama Dokter" required autofocus value="<?=$row->nama_pegawai?>" >
                                    </div>
                          </div> 
                           <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">account_box</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="jabatan" placeholder="Jabatan Pegawai" required autofocus value="<?=$row->jabatan?>">
                                    </div>
                          </div> 
                          <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">wc</i>
                                    </span>
                                    <div class="form-line">
                                        <input name="jk" type="radio" id="ejk1-<?=$i?>" <?php if ($row->jk== "Laki-Laki") {echo "checked";}?>  value="Laki-Laki" /> 
                                        <label  for="ejk1-<?=$i?>">Laki - Laki</label>
                                        <input name="jk" type="radio" id="ejk2-<?=$i?>" <?php if ($row->jk== "Perempuan") {echo "checked";}?>  value="Perempuan" />
                                        <label  for="ejk2-<?=$i?>">Perempuan</label>       
                                    </div>
                          </div> 

                          <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">account_box</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="kontak" placeholder="Kontak Pegawai" required autofocus value="<?=$row->kontak?>" >
                                    </div>
                          </div> 
                          <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">account_box</i>
                                    </span>
                                    <div class="form-line">
                                        <textarea class="form-control" name="alamat" required placeholder="Alamat Pegawai"><?=$row->alamat?></textarea>  
                                    </div>
                          </div> 
                            
                          
                         <?php $i++?>
                          
                        <input  type="submit" class="btn bg-blue btn-block btn-lg"  name="edit" value="Simpan">  <br><br>
                   
                            <?php echo form_close()   ?>  


                            <center>
                                <a data-toggle="modal" data-target="#gks-<?=$j?>" href="">Ganti Kata Sandi ?</a>
                            </center>
                            <?php $j++ ?>
 
                        </div> 
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
</div> 
<?php endforeach; ?>

<?php $i = 1; foreach ($list_pegawai as $row): ?>  
<div class="modal fade" id="Hapus-<?=$i++?>" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header"> 
                          <h4 class="modal-title" id="defaultModalLabel"><center>Hapus data pegawai?</center></h4> 
                          <center><span style="color :red"><i>Semua data yang terkait dengan pegawai ini akan dihapus.</i></span></center>
                      </div>
                      <div class="modal-body"> 
                      <table class="table table-bordered table-striped table-hover" style="max-height: 300px">

                              <tbody> 
                                  <tr>
                                       <th style="width: 30%">
                                          ID Pegawai
                                       </th>
                                       <td> 
                                          <?=$row->id_pegawai?>
                                       </td>
                                   </tr>
                                   <tr>
                                       <th style="width: 30%">
                                          Nama Pegawai
                                       </th>
                                       <td> 
                                          <?=$row->nama_pegawai?>
                                       </td>
                                   </tr> 
                              </tbody>
                      </table>  
                       <div class="row">
                                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                      <form action="<?= base_url('admin/pegawai')?>" method="Post" >  
                                      <input type="hidden" value="<?=$row->email?>" name="email">
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

<?php $i = 1; foreach ($list_pegawai as $row): ?>  
<div class="modal fade" id="gks-<?=$i++?>" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header"> 
                          <h4 class="modal-title" id="defaultModalLabel"><center>Ganti kata sandi ?</center></h4> 
                         
                      </div>
                      <div class="modal-body"> 
                       <table class="table table-bordered table-striped table-hover" style="max-height: 300px">

                              <tbody>
         
                                   <tr>
                                       <th style="width: 30%">
                                          email
                                       </th>
                                       <td> 
                                          <?=$row->email?>
                                       </td>
                                   </tr> 
                              </tbody>
                      </table> 
                       <div class="row">
                                      <form action="<?= base_url('admin/pegawai')?>" method="Post" >  
                                      <input type="hidden" value="<?=$row->email?>" name="email">
                                      <input type="password" name="password" class="form-control" required="" placeholder="Masukkan Kata Sandi Baru ... ">
                                      <br>
                                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">


                                      <input  type="submit" class="btn bg-blue btn-block "  name="gks" value="Ganti">
                                       
                                  </div>
                                   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <button type="button"  class="btn bg-red btn-block" data-dismiss="modal">Batal</button>
                                  </div>
                          <?php echo form_close() ?> 
                              </div>
                      </div> 
                  </div>
              </div>
  </div>
<?php endforeach; ?>
