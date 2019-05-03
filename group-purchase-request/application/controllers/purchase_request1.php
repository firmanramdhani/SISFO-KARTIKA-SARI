<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class purchase_request1 extends CI_Controller {
		public function __construct() {
		parent::__construct();
		$this->load->model('m_purchase_request');

	}

		public function index(){
			$data1['user'] = $this->db->get_where('user',['username'=> $this->session->userdata('username')])->row();
			// var_dump($data1);
			// die;			
			$this->load->view('purchase_request',$data1);

			#echo json_encode($data);
			

		}
		public function purchase_request(){
			$idproposal = $this->input->post('idproposal');
			$judul = $this->input->post('judul');
			$idkaryawanpengaju = $this->input->post('idkaryawanpengaju');
			$idmanager = $this->input->post('idmanager');
			$status = $this->input->post('status');
			$idbuktilist = $this->input->post('idbuktilist');
			$deadline = $this->input->post('deadline');
			$created = $this->input->post('created');
			$idsupplier = $this->input->post('idsupplier');
			$budget = $this->input->post('budget');
			$data = array(
			'idproposal'=> $idproposal,
			'judul'=>$judul,
			'idkaryawanpengaju'=>$idkaryawanpengaju,
			'idmanager'=>$idmanager,
			'status'=>$status,
			'idbuktilist'=>$idbuktilist,
			'deadline'=>$deadline,
			'created'=>$created,
			'idsupplier'=>$idsupplier,
			'budget'=>$budget );
			$this->m_purchase_request->purchase_request($data);
			redirect('purchase_request1');
		}
	}
?>