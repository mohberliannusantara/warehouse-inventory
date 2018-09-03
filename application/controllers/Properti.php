<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Properti extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('properti_model');
		$this->load->library('form_validation');
		if (!$this->session->logged_in == TRUE) {
			redirect('Welcome','refresh');
		}
	}

	public function index()
	{
		$data['page'] = 'Properti';
		$data['properti'] = $this->properti_model->get();

		$limit_per_page = 5;
		$start_index = ( $this->uri->segment(3) ) ? $this->uri->segment(3) : 0;
		$total_records = $this->properti_model->get_total();
		if ($total_records > 0) {
			$data['properti'] = $this->properti_model->get($limit_per_page, $start_index);

			$config['base_url'] = base_url() . 'Properti/index';
			$config['total_rows'] = $total_records;
			$config['per_page'] = $limit_per_page;
			$config["uri_segment"] = 3;

			$this->pagination->initialize($config);

			// Buat link pagination
			$data["links"] = $this->pagination->create_links();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('properti/index', $data);
		$this->load->view('templates/footer');
	}

	public function get($id)
  {
    $data['properti'] = $this->properti_model->get_by_id($id);
		$this->load->view('properti/view', $data);
  }

	public function create()
	{
		$data['page'] = 'Properti';
		$data['page_title'] = 'Tambah Properti';
		$data['page_content'] = 'Tambahkan properti kedalam daftar dengan informasi yang lengkap';

		$data['jenis_properti'] = $this->jenis_properti_model->get();
		$data['kondisi'] = $this->kondisi_model->get();

		// validasi input
		$this->form_validation->set_rules('nama_properti', 'Nama_properti', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('properti/create', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			if ( isset($_FILES['gambar']) && $_FILES['gambar']['size'] > 0 )
			{
				// Konfigurasi folder upload & file yang diijinkan untuk diupload/disimpan
				$config['upload_path']          = './assets/uploads/properti/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 10000000000000;
				$config['max_width']            = 5000;
				$config['max_height']           = 5000;

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('gambar'))
				{
					$data['upload_error'] = $this->upload->display_errors();

					$post_image = '';

					$this->load->view('templates/header', $data);
					$this->load->view('properti/create', $data);
					$this->load->view('templates/footer');

				} else { //jika berhasil upload

					$img_data = $this->upload->data();
					$post_image = $img_data['file_name'];

				}
			} else { //jika tidak upload gambar

				$post_image = '';

			}

			$post_data = array(
				'nama_properti' => $this->input->post('nama_properti'),
				'harga' => str_replace(',', '', $this->input->post('harga')),
				'id_jenis_properti' => $this->input->post('jenis_properti'),
				'id_kondisi' => $this->input->post('kondisi'),
				'keterangan' => $this->input->post('keterangan'),
				'tanggal' => date("Y-m-d H:i:s"),
				'gambar' => $post_image
			);

			if( empty($data['upload_error']) ) {
				$this->properti_model->create($post_data);
				$data['properti'] = $this->properti_model->get();
				$this->load->view('templates/header', $data);
				$this->load->view('properti/index', $data);
				$this->load->view('templates/footer');
			}
		}
	}

	public function edit($id = null)
	{
		$data['page'] = 'Properti';
		$data['page_title'] = 'Ubah Properti';
		$data['page_content'] = 'Ubah properti kedalam daftar dengan informasi yang lengkap';

		$data['properti'] = $this->properti_model->get_by_id($id);
		$data['jenis_properti'] = $this->jenis_properti_model->get();
		$data['kondisi'] = $this->kondisi_model->get();
		// validasi input
		$this->form_validation->set_rules('nama_properti', 'Nama_properti', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');

		// Cek apakah input valid atau tidak
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('properti/edit', $data);
			$this->load->view('templates/footer');

		} else {
			if ( isset($_FILES['gambar']) && $_FILES['gambar']['size'] > 0 )
			{
				// Konfigurasi folder upload & file yang diijinkan untuk diupload/disimpan
				$config['upload_path']          = './assets/uploads/properti/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 10000000000000;
				$config['max_width']            = 3000;
				$config['max_height']           = 3000;

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('gambar'))
				{
					$data['upload_error'] = $this->upload->display_errors();

					$post_image = '';

					$this->load->view('templates/header');
					$this->load->view('properti/create', $data);
					$this->load->view('templates/footer');

				} else { //jika berhasil upload

					$img_data = $this->upload->data();
					$post_image = $img_data['file_name'];

				}
			} else { //jika tidak upload gambar

				$post_image = '';

			}

			$post_data = array(
				'nama_properti' => $this->input->post('nama_properti'),
				'harga' => str_replace(',', '', $this->input->post('harga')),
				'id_jenis_properti' => $this->input->post('jenis_properti'),
				'id_kondisi' => $this->input->post('kondisi'),
				'keterangan' => $this->input->post('keterangan'),
				'tanggal' => date("Y-m-d H:i:s"),
				'gambar' => $post_image
			);

			if( empty($data['upload_error']) ) {
				$this->properti_model->update($post_data,$id);
				//$data['properti'] = $this->properti_model->get();
				// $this->load->view('templates/header');
				// $this->load->view('properti/index', $data);
				// $this->load->view('templates/footer');
				redirect('Properti','refresh');
			}
		}
	}

	public function move()
	{
		$data['page_title'] = 'Pindah Properti';
		$data['page_content'] = 'Pindahkan properti dan memberi detail keterangan properti';

		$this->load->view("templates/header");
		$this->load->view('properti/edit', $data);
		$this->load->view("templates/footer");
	}

	public function delete($id)
	{
		$this->properti_model->delete($id);
	}
}
