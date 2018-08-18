<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('barang_model');
		$this->load->model('jenis_barang_model');
		$this->load->model('kondisi_model');
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
		$data['page_content'] = 'Tambahkan barang kedalam daftar dengan informasi yang lengkap';

		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['jenis_barang'] = $this->jenis_barang_model->get();
		$data['kondisi'] = $this->kondisi_model->get();

		// validasi input
		$this->form_validation->set_rules('nama_barang', 'Nama_barang', 'required',
		array(
			'required' 		=> 'Masukkan nama barang.',
		));

		$this->form_validation->set_rules('harga', 'Harga', 'required',
		array(
			'required' 		=> 'Masukkan estimasi harga barang.',
		));

		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|min_length[8]',
		array(
			'required' 		=> 'Masukkan keterangan barang.',
			'min_length' 	=> 'Lengkapi detail keterangan barang.',
		));

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('barang/create', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			if ( isset($_FILES['gambar']) && $_FILES['gambar']['size'] > 0 )
			{
				// Konfigurasi folder upload & file yang diijinkan untuk diupload/disimpan
				$config['upload_path']          = './assets/uploads/barang/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 100;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('gambar'))
				{
					$data['upload_error'] = $this->upload->display_errors();

					$post_image = '';

					$this->load->view('templates/header');
					$this->load->view('barang/create', $data);
					$this->load->view('templates/footer');

				} else { //jika berhasil upload

					$img_data = $this->upload->data();
					$post_image = $img_data['file_name'];

				}
			} else { //jika tidak upload gambar

				$post_image = '';

			}

			$post_data = array(
				'nama_barang' => $this->input->post('nama_barang'),
				'harga' => $this->input->post('harga'),
				'id_jenis_barang' => $this->input->post('id_jenis_barang'),
				'id_kondisi' => $this->input->post('id_kondisi'),
				'keterangan' => $this->input->post('keterangan'),
				'tanggal' => date("Y-m-d H:i:s"),
				'gambar' => $post_image,
			);

			if( empty($data['upload_error']) ) {
				$this->barang_model->create($post_data);

				$this->load->view('templates/header');
				$this->load->view('beranda', $data);
				$this->load->view('templates/footer');
			}
		}
	}

	public function move()
	{
		$data['page_title'] = 'Pindah Barang';
		$data['page_content'] = 'Pindahkan barang dan memberi detail keterangan barang';

		$this->load->view("templates/header");
		$this->load->view('barang/edit', $data);
		$this->load->view("templates/footer");
	}
}
