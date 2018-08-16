<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('barang_model');
		// $this->load->model('KendaraanModel');
		// $this->load->model('PropertiModel');
	}

	public function index()
	{
		
		$this->load->view("templates/header");
		$this->load->view('barang/index');
		$this->load->view("templates/footer");
	}

}
