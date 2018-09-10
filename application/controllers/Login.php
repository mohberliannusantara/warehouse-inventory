<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
	}

	function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$cek = $this->Login_model->login($username,$password);
		if ($cek->num_rows() == 1) {

			$data_rayon = $cek->row();

			$userdata = array(
				'id_rayon' => $data_rayon->id_rayon,
				'rayon' => $data_rayon->nama_rayon,
				'logged_in' => TRUE
			);
			$this->session->set_userdata($userdata);
			redirect('Beranda','refresh');
		} else {
			redirect('Welcome');
		}
	}

	function logout()
	{
		$userdata = array('rayon','logged_in');
		$this->session->unset_userdata($userdata);
		redirect('Welcome','refresh');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
