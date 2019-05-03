<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_status extends CI_Controller {
		public function __construct() {
		parent::__construct();
		$this->load->model('m_status');
	}

		public function index(){
			$data['barangs1'] = $this->m_status->model_status_buy_list();
			$data['barangs'] = $this->m_status->model_status();
			// echo json_encode($data['barangs1']);

			// var_dump($data1);
			// die;

			$this->load->view('status',$data);
		}

	}
?>