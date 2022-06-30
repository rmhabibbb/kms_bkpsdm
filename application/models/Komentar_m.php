<?php

class Komentar_m extends MY_Model{
	public function __construct(){
		parent::__construct();
		$this->data['table_name'] 	= 'komentar_pengetahuan';
    	$this->data['primary_key']	= 'id';
	}
	 
}