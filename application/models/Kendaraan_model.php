<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function get()
  {
    // $this->db->select('barang.id_barang, barang.nama_barang as nama_barang, kondisi.nama_kondisi as kondisi, barang.harga');
    $this->db->order_by('kendaraan.id_kendaraan', 'DESC');
    $this->db->join('jenis_kendaraan', 'kendaraan.id_jenis_kendaraan = jenis_kendaraan.id_jenis_kendaraan');
    $this->db->join('kondisi', 'kendaraan.id_kondisi = kondisi.id_kondisi');
    $this->db->from('kendaraan');

    $query = $this->db->get();
    return $query->result();
  }

  public function get_total()
  {
    return $this->db->count_all("kendaraan");
  }


  public function get_total_harga()
  {
    $this->db->select_sum('harga');
    $query = $this->db->get('kendaraan')->row();
    return $query->harga;
  }
}


?>
