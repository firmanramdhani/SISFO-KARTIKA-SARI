<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_pesanan');
	}

	public function index()
	{
		$this->load->view('layout/navbar');
		$this->load->view('home');
	}

	public function cetak($invoice){
		$data['pesanan'] = $this->model_pesanan->getByInvoice($invoice)[0];
		$this->load->view('cetak', $data);
	}

	public function getPesanan(){
		$pesanan = $this->model_pesanan->getAll();
		echo json_encode($pesanan);
	}
}
