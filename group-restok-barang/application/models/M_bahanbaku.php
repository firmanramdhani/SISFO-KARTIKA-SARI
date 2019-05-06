<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bahanbaku extends CI_Model {
    public function getAllBahanBaku() {
        $this->db->join('barang', 'barang.idbarang = bahanbaku.idbarang');
        return $this->db->get('bahanbaku');
    }
    public function addBahanBaku($data) {
        $this->db->insert('bahanbaku', $data);
    }
    public function getBahanBaku($where) {
        $this->db->where($where);
        return $this->db->get('bahanbaku');
    }
    public function addStok($data, $where) {
        $this->db->where($where);
        $this->db->update('bahanbaku', $data);
    }
    public function getAllBarang() {
        return $this->db->get('barang');
    }
}
