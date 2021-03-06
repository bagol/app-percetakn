<?php defined('BASEPATH') or exit('No direct script access allowed');
class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('KategoriModel');
        $this->load->model('ProdukModel');
        $this->load->model('BahanModel');
    }

    // Bagian Pengentrol Kategori

    public function deleteKategori($id)
    {
        if ($id !== null) {
            $where = ["kode_kategori" => $id];
            if ($this->KategoriModel->delete($where)) {
                $this->session->set_flashdata("scc", "data berhasil dihapus");
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->session->set_flashdata("err", "terjadi kesalahan");
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata("err", "Kode Kategori tidak boleh kosong");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function createKategori()
    {
        if ($this->input->post("kategori") !== "") {
            $data = [
                "kode_kategori" => "",
                "nama_kategori" => $this->input->post("kategori"),
            ];
            if ($this->KategoriModel->new($data)) {
                $this->session->set_flashdata("scc", "Data berhasil ditambahkan");
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->session->set_flashdata("err", "terjadi kesalahan saat menambahkan data");
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            // jika data yang dikirim kosong
            $this->session->set_flashdata("err", "Kategori tidak boleh kosong");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function editKategori($id)
    {
        if ($id === null) {
            $this->session->set_flashdata("err", "kode_kategori tidak boleh kosong");
            redirect($_SERVER['HTTP_REFERER']);
        }

        if ($this->input->post("kategori") === "") {
            $this->session->set_flashdata("err", "nama kategori tidak boleh kosong");
            redirect($_SERVER['HTTP_REFERER']);
        }
        $where = ["kode_kategori" => $id];
        $data = ["nama_kategori" => $this->input->post("kategori")];
        if ($this->KategoriModel->edit($where, $data)) {
            $this->session->set_flashdata("scc", "perubahan data berhasil disimpan");
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata("err", "terjadi kesalahan");
            redirect($_SERVER["HTTP_REFERER"]);
        }
    }

    public function getKategori()
    {

        $id = $this->uri->segment(3) !== null ? $this->uri->segment(3) : null;
        if ($id === null) {
            $datas = $this->KategoriModel->find()->result_array();
        } else {
            $datas = $this->KategoriModel->find(['kode_kategori' => $id])->result_array();
        }
        for ($i = 0; $i < count($datas); $i++) {
            $datas[$i]['produk'] = $this->ProdukModel->find(['kode_kategori' => $datas[$i]['kode_kategori']])->result_array();
        }
        if ($datas == []) {
            echo json_encode(["message" => "tidak ada data"]);
        } else {
            echo json_encode($datas);
        }
    }
    // Akhir Bagian Pengontrol Kkategori
    // Bagian Pengontrol Produk
    // menambahkan produk
    public function addProduk()
    {
        $gambar = $this->uploadGambarProduk();
        if($gambar){     
            $produk = [
                "kode_produk" => "",
                "nama_produk" => $this->input->post("nama_produk", true),
                "satuan" => $this->input->post("satuan", true),
                "kode_kategori" => $this->input->post("kategori", true),
                "gambar" => $gambar,
            ];
            $this->session->set_flashdata("scc", "data Produk berhasil ditambahkan");
        }else{
            $produk = [
                "kode_produk" => "",
                "nama_produk" => $this->input->post("nama_produk", true),
                "satuan" => $this->input->post("satuan", true),
                "kode_kategori" => $this->input->post("kategori", true),
                "gambar" => "default.png",
            ];
            $this->session->set_flashdata("scc", "format gambar tidak sesuai");
        }
        if($this->ProdukModel->new($produk)){
            redirect($_SERVER['HTTP_REFERER']);    
        }else{
            $this->session->set_flashdata("err", "terjadi kesalahan saat menambahkan produk");
            redirect($_SERVER['HTTP_REFERER']);
        }
        
    }

    function deleteProduk($id = null){
        if($id === null) return redirect($_SERVER['HTTP_REFERER']);

        $where = ['kode_produk' => $id];
        if($this->ProdukModel->delete($where)){
            $this->session->set_flashdata("scc","Produk Dihapus dari daftar");
        }else{
            $this->session->set_flashdata("err","Gagal Menghapus Produk ");
        }
        redirect(base_url("admin/Produk"));
    }

    function updateProduk($kode = null){
        
        if($kode === null) return redirect($_SERVER['HTTP_REFERER']);
        $produk = [
            "nama_produk" => $this->input->post("nama_produk"),
            "satuan"=> $this->input->post("satuan"),
            "kode_kategori"=> $this->input->post("kategori")
        ];
        if($_FILES["gambar_produk"]['name'] != ""){
            $produk["gambar"] = $this->uploadGambarProduk();
        }
        $where = ["kode_produk" => $kode];
        
        if($this->ProdukModel->edit($where,$produk)){
            $this->session->set_flashdata("scc","Produk Berhasil diperbaharui");
        }else{
            $this->session->set_flashdata("err","Gagal Memperbaharui Produk");
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }

    // Akhir Pengentrol Produk
    // Bagian Pengontorl Bahan Produk
    public function addBahan($kode_produk, $berat, $bahan, $harga)
    {
        $data = [
            "kode_bahan" => "",
            "kode_produk" => $kode_produk,
            "bahan" => $bahan,
            "berat" => $berat,
            "harga" => $harga,
        ];

        if (!$this->BahanModel->new($data)) {
            return false;
        }
        return true;

    }

    function createBahan($produk= null){
        if($produk === null){
            $this->session->set_flashdata("err","Produk Tidak ada");
            return redirect($_SERVER['HTTP_REFERER']);
        }
        $bahan = [
            "kode_bahan" => "",
            "kode_produk" =>$produk,
            "bahan" => $this->input->post("bahan"),
            "lebar" => $this->input->post("lebar"),
            "panjang" => $this->input->post("panjang"),
            "berat" => $this->input->post("berat"),
            "harga" => $this->input->post("harga")
        ];
        if ($this->BahanModel->new($bahan)) {
            $this->session->set_flashdata("scc","Bahan ditambahkan keproduk");
        }else{
            $this->session->set_flashdata("err","terjadi kesalahan Bahan Gagal ditambahkan keproduk");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function deleteBahan($id=null)
    {
        if($id===null) return redirect($_SERVER['HTTP_REFERER']);
        if($this->BahanModel->delete(["kode_bahan" => $id])){
            $this->session->set_flashdata("scc","Bahan dihapus dari produk");
        }else{
            $this->session->set_flashdata("err","Gagal Menghapus Bahan dari produk");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    // Akhir Bagian Pengontorl Bahan Produk
    // mendapatkan Jenis Bahan

    public function getProdukBahan()
    {
        $id = $this->uri->segment(3) !== null ? $this->uri->segment(3) : null;
        $result = [];
        $data = [];
        if ($id != null) {
            $data = $this->ProdukModel->getProdukBahan($id)->result_array();
        } else {
            $data = $this->ProdukModel->getProdukBahan()->result_array();
        }

        if ($data == []) {
            $result = [
                "mesagge" => "tidak ada data",
                "id" => $id,
            ];
        } else {
            $result = [
                "messages" => "Ok",
                "data" => $data,
                "id" => $id,
            ];
        }

        echo json_encode($result);
    }

    // upload gambar produk
    public function uploadGambarProduk()
    {
        $config['upload_path'] = './assets/images/produk/';
        $config['allowed_types'] = 'jpg|png';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar_produk')) {
            return $this->upload->data("file_name");
        }
        
        return  array('error' => $this->upload->display_errors());
        // return "default.png";
    }
}