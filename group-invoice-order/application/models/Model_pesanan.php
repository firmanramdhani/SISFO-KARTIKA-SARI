<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Model_pesanan extends CI_Model {
		
		public function __construct(){
			parent::__construct();
        }

        public function getAll(){
            $this->db->select('*');
            $this->db->from('transaction');
            $this->db->join('onlinetransaction','idtransaction = onlinetransaction.idonlinetransaction');
            $this->db->join('buylist','transaction.idtransaction = buylist.idtransaction');
            $this->db->join('barang','buylist.idbarang = barang.idbarang');
            $this->db->join('produk','barang.idbarang = produk.idproduk');
            $this->db->where('status',1);
            $query = $this->db->get();
            return $query->result();
        }

        public function getByInvoice($invoice){
            return $this->db->query("SELECT * FROM pesanan JOIN roti USING(id_roti) WHERE invoice = '$invoice'")->result();
        }
        
    }
?>