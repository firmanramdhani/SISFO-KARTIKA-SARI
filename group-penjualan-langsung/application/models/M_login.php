<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class M_login extends CI_Model {
        public function login($user,$password) {
                return $this->db->query("SELECT iduser FROM `user` where username = '$user' and password = '$password'");

        }
	

}

?>
