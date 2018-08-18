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

    $this->db->join('kondisi', 'kondisi.id_kondisi = barang.id_kondisi');

    $this->db->join('jenis_barang', 'jenis_barang.id_jenis_barang = barang.id_jenis_barang');

    $query = $this->db->get('barang');

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

}


?>
