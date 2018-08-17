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
		// $data['total_harga_barang'] = $this->Barang_model->get_total_harga();
		// $data['total_harga_kendaraan'] = $this->Kendaraan_model->get_total_harga();
		// $data['total_harga_properti'] = $this->Properti_model->get_total_harga();

<<<<<<< HEAD
		$get_kolom_barang = $this->Barang_model->get();
		$total_harga_barang = 0;
		foreach ($get_kolom_barang as $value) {
			$total_harga_barang += $value->harga;
		}

		$get_kolom_kendaraan = $this->Kendaraan_model->get()->result();
		$total_harga_kendaraan = 0;
		foreach ($get_kolom_kendaraan as $value) {
			$total_harga_kendaraan += $value->harga;
		}

		$get_kolom_properti = $this->Properti_model->get()->result();
		$total_harga_properti = 0;
		foreach ($get_kolom_properti as $value) {
			$total_harga_properti += $value->harga;
		}
		$data['total_harga_barang'] = ($total_harga_barang == 0) ? $total_harga_barang : $total_harga_barang;
		$data['total_harga_kendaraan'] = ($total_harga_kendaraan == 0) ? $total_harga_kendaraan : $total_harga_kendaraan;
		$data['total_harga_properti'] = ($total_harga_properti == 0) ? $total_harga_properti : $total_harga_properti;

=======
>>>>>>> 5639a7ef529a904c1f563bcf7e9f9ba034e9000c
		$this->load->view("templates/header");
		$this->load->view('beranda/index', $data);
		$this->load->view("templates/footer");
	}
}
