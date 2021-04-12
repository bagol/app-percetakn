<?php defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("kategoriModel");
        $this->load->model("BahanModel");
        $this->load->model("KategoriModel");
        $this->load->model("ProdukModel");
        $this->load->helper("rupiah");
        $this->load->helper("PDF");
        $this->load->helper("kota");
        if(!$this->session->userdata("logged")){
            redirect("Auth/loginAdmin");
        }
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
        $data['daftarProduk'] = $this->KategoriModel->getKategoriProduk()->result_array();
        $this->load->view("admin/layout/header", $data);
        $this->load->view("admin/produk/Produk",$data);
        $this->load->view("admin/produk/ProdukModal", $data);
        $this->load->view("admin/layout/footer");
        $this->load->view("admin/produk/produkScript", $data);
    }

    public function detailProduk($id = null)
    {
        if($id === null) return redirect($_SERVER['HTTP_REFERER']);
        $data['title'] = 'Detail Produk';
        $data['title2'] = 'Produk';
        $data['produk'] = $this->ProdukModel->getDetailProduk($id)->result_array();
        $data['bahan'] = $this->BahanModel->find(['kode_produk'=>$id])->result_array();
        $data['kategori'] = $this->KategoriModel->find()->result_array();
        $this->load->view("admin/layout/header", $data);
        $this->load->view("admin/produk/detailProduk", $data);
        $this->load->view("admin/layout/footer");
        $this->load->view("admin/produk/detailProdukModal", $data);
    }

    public function pesanan(){
        $data['title'] = 'Data Pesanan Masuk';
        $data['title2'] = 'Pesanan';
        // load model pesanan
        $this->load->model("PesananModel");
        $pesanan = $this->PesananModel->getPesananBukti()->result_array();
        $data['daftarPesanan'] = $pesanan;
        $this->load->view("admin/layout/header", $data);
        $this->load->view("admin/pesanan/pesanan_masuk",$data);
        $this->load->view("admin/layout/footer");;
    }

    public function detail_pesanan($kodePesanan){
        $data['title'] = 'Detail Pesanan';
        $data['title2'] = 'Pesanan';
        // load model pesanan
        $this->load->model("PesananModel");
        $detail_pesanan = $this->PesananModel->getDetailPesanan($kodePesanan);
        if($detail_pesanan->num_rows() < 1){
            $this->session->set_flashdata("err","data pesanan tidak ditemukan");
            redirect("admin");
        }
        $data['detailPesanan'] = $detail_pesanan->result_array()[0];
        $this->load->view("admin/layout/header",$data);
        $this->load->view("admin/pesanan/detail_pesanan",$data);
        $this->load->view("admin/layout/footer");
    }

    public function daftarPesanan(){
        $data['title'] = 'Daftar Pesanan';
        $data['title2'] = 'Pesanan';
        // load model pesanan
        $this->load->model("PesananModel");
        $daftarPesanan = $this->PesananModel->getDaftarPesanan()->result_array();
        $data['daftarPesanan'] = $daftarPesanan;
        $this->load->view("admin/layout/header",$data);
        $this->load->view("admin/pesanan/daftar_pesanan",$data);
        $this->load->view("admin/layout/footer");
        $this->load->view("admin/pesanan/daftarPesananskript");
    }
    
}