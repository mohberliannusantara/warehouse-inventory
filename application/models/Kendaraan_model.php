<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function get_total($id_rayon = NULL, $id_level = NULL)
  {
    if ($id_level != 1) {
      $this->db->where('kendaraan.id_rayon', $id_rayon);
      $this->db->from('kendaraan');
      return $this->db->count_all_results();;
    } else {
      return $this->db->count_all("kendaraan");
    }
  }

  public function get_total_harga($id_rayon = NULL, $id_level = NULL)
  {
    if ($id_level != 1) {
      $this->db->select_sum('harga');
      $query = $this->db->get_where('kendaraan', array('id_rayon' => $id_rayon));
      return $query->row()->harga;
    } else {
      $this->db->select_sum('harga');
      $query = $this->db->get('kendaraan')->row();
      return $query->harga;
    }
  }

  public function get_limit($id_rayon = NULL, $id_level = NULL)
  {
    if ($id_level != 1) {
      $this->db->order_by('kendaraan.tanggal', 'DESC');
      $this->db->limit(4);
      $this->db->where('kendaraan.id_rayon', $id_rayon);
      $this->db->join('jenis_kendaraan', 'kendaraan.id_jenis_kendaraan = jenis_kendaraan.id_jenis_kendaraan');
      $this->db->join('kondisi', 'kendaraan.id_kondisi = kondisi.id_kondisi');
      $this->db->from('kendaraan');

      $query = $this->db->get();
      return $query->result();
    } else {
      $this->db->order_by('kendaraan.tanggal', 'DESC');
      $this->db->limit(4);
      $this->db->join('jenis_kendaraan', 'kendaraan.id_jenis_kendaraan = jenis_kendaraan.id_jenis_kendaraan');
      $this->db->join('kondisi', 'kendaraan.id_kondisi = kondisi.id_kondisi');
      $this->db->from('kendaraan');

      $query = $this->db->get();
      return $query->result();
    }
  }

  public function get()
  {
      $this->db->order_by('kendaraan.nama_kendaraan', 'ASC');
      $this->db->join('rayon', 'kendaraan.id_rayon = rayon.id_rayon');
      $this->db->join('jenis_kendaraan', 'kendaraan.id_jenis_kendaraan = jenis_kendaraan.id_jenis_kendaraan');
      $this->db->join('pemilik_kendaraan', 'kendaraan.id_pemilik_kendaraan = pemilik_kendaraan.id_pemilik_kendaraan');
      $this->db->from('kendaraan');

      $query = $this->db->get();
      return $query->result();
  }

  public function get_all($id_rayon = NULL, $id_level = NULL)
  {
    if ($id_level != 1) {
      $this->db->order_by('kendaraan.tanggal', 'DESC');
      $this->db->where('kendaraan.id_rayon', $id_rayon);
      $this->db->join('jenis_kendaraan', 'kendaraan.id_jenis_kendaraan = jenis_kendaraan.id_jenis_kendaraan');
      $this->db->join('kondisi', 'kendaraan.id_kondisi = kondisi.id_kondisi');
      $this->db->from('kendaraan');

      $query = $this->db->get();
      return $query->result();
    } else {
      $this->db->order_by('kendaraan.tanggal', 'DESC');
      // $this->db->where('kendaraan.id_rayon', $id_rayon);
      $this->db->join('jenis_kendaraan', 'kendaraan.id_jenis_kendaraan = jenis_kendaraan.id_jenis_kendaraan');
      $this->db->join('kondisi', 'kendaraan.id_kondisi = kondisi.id_kondisi');
      $this->db->from('kendaraan');

      $query = $this->db->get();
      return $query->result();
    }
  }

  public function get_by_id($id)
  {
    $this->db->select('*');
    $this->db->from('kendaraan');
    $this->db->join('jenis_kendaraan', 'kendaraan.id_jenis_kendaraan = jenis_kendaraan.id_jenis_kendaraan');
    $this->db->join('kondisi', 'kendaraan.id_kondisi = kondisi.id_kondisi');
    $this->db->where(array('kendaraan.id_kendaraan' => $id));

    $query = $this->db->get();
    return $query->row();
  }

  public function create($data)
  {
    return $this->db->insert('kendaraan', $data);
  }

  public function update($data,$id)
  {
    $this->db->where('id_kendaraan', $id);
    return $this->db->update('kendaraan', $data);
  }

  public function delete($id)
  {
    if ( !empty($id) ){
      $delete = $this->db->delete('kendaraan', array('id_kendaraan'=>$id) );
      return $delete ? true : false;
    } else {
      return false;
    }
  }
}


?>
