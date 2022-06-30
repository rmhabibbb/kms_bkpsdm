      
    <section class="content">
            <?= $this->session->flashdata('msg') ?>
        
          <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                           
                    <div class="card">
                        <div class="header">
                            <h2>
                                <CENTER>DATA PENGETAHUAN BKPSDM</CENTER> 
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <!-- Nav tabs -->
                            
                            <form action="<?=base_url('pegawai/index/')?>" method="post">
          
                                <input type="text" name="key" placeholder="Masukkan kata kunci pencarian .." class="form-control" value="<?php if(isset($key)){ echo $key; } ?>" style="text-align: center;">
                                 
                                  <input type="submit" name="cari" class="btn btn-block bg-blue" style=" margin-top: 5px" value="Cari">
                            
                          </form> 
                        <hr>


                            <div class="table-responsive">
                            <table class="table table-bordered  table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>    
                                        <th >No.</th>
                                        <th >Judul</th> 
                                        <th >Kategori</th> 
                                        <th >Jenis</th>  
                                        <th >Tanggal Buat</th> 
                                        <th >Pegawai</th> 
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
                    <td> <?= $this->Pegawai_m->get_row(['id_pegawai' => $row->id_pegawai])->nama_pegawai ?> </td> 
                    <td class="text-center">
                      <a href="<?=base_url('pegawai/pengetahuan/'.$row->id_pengetahuan)?>"  >
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
          
       
    </section>


 