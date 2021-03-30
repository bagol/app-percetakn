<?php

class User extends CI_Controller{
    // constructor function
    function __construct(){
        parent::__construct();
        $this->load->model("PelangganModel");
    }

    // function for create user pelanggan
    function create_pelanggan(){
        $data = [
            "kode_pelanggan"    => "",
            "nama_pelanggan"    => $this->input->post("nama_pelanggan",true),
            "email"             => $this->input->post("email",true),
            "telepon"           => $this->input->post("telepon",true),
            "katasandi"         => $this->input->post("katasandi",true),
            "alamat"            => $this->input->post("alamat",true)
        ];
        if($this->PelangganModel->store){
            $this->session->set_flashdata("scc"," Registerasi berhsil silahkan login");
            redirect($_SERVER["HTTP_REFERER"]);
        }else{
            $this->session->set_flashdata("err","Registrasi Gagal terjadi kesalahan");
            redirect($_SERVER["HTTP_REFERER"]);

    }

}
