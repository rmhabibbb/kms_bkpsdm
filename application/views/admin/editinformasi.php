
    
<section class="content">
    <div class="container-fluid">
            <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
                 
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
                <ol class="breadcrumb breadcrumb-bg-green align-left">
                    <li><a href="<?=base_url()?>"><i class="material-icons">apps</i> Beranda</a></li>
                    <li> <a href="<?=base_url('admin/informasi')?>"><i class="material-icons">book</i> Kelola Informasi Agenda </a></li> 
                    <li>   Edit Informasi Agenda </li> 
                </ol>
                <div class="card">
                      <div class="header">
                            <center><h2>FORM EDIT INFORMASI AGENDA</h2></center>                          
                        </div>
                        <div class="body">
                         <?php echo form_open('admin/editinformasi') ?> 
                              <input type="hidden" name="id" value="<?=$informasi->id_informasi?>">
                              <input type="text" name="judul" class="form-control" required placeholder="Judul Informasi Agenda" style="margin-bottom: 4px" value="<?=$informasi->judul?>">
                              <textarea name="editor1" id="editor1" rows="10" cols="80"><?=$informasi->isi?></textarea>
                              
                              <br>

                            <input  type="submit" class="btn bg-green btn-block"  name="edit" value="Simpan">  
                          </form>

                          <hr>
                           <a data-toggle="modal" data-target="#delete"  href=""><button class="btn bg-red btn-block">Hapus</button></a>
                          </div>
                    </div>
            </div>
           
          </div>
        </div>
    </section>

    <div class="modal fade" id="delete" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>Hapus Informasi Agenda ini ?</center></h4> 
                            
                        </div>
                        <div class="modal-body"> 
                       
                         <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                        <form action="<?= base_url('admin/hapusinformasi')?>" method="Post" >  
                                        <input type="hidden" value="<?=$informasi->id_informasi?>" name="id"> 
                                        <input  type="submit" class="btn bg-red btn-block "  name="hapus" value="YA">
                                         
                                    </div>
                                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                          <button type="button"  class="btn bg-green btn-block" data-dismiss="modal">TIDAK</button>
                                    </div>
                            <?php echo form_close() ?> 
                                </div>
                        </div> 
                    </div>
                </div>
    </div>
 
  