<?php defined('BASEPATH') or exit('No direct script access allowed');
class Web extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("ProdukModel");
    $this->load->model("BahanModel");
    $this->load->helper("rupiah");
  }
  public function index()
  {
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

  public function contact()
  {
    $this->load->view('web/layout/header');
    $this->load->view('web/contact/index');
    $this->load->view('web/layout/footer');
  }

  public function login()
  {
    $this->load->view('web/layout/header');
    $this->load->view('web/login/index');
    $this->load->view('web/layout/footer');
  }

  public function produk_detail($id = null)
  {
    if ($id == null) return redirect($_SERVER['HTTP_REFERER']);
    $where = ['kode_produk' => $id];
    $produk = $this->ProdukModel->find($where);
    if ($produk->num_rows() < 1) return redirect($_SERVER['HTTP_REFERER']);
    $data['produk'] = $produk->result_array()[0];

    $data['bahan'] = $this->BahanModel->find($where)->result();
    $this->load->view('web/layout/header');
    $this->load->view('web/produk/index', $data);
    $this->load->view('web/layout/footer');
    $this->load->view('web/home/script');
  }
}