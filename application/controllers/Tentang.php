<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    private function _load_page($title, $view_name)
    {
        $data['title'] = $title;

        // Memuat data untuk sidebar (cara manual)
        $this->load->model('Artikel_model');
        $data['sidebar_artikel'] = $this->Artikel_model->get_all();

        // Memuat konten halaman
        $data['konten'] = $this->load->view('tentang/' . $view_name, $data, TRUE);
        
        // Memuat template utama
        $this->load->view('dashboard', $data);
    }

    public function profile()
    {
        $this->_load_page('Profil Perusahaan', 'halaman_profile');
    }

    public function pengalaman()
    {
        $this->_load_page('Pengalaman Perusahaan', 'halaman_pengalaman');
    }

    public function kelebihan()
    {
        $this->_load_page('Kelebihan Kami', 'halaman_kelebihan');
    }
}