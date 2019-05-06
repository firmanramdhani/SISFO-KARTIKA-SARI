<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    public function update_profile() {
        if ($this->session->userdata('user')) {
            $data = array(
                'nama' => $this->input->post('nama'),
                'password' => $this->input->post('password'),
                'desc' => $this->input->post('tentang'),
            );
            $where = array(
                'iduser' => $this->session->userdata('user')['iduser']
            );
            $this->M_profile->updateUser($data, $where);
            $user = $this->M_profile->getUser($where)->row_array();
            $this->session->set_userdata('user', $user);
            $this->session->set_flashdata('notification', 'Profil berhasil diperbarui!');
            redirect('page/profile');
        } else {
            $this->session->set_flashdata('notification', 'Silahkan login terlebih dahulu!');
            redirect('page/login');
        }
    }
}