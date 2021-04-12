<?php

class PengirimanModel extends CI_Model{
	private $_table = "pengiriman";
	function store($data=null){
		if(!$data) return false;

		return $this->db->insert($this->_table,$data);
	}

	function find($where = null){
		if($where){
			return $this->db->get_where($this->_table,$where);
		}

		return false;
	}
}