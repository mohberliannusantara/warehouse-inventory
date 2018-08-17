<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Barang_model');
		$this->load->model('Kendaraan_model');
		$this->load->model('Properti_model');
		// $this->load->model('category_model');
	}

	public function index()
	{
		//jumlah barang
		$data['total_barang']= $this->Barang_model->get_total();
		$data['total_kendaraan']= $this->Kendaraan_model->get_total();
		$data['total_properti']= $this->Properti_model->get_total();

		//jumlah estmasi harga
		$data['total_harga_barang'] = $this->Barang_model->get_total_harga();
		$data['total_harga_kendaraan'] = $this->Kendaraan_model->get_total_harga();
		$data['total_harga_properti'] = $this->Properti_model->get_total_harga();

		$this->load->view("templates/header");
		$this->load->view('beranda/index', $data);
		$this->load->view("templates/footer");
	}
}
