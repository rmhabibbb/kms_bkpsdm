<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
   
  class Admin extends MY_Controller
  {

    function __construct(){
      parent::__construct();
      
      $this->data['email'] = $this->session->userdata('email');
      $this->data['id_role']  = $this->session->userdata('id_role'); 
      if (!$this->data['email'] || ($this->data['id_role'] != 1))
      {
        $this->flashmsg('<i class="glyphicon glyphicon-remove"></i> Anda harus login terlebih dahulu', 'danger');
        redirect('login');
        exit;
      }  
      
      $this->load->model('login_m');    
      $this->load->model('DN_m');    
      $this->load->model('Kategori_m');        
      $this->load->model('Komentar_m');   
      $this->load->model('Notulensi_m');     
      $this->load->model('Pegawai_m');     
      $this->load->model('Pengetahuan_m');     
      $this->load->model('SOP_m');     
        
      date_default_timezone_set("Asia/Jakarta");   

 
    }

    public function index(){      
        $this->data['index'] = 1; 
        $this->data['content'] = 'admin/dashboard';
        $this->template($this->data,'admin');
       
    }


 public function pengetahuan()
{     
  if ($this->uri->segment(3)) {
    $id = $this->uri->segment(3); 

    $this->data['pengetahuan'] = $this->Pengetahuan_m->get_row(['id_pengetahuan' => $id ]);  
    $this->data['list_komentar'] = $this->Komentar_m->get(['id_pengetahuan' => $id ]);  
    $this->data['index'] = 2; 
    $this->data['content'] = 'admin/detail-knowledge-fix'; 
    $this->template($this->data,'admin');
  }
  else {

   
      if ($this->POST('cari')) {
         $this->data['pengetahuan'] = $this->Pengetahuan_m->getDataLike2($this->POST('key'),  ['status' => 2]);   
       
        

        $this->data['key'] = $this->POST('key');
        $this->data['kategori'] = $this->POST('kategori');
        $this->data['jenis'] = $this->POST('jenis');
      }else{
        $this->data['pengetahuan'] = $this->Pengetahuan_m->get_by_order('tgl_pembuatan','desc',['status' => 2]);

      }

    $this->data['list_kategori'] = $this->Kategori_m->get();

    $this->data['index'] = 2; 
    $this->data['content'] = 'admin/pengetahuan';
    $this->template($this->data,'admin');
  }
}


public function pengajuan(){   
    if ($this->uri->segment(3)) {
      $id = $this->uri->segment(3); 

      $this->data['pengetahuan'] = $this->Pengetahuan_m->get_row(['id_pengetahuan' => $id ]);  
      $this->data['index'] = 3;
      $this->data['content'] = 'admin/detail-knowledge'; 
      $this->template($this->data,'admin');
    }else {
      $this->data['pengetahuan'] = $this->Pengetahuan_m->get_by_order('tgl_pembuatan','desc',['status >' => 0]);
      $this->data['list_kategori'] = $this->Kategori_m->get();
      $this->data['index'] = 3;
      $this->data['content'] = 'admin/pengajuan';
      $this->template($this->data,'admin');
    }
}


public function verifikasi()
{     
    if ($this->POST('terima')) {
        $data = [  
          'status' => 2 
        ];
            
          
        $this->Pengetahuan_m->update($this->POST('id'),$data); 

        $this->flashmsg('PENGAJUAN PENGETAHUAN BERHASIL DITERIMA!', 'success');
        redirect('admin/pengajuan/'.$this->POST('id'));
        exit();    
    }elseif ($this->POST('tolak')) {
        $data = [  
          'status' =>  3,
          'keterangan' => $this->POST('keterangan')
        ];
            
          
        $this->Pengetahuan_m->update($this->POST('id'),$data); 

        $this->flashmsg('PENGAJUAN PENGETAHUAN BERHASIL DITOLAK!', 'success');
        redirect('admin/pengajuan/'.$this->POST('id'));
        exit();    
    }
    elseif ($this->uri->segment(3)) {
    $id = $this->uri->segment(3); 

    $this->data['pengetahuan'] = $this->Pengetahuan_m->get_row(['id_pengetahuan' => $id ]);  
    $this->data['index'] = 3;

     
      $this->data['content'] = 'admin/verifikasi-knowledge';
    
    $this->template($this->data,'admin');
  }
  else {
    redirect('admin/pengajuan');
    exit(); 
  }
}

// KELOLA SOP
    public function sop(){     

        if ($this->uri->segment(3)) {
          $this->data['sop'] = $this->SOP_m->get_row(['id_sop' => $this->uri->segment(3)]); 
          $this->data['index'] = 4;
     
          $this->data['content'] = 'admin/detailsop';
          $this->template($this->data,'admin');      
        }else{
          $this->data['sop'] = $this->SOP_m->get_by_order('tgl_pembuatan' , 'desc' ,[]); 
          $this->data['index'] = 4;
     
          $this->data['content'] = 'admin/sop';
          $this->template($this->data,'admin');      
        }
        
    }
    
    public function tambahsop(){     
        if ($this->POST('tambah')) { 
          if ($_FILES['foto']['name'] !== '') {  
              if ($_FILES['foto']['type'] != 'application/pdf') {
                $this->flashmsg('Format file harus .pdf ', 'warning');
                    redirect('admin/tambahsop/');
                    exit();  
              }
              $files = $_FILES['foto'];
              $_FILES['foto']['name'] = $files['name'];
              $_FILES['foto']['type'] = $files['type'];
              $_FILES['foto']['tmp_name'] = $files['tmp_name'];
              $_FILES['foto']['size'] = $files['size'];
              $id_file = rand(1,9);
              for ($j=1; $j <= 5 ; $j++) {
                $id_file .= rand(0,9);
              } 
              $file = 'sop/'.$_FILES['foto']['name']; 
              $this->upload( $_FILES['foto']['name'], 'sop/','foto');   
            }else{   
               
                $this->flashmsg('File harus diisi!', 'warning');
                redirect('admin/tambahsop/');
                exit();  
            }


          $data = [  
            'judul' =>  $this->POST('judul'),
            'deskripsi' => $this->POST('editor1'),
            'tgl_pembuatan' => date('Y-m-d H:i:s'),
            'versi' => $this->POST('versi'),
            'file' => $file,
            'email' => $this->data['email']
          ];
          
          $this->SOP_m->insert($data); 
          $id = $this->db->insert_id();
          $this->flashmsg('SOP BERHASIL DITAMBAH!', 'success');
          redirect('admin/sop/'.$id);
          exit();    
        } 
  
        $this->data['index'] = 4;
   
        $this->data['content'] = 'admin/tambahsop';
        $this->template($this->data,'admin');
       
    }
    
    public function editsop(){     
        if ($this->POST('edit')) { 
          if ($_FILES['foto']['name'] !== '') {  
              if ($_FILES['foto']['type'] != 'application/pdf') {
                $this->flashmsg('Format file harus .pdf ', 'warning');
                    redirect('admin/editsop/');
                    exit();  
              }
              $files = $_FILES['foto'];
              $_FILES['foto']['name'] = $files['name'];
              $_FILES['foto']['type'] = $files['type'];
              $_FILES['foto']['tmp_name'] = $files['tmp_name'];
              $_FILES['foto']['size'] = $files['size'];
               


              $file = 'sop/'.$_FILES['foto']['name']; 
              $this->upload( $_FILES['foto']['name'], 'sop/','foto');   


              $data = [  
                'judul' =>  $this->POST('judul'),
                'deskripsi' => $this->POST('editor1'),
                'tgl_pembuatan' => date('Y-m-d H:i:s'),
                'versi' => $this->POST('versi'),
                'file' => $file,
                'email' => $this->data['email']
              ];
            }else{   
                $data = [  
                  'judul' =>  $this->POST('judul'),
                  'deskripsi' => $this->POST('editor1'),
                  'tgl_pembuatan' => date('Y-m-d H:i:s'),
                  'versi' => $this->POST('versi'), 
                  'email' => $this->data['email']
                ];
            }
           
          
          $this->SOP_m->update($this->POST('id_sop'),$data); 

          $this->flashmsg('SOP BERHASIL DISIMPAN!', 'success');
          redirect('admin/editsop/'.$this->POST('id_sop'));
          exit();    
        } 
        $this->data['sop'] = $this->SOP_m->get_row(['id_sop' => $this->uri->segment(3)]); 
        $this->data['index'] = 4;
   
        $this->data['content'] = 'admin/editsop';
        $this->template($this->data,'admin');
       
    }

    public function hapussop(){     
        if ($this->POST('hapus')) {  
          $this->SOP_m->delete($this->POST('id_sop')); 

          $this->flashmsg('SOP BERHASIL DIHAPUS!', 'success');
          redirect('admin/sop/');
          exit();    
        }  
    }
 
// --- KELOLA SOP

// KELOLA KATEGORI 

    public function kategori(){
      if ($this->POST('tambah')) {   

        $data = [ 
          'nama_kategori' => $this->POST('nama') 
        ];
        
        $this->Kategori_m->insert($data);
  
        $this->flashmsg('KATEGORI BERHASIL DITAMBAH!', 'success');
        redirect('admin/kategori/');
        exit();    
      }  

      if ($this->POST('edit')) {  
        $data = [ 
          'nama_kategori' => $this->POST('nama') 
        ];
         
        $this->Kategori_m->update($this->POST('id'),$data);
 

        $this->flashmsg('DATA BERHASIL DIEDIT!', 'success');
        redirect('admin/kategori/');
        exit();    
      } 
 
      if ($this->POST('hapus')) {  
        $this->Kategori_m->delete($this->POST('id')); 
        $this->flashmsg('DATA KATEGORI BERHASIL DIHAPUS!', 'success');
        redirect('admin/kategori/');
        exit();    
      } 

      else {
        $this->data['list_kat'] = $this->Kategori_m->get();  
        $this->data['index'] = 5;
        $this->data['content'] = 'admin/kategori';
        $this->template($this->data,'admin');
      } 
    }
// --- KELOLA KATEGORI 
 

// KELOLA PEGAWAI 

    public function pegawai(){
      if ($this->POST('tambah')) {   

          if ($this->login_m->get_num_row(['email' => $this->POST('email')]) != 0) {
            $this->flashmsg('EMAIL TELAH DIGUNAKAN!', 'warning');
            redirect('admin/pegawai/');
            exit();    
          }


          $datauser = [ 
            'email' => $this->POST('email'),
            'password' => md5($this->POST('password')),  
            'role' => 2
          ];
          
          $this->login_m->insert($datauser);

          $data = [ 
            'email' => $this->POST('email'),
            'nama_pegawai' => $this->POST('nama'), 
            'jk' => $this->POST('jk'), 
            'jabatan' => $this->POST('jabatan'), 
            'kontak' => $this->POST('kontak'), 
            'alamat' => $this->POST('alamat') 
          ];
          
          $this->Pegawai_m->insert($data);
 

          $this->flashmsg('PEGAWAI BERHASIL DITAMBAH!', 'success');
          redirect('admin/pegawai/');
          exit();      
      }  

      if ($this->POST('edit')) {  
        
          if ($this->login_m->get_num_row(['email' => $this->POST('email')]) != 0) {
            if ($this->POST('email') != $this->POST('emailx')) {
                $this->flashmsg('email TELAH DIGUNAKAN!', 'warning');
                redirect('admin/dokter/');
                exit();   
             } 
          }


          $datas = [ 
            'email' => $this->POST('email')
          ];
          
          $this->login_m->update($this->POST('emailx'),$datas);

          $data = [  
            'nama_pegawai' => $this->POST('nama'), 
            'jk' => $this->POST('jk'), 
            'jabatan' => $this->POST('jabatan'), 
            'kontak' => $this->POST('kontak'), 
            'alamat' => $this->POST('alamat') 
          ];
          $this->Pegawai_m->update($this->POST('id'),$data);
 

        $this->flashmsg('DATA BERHASIL DIEDIT!', 'success');
        redirect('admin/pegawai/');
        exit();    
      } 
      
      if ($this->POST('gks')) {  
         
          $datas = [ 
            'password' => md5($this->POST('password'))
          ];
          
          $this->login_m->update($this->POST('email'),$datas);
 
 

        $this->flashmsg('KATA SANDI BERHASIL DIGANTI!', 'success');
        redirect('admin/pegawai/');
        exit();    
      } 

      if ($this->POST('hapus')) {  
        $this->login_m->delete($this->POST('email')); 
        $this->flashmsg('DATA PEGAWAI BERHASIL DIHAPUS!', 'success');
        redirect('admin/pegawai/');
        exit();    
      } 

      else {
        $this->data['list_pegawai'] = $this->Pegawai_m->get();   
        $this->data['index'] = 6;
        $this->data['content'] = 'admin/pegawai';
        $this->template($this->data,'admin');
      } 
    }
// --- KELOLA PEGAWAI 
 
 

public function profil(){
   
    $this->data['title']  = 'Profil';
    $this->data['index'] = 7;
    $this->data['content'] = 'admin/profil';
    $this->template($this->data,'admin');
 }


public function proses_edit_profil(){
  if ($this->POST('edit')) { 
      
      $this->login_m->update($this->POST('emailx'),['email' => $this->POST('email')]);    
      $user_session = [
        'email' => $this->POST('email'),  
      ];
      $this->session->set_userdata($user_session);

       
      $this->flashmsg('PROFIL BERHASIL DISIMPAN!', 'success');
      redirect('admin/profil');
      exit();

      } elseif ($this->POST('edit2')) { 
        $data = [ 
          'password' => md5($this->POST('pass1')) 
        ];
        
        $this->login_m->update($this->data['email'],$data);
    
        $this->flashmsg('KATA SANDI BARU TELAH TERSIMPAN!', 'success');
        redirect('admin/profil');
        exit();    
      }  

      else{

      redirect('admin/profil');
      exit();
      }

}

public function cekpasslama(){ echo $this->login_m->cekpasslama($this->data['email'],$this->input->post('pass')); } 
public function cekpass(){ echo $this->login_m->cek_password_length($this->input->post('pass1')); }
public function cekpass2(){ echo $this->login_m->cek_passwords($this->input->post('pass1'),$this->input->post('pass2')); }

}
?>
