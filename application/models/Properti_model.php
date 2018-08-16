<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Property_model extends CI_Model
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
    return $this->db->get('properti');
  }
}


?>
