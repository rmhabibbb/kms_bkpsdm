
    
<section class="content">
    <div class="container-fluid">
            <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
                 
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
                <ol class="breadcrumb breadcrumb-bg-blue align-left">
                    <li><a href="<?=base_url()?>"><i class="material-icons">apps</i> Beranda</a></li>
                    <li> <i class="material-icons">assignment_turned_in</i> Pengajuan Pengetahuan</li> 
                </ol>
                <div class="card">
                      <div class="header">
                            <center><h2>DATA PENGAJUAN</h2></center>                          
                        </div>
                        <div class="body">
                     <a href="#" data-toggle="modal" data-target="#exampleModal"  class="btn bg-blue">Buat Pengajuan Baru</a> 
                     <br>
                           <div class="table-responsive">
                            <table class="table table-bordered  table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>    
                                        <th >No.</th>
                                        <th >Judul</th> 
                                        <th >Kategori</th> 
                                        <th >Jenis</th>  
                                        <th >Tanggal Buat</th> 
                                        <th >Status Pengajuan</th> 
                                        <th scope="col">Action</th> 
                                    </tr>
                                </thead> 
                                <tbody>
                                                        
                                  <?php $i = 1; foreach ($pengetahuan as $row): ?> 
                                            <tr>    
                                            <td><?=$i++?></td>
                    <td style="white-space:normal" > <?=$row->judul?> </td> 
                    <td> <?=$this->Kategori_m->get_row(['id_kategori' => $row->id_kategori])->nama_kategori?> </td> 
                    <td> <?=$row->jenis?> </td>  
                    <td> <?= date('d-m-Y',strtotime($row->tgl_pembuatan)) ?> </td> 
                    <td> <?php 
                      if ($row->status == 0) {
                        echo "draft";
                      }
                      elseif ($row->status == 1) {
                        echo "Menunggu Verifikasi";
                      }elseif ($row->status == 2){
                        echo "Diterima";
                      }elseif ($row->status == 3){
                        echo "Ditolak. " . $row->keterangan;
                      }
                    ?> </td> 
                    <td class="text-center">
                      <a href="<?=base_url('pegawai/pengajuan/'.$row->id_pengetahuan)?>"  >
                        <button type="button" class="btn  bg-blue"> 
                          <span class="btn-inner--text">Lihat</span>
                        </button>
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
  


 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Pengajuan Pengetahuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <?= form_open_multipart('pegawai/pengajuan/') ?>
      <div class="modal-body">
          <table class="table table-bordered table-striped table-hover" style="max-height: 300px">

                                <tbody>
                                 
                                   
                                     <tr>
                                         <th style="width: 30%">
                                            Judul
                                         </th>
                                         <td> 
                                           <input type="text" class="form-control" name="judul"  required autofocus  >
                                         </td> 
                                     </tr>
                                     <tr>
                                         <th style="width: 30%">
                                             Kategori 
                                         </th>
                                         <td> 
                                            <select class="form-control" name="kategori" required>
                                              <option value="">Pilih Kategori</option>
                                              <?php foreach ($list_kategori as $row) { ?>
                                              <option value="<?=$row->id_kategori?>"><?=$row->nama_kategori?></option>
                                              <?php } ?>
                                            </select>
                                         </td> 
                                     </tr>
                                     <tr>
                                         <th style="width: 30%">
                                             Jenis
                                         </th>
                                         <td> 
                                           <div class="custom-control custom-radio mb-3">
                            <input required class="custom-control-input" name="jeniskm" value="Tacit" id="tacit" type="radio">
                            <label class="custom-control-label" for="tacit">Tacit</label>
                          </div>
                          <div class="custom-control custom-radio mb-3">
                            <input required class="custom-control-input" name="jeniskm" value="Explicit" id="Explicit"  type="radio">
                            <label class="custom-control-label" for="Explicit">Explicit</label>
                          </div>
                                         </td> 
                                     </tr> 
                                </tbody>

                            </table> 
            
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="add" value="Submit"> 
      </div>
      </form>
    </div>
  </div>
</div>
