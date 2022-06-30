<?php

class Notulensi_m extends MY_Model{
	public function __construct(){
		parent::__construct();
		$this->data['table_name'] 	= 'notulensi';
    	$this->data['primary_key']	= 'id_notulensi';
	}
	 
}