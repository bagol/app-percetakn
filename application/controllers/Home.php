<?php defined('BASEPATH') or exit('No direct script access allowed');
class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    $data['script'] = $this->load->view('web/home/script', '', true);

    $this->load->view('web/layout/header');
    $this->load->view('web/home/index');
    $this->load->view('web/layout/footer', $data);
  }
}
