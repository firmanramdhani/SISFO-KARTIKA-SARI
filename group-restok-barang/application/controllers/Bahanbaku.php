<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahanbaku extends CI_Controller {
    public function add_bahanbaku() {
        if ($this->session->userdata('user')) {
            $data = array(
                'namabahanbaku' => $this->input->post('nama'),
                'idbarang' => $this->input->post('idbarang'),
                'qty' => $this->input->post('stok')
            );
            $this->M_bahanbaku->addBahanBaku($data);
            $this->session->set_flashdata('notification', 'Bahan Baku berhasil ditambahkan!');
            redirect('page/dasbor');
        } else {
            $this->session->set_flashdata('notification', 'Silahkan login terlebih dahulu!');
            redirect('page/login');
        }
    }
    public function add_stok() {
        if ($this->session->userdata('user')) {
            $where = array(
                'idbahanbaku' => $this->input->post('id')
            );
            $currentStok = $this->M_bahanbaku->getBahanBaku($where)->row_array()['qty'];

            $data = array(
                'qty' => $this->input->post('stok') + $currentStok
            );
            $this->M_bahanbaku->addStok($data, $where);

            $this->session->set_flashdata('notification', 'Stok bahan baku berhasil ditambah!');
            redirect('page/dasbor');
        } else {
            $this->session->set_flashdata('notification', 'Silahkan login terlebih dahulu!');
            redirect('page/login');
        }
    }
}
