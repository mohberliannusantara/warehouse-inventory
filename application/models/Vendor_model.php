<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function get_total($id_rayon = NULL, $id_level = NULL)
  {
    if ($id_level != 1) {
      $this->db->where('pemilik_kendaraan.id_rayon', $id_rayon);
      $this->db->from('pemilik_kendaraan');
      return $this->db->count_all_results();;
    } else {
      return $this->db->count_all("pemilik_kendaraan");
    }
  }

  public function get_total_harga($id_rayon = NULL, $id_level = NULL)
  {
    if ($id_level != 1) {
      $query = $this->db->get_where('pemilik_kendaraan', array('id_rayon' => $id_rayon));
      return $query->row();
    } else {
      $query = $this->db->get('pemilik_kendaraan')->row();
      return $query->result();
    }
  }

  public function get_limit($id_rayon = NULL, $id_level = NULL)
  {
    if ($id_level != 1) {
      $this->db->where('pemilik_kendaraan.id_rayon', $id_rayon);
      $this->db->join('jenis_pemilik_kendaraan', 'pemilik_kendaraan.id_jenis_pemilik_kendaraan = jenis_pemilik_kendaraan.id_jenis_pemilik_kendaraan');
      $this->db->join('kondisi', 'pemilik_kendaraan.id_kondisi = kondisi.id_kondisi');
      $this->db->from('pemilik_kendaraan');

      $query = $this->db->get();
      return $query->result();
    } else {

      $this->db->join('jenis_pemilik_kendaraan', 'pemilik_kendaraan.id_jenis_pemilik_kendaraan = jenis_pemilik_kendaraan.id_jenis_pemilik_kendaraan');
      $this->db->join('kondisi', 'pemilik_kendaraan.id_kondisi = kondisi.id_kondisi');
      $this->db->from('pemilik_kendaraan');

      $query = $this->db->get();
      return $query->result();
    }
  }

  public function get()
  {
      $query = $this->db->get('pemilik_kendaraan');
      return $query->result();
  }

  public function get_by_rayon($id_rayon)
  {
    $this->db->order_by('pemilik_kendaraan.nama_pemilik_kendaraan', 'asc');
    $this->db->join('rayon', 'pemilik_kendaraan.id_rayon = rayon.id_rayon');
    $this->db->join('jenis_pemilik_kendaraan', 'pemilik_kendaraan.id_jenis_pemilik_kendaraan = jenis_pemilik_kendaraan.id_jenis_pemilik_kendaraan');
    $this->db->join('kondisi', 'pemilik_kendaraan.id_kondisi = kondisi.id_kondisi');
    $this->db->where('pemilik_kendaraan.id_rayon', $id_rayon);
    $this->db->from('pemilik_kendaraan');

    $query = $this->db->get();
    return $query->result();
  }

  public function get_all($id_rayon = NULL, $id_level = NULL)
  {
    if ($id_level != 1) {

      $this->db->where('pemilik_kendaraan.id_rayon', $id_rayon);
      $this->db->join('jenis_pemilik_kendaraan', 'pemilik_kendaraan.id_jenis_pemilik_kendaraan = jenis_pemilik_kendaraan.id_jenis_pemilik_kendaraan');
      $this->db->join('kondisi', 'pemilik_kendaraan.id_kondisi = kondisi.id_kondisi');
      $this->db->from('pemilik_kendaraan');

      $query = $this->db->get();
      return $query->result();
    } else {

      // $this->db->where('pemilik_kendaraan.id_rayon', $id_rayon);
      $this->db->join('jenis_pemilik_kendaraan', 'pemilik_kendaraan.id_jenis_pemilik_kendaraan = jenis_pemilik_kendaraan.id_jenis_pemilik_kendaraan');
      $this->db->join('kondisi', 'pemilik_kendaraan.id_kondisi = kondisi.id_kondisi');
      $this->db->from('pemilik_kendaraan');

      $query = $this->db->get();
      return $query->result();
    }
  }

  public function get_by_id($id)
  {
    // $this->db->where(array('pemilik_kendaraan.id_pemilik_kendaraan' => $id));
    // $query = $this->db->get('pemilik_kendaraan');
    // return $query->row();

    $query = $this->db->get_where('pemilik_kendaraan', array('id_pemilik_kendaraan' => $id));
    return $query->row();
  }

  public function create($data)
  {
    return $this->db->insert('pemilik_kendaraan', $data);
  }

  public function update($data,$id)
  {
    $this->db->where('id_pemilik_kendaraan', $id);
    return $this->db->update('pemilik_kendaraan', $data);
  }

  public function delete($id)
  {
    if ( !empty($id) ){
      $delete = $this->db->delete('pemilik_kendaraan', array('id_pemilik_kendaraan'=>$id) );
      return $delete ? true : false;
    } else {
      return false;
    }
  }
}


?>
