<?php

class Pesanan extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model("PesananModel");
	}
    function create()
    {
        $pesanan = $this->uploadGambarPesanan();
        if($pesanan == false){
            $this->session->set_flashdata("err","file gagal diupload");
            return redirect($_SERVER['HTTP_REFERER']);  
        } 

        $data = [
        	"kode_pesanan" => "",
        	"kode_produk" => $this->input->post("kode_produk"),
            "kode_bahan" => $this->input->post("bahan"),
        	"kode_pelanggan" => $this->session->userdata("kode_pelanggan"),
        	"status" => 'memesan',
        	"tanggal" =>  date("Y-m-d"),
            "ukuran" => $this->input->post("ukuran"),
        	"kuantitas" => $this->input->post("kuantitas"),
            "berat" => $this->input->post("berat"),
            "file" =>  $pesanan,
        	"harga_total" => $this->input->post("total"),
        ];

        

    	if($this->PesananModel->store($data)){
    		$this->session->set_flashdata("scc","Produk berhasil dipesann silahkan lanjutkan tahap pembayaran agar pesanan anda segera diproses");
    		redirect("Web/cart");
    	}else{
    		$this->session->set_flashdata("err","Mohon maaf pesanan tidak dapat diproses");
    		redirect($_SERVER['HTTP_REFERER']);
    	}
    }


    // upload gambar Pesanan
    public function uploadGambarPesanan()
    {
        $config['upload_path'] = './assets/images/pesanan/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            return $this->upload->data("file_name");
        }
        
        return false;
    }

    function beli(){
        echo json_encode($this->input->post());
    }
}