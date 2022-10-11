<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_rumahsakit');
  }

  public function index()
  {
    $config['center'] = '-6.2428514,106.626481';
    $config['zoom'] = 15;
    $this->googlemaps->initialize($config);

    $rs = $this->m_rumahsakit->list();
    foreach ($rs as $key => $value) {
      $marker = [];
      $marker['position'] = "$value->latitude, $value->longitude";
      $marker['animation'] = "DROP";
      $marker['icon'] = base_url('icon/icon.png');
      $marker['infowindow_content'] = '<div class="media" style="width:250px;">';
      $marker['infowindow_content'] .= '<div class="media-body">';
      $marker['infowindow_content'] .= '<h5>Rumah Sakit : ' . $value->nama_rumahsakit . '</h5>';
      $marker['infowindow_content'] .= '<p>No.Telp : ' . $value->no_telp . '</p>';
      $marker['infowindow_content'] .= '<p>Alamat : ' . $value->alamat . '</p>';
      $marker['infowindow_content'] .= '<p>Deskripsi : ' . $value->deskripsi . '</p>';
      $marker['infowindow_content'] .= '</div>';
      $marker['infowindow_content'] .= '</div>';
      $this->googlemaps->add_marker($marker);
    }

    $data = [
      'title' => 'Home',
      'map' => $this->googlemaps->create_map(),
      'isi' => 'home'
    ];
    $this->load->view('template/wrapper', $data);
  }
}

/* End of file Home.php */
