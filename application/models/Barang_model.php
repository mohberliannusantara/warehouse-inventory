<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function get_total()
  {
    return $this->db->count_all("barang");
  }

  public function get()
  {
    return $this->db->get('barang');
  }

  public function get_total_harga()
  {
    $this->db->select('SUM(harga) as total');
    $this->db->from('barang');
    return $this->db->get()->row()->total;
  }



}


?>
