<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profile extends CI_Model {
    public function getUser($where) {
        $this->db->where($where);
        return $this->db->get('user');
    }
    public function updateUser($data, $where) {
        $this->db->where($where);
        $this->db->update('user', $data);
    }
}