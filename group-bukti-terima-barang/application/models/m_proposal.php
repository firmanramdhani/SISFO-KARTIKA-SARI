<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class M_proposal extends CI_Model {
		
		public function __construct(){
			parent::__construct();
		}
        public function getAll(){
            return $this->db->query('SELECT * FROM proposal JOIN manager USING(idmanager) JOIN user ON proposal.idkaryawanpengaju = user.iduser JOIN supplier USING(idsupplier) WHERE status = 2 OR status = 3')->result();
        }

        public function getBarang($kode){
            return $this->db->query("SELECT * FROM proposalbuylist JOIN barang USING(idbarang) WHERE idproposal = '$kode'")->result();
        }

        public function verifikasi($kode){
            return $this->db->set("status", 3)
                            ->where("idproposal", $kode)
                            ->update("proposal");
        }

		public function insert($data){
			return $this->db->insert('pesanan', $data);
        }
        
        public function getById($id){
            return $this->db->query("SELECT * FROM pesanan JOIN bahan_baku using(id_bahan_baku) WHERE id_pesanan = '$id'")->result();
        }

        public function getByNamaBahan($nama){
            return $this->db->query("SELECT * FROM pesanan JOIN bahan_baku using(id_bahan_baku) WHERE nama = '$nama'")->result();
        }
	}
?>