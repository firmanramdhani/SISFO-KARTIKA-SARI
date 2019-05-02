<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view("login_view");
	}

	public function login_action()
	{
		$password = $this->input->post('password',TRUE)	;
		$username = $this->input->post('username',TRUE)	;

		if($this->User_model->login($username, $password))
		{			
			$data["username"] = $username;
			$this->session->set_userdata($data);		
			redirect(site_url('barang'));
		}
		else
		{
			$this->session->set_flashdata('message', "Login gagal");
			redirect(site_url('login'));
		}

	}

	public function logout()
	{
		session_destroy();
		redirect(site_url('login'));		
	}


}



?>
