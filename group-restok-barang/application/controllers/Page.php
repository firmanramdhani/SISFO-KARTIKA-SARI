<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
    public function login() {
        if ($this->session->userdata('user')) {
            redirect('page/dasbor');
        } else {
            $this->load->view('V_login');
        }
    }
    public function dasbor() {
        if ($this->session->userdata('user')) {
            $data['bahanbaku'] = $this->M_bahanbaku->getAllBahanBaku();
            $data['barang'] = $this->M_bahanbaku->getAllBarang();
            $this->load->view('V_dasbor', $data);
        } else {
            $this->session->set_flashdata('notification', 'Silahkan login terlebih dahulu!');
            redirect('page/login');
        }
    }
    public function profile() {
        if ($this->session->userdata('user')) {
            $where = array(
                'iduser' => $this->session->userdata('user')['iduser']
            );
            $data['user'] = $this->M_profile->getUser($where)->row_array();
            $this->load->view('V_profile', $data);
        } else {
            $this->session->set_flashdata('notification', 'Silahkan login terlebih dahulu!');
            redirect('page/login');
        }
    }
}
