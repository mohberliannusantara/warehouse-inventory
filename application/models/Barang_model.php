<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  //fungsi mengambil semua data
  public function get_all()
  {
    if ( $limit ) {
      $this->db->limit($limit, $offset);
    }

    $this->db->order_by('blogs.post_date', 'DESC');

    // Inner Join dengan table Categories
    $this->db->join('categories', 'categories.cat_id = blogs.fk_cat_id');

    $query = $this->db->get('blogs');

    // Return dalam bentuk object
    return $query->result();

  }

  public function get_total()
  {
      return $this->db->count_all("barang");
  }

  //fungsi insert data
  public function create($data)
  {
    return $this->db->insert('blogs', $data);
  }

  //fungsi update data
  public function update($data, $id)
  {
    if ( !empty($data) && !empty($id) ) {
      $update = $this->db->update( 'blogs', $data, array('post_id'=>$id) );
      return $update ? true : false;
    } else {
      return false;
    }
  }

  //fungsi delete data
  public function delete($id)
  {
    if ( !empty($id) ){
      $delete = $this->db->delete('blogs', array('post_id'=>$id) );
      return $delete ? true : false;
    } else {
      return false;
    }
  }

  //fungsi mengambil data berdasarkan id
  public function get_by_id($id)
  {
    $query = $this->db->get_where('blogs', array('blogs.post_id' => $id));
    return $query->row();
  }

  //fungsi mengambil data berdasarkan slug/judul
  public function get_by_slug($slug)
  {
    // Inner Join dengan table Categories
    $this->db->select ('
    blogs.*,
    categories.cat_id as category_id,
    categories.cat_name,
    categories.cat_description,
    ');
    $this->db->join('categories', 'categories.cat_id = blogs.fk_cat_id');

    $query = $this->db->get_where('blogs', array('post_slug' => $slug));

    // Karena datanya cuma 1, kita return cukup via row() saja
    return $query->row();
  }

  //fungsi mengambil data berdasarkan catecory
  public function get_by_category($category_id)
  {
    $this->db->order_by('blogs.post_id', 'DESC');

    $this->db->join('categories', 'categories.cat_id = blogs.fk_cat_id');
    $query = $this->db->get_where('blogs', array('cat_id' => $category_id));

    return $query->result();
  }

}


?>
