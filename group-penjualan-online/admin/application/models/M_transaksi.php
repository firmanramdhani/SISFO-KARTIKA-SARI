<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class M_transaksi extends CI_Model
{

  public function getdata()
  {
    return $this->db->query("SELECT * FROM onlinetransaction INNER JOIN transaction ON transaction.idtransaction = onlinetransaction.idonlinetransaction INNER JOIN user ON user.iduser = onlinetransaction.idcustomer");
  }

  public function status_accept($where,$data,$table)
  {
    $this->db->where($where);
    $this->db->update($table,$data);
  }

}
?>
