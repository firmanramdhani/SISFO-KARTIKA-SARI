<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class m_purchase_request extends CI_Model {

	public function purchase_request($data){

		$this->db->insert('proposal',$data);
	}
}