<?php defined('BASEPATH') or exit('No direct script access allowed');
class ProdukModel extends CI_Model
{
  protected $_table = "produk";

  public function new($data)
  {
    return $this->db->insert($this->_table, $data);
  }

  // mencari produk
  public function find($where = null)
  {
    if ($where == null) {
      return $this->db->get($this->_table);
    } else {
      return $this->db->get_where($this->_table, $where);
    }
  }

  // merubah data produk
  public function edit($where, $data)
  {
    $this->db->where($where);
    $this->db->update($this->_table, $data);
  }

  // menghapus Produk
  public function delete($where)
  {
    $this->db->where($where);
    return $this->db->delete($this->_table);
  }

  // mengambil produk dan jenis bahan

  function getProdukBahan($id = null)
  {
    if ($id != null) {
      $this->db->select('*');
      $this->db->from('produk');
      $this->db->join('produk_bahan', 'produk.kode_produk = produk_bahan.kode_produk and produk.kode_produk =' . $id);
      return $this->db->get();
    } else {
      $this->db->select('*');
      $this->db->from('produk');
      $this->db->join('produk_bahan', 'produk.kode_produk = produk_bahan.kode_produk');
      return $this->db->get();
    }
  }
}
