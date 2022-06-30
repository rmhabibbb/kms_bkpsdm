<?php

class Kategori_m extends MY_Model{
	public function __construct(){
		parent::__construct();
		$this->data['table_name'] 	= 'kategori';
    	$this->data['primary_key']	= 'id_kategori';
	}
	 
}