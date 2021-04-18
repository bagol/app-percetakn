<?php

class Auth extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model("PelangganModel");
		$this->load->model("AdminModel");
	}

	public function index() {
		$this->load->view("web/layout/header");
		$this->load->view("web/login/index");
		$this->load->view("web/layout/footer");
	}
	public function register() {
		echo json_encode($this->input->post());
	}

	public function login_pelanggan() {
		$email = $this->input->post("email");
		$password = $this->input->post("katasandi");
		$pelanggan = $this->PelangganModel->find(["email" => $email]);
		if ($pelanggan->num_rows() > 0) {
			$pelanggan = $pelanggan->result_array()[0];
			if (password_verify($password, $pelanggan['katasandi'])) {
				$dataSession = [
					"kode_pelanggan" => $pelanggan['kode_pelanggan'],
					"nama_pelanggan" => $pelanggan['nama_pelanggan'],
					"pelanggan_logged" => true,
				];

				$this->session->set_userdata($dataSession);
				redirect(base_url('web'));
			} else {
				$this->session->set_flashdata("err", "Katasandi Salah");
				redirect($_SERVER["HTTP_REFERER"]);
			}
		} else {
			$this->session->set_flashdata("err", "email belum terdaftar");
			redirect($_SERVER["HTTP_REFERER"]);
		}
	}

	function logout_pelanggan() {
		$this->session->unset_userdata("pelanggan_logged");
		$this->session->sess_destroy();
		redirect("web/login");
	}

	function loginAdmin(){
		$this->load->view("admin/login");
	}

	function cekLogin(){
		$where = ['surel' => $this->input->post("surel")];
		$admin = $this->AdminModel->find($where);
		if($admin->num_rows() > 0){
			$admin = $admin->result_array()[0];
			if(password_verify($this->input->post("password"), $admin['password'])){
				$data = [	
					"kode_admin" => $admin['kode_admin'],
					"logged" => true
				];
				$this->session->set_userdata($data);
				$this->session->set_flashdata("scc","selamat datang admin");
				redirect("Admin");
			}else{
				$this->session->set_flashdata("err","Logigin Gagal password salah");
				redirect("Auth/loginAdmin");
			}
		}else{
			$this->session->set_flashdata("err","Logigin Gagal email tidak ditemukan");
				redirect("Auth/loginAdmin");
		}

	}

	function logOutAdmin(){
		$this->session->unset_userdata("logged");
		$this->session->sess_destroy();
		redirect("Auth/loginAdmin");
	}
}
