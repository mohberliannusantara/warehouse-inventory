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

		if (!$this->session->logged_in == TRUE) {
			redirect('welcome','refresh');
		}
		if ($this->session->id_level == 1 ) {
			redirect('admin/beranda','refresh');
		}
	}

	public function index()
	{
		$data['page'] = 'Beranda';

		//jumlah barang
		$data['total_barang']= $this->barang_model->get_by_rayon($this->session->userdata('id_rayon'));
		$data['total_kendaraan']= $this->kendaraan_model->get_by_rayon($this->session->userdata('id_rayon'));
		$data['total_properti']= $this->properti_model->get_by_rayon($this->session->userdata('id_rayon'));

		//total harga aset
		// $data['total_harga_barang'] = $this->Barang_model->get_total_harga($this->session->userdata('id_rayon'), $this->session->userdata('id_level'));
		//$data['total_harga_kendaraan'] = $this->Kendaraan_model->get_total_harga($this->session->userdata('id_rayon'), $this->session->userdata('id_level'));
		// $data['total_harga_properti'] = $this->Properti_model->get_total_harga();

		//get limit
		// $data['barang'] = $this->Barang_model->get_limit($this->session->userdata('id_rayon'), $this->session->userdata('id_level'));
		// $data['kendaraan'] = $this->Kendaraan_model->get_limit($this->session->userdata('id_rayon'), $this->session->userdata('id_level'));
		// $data['properti'] = $this->Properti_model->get_limit();

		$this->load->view('templates/header', $data);
		$this->load->view('beranda/index', $data);
		$this->load->view('templates/footer');
	}
}
