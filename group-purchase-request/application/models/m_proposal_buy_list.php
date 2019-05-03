<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class m_proposal_buy_list extends CI_Model {

	public function proposal_buy_list($data){

		$this->db->insert('proposalbuylist',$data);
	}
}
?>