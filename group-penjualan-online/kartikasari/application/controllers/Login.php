<?php

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mlogin');
	}

	public function index()
	{
		redirect('home');
	}

	public function masuk()
	{
        $username = $this->input->post('username');
        $pass = $this->input->post('password');
        $data = $this->Mlogin->cekDataUser($username,$pass);
        // var_dump($pass);
        if ($data != NULL){
		$data_session = array(
			'id' => $data["iduser"],
			'nama' => $data["nama"],
			'status' => "login",
			'cart' =>"0"
			);
		$this->session->set_userdata($data_session);
		redirect('home');
        }else{
		$this->session->set_flashdata('message', 'error');
            	redirect('home');
        }
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('home'));
	}
}
