
    
<section class="content">
    <div class="container-fluid">
            <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
                 
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
                <ol class="breadcrumb breadcrumb-bg-blue align-left">
                    <li><a href="<?=base_url()?>"><i class="material-icons">apps</i> Beranda</a></li>
                    <li> <a href="<?=base_url('admin/sop')?>"><i class="material-icons">assignment_turned_in</i> SOP </a></li> 
                    <li>  <?=$sop->judul?> </li> 
                </ol>
                <div class="card">
                      <div class="header">
                          <center><h2>DETAIL SOP</h2></center>                          
                      </div>
                        <div class="body">
                           
                              <table class="table table-bordered table-striped table-hover" style="max-height: 300px">

                                <tbody>
                                 
                                    <tr>
                                      <th style="width: 20%">Judul</th>
                                      <td><?=$sop->judul?></td>
                                    </tr>
                                    <tr>
                                      <th>Deskripsi</th>
                                      <td><?=$sop->deskripsi?></td>
                                    </tr>
                                    <tr>
                                      <th>Versi</th>
                                      <td><?=$sop->versi?></td>
                                    </tr>
                                    <tr>
                                      <th>File</th>
                                      <td>
                                        
                                    <embed src="<?=base_url('assets/'.$sop->file)?>" type="application/pdf"   height="700px" width="100%"> 
                                      </td>
                                    </tr>
                                    
 
                                </tbody>

                            </table>  
                            
                          </div>
                    </div>
            </div>
           
          </div>
        </div>
    </section>
 
  