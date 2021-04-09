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
    function find($kode_pelanggan = "",$status=null,$kodePesanan = null){
    	if(!$kode_pelanggan) return false;
    	// mengambil data spesifik sesuai nilai where yang ditentukan
    	if($kodePesanan == null){
        	return $this->db->query("SELECT a.*,a.berat as total_berat,b.nama_produk,b.kode_produk,b.deskripsi,c.* FROM pesanan a join produk b on a.kode_produk=b.kode_produk join produk_bahan c on a.kode_bahan=c.kode_bahan and a.kode_pelanggan =".$kode_pelanggan);
        }

        return $this->db->query("SELECT a.*,a.berat as total_berat,b.nama_produk,b.kode_produk,b.deskripsi,c.* FROM pesanan a join produk b on a.kode_produk=b.kode_produk join produk_bahan c on a.kode_bahan=c.kode_bahan and a.kode_pesanan =".$kodePesanan." and a.kode_pelanggan =".$kode_pelanggan." and a.status=".$status);

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

    function getPesananBukti(){
        return $this->ddb->query("SELECT * FROM pesanan a join bukti_pembayaran b on a.kode_pesanan=b.kode_pesanan and a.status = 'di bayar'");
    }
}