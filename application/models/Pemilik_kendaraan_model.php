<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilik_kendaraan_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function get()
  {
    $query = $this->db->get('pemilik_kendaraan');
    return $query->result();
  }
}


?>
