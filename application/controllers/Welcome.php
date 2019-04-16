<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->logged_in == TRUE) {
			if ($this->session->id_level == 1) {
				redirect('admin/beranda','refresh');
			} else {
				redirect('beranda','refresh');
			}

		}
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}
}
