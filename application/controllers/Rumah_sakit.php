<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Rumah_sakit extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_rumahsakit');
  }

  public function index()
  {
    $data = [
      'title' => 'Rumah Sakit',
      'map' => $this->googlemaps->create_map(),
      'rumahsakit' => $this->m_rumahsakit->list(),
      'isi' => 'rumahsakit/list'
    ];
    $this->load->view('template/wrapper', $data);
  }

  public function tambah()
  {
    $this->user_login->cek_login();
    $config['center'] = '-6.2428514,106.626481';
    $config['zoom'] = 15;
    $this->googlemaps->initialize($config);

    $marker['position'] = '-6.2428514,106.626481';
    $marker['draggable'] = true;
    $marker['ondragend'] = 'setToForm(event.latLng.lat(), event.latLng.lng())';
    $this->googlemaps->add_marker($marker);

    $this->form_validation->set_rules('nama_rumahsakit', 'Nama Rumah Sakit', 'required');
    $this->form_validation->set_rules('no_telp', 'No. Telepon', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('latitude', 'Latitude', 'required');
    $this->form_validation->set_rules('longitude', 'Longitude', 'required');
    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

    if ($this->form_validation->run() == false) {
      $data = [
        'title' => 'Tambah Rumah Sakit',
        'map' => $this->googlemaps->create_map(),
        'isi' => 'rumahsakit/add'
      ];
      $this->load->view('template/wrapper', $data);
    } else {
      $data = [
        'nama_rumahsakit' => $this->input->post('nama_rumahsakit'),
        'no_telp' => $this->input->post('no_telp'),
        'alamat' => $this->input->post('alamat'),
        'latitude' => $this->input->post('latitude'),
        'longitude' => $this->input->post('longitude'),
        'deskripsi' => $this->input->post('deskripsi')
      ];
      $this->m_rumahsakit->input($data);
      $this->session->set_flashdata('sukses', 'Data berhasil disimpan');
      redirect('rumah_sakit');
    }
  }

  public function edit($id_rumahsakit)
  {
    $this->user_login->cek_login();
    $config['center'] = '-6.2428514,106.626481';
    $config['zoom'] = 15;
    $this->googlemaps->initialize($config);

    $marker['position'] = '-6.2428514,106.626481';
    $marker['draggable'] = true;
    $marker['ondragend'] = 'setToForm(event.latLng.lat(), event.latLng.lng())';
    $this->googlemaps->add_marker($marker);

    $this->form_validation->set_rules('nama_rumahsakit', 'Nama Rumah Sakit', 'required');
    $this->form_validation->set_rules('no_telp', 'No. Telepon', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('latitude', 'Latitude', 'required');
    $this->form_validation->set_rules('longitude', 'Longitude', 'required');
    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

    if ($this->form_validation->run() == false) {
      $data = [
        'title' => 'Edit Rumah Sakit',
        'map' => $this->googlemaps->create_map(),
        'rs' => $this->m_rumahsakit->detail($id_rumahsakit),
        'isi' => 'rumahsakit/edit'
      ];
      $this->load->view('template/wrapper', $data);
    } else {
      $data = [
        'id_rumahsakit' => $id_rumahsakit,
        'nama_rumahsakit' => $this->input->post('nama_rumahsakit'),
        'no_telp' => $this->input->post('no_telp'),
        'alamat' => $this->input->post('alamat'),
        'latitude' => $this->input->post('latitude'),
        'longitude' => $this->input->post('longitude'),
        'deskripsi' => $this->input->post('deskripsi')
      ];
      $this->m_rumahsakit->edit($data);
      $this->session->set_flashdata('sukses', 'Data berhasil disimpan');
      redirect('rumah_sakit');
    }
  }

  public function delete($id_rumahsakit)
  {
    $this->user_login->cek_login();
    $data = [
      'id_rumahsakit' => $id_rumahsakit
    ];
    $this->m_rumahsakit->delete($data);
    $this->session->set_flashdata('sukses', 'Data berhasil dihapus');
    redirect('rumah_sakit');
  }
}

/* End of file Home.php */
