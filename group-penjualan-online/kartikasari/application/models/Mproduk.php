<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mproduk extends CI_Model
{
  public function Getproduk()
  {
    $this->db->select('*');
    $this->db->from('produk');
    $this->db->join('barang', 'barang.idbarang = produk.idproduk');
    $query = $this->db->get();
    return $query->result();
  }

  public function Getproduk_limit($limit,$start)
  {
    $this->db->select('*');
    $this->db->join('barang', 'barang.idbarang = produk.idproduk');
    $query = $this->db->get('produk',$limit,$start);
    return $query->result();
  }

  public function getProdukById($id)
  {
    $this->db->select('*');
    $this->db->from('produk');
    $this->db->join('barang', 'barang.idbarang = produk.idproduk');
    $this->db->where('produk.idproduk', $id);
    return $this->db->get()->row_array();
  }
}
