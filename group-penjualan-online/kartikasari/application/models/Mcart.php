<?php

class Mcart extends CI_model
{
  public function initialize()
  {
    $data = [
      "tanggaltransaction" => date('Y-m-d'),
      "total"=> 0,
    ];
    $this->db->insert('transaction',$data);
    return $this->db->insert_id();
  }

  public function onlinetrans($id)
  {
    $data =[
      "idonlinetransaction"=>$id,
      "idcustomer"=>$this->input->post('idcustomer',true),
      "status"=>0,
    ];
    $this->db->insert('onlinetransaction',$data);

  }

  public function getdata($id)
  {
    $this->db->select('*');
    $this->db->from('buylist');
    $this->db->join('onlinetransaction','onlinetransaction.idonlinetransaction = buylist.idtransaction');
    $this->db->join('barang','barang.idbarang = buylist.idbarang');
    $this->db->join('produk','produk.idproduk = buylist.idbarang');
    $this->db->where('onlinetransaction.idcustomer',$id);
    $query = $this->db->get();
    return $query->result();
  }

  public function update_stock($where,$data,$table)
  {
    $this->db->where($where);
    $this->db->update($table,$data);
  }

  public function update_transaksi($where,$data,$table)
  {
    $this->db->where($where);
    $this->db->update($table,$data);
  }

}
