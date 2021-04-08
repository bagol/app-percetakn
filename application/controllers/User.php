<?php

class User extends CI_Controller {
	// constructor function
	function __construct() {
		parent::__construct();
		$this->load->model("PelangganModel");
		$this->load->model("PelangganDetailModel");
	}

	// function for create user pelanggan
	function Register() {
		$data = [
			"kode_pelanggan" => "",
			"nama_pelanggan" => $this->input->post("nama_pelanggan", true),
			"email" => $this->input->post("email", true),
			"telepon" => '', //$this->input->post("telepon",true),
			"katasandi" => $this->input->post("katasandi", true),
			"alamat" => '', //$this->input->post("alamat",true)
		];
		if ($this->PelangganModel->store($data)) {
			$this->session->set_flashdata("scc", " Registerasi berhsil silahkan login");
			redirect("User/Registered");
		} else {
			$this->session->set_flashdata("err", "Registrasi Gagal terjadi kesalahan");
			redirect("User/Registered");
		}
	}

	function Registered() {
		$this->load->view("web/layout/header");
		$this->load->view("web/login/registered");
		$this->load->view("web/layout/footer");
	}

	function updateProfile() {
		if($this->input->post('provinsi') == 0) {
			$this->session->set_flashdata("err","Provinsi Tidak boleh kosong");
			return redirect($_SERVER['HTTP_REFERER']);
		}
		if($this->input->post('kota') == 0) {
			$this->input->set_flashdata("err","Kota Tidak boleh kosong");
			return redirect($_SERVER['HTTP_REFERER']);
		}
		
		$data = [
				"kode_detail" => "",
				"kode_pelanggan" => $this->input->post("kode_pelanggan"),
				"no_tlpn" => $this->input->post("no_tlpn"),
				"provinsi" => $this->input->post("provinsi"),
				"kota" => $this->input->post("kota"),
				"kecamatan" => $this->input->post("kecamatan"),
				"kelurahan" => $this->input->post("kelurahan"),
				"kode_post" => $this->input->post("kode_pos"),
				"alamat" => $this->input->post("alamat"),
				"kode_pelanggan" => $this->input->post("kode_pelanggan"),
			];
		if($_FILES['gambar']["name"] !== ""){
			$data["gambar"] = $this->uploadGambar();
		}

		if($this->PelangganDetailModel->store($data)){
			$this->session->set_flashdata("scc","Terimakasih telah Melengkapi Profle Sekarang anda lebih mudah dalam memesan produk kami")
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function uploadGambar()
    {
        $config['upload_path'] = './assets/images/pelanggan/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data("file_name");
        }
        
        return "default.png";
    }
}
