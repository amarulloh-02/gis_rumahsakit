<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

  public function index()
  {
    $this->user_login->cek_login();
    $data = [
      'title' => 'User',
      'map' => $this->googlemaps->create_map(),
      'isi' => 'user/list'
    ];
    $this->load->view('template/wrapper', $data);
  }

  public function login()
  {
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() == true) {
      $username = $this->input->post('username');
      $password = md5($this->input->post('password'));
      $this->user_login->login($username, $password);
    }
    $data = [
      'title' => 'Login',
      'map' => $this->googlemaps->create_map(),
      'isi' => 'login'
    ];
    $this->load->view('template/wrapper', $data);
  }

  public function logout()
  {
    $this->user_login->logout();
  }
}

/* End of file Home.php */
