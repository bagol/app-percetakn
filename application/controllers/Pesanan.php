<?php

class Pesanan extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model("PesananModel");
	}
    function create()
    {

        echo json_encode($this->input->post());
        die();
        $data = [
            "bahan" => $this->input->post("bahan");
        	"kode_pesanan" => "",
        	"kode_produk" => $this->input->post("kode_produk"),
        	"kode_pelanggan" => $this->session->userdata("kode_pelanggan"),
        	"status" => 'Memesan',
        	"tanggal" =>  date("Y-m-d"),
        	"kuantitas" => $this->input->post("kuantitas"),
        	"harga_total" => $this->input->post("total"),
        ];
    	if($this->input->post("lebar") != "" && $this->input->post("tinggi") != ""){
    		$data['ukuran'] = (int) $this->input->post("lebar") * (int) $this->input->post("tinggi") ." meter";	
    	}else{
    		$data['ukuran'] = "1/lembar";
    	}
        

    	if($this->PesananModel->store($data)){
    		$this->session->set_flashdata("scc","Produk berhasil dipesann silahkan lanjutkan tahap pembayaran agar pesanan anda segera diproses");
    		redirect("Web/cart");
    	}else{
    		$this->session->set_flashdata("err","Mohon maaf pesanan tidak dapat diproses");
    		redirect($_SERVER['HTTP_REFERER']);
    	}
    }


}