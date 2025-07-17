<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library(['session', 'form_validation', 'upload']);
        $this->load->helper(['url', 'text']); 
        $this->load->model('Artikel_model');
    }

    // ==========================================================
    // AREA PUBLIK (Untuk Pengunjung)
    // ==========================================================

    public function index()
    {
        
        $data['title'] = 'Artikel & Berita';
        $data['artikel_list'] = $this->Artikel_model->get_all();
        
        $data['konten'] = $this->load->view('artikel/list_artikel', $data, TRUE);
        
        $this->load->view('dashboard', $data);

    }


    public function baca($slug = null)
    {
        if (!$slug) {
            redirect('artikel');
        }
        
        $artikel = $this->Artikel_model->get_by_slug($slug);
        if (!$artikel) {
            show_404(); 
        }
            $data['sidebar_artikel'] = $this->Artikel_model->get_all();

        $data['title'] = $artikel->judul;
        $data['artikel'] = $artikel;
        $data['konten'] = $this->load->view('artikel/detail_artikel', $data, TRUE);
        $this->load->view('dashboard', $data);
    }

    // ==========================================================
    // AREA ADMIN
    // ==========================================================
    

    public function manajemen()
    {
        if ($this->session->userdata('Level') != 'admin') {
            redirect('auth');
        }

        $data['title'] = 'Manajemen Artikel';
            $data['sidebar_artikel'] = $this->Artikel_model->get_all();

        $data['all_artikel'] = $this->Artikel_model->get_all();
        $data['konten'] = $this->load->view('artikel/list_artikel', $data, TRUE);
        $this->load->view('dashboard', $data);
    }


    public function tambah()
    {
        if ($this->session->userdata('Level') != 'admin') {
            redirect('auth');
        }

        $data['title'] = 'Tambah Artikel Baru';
        $data['konten'] = $this->load->view('artikel/tambah_artikel', NULL, TRUE);
        $this->load->view('dashboard', $data);
    }


    public function simpan()
    {
        if ($this->session->userdata('Level') != 'admin') {
            redirect('auth');
        }

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('isi', 'Isi Artikel', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('artikel/tambah');
        } else {
            $judul = $this->input->post('judul', TRUE);
            $slug = url_title($judul, 'dash', TRUE); // Membuat slug dari judul

            $data = [
                'judul' => $judul,
                'slug' => $slug,
                'isi' => $this->input->post('isi'),
                'penulis' => $this->input->post('penulis', TRUE),
                'gambar' => 'default.jpg'
            ];

            // Proses upload gambar
            if (!empty($_FILES["gambar"]["name"])) {
                $config['upload_path']   = './assets/img/artikel/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = 2048;
                $config['encrypt_name']  = TRUE;
                $this->upload->initialize($config);

                if ($this->upload->do_upload('gambar')) {
                    $data['gambar'] = $this->upload->data('file_name');
                }
            }

            $this->Artikel_model->insert($data);
            $this->session->set_flashdata('success', 'Artikel berhasil ditambahkan!');
            redirect('artikel/manajemen');
        }
    }

  
    public function edit($id = null)
    {
        if ($this->session->userdata('Level') != 'admin') redirect('auth');

        $data['title'] = 'Edit Artikel';
        $data['artikel'] = $this->Artikel_model->get_by_id($id);
        if (!$data['artikel']) show_404();

        $data['konten'] = $this->load->view('artikel/edit_artikel', $data, TRUE);
        $this->load->view('dashboard', $data);
    }

 
    public function proses_update()
    {
        if ($this->session->userdata('Level') != 'admin') redirect('auth');

        $id = $this->input->post('id_artikel');
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('isi', 'Isi Artikel', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect('artikel/edit/' . $id);
        } else {
            $judul = $this->input->post('judul', TRUE);
            $slug = url_title($judul, 'dash', TRUE);

            $data = [
                'judul' => $judul,
                'slug' => $slug,
                'isi' => $this->input->post('isi'),
                'penulis' => $this->input->post('penulis', TRUE)
            ];

            if (!empty($_FILES["gambar"]["name"])) {
                $config['upload_path']   = './assets/img/artikel/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = 2048;
                $config['encrypt_name']  = TRUE;
                $this->upload->initialize($config);

                if ($this->upload->do_upload('gambar')) {
                    $data['gambar'] = $this->upload->data('file_name');
                }
            }

            $this->Artikel_model->update($data, $id);
            $this->session->set_flashdata('success', 'Artikel berhasil diupdate!');
            redirect('artikel/manajemen');
        }
    }


    public function hapus($id = null)
    {
        if ($this->session->userdata('Level') != 'admin') redirect('auth');

        $this->Artikel_model->delete($id);
        $this->session->set_flashdata('success', 'Artikel berhasil dihapus!');
        redirect('artikel/manajemen');
    }
}