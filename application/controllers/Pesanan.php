<?php

class Pesanan extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model("PesananModel");
        $this->load->helper("rupiah");
	}
    function create()
    {
        $pesanan = $this->uploadGambarPesanan();
        if($pesanan == false){
            $this->session->set_flashdata("err","file gagal diupload");
            return redirect($_SERVER['HTTP_REFERER']);  
        } 

        $data = [
        	"kode_pesanan" => "",
        	"kode_produk" => $this->input->post("kode_produk"),
            "kode_bahan" => $this->input->post("bahan"),
        	"kode_pelanggan" => $this->session->userdata("kode_pelanggan"),
        	"status" => 'di pilih',
        	"tanggal" =>  date("Y-m-d"),
            "ukuran" => $this->input->post("ukuran"),
        	"kuantitas" => $this->input->post("kuantitas"),
            "berat" => $this->input->post("berat"),
            "file" =>  $pesanan,
        	"harga_total" => $this->input->post("total"),
        ];

        

    	if($this->PesananModel->store($data)){
    		$this->session->set_flashdata("scc","Produk berhasil dipesann silahkan lanjutkan tahap pembayaran agar pesanan anda segera diproses");
    		redirect("Web/cart");
    	}else{
    		$this->session->set_flashdata("err","Mohon maaf pesanan tidak dapat diproses");
    		redirect($_SERVER['HTTP_REFERER']);
    	}
    }


    // upload gambar Pesanan
    public function uploadGambarPesanan()
    {
        $config['upload_path'] = './assets/images/pesanan/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            return $this->upload->data("file_name");
        }
        
        return false;
    }

    function beli($kode_pesanan){
        $pengiriman = [
            "kota" => $this->input->post("kota"),
            "alamat" => "Kec ".$this->input->post("kecamatan").
                        " Kel ".$this->input->post("kelurahan").
                        " ".$this->input->post("alamat").
                        " ".$this->input->post("kode_pos"),
            "berat" => $this->input->post("berat"),
            "kurir" => $this->input->post("kurir").' ('.rupiah($this->input->post("pengiriman")).')',
            "no_telpon" => $this->input->post("no_tlpn"),
            "kode_pesanan" => $kode_pesanan
        ];
        $updatePesanan = [
            "harga_total" => $this->input->post("harga_total"),
            "status" => "di checkout"
        ];

        // load model pengiriman
        $this->load->model("PengirimanModel");

        if($this->PesananModel->update($updatePesanan,["kode_pesanan" => $kode_pesanan])){
            if($this->PengirimanModel->store($pengiriman)){
                redirect('web/cart');
            }else{
                echo "gagal terjadi kesalahan saat menyimpan data pengiriman";
            }
        }else{
            echo "terjadi kesalahan saat menyimpan perubahan pada table Pesanan";
        }
    }

    function uploadBukti($kodePesanan){
        if(!$_FILES['bukti']['name']){
            $this->session->flashdata("err","Bukti harus diupload");
            redirect($_SERVER['HTTP_REFERER']);
        }

        $data = [
            "kode_pelanggan" => $this->session->userdata("kode_pelanggan"),
            "kode_pesanan" => $kodePesanan,
            "atas_nama" => $this->input->post("nama"),
            "bukti" => $this->uploadFileBukti()
        ];

        $this->load->model("BuktiModel");
        if($this->BuktiModel->store($data)){
            $this->PesananModel->update(["status" => "di bayar"],["kode_pesanan" => $kodePesanan]);
            $this->session->set_flashdata("scc","bukti brhasil diupload silahkan tunggu verifikasi dari admin");
            redirect("web/cart");
        }else{
             $this->session->flashdata("err","terjadi kesalahan");
            redirect($_SERVER['HTTP_REFERER']);   
        }
    }

    function uploadFileBukti(){
        $config['upload_path'] = './assets/images/bukti/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('bukti')) {
            return $this->upload->data("file_name");
        }
        
        return false;
    }

    // memverivikasi Pesanan dari Pelanggan
    function verifikasiPesanan($kodePesanan){
        $where= ["kode_pesanan" => $kodePesanan];
        $data = ["status" => "di proses"];

        if($this->PesananModel->update($data,$where)){
            $this->session->set_flashdata("scc","Data Berhasil diverifikasi");
            redirect("Admin/daftarPesanan");
        }else{
            $this->session->set_flashdata("err","Terjadi kesalahan saat verifikasi data");
            redirect($_SERVER["HTTP_REFERER"]);

        }
    }

    // menolak Pesanan dari pelanggan
    function tolakPesanan($kodePesanan){}
}