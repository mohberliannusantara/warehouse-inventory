<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('barang_model');
		$this->load->model('jenis_barang_model');
		$this->load->model('kondisi_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['barang'] = $this->barang_model->get();

		$this->load->view("templates/header");
		$this->load->view('barang/index', $data);
		$this->load->view("templates/footer");
	}

	public function create()
	{
		$data['page_title'] = 'Tambah Barang';

		$data['jenis_barang'] = $this->jenis_barang_model->get();
		$data['kondisi'] = $this->kondisi_model->get();

		// validasi input
		// $this->form_validation->set_rules('nama_barang', 'Nama_barang', 'required|is_unique[blogs.post_title]',
		// array(
		// 	'required' 		=> 'Masukkan nama barang.',
		// ));

		// $this->form_validation->set_rules('text', 'Konten', 'required|min_length[8]',
		// array(
		// 	'required' 		=> 'Silahkan %s isi dulu gan.',
		// 	'min_length' 	=> 'Konten %s kurang panjang gan.',
		// ));
		// $this->validate($this->input->post(), [
		// 	'username' => 'required|string|unique:admin',
		// 	'password' => 'required|string|confirmed',
		// 	'id_level' => 'required'
		// ]);

		$this->form_validation->set_rules('nama_barang', 'nama_barang', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('barang/create', $data);
			$this->load->view('templates/footer');
		}
		else
		{

			$object = array(
				'nama' => $this->input->post('nama_barang'),
				'harga' => str_replace(',', '', $this->input->post('harga')),
				'id_jenis_barang' => $this->input->post('jenis_barang'),
				'id_kondisi' => $this->input->post('kondisi'),
				'keterangan' => $this->input->post('keterangan')
			);
			if ($this->barang_model->insert($object))
				redirect('barang','refresh');	
			else
				echo 'eror';
		}
	}

}
