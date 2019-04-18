<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('barang_model');
		$this->load->model('kendaraan_model');
		$this->load->model('properti_model');
		$this->load->model('rayon_model');

		if (!$this->session->logged_in == TRUE) {
			redirect('welcome','refresh');
		}
		if ($this->session->id_level == 2 ) {
			redirect('beranda','refresh');
		}
	}

	public function index()
	{
		$data['page'] = 'Beranda';

		$data['rayon'] = $this->rayon_model->get();
		$data['barang'] = $this->barang_model->get();
		$data['kendaraan'] = $this->kendaraan_model->get();
		$data['properti'] = $this->properti_model->get();

		$data['total_barang'] = 0;
		$data['total_kendaraan'] = 0;
		$data['total_properti'] = 0;

		foreach ($data['barang'] as $key => $value) {
				$data['total_barang'] = 1 + $key++;
		}

		foreach ($data['kendaraan'] as $key => $value) {
				$data['total_kendaraan'] = 1 + $key++;
		}

		foreach ($data['properti'] as $key => $value) {
				$data['total_properti'] = 1 + $key++;
		}

		foreach ($data['barang'] as $key => $value) {
			if ($value->id_rayon == 1) {

			}
				$data['total_barang'] = 1 + $key++;
		}

		foreach ($data['kendaraan'] as $key => $value) {
				$data['total_kendaraan'] = 1 + $key++;
		}

		foreach ($data['properti'] as $key => $value) {
				$data['total_properti'] = 1 + $key++;
		}

		// var_dump($data['total_barang']);
		// var_dump($data['total_kendaraan']);
		// var_dump($data['total_properti']);
		//jumlah barang
		// $data['total_barang']= $this->Barang_model->get_total($this->session->userdata('id_rayon'), $this->session->userdata('id_level'));
		// $data['total_kendaraan']= $this->Kendaraan_model->get_total($this->session->userdata('id_rayon'), $this->session->userdata('id_level'));
		// $data['total_properti']= $this->Properti_model->get_total();
		//
		// //total harga aset
		// $data['total_harga_barang'] = $this->Barang_model->get_total_harga();
		// $data['total_harga_kendaraan'] = $this->Kendaraan_model->get_total_harga($this->session->userdata('id_rayon'), $this->session->userdata('id_level'));
		// $data['total_harga_properti'] = $this->Properti_model->get_total_harga();
		//
		// //get limit
		// $data['barang'] = $this->Barang_model->get_limit($this->session->userdata('id_rayon'), $this->session->userdata('id_level'));
		// $data['kendaraan'] = $this->Kendaraan_model->get_limit($this->session->userdata('id_rayon'), $this->session->userdata('id_level'));
		// $data['properti'] = $this->Properti_model->get_limit();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/beranda/index2', $data);
		$this->load->view('admin/templates/footer');
	}
}
