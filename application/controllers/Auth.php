<?php

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("PelangganModel");
    }

    public function create_pengguna(){
        echo json_encode($this->input->post());
    }
}
