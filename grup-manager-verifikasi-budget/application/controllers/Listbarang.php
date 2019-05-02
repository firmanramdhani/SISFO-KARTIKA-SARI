<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Listbarang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Listbarang_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'listbarang/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'listbarang/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'listbarang/index.html';
            $config['first_url'] = base_url() . 'listbarang/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Listbarang_model->total_rows($q);
        $listbarang = $this->Listbarang_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'listbarang_data' => $listbarang,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('listbarang/listbarang_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Listbarang_model->get_by_id($id);
        if ($row) {
            $data = array(
		'no' => $row->no,
		'idbarangdibeli' => $row->idbarangdibeli,
		'idbarang' => $row->idbarang,
		'qty' => $row->qty,
	    );
            $this->load->view('listbarang/listbarang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('listbarang'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('listbarang/create_action'),
	    'no' => set_value('no'),
	    'idbarangdibeli' => set_value('idbarangdibeli'),
	    'idbarang' => set_value('idbarang'),
	    'qty' => set_value('qty'),
	);
        $this->load->view('listbarang/listbarang_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
         
		$idbarangdibeli = $this->input->post('idbarangdibeli',TRUE);
		$idbarang = $this->input->post('idbarang',TRUE);
		$qty = $this->input->post('qty',TRUE);
	    

            $this->Listbarang_model->insert($idbarangdibeli, $idbarang, $qty);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('listbarang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Listbarang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('listbarang/update_action'),
		'no' => set_value('no', $row->no),
		'idbarangdibeli' => set_value('idbarangdibeli', $row->idbarangdibeli),
		'idbarang' => set_value('idbarang', $row->idbarang),
		'qty' => set_value('qty', $row->qty),
	    );
            $this->load->view('listbarang/listbarang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('listbarang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('no', TRUE));
        } else {
            $data = array(
		'idbarangdibeli' => $this->input->post('idbarangdibeli',TRUE),
		'idbarang' => $this->input->post('idbarang',TRUE),
		'qty' => $this->input->post('qty',TRUE),
	    );

            $this->Listbarang_model->update($this->input->post('no', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('listbarang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Listbarang_model->get_by_id($id);

        if ($row) {
            $this->Listbarang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('listbarang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('listbarang'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idbarangdibeli', 'idbarangdibeli', 'trim|required');
	$this->form_validation->set_rules('idbarang', 'idbarang', 'trim|required');
	$this->form_validation->set_rules('qty', 'qty', 'trim|required');

	$this->form_validation->set_rules('no', 'no', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Listbarang.php */
/* Location: ./application/controllers/Listbarang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-04-27 08:13:32 */
/* http://harviacode.com */
