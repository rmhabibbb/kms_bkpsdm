 
 <section class="content" >
    <div class="container-fluid"> 
        <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix"> 
               
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ol class="breadcrumb breadcrumb-bg-green align-left">
                        <li><a href="<?=base_url()?>"><i class="material-icons">apps</i>Beranda</a></li>
                        <li><i class="material-icons">person</i>Profil  </li> 
                         
                    </ol>
                    <div class="card">
                        
                        <div class="body"> 
                            <table class="table table-bordered table-striped table-hover" style="max-height: 300px">

                                <tbody>
                                 
                                   
                                     <tr>
                                         <th style="width: 30%">
                                             Email
                                         </th>
                                         <td> 
                                            <?=$email?>
                                         </td>
                                     </tr>
                                    <tr>
                                         <th style="width: 30%">
                                             Role
                                         </th>
                                         <td> 
                                            pegawai
                                         </td>
                                     </tr>
 
                                </tbody>

                            </table>   
                             <center> 
                             <a data-toggle="modal" data-target="#edit"  href=""><button class="btn bg-cyan">Edit Data</button></a>
                            
                             <a data-toggle="modal" data-target="#gantipass"  href=""><button class="btn bg-green">Ganti Kata Sandi</button></a>
                             </center>
                         </div>
                    </div>

                     
        </div>
    </div>
</section>




  
 <div class="modal fade" id="edit" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>FORM EDIT PROFIL</center></h4>
                        </div>
                        <div class="modal-body">
                            <?= form_open_multipart('pegawai/proses_edit_profil') ?>   
                            <input type="hidden" name="emailx"  value="<?=$email?>"  > 
                         
                         
                          <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">account_circle</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="email" class="form-control" name="email" placeholder="email " required  value="<?=$email?>"  >
                                    </div>
                          </div> 
                         
                                            
                 
                         

                         
                          
                        <input  type="submit" class="btn bg-green btn-block"  name="edit" value="Simpan">  <br><br>
                  
                            <?php echo form_close() ?> 
                        </div> 
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
    </div> 

  



  <div class="modal fade" id="gantipass" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content"> 
                    <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel"><center>Ganti Kanti Sandi</center></h4>
                        </div>
                        <div class="modal-body">

                         <div class="row">
                            <form action="<?= base_url('pegawai/proses_edit_profil')?>" method="Post" id="editform2"> 
                            
                           <div class="row">
                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                      <div class="input-group">
                                          <span class="input-group-addon">
                                              <i class="material-icons">lock</i>
                                          </span>
                                          <div class="form-line">
                                              <input type="password" class="form-control" name="passlama" id="passlama" placeholder="Kata Sandi Lama" required>  
                                          </div>
                                           <div class="help-info" id="pesan4_ks"> </div>
                                      </div>  
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                      <div class="input-group">
                                          <span class="input-group-addon">
                                              <i class="material-icons">lock</i>
                                          </span>
                                          <div class="form-line">
                                              <input type="password" class="form-control" name="pass1" id="pass1_ks" placeholder="Kata Sandi Baru" required>  
                                          </div>
                                           <div class="help-info" id="pesan2_ks"> </div>
                                      </div>  
                                    </div>
                                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                      <div class="input-group">
                                          <span class="input-group-addon">
                                              <i class="material-icons">lock_outline</i>
                                          </span>
                                          <div class="form-line">
                                              <input type="password" class="form-control" name="pass2"  id="pass2_ks"  placeholder="Konfirmasi Kata Sandi" required>  
                                          </div>

                                           <div class="help-info" id="pesan3_ks"> </div>
                                      </div>  
                                    </div>
                          </div>

                           
                           <input  type="submit" class="btn bg-green btn-block btn-lg"  name="edit2" value="Ganti Kata Sandi">  <br><br>
                  
                            <?php echo form_close() ?>  
                         </div>
                        </div> 
                    </div>
                </div>
    </div>  