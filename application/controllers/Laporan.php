<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    $data['page'] = 'Laporan';

    $this->load->view('templates/header', $data);
		$this->load->view('laporan/index', $data);
		$this->load->view('templates/footer');
  }

}
