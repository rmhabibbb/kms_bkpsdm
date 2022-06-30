
    
<section class="content">
    <div class="container-fluid">
            <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
                 
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
                <ol class="breadcrumb breadcrumb-bg-blue align-left">
                    <li><a href="<?=base_url()?>"><i class="material-icons">apps</i> Beranda</a></li>
                    <li> <a href="<?=base_url('pegawai/pengajuan')?>"><i class="material-icons">assignment_returned</i> Pengajuan Pengetahuan </a></li>
                    <li> <?=$pengetahuan->judul?></li> 
                </ol>

                <div class="card">
                      <div class="header"><center><h4><?=$pengetahuan->judul?></h4></center></div>
                        <div class="body">
                    <form id="identifier" action="<?=base_url('pegawai/pengajuan/')?>" method="POST" enctype="multipart/form-data"> 
                    <div class="row">
                      <input type="hidden" name="id" value="<?=$pengetahuan->id_pengetahuan?>">
                      <div class="col-lg-3"> 
                            <label class="form-control-label" >Jenis</label><br>
                            <?=$pengetahuan->jenis?> 
                        </div>  
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label class="form-control-label" >Kategori</label><br> 
                          <?=$this->Kategori_m->get_row(['id_kategori' => $pengetahuan->id_kategori])->nama_kategori?>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label class="form-control-label" >Tanggal Buat</label><br> 
                          <?=date('d-m-Y', strtotime($pengetahuan->tgl_pembuatan))?>
                        </div>
                      </div> 
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label class="form-control-label" >Status</label><br> 
                          <?php 
                      if ($pengetahuan->status == 0) {
                        echo "draft";
                      }
                      elseif ($pengetahuan->status == 1) {
                        echo "Menunggu Verifikasi";
                      }elseif ($pengetahuan->status == 2){
                        echo "Diterima";
                      }elseif ($pengetahuan->status == 3){
                        echo "Ditolak. " . $pengetahuan->keterangan;
                      }
                    ?>
                        </div>
                      </div>
                    <div class="col-lg-12"> 
                        <input type="hidden" name="id" value="<?=$pengetahuan->id_pengetahuan?>">
                        <input type="hidden" name="jeniskm" value="<?=$pengetahuan->jenis?>">
                       
                        
                          <label class="form-control-label" >Pengetahuan</label>  
                        <?php if ($pengetahuan->jenis == 'Tacit') { ?> 
                           <?=$pengetahuan->pengetahuan?>
                        </div>
                        <?php }else{ ?> 
                          <?php if ($pengetahuan->pengetahuan != NULL) { ?>
                             <embed src="<?=base_url('assets/'.$pengetahuan->pengetahuan)?>" type="application/pdf"   height="700px" width="100%">
                          <?php  } ?> 
                      
                        <?php } ?> 

                      </div> 


                      
                  </div>
                
                    
                  </form>
                        </div>
                    </div>

                 
            </div>
           
          </div>
        </div>
    </section>
  

  
<div class="modal fade" id="kirim" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-primar modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-success"> 
              
                  <div class="modal-body">
                    
                      <div class="py-3 text-center">
                          <i class="ni ni-bell-55 ni-3x text-white"></i>
                          <h4 class="heading mt-4 text-white"> Kirim Pengajuan pengetahuan sekarang ?</h4> 
                      </div>
                      
                  </div>
                  
                  <form action="<?= base_url('pegawai/pengajuan')?>" method="Post" >  
                  <div class="modal-footer">

                   
                      <input type="hidden" value="<?=$pengetahuan->id_pengetahuan?>" name="id">  
                      <input type="submit" class="btn bg-blue " name="kirim" value="Kirim">
                     
                      <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
                  </div>
                </form>
          </div>
  </div>
</div>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-primar modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger"> 
              
                  <div class="modal-body">
                    
                      <div class="py-3 text-center">
                          <i class="ni ni-bell-55 ni-3x text-white"></i>
                          <h4 class="heading mt-4 text-white"> Hapus Pengajuan pengetahuan ?</h4> 
                      </div>
                      
                  </div>
                  
                  <form action="<?= base_url('pegawai/pengajuan')?>" method="Post" >  
                  <div class="modal-footer">

                   
                      <input type="hidden" value="<?=$pengetahuan->id_pengetahuan?>" name="id">  
                      <input type="submit" class="btn bg-red" name="delete" value="Hapus">
                     
                      <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Batal</button>
                  </div>
                </form>
          </div>
  </div>
</div>