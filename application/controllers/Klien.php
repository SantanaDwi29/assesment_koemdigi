<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klien extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model(['Klien_Model', 'AuthModel','Artikel_model']);
    }

    public function index()
    {
        $data['title'] = 'Klien Kami';
		$data['sidebar_artikel'] = $this->Artikel_model->get_all();
        $data['klien_list'] = $this->Klien_Model->get_all_clients();

        $user_id = $this->session->userdata('idUser');
        if ($user_id) {
            // DIUBAH: Gunakan AuthModel
            $data['user_status'] = $this->AuthModel->get_by_id($user_id);
        } else {
            $data['user_status'] = null;
        }
        
        $data['konten'] = $this->load->view('halaman_klien', $data, TRUE);
        $this->load->view('dashboard', $data);
    }

    /** logika untuk menambahkan diri sebagai klien
    * hanya bisa diakses oleh user yang sudah login
     dan bukan admin */
    public function tambah_diri()
    {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('Level') == 'admin') {
            redirect('klien');
        }

        $user_id = $this->session->userdata('idUser');
        $data_update = ['is_client' => 1];

        // DIUBAH: Gunakan nama tabel yang benar 'db_user'
        $this->db->update('db_user', $data_update, ['idUser' => $user_id]);

        $this->session->set_flashdata('success', 'Terima kasih! Anda berhasil ditambahkan ke daftar klien kami.');
        redirect('klien');
    }
}