<?php defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("kategoriModel");
        $this->load->model("BahanModel");
        $this->load->model("KategoriModel");
    }

    public function index()
    {
        $data['title'] = 'dashboard';
        $this->load->view("admin/layout/header", $data);
        // $this->load->view("admin/dashboard/index");
        $this->load->view("admin/layout/footer");
    }

    public function kategori()
    {
        $data['title'] = 'Kategori';
        $data['title2'] = 'Produk';
        $data['daftarKategori'] = $this->kategoriModel->find()->result_array();
        $this->load->view("admin/layout/header", $data);
        $this->load->view("admin/produk/kategori", $data);
        $this->load->view("admin/produk/kategoriModal");
        $this->load->view("admin/layout/footer");
        $this->load->view("admin/produk/kategoriScript");
    }

    public function Produk()
    {
        $data['title'] = 'Kelola Produk';
        $data['title2'] = 'Produk';
        $data['daftarKategori'] = $this->KategoriModel->find()->result_array();
        $this->load->view("admin/layout/header", $data);
        $this->load->view("admin/produk/Produk");
        $this->load->view("admin/produk/ProdukModal", $data);
        $this->load->view("admin/layout/footer");
    }
}