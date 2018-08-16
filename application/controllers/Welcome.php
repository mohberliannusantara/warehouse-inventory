<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('rayon_model');
	}

	public function index()
	{
		$data['rayon'] = $this->rayon_model->get_all();
		$this->load->view('welcome_message', $data);
	}
}
