<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function login($username,$password)
	{
		$this->db->order_by('admin.id_admin');
		$this->db->join('level','admin.id_level = level.id_level');
		$this->db->join('rayon','admin.id_rayon = rayon.id_rayon');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get('admin');
	}
}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */
