<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
   
  class Pegawai extends MY_Controller
  {

    function __construct(){
      parent::__construct();
      
      $this->data['email'] = $this->session->userdata('email');
      $this->data['id_role']  = $this->session->userdata('id_role'); 
      if (!$this->data['email'] || ($this->data['id_role'] != 2))
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

      $this->data['profil'] = $this->Pegawai_m->get_row(['email' => $this->data['email']]);

 
    }

    public function index(){ 

    if ($this->POST('cari')) {
         $this->data['pengetahuan'] = $this->Pengetahuan_m->getDataLike2($this->POST('key'),  ['status' => 2]);   
       
        

        $this->data['key'] = $this->POST('key');
        $this->data['kategori'] = $this->POST('kategori');
        $this->data['jenis'] = $this->POST('jenis');
      }else{
      $this->data['pengetahuan'] = $this->Pengetahuan_m->get_by_order('tgl_pembuatan','desc',['status' => 2]);

      }     
        $this->data['index'] = 1; 
        $this->data['content'] = 'pegawai/dashboard';
        $this->template($this->data,'pegawai');
       
    }


 public function pengetahuan()
{     
  if ($this->uri->segment(3)) {
    $id = $this->uri->segment(3); 

    $this->data['pengetahuan'] = $this->Pengetahuan_m->get_row(['id_pengetahuan' => $id ]);  
    $this->data['list_komentar'] = $this->Komentar_m->get(['id_pengetahuan' => $id ]);  
    $this->data['index'] = 1; 
    $this->data['content'] = 'pegawai/detail-knowledge-fix'; 
    $this->template($this->data,'pegawai');
  }
  else {
    redirect('pegawai');
    exit();
  }
}

public function berikomentar(){
  $data = [
    'id_pengetahuan' => $this->POST('id'),
    'id_pegawai' => $this->data['profil']->id_pegawai,
    'komentar' => $this->POST('komentar'),
    'tgl' => date('Y-m-d H:i:s')
  ];

  if ($this->Komentar_m->insert($data)) {
    $this->flashmsg('Komentar berhasil dikirim', 'success');
      redirect('pegawai/pengetahuan/'.$this->POST('id'));
      exit(); 
  }else{
      $this->flashmsg('Gagal, Coba lagi!', 'warning');
      redirect('pegawai/pengetahuan/'.$this->POST('id'));
      exit();  
    }
}


 public function pengajuan()
{     

  if ($this->POST('add')) { 
     
    $data = [ 
      'judul' => $this->POST('judul'), 
      'id_kategori' => $this->POST('kategori'),
      'id_pegawai' => $this->data['profil']->id_pegawai,
      'tgl_pembuatan' => date('Y-m-d H:i:s'),
      'status' => 0,
      'jenis' => $this->POST('jeniskm')
    ];

    if ($this->Pengetahuan_m->insert($data)) {
      $id = $this->db->insert_id();
      $this->flashmsg('Draft Pengajuan berhasil dibuat', 'success');
      redirect('pegawai/pengajuan/'.$id );
      exit();  
    }else{
      $this->flashmsg('Gagal, Coba lagi!', 'warning');
      redirect('pegawai/pengajuan/');
      exit();  
    }
  } 
  elseif ($this->POST('simpan')) { 
    
    if ($this->POST('jeniskm') == 'Tacit') {

      $data = [ 
                'judul' => $this->POST('judul'),  
                'pengetahuan' => $this->POST('editor1')
              ];
    }else{
      if ($_FILES['foto']['name'] !== '') {  
          if ($_FILES['foto']['type'] != 'application/pdf') {
            $this->flashmsg('Format file harus .pdf ', 'warning');
                redirect('pegawai/pengajuan/'.$this->POST('id'));
                exit();  
          }
              $files = $_FILES['foto'];
              $_FILES['foto']['name'] = $files['name'];
              $_FILES['foto']['type'] = $files['type'];
              $_FILES['foto']['tmp_name'] = $files['tmp_name'];
              $_FILES['foto']['size'] = $files['size'];
               
              $km = 'explicit/'.$_FILES['foto']['name']; 
              $this->upload( $_FILES['foto']['name'], 'explicit/','foto');   
              $data = [ 
                'judul' => $this->POST('judul'),  
                'pengetahuan' => $km
              ];
            }else{   
              $data = [ 
                'judul' => $this->POST('judul') 
              ];
            }

    }
    

    if ($this->Pengetahuan_m->update($this->POST('id'),$data)) { 
      $this->flashmsg('Pengetahuan berhasil disimpan', 'success');
      redirect('pegawai/pengajuan/'.$this->POST('id') );
      exit();  
    }else{
      $this->flashmsg('Gagal, Coba lagi!', 'warning');
      redirect('pegawai/pengajuan/'.$this->POST('id'));
      exit();  
    }
  } 
  elseif ($this->POST('kirim')) { 
     
    if ($this->Pengetahuan_m->update($this->POST('id'),['status' => 1])) { 
      $this->flashmsg('Pengajuan pengetahuan berhasil dikirim', 'success');
      redirect('pegawai/pengajuan/'.$this->POST('id') );
      exit();  
    }else{
      $this->flashmsg('Gagal, Coba lagi!', 'warning');
      redirect('pegawai/pengajuan/'.$this->POST('id'));
      exit();  
    }
  } 
  elseif ($this->POST('delete')) {
    if ($this->Pengetahuan_m->delete($this->POST('id'))) {
      $this->flashmsg('pengetahuan berhasil dihapus.', 'success');
      redirect('pegawai/pengajuan/');
      exit();  
    }else{
      $this->flashmsg('Gagal, Coba lagi!', 'warning');
      redirect('pegawai/pengajuan/');
      exit();  
    }
  }elseif ($this->uri->segment(3)) {
    $id = $this->uri->segment(3); 

    $this->data['pengetahuan'] = $this->Pengetahuan_m->get_row(['id_pengetahuan' => $id ]);  
    $this->data['index'] = 2;

    if ($this->data['pengetahuan']->status == 0) {
      $this->data['content'] = 'pegawai/detail-knowledge-draft';
    }else{
      $this->data['content'] = 'pegawai/detail-knowledge';
    }
    $this->template($this->data,'pegawai');
  }
  else {
    $this->data['pengetahuan'] = $this->Pengetahuan_m->get_by_order('tgl_pembuatan','desc',['id_pegawai' => $this->data['profil']->id_pegawai]);
    $this->data['list_kategori'] = $this->Kategori_m->get();
    $this->data['index'] = 2;
    $this->data['content'] = 'pegawai/Pengajuan';
    $this->template($this->data,'pegawai');
  }
}


// KELOLA SOP
    public function sop(){     

        if ($this->uri->segment(3)) {
          $this->data['sop'] = $this->SOP_m->get_row(['id_sop' => $this->uri->segment(3)]); 
          $this->data['index'] = 4;
     
          $this->data['content'] = 'pegawai/detailsop';
          $this->template($this->data,'pegawai');      
        }else{
          $this->data['sop'] = $this->SOP_m->get_by_order('tgl_pembuatan' , 'desc' ,[]); 
          $this->data['index'] = 4;
     
          $this->data['content'] = 'pegawai/sop';
          $this->template($this->data,'pegawai');      
        }
        
    }
    
    public function tambahsop(){     
        if ($this->POST('tambah')) { 
          if ($_FILES['foto']['name'] !== '') {  
              if ($_FILES['foto']['type'] != 'application/pdf') {
                $this->flashmsg('Format file harus .pdf ', 'warning');
                    redirect('pegawai/tambahsop/');
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
                redirect('pegawai/tambahsop/');
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
          redirect('pegawai/sop/'.$id);
          exit();    
        } 
  
        $this->data['index'] = 4;
   
        $this->data['content'] = 'pegawai/tambahsop';
        $this->template($this->data,'pegawai');
       
    }
    
    public function editsop(){     
        if ($this->POST('edit')) { 
          if ($_FILES['foto']['name'] !== '') {  
              if ($_FILES['foto']['type'] != 'application/pdf') {
                $this->flashmsg('Format file harus .pdf ', 'warning');
                    redirect('pegawai/editsop/');
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
          redirect('pegawai/editsop/'.$this->POST('id_sop'));
          exit();    
        } 
        $this->data['sop'] = $this->SOP_m->get_row(['id_sop' => $this->uri->segment(3)]); 
        $this->data['index'] = 4;
   
        $this->data['content'] = 'pegawai/editsop';
        $this->template($this->data,'pegawai');
       
    }

    public function hapussop(){     
        if ($this->POST('hapus')) {  
          $this->SOP_m->delete($this->POST('id_sop')); 

          $this->flashmsg('SOP BERHASIL DIHAPUS!', 'success');
          redirect('pegawai/sop/');
          exit();    
        }  
    }
 
// --- KELOLA SOP
 

// KELOLA NOTULENSI
    public function notulensi(){     
        if ($this->POST('tambah')) {
           $data = [  
              'agenda_rapat' =>  $this->POST('agenda_rapat'), 
              'tempat' =>  $this->POST('tempat'), 
              'tanggal_rapat' =>  $this->POST('tanggal_rapat'), 
              'id_pegawai' =>   $this->data['profil']->id_pegawai,
              'status' => 0
            ];
            
            $this->Notulensi_m->insert($data); 
            $id = $this->db->insert_id();
            $this->flashmsg('DRAFT NOTULENSI BERHASIL DITAMBAH!', 'success');
            redirect('pegawai/editnotulensi/'.$id);
            exit();    
        }
        elseif ($this->POST('edit')) {
           $data = [  
              'agenda_rapat' =>  $this->POST('agenda_rapat'), 
              'tempat' =>  $this->POST('tempat'), 
              'tanggal_rapat' =>  $this->POST('tanggal_rapat') 
            ];
            
            $this->Notulensi_m->update($this->POST('id_notulensi'),$data); 
            $id = $this->db->insert_id();
            $this->flashmsg('DRAFT NOTULENSI BERHASIL DISIMPAN!', 'success');
            redirect('pegawai/editnotulensi/'.$this->POST('id_notulensi'));
            exit();    
        }
        elseif ($this->uri->segment(3)) {
           $this->data['notulensi'] = $this->Notulensi_m->get_row(['id_notulensi' => $this->uri->segment(3)]); 
            $this->data['index'] = 5;
            $this->data['list_pb'] = $this->DN_m->get(['id_notulensi' => $this->uri->segment(3)]); 
         
          $this->data['content'] = 'pegawai/detailnotulensi';
          $this->template($this->data,'pegawai');      
        }else{
          $this->data['notulensi'] = $this->Notulensi_m->get_by_order('tanggal_rapat' , 'desc' ,['id_pegawai' => $this->data['profil']->id_pegawai]); 
          $this->data['index'] = 5;
     
          $this->data['content'] = 'pegawai/notulensi';
          $this->template($this->data,'pegawai');      
        }
        
    }
    
 
    public function editnotulensi(){     
        if ($this->POST('tambah')) {
          $id = $this->POST('id_notulensi');
           $data = [  
              'pokok_pembahasan' =>  $this->POST('pokok_pembahasan'), 
              'catatan_diskusi' =>  $this->POST('catatan_diskusi'), 
              'keputusan_tindakan' =>  $this->POST('keputusan_tindakan'), 
              'id_notulensi' =>  $id 
            ];
            
            $this->DN_m->insert($data);  
            $this->flashmsg('POKOK PEMBAHASAN BERHASIL DITAMBAH!', 'success');
            redirect('pegawai/editnotulensi/'.$id);
            exit();    
        }
        $this->data['notulensi'] = $this->Notulensi_m->get_row(['id_notulensi' => $this->uri->segment(3)]); 
        $this->data['index'] = 5;
        $this->data['list_pb'] = $this->DN_m->get(['id_notulensi' => $this->uri->segment(3)]); 
       
        $this->data['content'] = 'pegawai/editnotulensi';
        $this->template($this->data,'pegawai');
       
    }

    public function hapusnotulensi(){     
        if ($this->POST('hapus')) {  
          $this->Notulensi_m->delete($this->POST('id_notulensi')); 

          $this->flashmsg('NOTULENSI BERHASIL DIHAPUS!', 'success');
          redirect('pegawai/notulensi/');
          exit();    
        }  
    }
 
// --- KELOLA SOP
 

public function profil(){
   
    $this->data['title']  = 'Profil';
    $this->data['index'] = 7;
    $this->data['content'] = 'pegawai/profil';
    $this->template($this->data,'pegawai');
 }


public function proses_edit_profil(){
  if ($this->POST('edit')) { 
      
      $this->login_m->update($this->POST('emailx'),['email' => $this->POST('email')]);    
      $user_session = [
        'email' => $this->POST('email'),  
      ];
      $this->session->set_userdata($user_session);

       
      $this->flashmsg('PROFIL BERHASIL DISIMPAN!', 'success');
      redirect('pegawai/profil');
      exit();

      } elseif ($this->POST('edit2')) { 
        $data = [ 
          'password' => md5($this->POST('pass1')) 
        ];
        
        $this->login_m->update($this->data['email'],$data);
    
        $this->flashmsg('KATA SANDI BARU TELAH TERSIMPAN!', 'success');
        redirect('pegawai/profil');
        exit();    
      }  

      else{

      redirect('pegawai/profil');
      exit();
      }

}

public function cekpasslama(){ echo $this->login_m->cekpasslama($this->data['email'],$this->input->post('pass')); } 
public function cekpass(){ echo $this->login_m->cek_password_length($this->input->post('pass1')); }
public function cekpass2(){ echo $this->login_m->cek_passwords($this->input->post('pass1'),$this->input->post('pass2')); }

}
?>
