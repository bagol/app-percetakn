<?php

class PelangganDetailModel extends CI_Model{
	private $_table = "detail_pelanggan";
	public function find($where = []){
		if(!$where) return false;
		return $this->db->get_Where($this->_table,$where);
	}

	public function store( $data = [] ){
		if(!$data) return false;
		return $this->db->insert($this->_table,$data);
	}

	public function update($where = [],$data = []){
		if(!$where) return false;
		if(!$data) return false;
		$this->db->where($where);
		return $this->db->update($this->_table,$data);
	}

	public function delete($where=[]){
		if(!$where) return false;
		$this->db->where($where);
		return $this->db->delete($this->_table);
	}
}