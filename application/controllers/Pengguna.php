<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pengguna_model');
		$this->load->model('rayon_model');
		$this->load->library('form_validation');

		if (!$this->session->logged_in == TRUE) {
			redirect('welcome','refresh');
		}
		if ($this->session->id_level == 1 ) {
			redirect('admin/beranda','refresh');
		}
	}

	public function index()
	{
		$data['page'] = 'Pengguna';
		$data['page_title'] = 'Profil Pengguna';
		$data['pengguna'] = $this->pengguna_model->get();

		$limit_per_page = 5;
		$start_index = ( $this->uri->segment(3) ) ? $this->uri->segment(3) : 0;
		$total_records = $this->pengguna_model->get_total();
		if ($total_records > 0) {
			$data['pengguna'] = $this->pengguna_model->get($limit_per_page, $start_index);

			$config['base_url'] = base_url() . 'Pengguna/index';
			$config['total_rows'] = $total_records;
			$config['per_page'] = $limit_per_page;
			$config["uri_segment"] = 3;

			$this->pagination->initialize($config);

			// Buat link pagination
			$data["links"] = $this->pagination->create_links();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('pengguna/index', $data);
		$this->load->view('templates/footer');
	}

	public function edit($id = null)
	{
		$data['page'] = 'Pengguna';

		$data['pengguna'] = $this->pengguna_model->get_by_id($id);
		$data['rayon'] = $this->rayon_model->get();

		// validasi input
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('level', 'Level', 'trim|required');
		$this->form_validation->set_rules('rayon', 'Rayon', 'trim|required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('pengguna/edit', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			if ( isset($_FILES['gambar']) && $_FILES['gambar']['size'] > 0 )
			{
				// Konfigurasi folder upload & file yang diijinkan untuk diupload/disimpan
				$config['upload_path']          = './assets/uploads/pengguna/';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
				$config['max_size']             = 10000000000;
				$config['max_width']            = 5000;
				$config['max_height']           = 5000;

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('gambar'))
				{
					$data['upload_error'] = $this->upload->display_errors();

					$post_image = '';

					$this->load->view('templates/header', $data);
					$this->load->view('pengguna/edit', $data);
					$this->load->view('templates/footer');

				} else { //jika berhasil upload

					$img_data = $this->upload->data();
					$post_image = $img_data['file_name'];

				}
			} else { //jika tidak upload gambar

				$post_image = '';

			}

			$post_data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'id_level' => $this->input->post('level'),
				'gambar' => $post_image,
				'id_rayon' => $this->input->post('rayon')
			);

			if( empty($data['upload_error']) ) {
				$this->pengguna_model->update($post_data, $id);
				redirect('pengguna','refresh');
			}
		}
	}
}
