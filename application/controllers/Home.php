<?php defined('BASEPATH') or exit('No direct script access allowed');
class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("ProdukModel");
  }
  public function index()
  {
    $this->load->helper("rupiah");
    $data['daftarProduk'] = $this->ProdukModel->getProdukLimit(6)->result_array();
    
    $this->load->view('web/layout/header');
    $this->load->view('web/home/index',$data);
    $this->load->view('web/layout/footer');
    $this->load->view('web/home/script');
  }

  public function contact(){
    $this->load->view('web/layout/header');
    $this->load->view('web/contact/index');
    $this->load->view('web/layout/footer');
  }

  public function login(){
    $this->load->view('web/layout/header');
    $this->load->view('web/login/index');
    $this->load->view('web/layout/footer');
  }
}