<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
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

    $this->load->view('admin/templates/header', $data);
		$this->load->view('admin/laporan/index', $data);
		$this->load->view('admin/templates/footer');
  }

}
