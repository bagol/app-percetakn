<?php

class User extends CI_Controller {
	// constructor function
	function __construct() {
		parent::__construct();
		$this->load->model("PelangganModel");
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

}
