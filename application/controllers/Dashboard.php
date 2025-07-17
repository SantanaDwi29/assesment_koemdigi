<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model(['AuthModel', 'Produk_model', 'Artikel_model']);
    }

    /**
     * Fungsi index() ini adalah gerbang utama.
     * Untuk memeriksa status login dan menampilkan view yang sesuai.
     */
    public function index()
    {
        if ($this->session->userdata('logged_in')) {
            $this->show_user_dashboard();
        } else {
            $this->show_public_page();
        }
    }

    /**
     * Fungsi ini KHUSUS untuk menampilkan konten bagi pengguna yang SUDAH LOGIN.
     * Dipanggil dari index() jika sesi ditemukan.
     */
    private function show_user_dashboard()
    {
        $data['title'] = 'Dashboard';
        
        $data['sidebar_artikel'] = $this->Artikel_model->get_all();

        // Memeriksa level pengguna untuk memuat konten yang benar (admin atau user)
        if (strtolower($this->session->userdata('Level')) == 'admin') {
            
            $data['total_pengguna'] = $this->AuthModel->count_all();
            $data['total_produk'] = $this->Produk_model->count_all();
            $data['total_artikel'] = $this->Artikel_model->count_all();
            
            $data['konten'] = $this->load->view('admin/admin_dashboard_konten', $data, TRUE);

        } else {
            $data['konten'] = $this->load->view('user/user_dashboard_konten', NULL, TRUE);
        }
        
        $this->load->view('dashboard', $data);
    }

    /**
     * Fungsi ini KHUSUS untuk menampilkan halaman publik bagi pengunjung yang BELUM LOGIN.
     * Dipanggil dari index() jika sesi tidak ditemukan.
     */
    private function show_public_page()
    {
        $data['title'] = 'Selamat Datang di Insom Coffee';

        $data['sidebar_artikel'] = $this->Artikel_model->get_all();

        $data['konten'] = null;

        $this->load->view('dashboard', $data);
    }
}