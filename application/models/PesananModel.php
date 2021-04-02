<?php

class PesananModel extends CI_Model{
	 private $_table = "pesanan";

	// function untuk menyimpan pesanan pelanggan
    function store($data = []){
    	if(!$data) return false;
    	// kembalikan hasil queri insert sebagai nilai bulean true
    	return $this->db->insert($this->_table,$data);
    }

    // function untuk mengambil pesanan yang spesifik
    function find($kode_pesanan = ""){
    	if(!$kode_pesanan) return false;
    	// mengambil data spesifik sesuai nilai where yang ditentukan
    	
    	return $this->db->query("SELECT * FROM pesanan a join produk b on a.kode_produk=b.kode_produk join produk_bahan c on a.kode_bahan=c.kode_bahan and a.kode_pelanggan =".$kode_pesanan);
    }

    // function untuk mengambil keseluruhan desanan
    function findAll(){
    	// mengembalikan seluruh data dari table pesanan
    	return $this->db->get($this->_table);
    }

    // functiom untuk mengapus pesanan
    function delete($where=[]){
    	if(!$where) return false;
    	// menghapus pesanan sesui dengan nilai where yang ditentukan / kode pesanan
    	$this->db->where($where);
    	return $this->db->delete($this->_table);
    }

    // function untuk merubah  pesanan
    function update($data=[],$where=[]){
	// Jika nilai data tida kosong dan nilai where tidak koseng makan lakukan update    	
    	if($data != [] && $where != []) {
    		// mengembalikan nilai true jika update berhasil
    		$this->db->where($where);
    		return $this->db->update($this->_table,$data);
    	}

    	//jika salah satu dari dua parameter kosong kembalikan nilai false
    	return false;
    }
}