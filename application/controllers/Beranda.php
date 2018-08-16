<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('barang_model');
		// $this->load->model('category_model');
	}

	public function index()
	{
		$data['total_barang']= $this->barang_model->get_total();

		$this->load->view("templates/header");

		$this->load->view('beranda/index', $data);

		$this->load->view("templates/footer");
	}
}
