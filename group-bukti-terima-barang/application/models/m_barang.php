<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class M_barang extends CI_Model {
		
		public function __construct(){
			parent::__construct();
		}
		public function getAll(){
            return $this->db->get('barang')->result();
        }

		public function insert($data){
			return $this->db->insert('bahan_baku', $data);
		}
	}
?>