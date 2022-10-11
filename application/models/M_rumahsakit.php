<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_rumahsakit extends CI_Model
{
  public function list()
  {
    $this->db->select('*');
    $this->db->from('tbl_rumahsakit');
    $this->db->order_by('nama_rumahsakit', 'asc');
    return $this->db->get()->result();
  }

  public function input($data)
  {
    $this->db->insert('tbl_rumahsakit', $data);
  }

  public function detail($id_rumahsakit)
  {
    $this->db->select('*');
    $this->db->from('tbl_rumahsakit');
    $this->db->where('id_rumahsakit', $id_rumahsakit);
    return $this->db->get()->row();
  }

  public function edit($data)
  {
    $this->db->where('id_rumahsakit', $data['id_rumahsakit']);
    $this->db->update('tbl_rumahsakit', $data);
  }

  public function delete($data)
  {
    $this->db->where('id_rumahsakit', $data['id_rumahsakit']);
    $this->db->delete('tbl_rumahsakit', $data);
  }
}

/* End of file M_rumahsakit.php */
