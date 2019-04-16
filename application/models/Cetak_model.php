<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function view($table=NULL, $id_rayon = NULL, $id_level = NULL)
  {
    $query = $this->db->get($value);
    return $query->result();
  }
}
