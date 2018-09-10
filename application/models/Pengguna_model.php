<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function get_total()
  {
    return $this->db->count_all("admin");
  }

  public function get($limit = FALSE, $offset = FALSE)
  {
    if ( $limit ) {
      $this->db->limit($limit, $offset);
    }

    $this->db->order_by('admin.id_admin', 'ASC');
    $this->db->join('rayon', 'admin.id_rayon = rayon.id_rayon');
    $this->db->join('level', 'admin.id_level = level.id_level');
    $this->db->from('admin');

    $query = $this->db->get();
    return $query->result();
  }

  public function create($data)
  {
    return $this->db->insert('admin', $data);
  }

  public function get_by_id($id)
  {

    $this->db->select('*');
    $this->db->from('admin');
    $this->db->join('rayon', 'admin.id_rayon = rayon.id_rayon');
    $this->db->join('level', 'admin.id_level = level.id_level');
    $this->db->where(array('admin.id_admin' => $id));

    $query = $this->db->get();
    return $query->row();
  }

  public function delete($id)
  {
    if ( !empty($id) ){
      $delete = $this->db->delete('admin', array('id_admin'=>$id) );
      return $delete ? true : false;
    } else {
      return false;
    }
  }
}


?>
