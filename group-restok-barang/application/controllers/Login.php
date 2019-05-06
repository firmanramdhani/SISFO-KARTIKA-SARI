<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function index() {
        $where = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'role' => 2
        );
        $result = $this->M_login->getLogin($where)->row_array();
        if ($result > 0) {
            $this->session->set_userdata('user', $result);
            redirect('page/dasbor');
        } else {
            $this->session->set_flashdata('notification', 'Username atau Password salah!');
            redirect('page/login');
        }
    }
}
