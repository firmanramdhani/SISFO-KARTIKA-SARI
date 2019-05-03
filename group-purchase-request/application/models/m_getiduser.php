<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class m_getiduser extends CI_Model {

	public function get_iduser($username, $password){
			$data1['user'] = $this->db->get_where('user',['username' => $username, 'password'=>$password])->row();
			return $data1;
		}
	}
	?>