<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function __construct(){
		parent::__construct();
		$this->load->model('M_login');

		
	}
	public function index()
	{
		if($this->session->userdata('Admin')){
			redirect('Admin');
		}
		$this->load->view('login');
	}
	public function loginkan(){
		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		$data['user']['id'] = $this->M_login->login($user,$pass);
		foreach ($data['user']['id'] ->result_array() as $key){
			if ($key['iduser']  != null){
				$this->session->set_userdata('Admin', 'Yuhu');
				$this->session->set_flashdata("message", $key['iduser']);
				redirect('admin');
			}else {
				redirect('welcome');
			}
		}
		
	}
	public function logout(){
		$this->session->unset_userdata('Admin');
		redirect('welcome');
	}
}
