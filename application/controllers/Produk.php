<?php defined('BASEPATH') or exit('No direct script access allowed');
class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('KategoriModel');
        $this->load->model('ProdukModel');
    }

    public function index()
    {
        $this->load->view("test");
    }

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

    // utilitis
    // Mengambil data kategori dan produk
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

    // menambahkan produk
    public function add()
    {
        echo json_encode($this->input->post());
    }

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
}