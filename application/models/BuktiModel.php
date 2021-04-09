<?php

/**
 * 
 */
class BuktiModel extends CI_Model
{
	private $_table = "bukti_pembayaran";
	function store($data = null){
		if(!$data) return false;

		return $this->db->insert($this->_table,$data);
	}
}