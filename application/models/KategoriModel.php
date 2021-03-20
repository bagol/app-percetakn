<?php defined('BASEPATH') or exit('No direct script access allowed');
class KategoriModel extends CI_Model
{
  protected $_table = "kategori";

  public function new($data)
  {
    return $this->db->insert($this->_table, $data);
  }

  public function find($where = null)
  {
    if ($where == null) {
      return $this->db->get($this->_table);
    } else {
      return $this->db->get_where($this->_table, $where);
    }
  }

  public function edit($where, $data)
  {
    $this->db->where($where);
    return $this->db->update($this->_table, $data);
  }

  public function delete($where)
  {
    $this->db->where($where);
    return $this->db->delete($this->_table);
  }

  // mendapatkan detail kategori dan produk
  function getKategoriProduk($id = null)
  {
    if ($id != null) {
      $this->db->select('*');
      $this->db->from('kategori');
      $this->db->join('produk', 'kategori.kode_kategori = produk.kode_kategori and kategori.kode_kategori = ' . $id);
      return $this->db->get();
    } else {
      $this->db->select('*');
      $this->db->from('kategori');
      $this->db->join('produk', 'kategori.kode_kategori = produk.kode_kategori');
      return $this->db->get();
    }
  }
}
