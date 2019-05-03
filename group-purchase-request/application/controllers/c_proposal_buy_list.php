<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_proposal_buy_list extends CI_Controller {
		public function __construct() {
		parent::__construct();
		$this->load->model('m_proposal_buy_list');

	}

		public function index(){
			$data1['user'] = $this->db->get_where('user',['username'=> $this->session->userdata('username')])->row();
			// var_dump($data1);
			// die;			
			$this->load->view('proposal_buy_list',$data1);

			#echo json_encode($data);
			

		}
		public function proposal_buy_list(){
			$idproposalbuylist = $this->input->post('idproposalbuylist');
			$idbarang= $this->input->post('idbarang');
			$qty = $this->input->post('qty');
			$idproposal = $this->input->post('idproposal');
			$data = array(
			'idproposalbuylist' => $idproposalbuylist,
			'idbarang' => $idbarang,
			'qty' => $qty,
			'idproposal'=> $idproposal );
			$this->m_proposal_buy_list->proposal_buy_list($data);
			redirect('c_proposal_buy_list');
		}
	}
?>