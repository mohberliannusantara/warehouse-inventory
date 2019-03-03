<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
		$this->load->model('rayon_model');

    if (!$this->session->logged_in == TRUE) {
			redirect('welcome','refresh');
		}
		if ($this->session->id_level == 2 ) {
			redirect('beranda','refresh');
		}
  }

  function index()
  {
    $data['page'] = 'Laporan';
    $data['rayon'] = $this->rayon_model->get();
    
    $this->load->view('admin/templates/header', $data);
		$this->load->view('admin/laporan/index', $data);
		$this->load->view('admin/templates/footer');
  }

}
