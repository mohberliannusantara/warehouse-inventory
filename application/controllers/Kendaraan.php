<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('kendaraan_model');
		$this->load->model('jenis_kendaraan_model');
		$this->load->model('kondisi_model');
		$this->load->library('form_validation');
		if (!$this->session->logged_in == TRUE) {
			redirect('Welcome','refresh');
		}
	}

	public function index()
	{
		$data['page'] = 'Kendaraan';
		$data['kendaraan'] = $this->kendaraan_model->get();

		$limit_per_page = 5;
		$start_index = ( $this->uri->segment(3) ) ? $this->uri->segment(3) : 0;
		$total_records = $this->kendaraan_model->get_total($this->session->userdata('id_rayon'), $this->session->userdata('id_level'));
		if ($total_records > 0) {
			$data['kendaraan'] = $this->kendaraan_model->get($limit_per_page, $start_index, $this->session->userdata('id_rayon'), $this->session->userdata('id_level'));

			$config['base_url'] = base_url() . 'Kendaraan/index';
			$config['total_rows'] = $total_records;
			$config['per_page'] = $limit_per_page;
			$config["uri_segment"] = 3;

			$this->pagination->initialize($config);

			// Buat link pagination
			$data["links"] = $this->pagination->create_links();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('kendaraan/index', $data);
		$this->load->view('templates/footer');
	}

	public function get($id)
  {
    $data['kendaraan'] = $this->kendaraan_model->get_by_id($id);
		$this->load->view('kendaraan/view', $data);
  }

	public function create()
	{
		$data['page'] = 'Kendaraan';
		$data['page_title'] = 'Tambah Kendaraan';
		$data['page_content'] = 'Tambahkan kendaraan kedalam daftar dengan informasi yang lengkap';

		$data['jenis_kendaraan'] = $this->jenis_kendaraan_model->get();
		$data['kondisi'] = $this->kondisi_model->get();

		// validasi input
		$this->form_validation->set_rules('nama_kendaraan', 'Nama_kendaraan', 'required');
		$this->form_validation->set_rules('plat', 'Plat', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('kendaraan/create', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			if ( isset($_FILES['gambar']) && $_FILES['gambar']['size'] > 0 )
			{
				// Konfigurasi folder upload & file yang diijinkan untuk diupload/disimpan
				$config['upload_path']          = './assets/uploads/kendaraan/';
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
					$this->load->view('kendaraan/create', $data);
					$this->load->view('templates/footer');

				} else { //jika berhasil upload

					$img_data = $this->upload->data();
					$post_image = $img_data['file_name'];

				}
			} else { //jika tidak upload gambar

				$post_image = '';

			}

			$post_data = array(
				'nama_kendaraan' => $this->input->post('nama_kendaraan'),
				'plat' => $this->input->post('plat'),
				'harga' => str_replace(',', '', $this->input->post('harga')),
				'id_jenis_kendaraan' => $this->input->post('jenis_kendaraan'),
				'id_kondisi' => $this->input->post('kondisi'),
				'id_rayon' => $this->session->userdata('id_rayon'),
				'keterangan' => $this->input->post('keterangan'),
				'tanggal' => date("Y-m-d H:i:s"),
				'gambar' => $post_image
			);

			if( empty($data['upload_error']) ) {
				$this->kendaraan_model->create($post_data);
				$data['kendaraan'] = $this->kendaraan_model->get();
				$this->load->view('templates/header', $data);
				$this->load->view('kendaraan/index', $data);
				$this->load->view('templates/footer');
			}
		}
	}

	public function edit($id = null)
	{
		$data['page'] = 'Kendaraan';
		$data['page_title'] = 'Ubah Kendaraan';
		$data['page_content'] = 'Ubah kendaraan kedalam daftar dengan informasi yang lengkap';

		$data['kendaraan'] = $this->kendaraan_model->get_by_id($id);
		$data['jenis_kendaraan'] = $this->jenis_kendaraan_model->get();
		$data['kondisi'] = $this->kondisi_model->get();
		// validasi input
		$this->form_validation->set_rules('nama_kendaraan', 'Nama_kendaraan', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');

		// Cek apakah input valid atau tidak
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('kendaraan/edit', $data);
			$this->load->view('templates/footer');

		} else {
			if ( isset($_FILES['gambar']) && $_FILES['gambar']['size'] > 0 )
			{
				// Konfigurasi folder upload & file yang diijinkan untuk diupload/disimpan
				$config['upload_path']          = './assets/uploads/kendaraan/';
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
					$this->load->view('kendaraan/create', $data);
					$this->load->view('templates/footer');

				} else { //jika berhasil upload

					$img_data = $this->upload->data();
					$post_image = $img_data['file_name'];

				}
			} else { //jika tidak upload gambar

				$post_image = '';

			}

			$post_data = array(
				'nama_kendaraan' => $this->input->post('nama_kendaraan'),
				'harga' => str_replace(',', '', $this->input->post('harga')),
				'id_jenis_kendaraan' => $this->input->post('jenis_kendaraan'),
				'id_kondisi' => $this->input->post('kondisi'),
				'keterangan' => $this->input->post('keterangan'),
				'tanggal' => date("Y-m-d H:i:s"),
				'gambar' => $post_image
			);

			if( empty($data['upload_error']) ) {
				$this->kendaraan_model->update($post_data,$id);
				//$data['kendaraan'] = $this->kendaraan_model->get();
				// $this->load->view('templates/header');
				// $this->load->view('kendaraan/index', $data);
				// $this->load->view('templates/footer');
				redirect('Kendaraan','refresh');
			}
		}
	}

	public function move()
	{
		$data['page_title'] = 'Pindah Kendaraan';
		$data['page_content'] = 'Pindahkan kendaraan dan memberi detail keterangan kendaraan';

		$this->load->view("templates/header");
		$this->load->view('kendaraan/edit', $data);
		$this->load->view("templates/footer");
	}

	public function delete($id)
	{
		$this->kendaraan_model->delete($id);
	}
}
