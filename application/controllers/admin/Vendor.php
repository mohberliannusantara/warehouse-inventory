<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
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
    // $data['barang'] = $this->vendor_model->get();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/vendor/index', $data);
    $this->load->view('admin/templates/footer');
  }

}
