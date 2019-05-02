<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bukti extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('m_bahan_baku');
        $this->load->model('m_pesanan');
        $this->load->model('m_bukti');
    }
	public function index()
	{
		$this->load->view('v_bukti');
    }
    
    public function getPesanan($nama){
        $pesanan = $this->m_pesanan->getByNamaBahan($nama);
        echo json_encode($pesanan);
    }

    public function tambahBukti($id){
        $this->m_bukti->getByNamaBahan($nama);
    }

    
}
