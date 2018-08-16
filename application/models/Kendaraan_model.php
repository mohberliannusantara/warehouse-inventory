<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function get_total()
  {
    return $this->db->count_all("kendaraan");
  }

  public function get()
  {
    return $this->db->get('kendaraan');
  }
}


?>
