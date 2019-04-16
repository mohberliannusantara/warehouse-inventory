<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kondisi_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function get()
  {
    $query = $this->db->get('kondisi');
    return $query->result();
  }
}


?>
