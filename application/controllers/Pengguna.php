<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->logged_in == TRUE) {
			redirect('Welcome','refresh');
		}
	}

	public function index()
	{
		$data['page'] = 'Pengguna';
		$data['page_title'] = 'Profil Pengguna';

		$this->load->view('templates/header', $data);
		$this->load->view('pengguna/index');
		$this->load->view('templates/footer');
	}
}
