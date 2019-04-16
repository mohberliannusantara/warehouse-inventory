<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autentikasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Autentikasi_model');
	}

	function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$cek = $this->Autentikasi_model->login($username,$password);
		if ($cek->num_rows() == 1) {

			$value = $cek->row();

			$userdata = array(
				'rayon' => $value->nama_rayon,
				'id_level' => $value->id_level,
				'level' => $value->nama_level,
				'id_rayon' => $value->id_rayon,
				'username' => $value->username,
				'gambar' => $value->gambar,
				'id_admin' => $value->id_admin,
				'logged_in' => TRUE
			);
			$this->session->set_userdata($userdata);

			if ($userdata['id_level'] == 1) {
				$this->session->set_userdata($userdata);
				redirect('admin/beranda','refresh');
			}else {
				$this->session->set_userdata($userdata);
				redirect('beranda','refresh');
			}
		} else {
			redirect('welcome');
		}
	}

	function logout()
	{
		$userdata = array('rayon','logged_in');
		$this->session->unset_userdata($userdata);
		redirect('welcome','refresh');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
