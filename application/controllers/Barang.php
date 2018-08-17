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

		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['jenis_barang'] = $this->jenis_barang_model->get();
		$data['kondisi'] = $this->kondisi_model->get();

		// validasi input
		$this->form_validation->set_rules('nama_barang', 'Nama_barang', 'required|is_unique[blogs.post_title]',
		array(
			'required' 		=> 'Masukkan nama barang.',
		));

		$this->form_validation->set_rules('text', 'Konten', 'required|min_length[8]',
		array(
			'required' 		=> 'Silahkan %s isi dulu gan.',
			'min_length' 	=> 'Konten %s kurang panjang gan.',
		));
		// $this->validate($this->input->post(), [
		// 	'username' => 'required|string|unique:admin',
		// 	'password' => 'required|string|confirmed',
		// 	'id_level' => 'required'
		// ]);

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
					$this->load->view('blogs/blog_create', $data);
					$this->load->view('templates/footer');

				} else { //jika berhasil upload

					$img_data = $this->upload->data();
					$post_image = $img_data['file_name'];

				}
			} else { //jika tidak upload gambar

				$post_image = '';

			}

			$slug = url_title($this->input->post('title'), 'dash', TRUE);

			$post_data = array(
				'fk_cat_id' => $this->input->post('cat_id'),
				'post_title' => $this->input->post('title'),
				'post_date' => date("Y-m-d H:i:s"),
				'post_slug' => $slug,
				'post_content' => $this->input->post('text'),
				'post_thumbnail' => $post_image,
				'date_created' => date("Y-m-d H:i:s"),
			);

			if( empty($data['upload_error']) ) {
				$this->blog_model->create($post_data);

				$this->load->view('templates/header');
				$this->load->view('blogs/blog_success', $data);
				$this->load->view('templates/footer');
			}
		}
	}

}
