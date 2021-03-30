<?php

class PelangganModel extends CI_Model
{
    protected $_table = "pelanggan";

    public function store($data = null)
    {
        if ($data == null)  return false;
        if ($data == []) return false;

        return $this->db->insert($this->_table, $data);
    }

    public function show($where = [])
    {
        if ($where == []) return false;
        return $this->db->get_where($this->_table, $where);
    }

    public function update($data=null,$where=null)
    {
        if($data==null) return false;
        if($where==null) return false;
        
        $this->db->where($where);
        return $this->db->update($this->_table,$data);          
    }

    public function delete($where = null){
        if($where) return false;

        $this->db->where($where);
        return $this->db->delete($this->_table);
    }
        
}
