<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{

  public function login($username, $password)
  {
    $this->db->select('*');
    $this->db->from('tbl_user');
    $this->db->where([
      'username' => $username,
      'password' => $password
    ]);
    return $this->db->get()->row();
  }
}

/* End of file M_user.php */
