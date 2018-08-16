<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rayon_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function get_all()
  {
    $query = $this->db->get('rayon');

    return $query->result();

  }
}


?>
