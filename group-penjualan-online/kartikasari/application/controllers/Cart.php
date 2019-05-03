<?php

class Cart extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mcart');
  }

  public function cart_detail($id)
  {
    $data = $this->Mcart->getdata($id);
    $this->load->view('header');
    $this->load->view('cartview',['data'=>$data]);
    $this->load->view('footer');
  }

  public function init()
  {
    $qty = $this->input->post('qty',true);
    $stock = $this->input->post('stock',true);
    $data = $this->Mcart->initialize();
    $this->Mcart->onlinetrans($data);
    $iduser = $this->input->post('idcustomer',true);
    $idbarang = $this->input->post('idbarang',true);
    $data2 = [
      "idtransaction"=>$data,
      "idbarang"=>$idbarang,
      "qty"=>$qty,
    ];

    $data_session = array(
      'id'=> $iduser,
			'cart' => "cart",
      'idtrans'=> $data
			);

    $this->session->set_userdata($data_session);
    $this->db->insert('buylist',$data2);

    $stc = $stock - $qty;

    $datastock = array(
      'stock' => $stc
    );

    $where = array(
      'idproduk' => $idbarang
    );

    $this->Mcart->update_stock($where,$datastock,'produk');
    redirect('produk/produklist');

  }

  public function add_to_cart()
  {
    $idbarang = $this->input->post('idbarang',true);
    $qty = $this->input->post('qty',true);
    $stock = $this->input->post('stock',true);
    $data = [
      "idtransaction"=>$this->input->post('idtransaction',true),
      "idbarang"=>$this->input->post('idbarang',true),
      "qty"=>$this->input->post('qty',true),
    ];
    $this->db->insert('buylist',$data);

    $stc = $stock - $qty;

    $datastock = array(
      'stock' => $stc
    );

    $where = array(
      'idproduk' => $idbarang
    );

    $this->Mcart->update_stock($where,$datastock,'produk');

    redirect('produk/produklist');
  }

}
