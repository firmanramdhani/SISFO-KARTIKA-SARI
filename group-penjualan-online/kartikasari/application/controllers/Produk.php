<?php

class Produk extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('pagination');
    $this->load->model('Mproduk');
  }

  public function produklist()
  {

    $config['base_url'] = site_url('produk/produklist');
    $config['total_rows'] = $this->db->count_all('produk');
    $config['per_page']=6;
    $config["uri_segment"]=3;
    $choice = $config['total_rows'] / $config["per_page"];
    $config["num_links"] = floor($choice);

    $config['first_link']       = 'First';
    $config['last_link']        = 'Last';
    $config['next_link']        = 'Next';
    $config['prev_link']        = 'Prev';
    $config['full_tag_open']    = '<ul class="htc__pagenation">';
    $config['full_tag_close']   = '</ul>';
    $config['num_tag_open']     = '<li><span class="page-link">';
    $config['num_tag_close']    = '</span></li>';
    $config['cur_tag_open']     = '<li class=" active"><span class="page-link">';
    $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
    $config['next_tag_open']    = '<li><span class="page-link">';
    $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
    $config['prev_tag_open']    = '<li><span class="page-link">';
    $config['prev_tagl_close']  = '</span>Next</li>';
    $config['first_tag_open']   = '<li><span class="page-link">';
    $config['first_tagl_close'] = '</span></li>';
    $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['last_tagl_close']  = '</span></li>';

    $this->pagination->initialize($config);
    $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data['data'] = $this->Mproduk->Getproduk_limit($config["per_page"], $data['page']);
    $data['pagination'] = $this->pagination->create_links();
    $this->load->view('header');
    $this->load->view('product',$data);
    $this->load->view('footer');
  }

  public function produkdetail($id)
  {
    $data['produkdata'] = $this->Mproduk->getProdukById($id);
    $this->load->view('header',$data);
    $this->load->view('productdetails',$data);
    $this->load->view('footer');
  }
}
