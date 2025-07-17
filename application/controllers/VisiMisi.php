<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VisiMisi extends CI_Controller {

    public function index()
    {
          $this->load->model('Artikel_model');
        $data['sidebar_artikel'] = $this->Artikel_model->get_all();
        $data['title']  = '';
        
        $data['konten'] = $this->load->view('visi&misi', NULL, TRUE); 
        
        $this->load->view('dashboard', $data);
        

    }
}
