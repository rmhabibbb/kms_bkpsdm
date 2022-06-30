
    
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
                                                  <a href="<?=base_url('pegawai/sop/'.$row->id_sop)?>">
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
  