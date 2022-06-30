
    
<section class="content">
    <div class="container-fluid">
            <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
                 
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
                <ol class="breadcrumb breadcrumb-bg-blue align-left">
                    <li><a href="<?=base_url()?>"><i class="material-icons">apps</i> Beranda</a></li>
                    <li> <i class="material-icons">assignment_turned_in</i> SOP</li> 
                </ol>
                <div class="card">
                      <div class="header">
                            <center><h2>DATA SOP</h2></center>                          
                        </div>
                        <div class="body">
                          <a  href="<?=base_url('admin/tambahsop')?>"><button class="btn bg-blue">Tambah SOP</button></a>
                          <br>
                           <div class="table-responsive">
                            <table class="table table-bordered  table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>    
                                        <th>#</th>  
                                        <th>Judul</th>  
                                        <th>Tanggal Pembuatan</th> 
                                        <th>Versi</th> 
                                        <th>Aksi</th>   
                                    </tr>
                                </thead> 
                                <tbody>
                                                        
                                  <?php $i = 1; foreach ($sop as $row): ?> 
                                            <tr>    
                                       
                                                <td><?=$i++?></td>  
                                                 <td> 
                                                   <?=$row->judul?> 
                                                </td>  
                                                 <td> 
                                                   <?=date('d-m-Y',strtotime($row->tgl_pembuatan))?> 
                                                </td>  
                                                 <td> 
                                                   <?=$row->versi?> 
                                                </td>  

                                                <td>
                                                  <a href="<?=base_url('admin/sop/'.$row->id_sop)?>">
                                                    <button class="btn bg-blue" >Lihat Detail</button>
                                                  </a>

                                                  <a href="<?=base_url('admin/editsop/'.$row->id_sop)?>">
                                                    <button class="btn bg-cyan" >Edit</button>
                                                  </a>
                                                  <a data-toggle="modal" data-target="#Hapus-<?=$row->id_sop?>" href=""  > <button class="btn bg-red">Hapus</button>
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
 
  <?php $i = 1; foreach ($sop as $row): ?>  
<div class="modal fade" id="Hapus-<?=$row->id_sop?>" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header"> 
                          <h4 class="modal-title" id="defaultModalLabel"><center>Hapus data SOP?</center></h4> 
                          <center><span style="color :red"><i>Semua data yang terkait dengan SOP ini akan dihapus.</i></span></center>
                      </div>
                      <div class="modal-body"> 
                      <table class="table table-bordered table-striped table-hover" style="max-height: 300px">

                              <tbody> 
                                  <tr>
                                       <th style="width: 30%">
                                          ID SOP
                                       </th>
                                       <td> 
                                          <?=$row->id_sop?>
                                       </td>
                                   </tr>
                                   <tr>
                                       <th style="width: 30%">
                                          Judul
                                       </th>
                                       <td> 
                                          <?=$row->judul?>
                                       </td>
                                   </tr> 
                                   <tr>
                                       <th style="width: 30%">
                                          Versi
                                       </th>
                                       <td> 
                                          <?=$row->versi?>
                                       </td>
                                   </tr> 
                              </tbody>
                      </table>  
                       <div class="row">
                                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                      <form action="<?= base_url('admin/hapussop')?>" method="Post" >  
                                      <input type="hidden" value="<?=$row->id_sop?>" name="id_sop">
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
