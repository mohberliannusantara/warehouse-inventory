<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function get_total($id_rayon = NULL, $id_level = NULL)
  {
    if ($id_level != 1) {
      $this->db->where('barang.id_rayon', $id_rayon);
      $this->db->from('barang');
      return $this->db->count_all_results();;
    } else {
      return $this->db->count_all("barang");
    }
  }

  public function get_total_harga($id_rayon = NULL, $id_level = NULL)
  {
    if ($id_level != 1) {
      $query = $this->db->get_where('barang', array('id_rayon' => $id_rayon));
      return $query->row();
    } else {
      $query = $this->db->get('barang')->row();
      return $query->result();
    }
  }

  public function get_limit($id_rayon = NULL, $id_level = NULL)
  {
    if ($id_level != 1) {
      $this->db->where('barang.id_rayon', $id_rayon);
      $this->db->join('jenis_barang', 'barang.id_jenis_barang = jenis_barang.id_jenis_barang');
      $this->db->join('kondisi', 'barang.id_kondisi = kondisi.id_kondisi');
      $this->db->from('barang');

      $query = $this->db->get();
      return $query->result();
    } else {

      $this->db->join('jenis_barang', 'barang.id_jenis_barang = jenis_barang.id_jenis_barang');
      $this->db->join('kondisi', 'barang.id_kondisi = kondisi.id_kondisi');
      $this->db->from('barang');

      $query = $this->db->get();
      return $query->result();
    }
  }

  public function get()
  {
      $this->db->order_by('barang.nama_barang', 'asc');
      $this->db->join('rayon', 'barang.id_rayon = rayon.id_rayon');
      $this->db->join('jenis_barang', 'barang.id_jenis_barang = jenis_barang.id_jenis_barang');
      $this->db->join('kondisi', 'barang.id_kondisi = kondisi.id_kondisi');
      $this->db->from('barang');

      $query = $this->db->get();
      return $query->result();
  }

  public function get_by_rayon($id_rayon)
  {
    $this->db->order_by('barang.nama_barang', 'asc');
    $this->db->join('rayon', 'barang.id_rayon = rayon.id_rayon');
    $this->db->join('jenis_barang', 'barang.id_jenis_barang = jenis_barang.id_jenis_barang');
    $this->db->join('kondisi', 'barang.id_kondisi = kondisi.id_kondisi');
    $this->db->where('barang.id_rayon', $id_rayon);
    $this->db->from('barang');

    $query = $this->db->get();
    return $query->result();
  }

  public function get_all($id_rayon = NULL, $id_level = NULL)
  {
    if ($id_level != 1) {

      $this->db->where('barang.id_rayon', $id_rayon);
      $this->db->join('jenis_barang', 'barang.id_jenis_barang = jenis_barang.id_jenis_barang');
      $this->db->join('kondisi', 'barang.id_kondisi = kondisi.id_kondisi');
      $this->db->from('barang');

      $query = $this->db->get();
      return $query->result();
    } else {

      // $this->db->where('barang.id_rayon', $id_rayon);
      $this->db->join('jenis_barang', 'barang.id_jenis_barang = jenis_barang.id_jenis_barang');
      $this->db->join('kondisi', 'barang.id_kondisi = kondisi.id_kondisi');
      $this->db->from('barang');

      $query = $this->db->get();
      return $query->result();
    }
  }

  public function get_by_id($id)
  {
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->join('rayon', 'barang.id_rayon = rayon.id_rayon');
    $this->db->join('jenis_barang', 'barang.id_jenis_barang = jenis_barang.id_jenis_barang');
    $this->db->join('kondisi', 'barang.id_kondisi = kondisi.id_kondisi');
    $this->db->where(array('barang.id_barang' => $id));

    $query = $this->db->get();
    return $query->row();
  }

  public function create($data)
  {
    return $this->db->insert('barang', $data);
  }

  public function update($data,$id)
  {
    $this->db->where('id_barang', $id);
    return $this->db->update('barang', $data);
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
