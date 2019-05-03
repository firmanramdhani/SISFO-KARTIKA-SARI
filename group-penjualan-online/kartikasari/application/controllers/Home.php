<?php

class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mproduk');
  }

  public function index()
  {
    $data = $this->Mproduk->Getproduk();
    $this->load->view('header');
    $this->load->view('index',['data'=>$data]);
    $this->load->view('footer');
  }

}
