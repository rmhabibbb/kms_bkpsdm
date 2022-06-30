<?php

class SOP_m extends MY_Model{
	public function __construct(){
		parent::__construct();
		$this->data['table_name'] 	= 'sop';
    	$this->data['primary_key']	= 'id_sop';
	}
	 
}