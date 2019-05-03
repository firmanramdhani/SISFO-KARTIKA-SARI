<?php

class Mlogin extends CI_model
{
	public function getAllUser()
	{
		$this->db->select('*');
		$this->db->from('customer');
    $this->db->join('user','customer.customerid = user.iduser');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function cekDataUser($username,$pass)
	{
        $this->db->where('username',$username);
        $this->db->where('password',$pass);
				return $this->db->get('user')->row_array();
	}
}
