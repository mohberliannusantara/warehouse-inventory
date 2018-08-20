<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function login($username,$password)
	{
		$this->db->join('rayon','admin.id_rayon = rayon.id_rayon');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get('admin');
	}
}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */