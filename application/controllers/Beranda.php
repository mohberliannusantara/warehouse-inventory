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
		if (!$this->session->logged_in == TRUE) {
			redirect('Welcome','refresh');
		}
	}

	public function index()
	{
		$data['page'] = 'Beranda';

		//jumlah barang
		$data['total_barang']= $this->Barang_model->get_total();
		$data['total_kendaraan']= $this->Kendaraan_model->get_total();
		$data['total_properti']= $this->Properti_model->get_total();

		//total harga aset
		$data['total_harga_barang'] = $this->Barang_model->get_total_harga();
		$data['total_harga_kendaraan'] = $this->Kendaraan_model->get_total_harga();
		$data['total_harga_properti'] = $this->Properti_model->get_total_harga();

		//get limit
		$data['barang'] = $this->Barang_model->get_limit($this->session->userdata('id_rayon'));
		$data['kendaraan'] = $this->Kendaraan_model->get();
		$data['properti'] = $this->Properti_model->get();

		$this->load->view('templates/header', $data);
		$this->load->view('beranda/index', $data);
		$this->load->view('templates/footer');
	}
}
