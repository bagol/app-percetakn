<?php defined('BASEPATH') or exit('No direct script access allowed');
class Web extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("ProdukModel");
		$this->load->model("BahanModel");
		$this->load->model("PesananModel");
		$this->load->helper("rupiah");
		$this->load->helper("PDF");
	}
	public function index() {
		$data['daftarProduk'] = $this->ProdukModel->getProdukLimit(6)->result_array();
		$rekomen = $this->ProdukModel->getProdukLimit(6, 6);
		if ($rekomen->num_rows() > 0) {
			$data['rekomendasi'] = $rekomen->result_array();
		} else {
			$data['rekomendasi'] = 0;
		}

		$this->load->view('web/layout/header');
		$this->load->view('web/home/index', $data);
		$this->load->view('web/layout/footer');
		$this->load->view('web/home/script');
	}

	public function contact() {
		$this->load->view('web/layout/header');
		$this->load->view('web/contact/index');
		$this->load->view('web/layout/footer');
	}

	public function login() {
		$this->load->view('web/layout/header');
		$this->load->view('web/login/index');
		$this->load->view('web/layout/footer');
	}

	public function produk_detail($id = null) {
		if ($id == null) {
			return redirect($_SERVER['HTTP_REFERER']);
		}

		if (!$this->session->userdata("pelanggan_logged")) {
			$this->session->set_flashdata("err", "anda harus login terlebih dahulu");
			return redirect("web/login");
		}

		$where = ['kode_produk' => $id];
		$produk = $this->ProdukModel->find($where);
		if ($produk->num_rows() < 1) {
			return redirect($_SERVER['HTTP_REFERER']);
		}

		$data['produk'] = $produk->result_array()[0];

		$data['bahan'] = $this->BahanModel->find($where)->result();
		$this->load->view('web/layout/header');
		$this->load->view('web/produk/index', $data);
		$this->load->view('web/layout/footer');
		$this->load->view('web/home/script');
	}

	public function checkout($kodePesanan = null) {
		if (!$this->session->userdata("pelanggan_logged")) {
			$this->session->set_flashdata("err", "anda harus login terlebih dahulu");
			return redirect("web/login");
		}

		if(!$kodePesanan) redirect($_SERVER['HTTP_REFERER']);

		$pesanan = $this->PesananModel->find($this->session->userdata('kode_pelanggan'),"'di pilih'",$kodePesanan);
        if($pesanan->num_rows() > 0){
			$data['pesanan'] = $pesanan->result_array()[0];
			
		}else{
			$this->session->set_flashdata("err","anda tidak punya barnag untuk di checkout");
			redirect($_SERVER['HTTP_REFERER']);
		}

		$this->load->model("PelangganDetailModel");
		$userDetail = $this->PelangganDetailModel->find(["kode_pelanggan" => $this->session->userdata("kode_pelanggan")]);
		if(!$userDetail){
			$this->session->set_userdata("err","tidak ada data user yang diminta");
		}
		if($userDetail->num_rows() < 1){
			$data['user'] = [
				"no_tlpn" => "",
				"gambar" => "default.png",
				"provinsi" => 0,
				"kota" => 0,
				"kecamatan" => "",
				"kelurahan" => "",
				"kode_pos" => "",
				"alamat" => ""
			]; 
		}else{
			$data['user'] = $userDetail->result_array()[0];
		}
		

        $this->load->view("web/layout/header");
        $this->load->view("web/checkout/index",$data);
        $this->load->view("web/layout/footer");

  

	}

	public function cart() {
		if (!$this->session->userdata("pelanggan_logged")) {
			$this->session->set_flashdata("err", "anda harus login terlebih dahulu");
			return redirect("web/login");
		}
		$pesanan = $this->PesananModel->find($this->session->userdata('kode_pelanggan'));

		if($pesanan->num_rows() > 0){
			$data['pesanan'] = $pesanan->result_array();
			
		}else{
			$data['pesanan'] = null;
		}
		
		
 		$this->load->view("web/layout/header");
		$this->load->view("web/cart/index",$data);
		$this->load->view("web/layout/footer");

	}

	public function acount(){
		if (!$this->session->userdata("pelanggan_logged")) {
			$this->session->set_flashdata("err", "anda harus login terlebih dahulu");
			return redirect("web/login");
		}
		$this->load->model("PelangganDetailModel");
		$userDetail = $this->PelangganDetailModel->find(["kode_pelanggan" => $this->session->userdata("kode_pelanggan")]);
		if(!$userDetail){
			$this->session->set_userdata("err","tidak ada data user yang diminta");
		}
		if($userDetail->num_rows() < 1){
			$data['user'] = [
				"no_tlpn" => "",
				"gambar" => "default.png",
				"provinsi" => 0,
				"kota" => 0,
				"kecamatan" => "",
				"kelurahan" => "",
				"kode_pos" => "",
				"alamat" => ""
			]; 
		}else{
			$data['user'] = $userDetail->result_array()[0];
		}

		if($data['user']['gambar'] == ""){
			$data['user']['gambar'] = "default.png";
		}
		$this->load->view("web/layout/header");
		$this->load->view("web/acount/index",$data);
		$this->load->view("web/layout/footer");
	}

	function pembayaran($kodePesanan){
		$this->load->model("PengirimanModel");
		
		$pesanan = $this->PesananModel->find($this->session->userdata("kode_pelanggan"),"'di checkout'",$kodePesanan);

		if($pesanan->num_rows() < 1){
			$this->session->set_flashdata("err","terjadi kesalahan");
			redirect($_SERVER['HTTP_REFERER']);
		}

		$data['pesanan'] = $pesanan->result_array()[0];
		$pengiriman = $this->PengirimanModel->find(["kode_pesanan"=>$data['pesanan']['kode_pesanan']]);
		$data['pengiriman'] = $pengiriman->result_array()[0];

		$this->load->view("web/layout/header");
		$this->load->view("web/pembayaran/index",$data);
		$this->load->view("web/layout/footer");
	}

}