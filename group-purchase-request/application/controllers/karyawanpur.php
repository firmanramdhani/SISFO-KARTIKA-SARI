<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class karyawanpur extends CI_Controller {
		public function __construct() {
		parent::__construct();
		$this->load->model('m_table');
		$this->load->model('m_getiduser');
	}

		public function index(){
			$data['barangs'] = $this->m_table->m_get_harga();
			// echo json_encode($data['barangs']);
			$data1['user'] = $this->db->get_where('user',['username'=> $this->session->userdata('username')])->row();
			// var_dump($data1);
			// die;

			$this->load->view('list_restock',$data);
		}

	}
?>