<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pengguna_model');
		$this->load->library('form_validation');
		if (!$this->session->logged_in == TRUE) {
			redirect('Welcome','refresh');
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
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/pengguna/index', $data);
		$this->load->view('admin/templates/footer');
	}

	public function get($id)
	{
		$data['pengguna'] = $this->pengguna_model->get_by_id($id);
		$this->load->view('pengguna/view', $data);
	}


}
