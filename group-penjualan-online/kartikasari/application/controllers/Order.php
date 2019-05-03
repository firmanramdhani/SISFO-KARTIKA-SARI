<?php

class Order extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mcart');
  }

  public function cekout($id,$total)
  {
    $where = array(
      'idtransaction' => $id
    );

    $data = array(
      'total' => $total
    );

    $this->Mcart->update_transaksi($where,$data,'transaction');
    redirect('home/index');
  }
}
