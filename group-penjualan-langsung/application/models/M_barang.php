<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class M_barang extends CI_Model {
        public function get_semuabarang() {
                return $this->db->query("SELECT  idproduk, nama, harga, stock FROM produk inner join barang on produk.idproduk = barang.idbarang");
        }


}

?>
