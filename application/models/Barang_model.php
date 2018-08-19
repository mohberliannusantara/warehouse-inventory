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
    $this->db->order_by('barang.id_barang', 'DESC');
    $this->db->join('jenis_barang', 'barang.id_jenis_barang = jenis_barang.id_jenis_barang');
    $this->db->join('kondisi', 'barang.id_kondisi = kondisi.id_kondisi');
    $this->db->from('barang');

    $query = $this->db->get();
    return $query->result();
  }

  public function create($data)
  {
    return $this->db->insert('barang', $data);
  }

  public function get_by_id($id)
  {
    $query = $this->db->get_where('barang', array('barang.id_barang' => $id));
    return $query->row();
  }

  public function delete($id)
  {
      if ( !empty($id) ){
          $delete = $this->db->delete('barang', array('id_barang'=>$id) );
          return $delete ? true : false;
      } else {
          return false;
      }
  }
}


?>
