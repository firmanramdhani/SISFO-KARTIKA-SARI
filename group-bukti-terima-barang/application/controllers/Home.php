<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('m_barang');
        $this->load->model('m_proposal');
    }
	public function index()
	{
        // $data = $this->m_barang->getAll();
        // echo json_encode($data);
		$this->load->view('v_bukti');
    }
    
    public function getPesanan(){
        $pesanan = $this->m_proposal->getAll();
        echo json_encode($pesanan);
    }

    public function getBarang($kode){
        $pesanan = $this->m_proposal->getBarang($kode);
        echo json_encode($pesanan);
    }

    public function verifikasi($kode){
        $this->m_proposal->verifikasi($kode);
        redirect('home');
    }

    public function tambahBukti($id){
        $this->m_bukti->getByNamaBahan($nama);
    }

    
}
