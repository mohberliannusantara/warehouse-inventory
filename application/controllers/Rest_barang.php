<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Rest_barang extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->database();
	}

 //Menampilkan data jenis
	function index_get() {
		$id = $this->get('id_barang');
		if ($id == '') {
			$this->db->order_by('barang.tanggal', 'DESC');
			$this->db->join('rayon', 'barang.id_rayon = rayon.id_rayon');
      $this->db->join('jenis_barang', 'barang.id_jenis_barang = jenis_barang.id_jenis_barang');
      $this->db->join('kondisi', 'barang.id_kondisi = kondisi.id_kondisi');
			$this->db->select('barang.id_barang, barang.nama_barang, barang.harga, jenis_barang.nama_jenis_barang, kondisi.nama_kondisi, barang.keterangan, barang.gambar, rayon.nama_rayon, barang.tanggal');

      $barang = $this->db->get('barang')->result();
		} else {
			$this->db->order_by('barang.tanggal', 'DESC');
			$this->db->where('id_barang', $id);
			$this->db->join('rayon', 'barang.id_rayon = rayon.id_rayon');
      $this->db->join('jenis_barang', 'barang.id_jenis_barang = jenis_barang.id_jenis_barang');
      $this->db->join('kondisi', 'barang.id_kondisi = kondisi.id_kondisi');
			$this->db->select('barang.id_barang, barang.nama_barang, barang.harga, jenis_barang.nama_jenis_barang, kondisi.nama_kondisi, barang.keterangan, barang.gambar, rayon.nama_rayon, barang.tanggal');

			$barang = $this->db->get('barang')->result();
		}
		$this->response($barang, 200);
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
