<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('vendor_model');
    $this->load->library('form_validation');
    // $this->load->library('dompdf_gen');
    if (!$this->session->logged_in == TRUE) {
      redirect('welcome','refresh');
    }
    if ($this->session->id_level == 2 ) {
      redirect('beranda','refresh');
    }
  }

  public function index()
  {
    $data['page'] = 'Vendor';
    $data['vendor'] = $this->vendor_model->get();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/vendor/index', $data);
    $this->load->view('admin/templates/footer');
  }

  public function get($id)
  {
    $data['vendor'] = $this->vendor_model->get_by_id($id);
    $this->load->view('admin/vendor/view', $data);
  }

  public function create()
  {
    $data['page'] = 'Vendor';

    // validasi input
    $this->form_validation->set_rules('nama_pemilik_kendaraan', 'Nama', 'trim|required');
    $this->form_validation->set_rules('telepon', 'Telepon', 'trim|required');
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');

    if ($this->form_validation->run() === FALSE)
    {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/vendor/create', $data);
      $this->load->view('admin/templates/footer');
    }
    else
    {
      $post_data = array(
        'nama_pemilik_kendaraan' => $this->input->post('nama_pemilik_kendaraan'),
        'telepon' => $this->input->post('telepon'),
        'keterangan' => $this->input->post('keterangan'),
      );

      $this->vendor_model->create($post_data);
      redirect('admin/vendor','refresh');
    }
  }

  public function edit($id = null)
  {
    $data['page'] = 'Vendor';
    $data['vendor'] = $this->vendor_model->get_by_id($id);

    $this->form_validation->set_rules('nama_pemilik_kendaraan', 'Nama', 'trim|required');
    $this->form_validation->set_rules('telepon', 'Telepon', 'trim|required');
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');

    if ($this->form_validation->run() === FALSE)
    {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/vendor/edit', $data);
      $this->load->view('admin/templates/footer');
    }
    else
    {
      $post_data = array(
        'nama_pemilik_kendaraan' => $this->input->post('nama_pemilik_kendaraan'),
        'telepon' => $this->input->post('telepon'),
        'keterangan' => $this->input->post('keterangan'),
      );

      $this->vendor_model->update($post_data, $id);
      redirect('admin/vendor','refresh');
    }
  }

  public function delete($id)
	{
		$this->vendor_model->delete($id);
		redirect('admin/vendor','refresh');
	}
}
