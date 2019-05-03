<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class m_status extends CI_Model {

	public function model_status(){
		$data = $this->db->get('proposal')->result_array();
		return $data;
	}
	public function model_status_buy_list(){
		$this->db->select('*');
		$this->db->from('proposalbuylist');
		$this->db->join('barang', 'barang.idbarang=proposalbuylist.idbarang');
		$this->db->join('bahanbaku', 'bahanbaku.idbahanbaku=proposalbuylist.idbarang');
		$this->db->select('proposalbuylist.qty as jumlah');
		$this->db->select('proposalbuylist.qty','harga');
		$this->db->set('proposalbuylist.qty*harga as totalharga');
		$query=$this->db->get();

		return $query->result_array();		
	}

}
?>