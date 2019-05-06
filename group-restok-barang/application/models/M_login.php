<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
    public function getLogin($where) {
        $this->db->where($where);
        return $this->db->get('user');
    }
}
