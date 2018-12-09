<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Rest_kendaraan extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->database();
	}

 //Menampilkan data jenis
	function index_get() {
		$id = $this->get('id_kendaraan');
		if ($id == '') {
			$this->db->order_by('kendaraan.tanggal', 'DESC');
			$this->db->join('jenis_kendaraan', 'kendaraan.id_jenis_kendaraan = jenis_kendaraan.id_jenis_kendaraan');
      $this->db->join('kondisi', 'kendaraan.id_kondisi = kondisi.id_kondisi');
			$this->db->join('rayon', 'kendaraan.id_rayon = rayon.id_rayon');
			$this->db->select('kendaraan.id_kendaraan, kendaraan.nama_kendaraan, kendaraan.plat, kendaraan.harga, kondisi.nama_kondisi, jenis_kendaraan.nama_jenis_kendaraan, rayon.nama_rayon, kendaraan.keterangan, kendaraan.tanggal, kendaraan.gambar');

			$kendaraan = $this->db->get('kendaraan')->result();
		} else {

			$this->db->order_by('kendaraan.tanggal', 'DESC');
			$this->db->where('id_kendaraan', $id);
			$this->db->join('jenis_kendaraan', 'kendaraan.id_jenis_kendaraan = jenis_kendaraan.id_jenis_kendaraan');
      $this->db->join('kondisi', 'kendaraan.id_kondisi = kondisi.id_kondisi');
			$this->db->join('rayon', 'kendaraan.id_rayon = rayon.id_rayon');
			$this->db->select('kendaraan.id_kendaraan, kendaraan.nama_kendaraan, kendaraan.plat, kendaraan.harga, kondisi.nama_kondisi, jenis_kendaraan.nama_jenis_kendaraan, rayon.nama_rayon, kendaraan.keterangan, kendaraan.tanggal, kendaraan.gambar');

			$kendaraan = $this->db->get('kendaraan')->result();
		}
		$this->response($kendaraan, 200);
	}

	//Mengirim atau menambah data kontak baru
	function index_post() {
		$data = array(
			'id_baranng' => $this->post('id'),
			'nama' => $this->post('nama'),
			'harga' => $this->post('harga')
		);
		$insert = $this->db->insert('jenis', $data);
		if ($insert) {
			//modif
			$result = $this->db->where('id',$this->db->insert_id())->get("jenis")->row(0);
			$this->response($result, 200);
			//asline
			//$this->response($data,200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

	//Memperbarui data kontak yang telah ada
	function index_put() {
		$id = $this->put('id');
		$data = array(
			'id' => $this->put('id'),
			'nama' => $this->put('nama'),
			'harga' => $this->put('harga')
		);
		$this->db->where('id', $id);
		$update = $this->db->update('jenis', $data);
		if ($update) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

	//Menghapus salah satu data kontak
	function index_delete() {
		$id = $this->delete('id');
		$this->db->where('id', $id);
		$delete = $this->db->delete('jenis');
		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

}
?>
