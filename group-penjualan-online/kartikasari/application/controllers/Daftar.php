<?php

class Daftar extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mdaftar');
    $this->load->library("form_validation");
  }

  public function index()
  {
    redirect('home');
  }

  public function tambah()
  {
    if ($this->input->post('email')!=$this->input->post('email2')){
      $this->session->set_flashdata('message', 'error_not_match');
      redirect('home');
  }
    if ($this->input->post('password')!=$this->input->post('password2')){
      $this->session->set_flashdata('message', 'error_not_match');
      redirect('home');
    }
  $data = $this->Mdaftar->tambahuser();
  $this->Mdaftar->tambahcustomer($data);
  $this->session->set_flashdata('message', 'success');
	redirect('home');
  }
}
