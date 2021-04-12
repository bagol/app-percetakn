<?php

class Auth extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model("PelangganModel");
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

	function generatePassword($pw) {
		echo password_hash($pw, PASSWORD_DEFAULT, ['const' => 8]);
	}
}
