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
}