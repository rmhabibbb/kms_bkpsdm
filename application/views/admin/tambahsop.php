
    
<section class="content">
    <div class="container-fluid">
            <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
                 
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
                <ol class="breadcrumb breadcrumb-bg-blue align-left">
                    <li><a href="<?=base_url()?>"><i class="material-icons">apps</i> Beranda</a></li>
                    <li> <a href="<?=base_url('admin/sop')?>"><i class="material-icons">assignment_turned_in</i> SOP </a></li> 
                    <li>   Tambah SOP </li> 
                </ol>
                <div class="card">
                      <div class="header">
                          <center><h2>FORM TAMBAH SOP</h2></center>                          
                      </div>
                        <div class="body">
                          <form   action="<?=base_url('admin/tambahsop')?>" method="POST" enctype="multipart/form-data">  
                              <input type="text" name="judul" class="form-control" required placeholder="Judul SOP" style="margin-bottom: 4px">
                              <textarea name="editor1" id="editor1" rows="10" cols="80"></textarea>
                              <br>
                              <table class="table table-bordered table-striped table-hover" style="max-height: 300px">

                                <tbody>
                                 
                                   
                                     <tr>
                                         <th style="width: 10%">
                                             Versi
                                         </th>
                                         <td> 
                                            <input type="text" name="versi" required class="form-control">
                                         </td>
                                    
                                         <th style="width: 10%">
                                             File (.pdf)
                                         </th>
                                         <td>  
                                            <input  type="file" class="form-control" id="file" name="foto" > 
                                         </td>
                                     </tr>
 
                                </tbody>

                            </table>  
                              <br>

                            <input  type="submit" class="btn bg-blue btn-block btn-lg"  name="tambah" value="Simpan">  <br><br>
                          </form>
                          </div>
                    </div>
            </div>
           
          </div>
        </div>
    </section>
 
  