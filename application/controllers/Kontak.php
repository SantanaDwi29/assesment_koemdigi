<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

    public function index()
    {
        $this->load->model('Artikel_model');
      $data['sidebar_artikel'] = $this->Artikel_model->get_all();
        $data['title']  = 'Hubungi Kami';
        
        $data['konten'] = $this->load->view('kontak', NULL, TRUE); 
        
        $this->load->view('dashboard', $data);

    }
}
