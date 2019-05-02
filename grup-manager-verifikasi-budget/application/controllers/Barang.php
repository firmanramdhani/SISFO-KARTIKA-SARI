<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
		$this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {	
		$username = $this->session->userdata("username");
		if(!$this->User_model->isCorrectUserLoggedIn($username))
		{
			$this->session->set_flashdata('message', "anda harus login");
			redirect(site_url('login'));
		}

        $data["barang_data"] = $this->Barang_model->get_all();
        $this->load->view('barang_view', $data);
    }

    public function read($id) 
    {
        $row = $this->Barang_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idbarang' => $row->idbarang,
		'namabarang' => $row->namabarang,
		'kodebarang' => $row->kodebarang,
		'qty' => $row->qty,
		'harga' => $row->harga,
	    );
            $this->load->view('barang/barang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('barang/create_action'),
	    'idbarang' => set_value('idbarang'),
	    'namabarang' => set_value('namabarang'),
	    'kodebarang' => set_value('kodebarang'),
	    'qty' => set_value('qty'),
	    'harga' => set_value('harga'),
	);
        $this->load->view('barang/barang_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'namabarang' => $this->input->post('namabarang',TRUE),
		'kodebarang' => $this->input->post('kodebarang',TRUE),
		'qty' => $this->input->post('qty',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->Barang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('barang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Barang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('barang/update_action'),
		'idbarang' => set_value('idbarang', $row->idbarang),
		'namabarang' => set_value('namabarang', $row->namabarang),
		'kodebarang' => set_value('kodebarang', $row->kodebarang),
		'qty' => set_value('qty', $row->qty),
		'harga' => set_value('harga', $row->harga),
	    );
            $this->load->view('barang/barang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idbarang', TRUE));
        } else {
            $data = array(
		'namabarang' => $this->input->post('namabarang',TRUE),
		'kodebarang' => $this->input->post('kodebarang',TRUE),
		'qty' => $this->input->post('qty',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->Barang_model->update($this->input->post('idbarang', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('barang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Barang_model->get_by_id($id);

        if ($row) {
            $this->Barang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('barang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('namabarang', 'namabarang', 'trim|required');
	$this->form_validation->set_rules('kodebarang', 'kodebarang', 'trim|required');
	$this->form_validation->set_rules('qty', 'qty', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');

	$this->form_validation->set_rules('idbarang', 'idbarang', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-04-27 08:13:31 */
/* http://harviacode.com */