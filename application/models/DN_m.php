<?php

class DN_m extends MY_Model{
	public function __construct(){
		parent::__construct();
		$this->data['table_name'] 	= 'detail_notulensi';
    	$this->data['primary_key']	= 'id';
	}
	 
}