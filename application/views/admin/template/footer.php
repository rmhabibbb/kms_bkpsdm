 
    <!-- Jquery Core Js -->
    <script src="<?=base_url('assets/plugins/jquery/jquery.min.js')?>"></script>
  
    <script src="<?=base_url('assets/js/materialize.min.js')?>"></script>
    
    <script src="<?=base_url('assets/plugins/bootstrap/js/bootstrap.js')?>"></script> 

    <script src="<?=base_url('assets/js/jquery.mask.js')?>"></script>
    
<script>
$(document).ready(function(){
   $("#editform2").change(function(){ 

        var pass = $("#passlama").val(); 
        var pass1 = $("#pass1_ks").val();  
        var pass2 = $("#pass2_ks").val(); 
        var cek1 = 1;
        var cek2 = 1;
        var cek3 = 1; 
        
        $.ajax({

                url:"<?php echo base_url(); ?>admin/cekpasslama",
                method:"post", 
                data:{pass},
                    success:function(data){ 
                     if (data != ""){ 
                      cek1 = 0 ;
                      $('#pesan4_ks').html(data); 
                    }else {
                      $('#pesan4_ks').html(data); 
                      cek1 = 1 ;
                    } 
                    if (cek1 == 0 || cek2== 0 || cek3 == 0) {
                     $(':input[type="submit"]').prop('disabled', true);
                  } else {
                     $(':input[type="submit"]').prop('disabled', false);
                  }
                }
             });


          $.ajax({

                url:"<?php echo base_url(); ?>admin/cekpass",
                method:"post", 
                data:{pass1:pass1},
                    success:function(data){ 
                     if (data != ""){ 
                      cek2 = 0 ;
                      $('#pesan2_ks').html(data); 
                    }else {
                      $('#pesan2_ks').html(data); 
                      cek2 = 1 ;
                    } 
                    if (cek1 == 0 || cek2== 0 || cek3 == 0) {
                     $(':input[type="submit"]').prop('disabled', true);
                  } else {
                     $(':input[type="submit"]').prop('disabled', false);
                  }
                }
             });
 
          $.ajax({

                url:"<?php echo base_url(); ?>admin/cekpass2",
                method:"post", 
                data:{pass1:pass1,pass2:pass2},
                    success:function(data){
                     if (data != ""){ 
                      cek3 = 0;
                      $('#pesan3_ks').html(data); 
                    }else {
                      $('#pesan3_ks').html(data); 
                      cek3 = 1 ;
                    } 
                    if (cek1 == 0 || cek2== 0 || cek3 == 0) {
                     $(':input[type="submit"]').prop('disabled', true);
                  } else {
                     $(':input[type="submit"]').prop('disabled', false);
                  }

                 }
             });

          

            


        }); 


 
});
</script>
 
    <!-- Slimscroll Plugin Js -->
    <script src="<?=base_url('assets/plugins/jquery-slimscroll/jquery.slimscroll.js')?>"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?=base_url('assets/plugins/node-waves/waves.js')?>"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?=base_url('assets/plugins/jquery-datatable/jquery.dataTables.js')?>"></script>
    <script src="<?=base_url('assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')?>"></script>
    <script src="<?=base_url('assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/jquery-datatable/extensions/export/jszip.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js')?>"></script>
    <script src="<?=base_url('assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js')?>"></script>

    <!-- Custom Js -->
    <script src="<?=base_url('assets/js/admin.js')?>"></script>
    <script src="<?=base_url('assets/js/pages/tables/jquery-datatable.js')?>"></script>
    <script src="<?=base_url('assets/js/pages/ui/tooltips-popovers.js')?>"></script> 
<script src="<?=base_url('assets/plugins/ckeditor/ckeditor.js')?>" rel="stylesheet"></script>
     <script>
          // Replace the <textarea id="editor1"> with a CKEditor 4
          // instance, using default configuration.
          CKEDITOR.replace( 'editor1' );
      </script>
    <!-- Demo Js -->
    <script src="<?=base_url('assets/js/demo.js')?>"></script>
 
</body>

</html>
