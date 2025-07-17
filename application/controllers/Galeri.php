<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Galeri_model');
        $this->load->model('Artikel_model');
        $this->load->library(['session', 'form_validation', 'upload']);
        $this->load->helper('url');
    }

    // Menampilkan halaman galeri publik
    public function index() {
        $data['title'] = 'Galeri Momen Spesial';
        $data['sidebar_artikel'] = $this->Artikel_model->get_all();
        $data['events'] = $this->Galeri_model->get_all_events(); // Ambil semua event
        $data['konten'] = $this->load->view('galeri_list', $data, TRUE);
        $this->load->view('dashboard', $data);
    }

    // Menampilkan halaman manajemen galeri untuk level admin
    public function manajemen() {
        if ($this->session->userdata('Level') != 'admin') redirect('auth');
        
        $data['title'] = 'Manajemen Galeri';
        $data['sidebar_artikel'] = $this->Artikel_model->get_all();
        $data['events'] = $this->Galeri_model->get_all_events();
        $data['konten'] = $this->load->view('admin/galeri/list_admin', $data, TRUE);
        $this->load->view('dashboard', $data);
    }

    public function tambah() {
        if ($this->session->userdata('Level') != 'admin') redirect('auth');
        
        $data['title'] = 'Tambah Event Galeri Baru';
        $data['sidebar_artikel'] = $this->Artikel_model->get_all();
        $data['konten'] = $this->load->view('admin/galeri/form_tambah', $data, TRUE);
        $this->load->view('dashboard', $data);
    }

    public function simpan() {
        if ($this->session->userdata('Level') != 'admin') redirect('auth');

        // Simpan data event dulu
        $event_data = [
            'nama_event' => $this->input->post('nama_event'),
            'tanggal_event' => $this->input->post('tanggal_event'),
            'deskripsi_event' => $this->input->post('deskripsi_event'),
        ];
        $id_event_baru = $this->Galeri_model->insert_event($event_data);

        $config['upload_path']   = './assets/img/galeri/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = 5120; 
        $config['encrypt_name']  = TRUE;
        $this->upload->initialize($config);

        $files = $_FILES['fotos'];
        $uploaded_photos = [];

        // Loop untuk setiap file yang diupload
        foreach ($files['name'] as $key => $image) {
            $_FILES['foto']['name']     = $files['name'][$key];
            $_FILES['foto']['type']     = $files['type'][$key];
            $_FILES['foto']['tmp_name'] = $files['tmp_name'][$key];
            $_FILES['foto']['error']    = $files['error'][$key];
            $_FILES['foto']['size']     = $files['size'][$key];

            if ($this->upload->do_upload('foto')) {
                $upload_data = $this->upload->data();
                $uploaded_photos[] = [
                    'id_event' => $id_event_baru,
                    'nama_file' => $upload_data['file_name']
                ];
            }
        }

        // Simpan data foto ke database
        if (!empty($uploaded_photos)) {
            $this->Galeri_model->insert_photos($uploaded_photos);
        }

        $this->session->set_flashdata('success', 'Event galeri berhasil ditambahkan!');
        redirect('galeri/manajemen');
    }

    /**
     * Menampilkan form edit event galeri.
     */
    public function edit($id) {
        if ($this->session->userdata('Level') != 'admin') redirect('auth');

        $data['title'] = 'Edit Event Galeri';
        $data['sidebar_artikel'] = $this->Artikel_model->get_all();
        $data['event'] = $this->Galeri_model->get_event_by_id($id);
        if (!$data['event']) show_404();

        $data['konten'] = $this->load->view('admin/galeri/form_edit', $data, TRUE);
        $this->load->view('dashboard', $data);
    }

    /**
     * Memproses update untuk DETAIL event (nama, tanggal, deskripsi).
     */
    public function proses_update() {
        if ($this->session->userdata('Level') != 'admin') redirect('auth');

        $id_event = $this->input->post('id_event');
        $data = [
            'nama_event' => $this->input->post('nama_event'),
            'tanggal_event' => $this->input->post('tanggal_event'),
            'deskripsi_event' => $this->input->post('deskripsi_event'),
        ];

        $this->Galeri_model->update_event($data, $id_event);
        $this->session->set_flashdata('success', 'Detail event berhasil diupdate!');
        redirect('galeri/edit/' . $id_event);
    }

    /**
     * Memproses penambahan foto baru ke event yang sudah ada.
     */
    public function tambah_foto() {
        if ($this->session->userdata('Level') != 'admin') redirect('auth');

        $id_event = $this->input->post('id_event');
        $config['upload_path']   = './assets/img/galeri/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = 5120; // 5MB
        $config['encrypt_name']  = TRUE;
        $this->upload->initialize($config);

        $files = $_FILES['fotos'];
        $uploaded_photos = [];

        foreach ($files['name'] as $key => $image) {
            $_FILES['foto']['name']     = $files['name'][$key];
            $_FILES['foto']['type']     = $files['type'][$key];
            $_FILES['foto']['tmp_name'] = $files['tmp_name'][$key];
            $_FILES['foto']['error']    = $files['error'][$key];
            $_FILES['foto']['size']     = $files['size'][$key];

            if ($this->upload->do_upload('foto')) {
                $uploaded_photos[] = [
                    'id_event' => $id_event,
                    'nama_file' => $this->upload->data('file_name')
                ];
            }
        }

        if (!empty($uploaded_photos)) {
            $this->Galeri_model->insert_photos($uploaded_photos);
            $this->session->set_flashdata('success', 'Foto baru berhasil ditambahkan!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan foto baru.');
        }
        redirect('galeri/edit/' . $id_event);
    }

    /**
     * Menghapus SATU foto dari sebuah event.
     */
    public function hapus_foto($id_foto, $id_event) {
        if ($this->session->userdata('Level') != 'admin') redirect('auth');
        
        $this->Galeri_model->delete_photo($id_foto);
        $this->session->set_flashdata('success', 'Satu foto berhasil dihapus!');
        redirect('galeri/edit/' . $id_event);
    }
    
    public function hapus($id) {
        if ($this->session->userdata('Level') != 'admin') redirect('auth');
        
        $this->Galeri_model->delete_event($id);
        $this->session->set_flashdata('success', 'Event berhasil dihapus!');
        redirect('galeri/manajemen');
    }

}