<?php

/**
 * 
 */
class AdminModel extends CI_Model
{
	
	function find($where){
		return $this->db->get_where("admin",$where);
	}
}