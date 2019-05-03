<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class m_table extends CI_Model {

	public function c_table_list_restock(){
		$data = $this->db->get('barang')->result_array();
		return $data;
	}
	public function m_get_harga(){
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->join('bahanbaku', 'bahanbaku.idbahanbaku=barang.idbarang');
		$query=$this->db->get();
		return $query->result_array();
	}
}