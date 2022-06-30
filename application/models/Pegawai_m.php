<?php

class Pegawai_m extends MY_Model{
	public function __construct(){
		parent::__construct();
		$this->data['table_name'] 	= 'pegawai';
    	$this->data['primary_key']	= 'id_pegawai';
	}
	 
}