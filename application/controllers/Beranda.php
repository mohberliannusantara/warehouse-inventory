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
		$data['total_barang']= $this->barang_model->get_total();
		$data['total_kendaraan']= $this->barang_model->get_total();
		$data['total_properti']= $this->barang_model->get_total();

		$get_kolom_barang = $this->barang_model->get()->result();
		$total_harga_barang = 0;
		foreach ($get_kolom_barang as $value) {
			$total_harga_barang += $value->harga;
		}

		$get_kolom_kendaraan = $this->barang_model->get()->result();
		$total_harga_barang = 0;
		foreach ($get_kolom_barang as $value) {
			$total_harga_barang += $value->harga;
		}

		$get_kolom_barang = $this->barang_model->get()->result();
		$total_harga_barang = 0;
		foreach ($get_kolom_barang as $value) {
			$total_harga_barang += $value->harga;
		}

		$data['total_harga_barang'] = ($total_harga_barang == 0) ? '0' : $total_harga_barang;

		$this->load->view("templates/header");

		$this->load->view('beranda/index', $data);

		$this->load->view("templates/footer");
	}
}
