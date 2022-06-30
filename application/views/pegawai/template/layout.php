<?php
$data =[ 
  'index' => $index
];
$this->load->view('pegawai/template/header',$data);
$this->load->view('pegawai/template/navbar');
$this->load->view('pegawai/template/sidebar',$data);
$this->load->view($content);
$this->load->view('pegawai/template/footer');
 ?>
