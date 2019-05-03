<?php

class Mdaftar extends CI_Model
{
  public function getAllUser()
  {
    $this->db->select('*');
    $this->db->from('customer');
    $this->db->join('user','customer.customer.id = user.iduser');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function tambahuser()
  {
    $data = [
      "username" => $this->input->post('username',true),
      "password"=> $this->input->post('password',true),
      "role"=>3,
      "nama"=> $this->input->post('nama',true),
    ];
    $this->db->insert('user',$data);
    return $this->db->insert_id();

  }

  public function tambahcustomer($id)
  {
    $data =[
      "customerid"=>$id,
      "alamat"=>$this->input->post('alamat',true),
      "notel"=>$this->input->post('telp',true),
      "email"=>$this->input->post('email',true),
    ];
    $this->db->insert('customer',$data);
  }
}
