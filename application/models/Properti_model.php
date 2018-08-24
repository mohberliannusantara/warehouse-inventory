<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Properti_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function get_total()
  {
    return $this->db->count_all("properti");
  }

  public function get()
  {
    $query = $this->db->get('properti');
    return $query->result();
  }

  public function get_total_harga()
  {
    $this->db->select_sum('harga');
    $query = $this->db->get('properti')->row();
    return $query->harga;
  }
}


?>
