<?php

class Pesanan extends CI_Controller
{
    function test()
    {
        echo json_encode($this->input->post());
    }
}