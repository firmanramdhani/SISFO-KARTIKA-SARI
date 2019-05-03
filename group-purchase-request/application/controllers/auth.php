<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html

	 */
		public function __construct() {
		parent::__construct();
		$this->load->model('m_getiduser');
	}
	public function index()
	{
		$this->load->view('login');
		
	}
	public function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$login= $this->m_getiduser->get_iduser($username, $password);
		
		$user = $this->db->get_where('user',['username'=> $username])->row_array();
		$user2 = $this->db->get_where('karyawan',['idkaryawan'=> $user['iduser']])->row_array();
		
		if($login){
			if($password == $user['password'])
				$data1= [
					'iduser' => $user['iduser'],
					'username' => $user['username'],
					'password' => $user['password'],
				];
				$this->session->set_userdata($data1);
				if($user['role'] == 1){
					redirect('karyawanpur',$data1);
			
			
		}
	}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('auth/index');
	}
}