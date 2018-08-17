<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
	}
	function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$cek = $this->Admin_model->login($username,$password);
		if ($cek->num_rows() == 1) {
			redirect('Beranda','refresh');
		}
	}

	function logout()
	{
		redirect('Welcome','refresh');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */