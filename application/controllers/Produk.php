

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(['session', 'form_validation', 'upload']);
        $this->load->helper('url');
        $this->load->model(['Produk_model', 'Artikel_model']);
    }

    // Fungsi untuk menampilkan halaman publik 
    public function index()
    {
        $data['title'] = 'Menu Pilihan Kami';
        $all_produk = $this->Produk_model->get_all();
        $this->load->model('Artikel_model');


        $produk_by_kategori = [];
        if (!empty($all_produk)) { // Tambahkan pengecekan jika produk kosong
            foreach ($all_produk as $produk) {
                if ($produk->status == 'Tersedia') {
                    $produk_by_kategori[$produk->kategori][] = $produk;
                }
            }
        }
        $data['produk_by_kategori'] = $produk_by_kategori;

        $data['konten'] = $this->load->view('produk', $data, TRUE);
        $this->load->view('dashboard', $data);
    }

    // ==========================================================
    // AREA ADMIN
    // ==========================================================

    public function manajemen()
    {


        if ($this->session->userdata('Level') != 'admin') {
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses!');
            redirect('auth');
        }

        $data['title'] = 'Manajemen Produk';
        $data['sidebar_artikel'] = $this->Artikel_model->get_all();

        $data['all_produk'] = $this->Produk_model->get_all();
        // --- INI ADALAH PROSES DEBUGGING DENGAN 'PRINT DEBUGGING' ---
        // echo "<pre>";
        // var_dump($data['all_produk']);
        // echo "</pre>";
        // die(); 

        $data['konten'] = $this->load->view('admin/list_produk', $data, TRUE);
        $this->load->view('dashboard', $data);
    }


    public function tambah()
    {
        if ($this->session->userdata('Level') != 'admin') {
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses!');
            redirect('auth');
        }

        $data['title'] = 'Tambah Produk Baru';
        $data['konten'] = $this->load->view('admin/manajemenProduk', NULL, TRUE);
        $this->load->view('dashboard', $data);
    }


    public function simpan()
    {
        if ($this->session->userdata('Level') != 'admin') {
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses!');
            redirect('auth');
        }

        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|trim');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            // --- DEBUG #1: Cek apakah validasi gagal dan apa errornya ---
            // Hapus komentar die() di bawah ini untuk melihat apakah proses berhenti di sini.
            // die("Validasi Gagal: " . validation_errors());

            $this->session->set_flashdata('error', validation_errors());
            redirect('produk/tambah');
        } else {
            // --- DEBUG #2: Cek data POST dan FILES yang diterima server ---
            // Hapus komentar echo dan die() di bawah ini untuk melihat semua data dari form.
            /*
        echo "Validasi Lolos. <br>";
        echo "DATA POST:<pre>";
        var_dump($this->input->post());
        echo "</pre>";
        echo "DATA FILES:<pre>";
        var_dump($_FILES);
        echo "</pre>";
        die("Proses dihentikan untuk debugging.");
        */

            $config['upload_path']   = './assets/img/produk/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = 3048; // 3MB
            $config['encrypt_name']  = TRUE;

            $this->upload->initialize($config);


            if (!empty($_FILES['gambar']['name'])) {
                if ($this->upload->do_upload('gambar')) {
                    $upload_data = $this->upload->data();
                    $gambar_Produk1 = $upload_data['file_name'];
                } else {
                    // --- DEBUG #3: Tampilkan error spesifik dari proses upload ---
                    // Kode ini sudah benar, pastikan Anda menampilkan flashdata 'error' di view.

                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('produk/tambah');
                    return; // Hentikan eksekusi
                }
            } else {
                $gambar_Produk1 = 'default.jpg';
            }

            $data = [
                'nama_produk' => $this->input->post('nama_produk', TRUE),
                'kategori'    => $this->input->post('kategori', TRUE),
                'harga'       => $this->input->post('harga', TRUE),
                'deskripsi'   => $this->input->post('deskripsi', TRUE),
                'status'      => $this->input->post('status', TRUE),
                'gambar'      => $gambar_Produk1
            ];

            // --- DEBUG #4: Cek data final sebelum dimasukkan ke database ---
            // Hapus komentar echo dan die() di bawah ini untuk melihat data yang akan disimpan.

            // echo "Data Siap Disimpan:<pre>";
            // var_dump($data);
            // echo "</pre>";
            // die("Proses dihentikan sebelum insert ke database.");


            $this->Produk_model->insert($data);
            $this->session->set_flashdata('success', 'Produk berhasil ditambahkan!');

            // Saran: Arahkan ke halaman manajemen untuk melihat hasilnya langsung
            redirect('produk/manajemen');
        }
    }
    public function edit($id = null)
    {
        if ($this->session->userdata('Level') != 'admin') {
            redirect('auth');
        }

        $data['title'] = 'Edit Produk';
        $data['produk'] = $this->Produk_model->get_by_id($id);
        if (!$data['produk']) {
            show_404();
        }

        $data['konten'] = $this->load->view('admin/edit_produk', $data, TRUE);
        $this->load->view('dashboard', $data);
    }

    public function proses_update()
    {
        if ($this->session->userdata('Level') != 'admin') {
            redirect('auth');
        }

        $id = $this->input->post('id_produk');

        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('produk/edit/' . $id);
        } else {
            $data = [
                'nama_produk' => $this->input->post('nama_produk'),
                'kategori'    => $this->input->post('kategori'),
                'harga'       => $this->input->post('harga'),
                'deskripsi'   => $this->input->post('deskripsi'),
                'status'      => $this->input->post('status')
            ];

            if (!empty($_FILES["gambar"]["name"])) {
                $config['upload_path']   = './assets/img/produk/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = 2048;
                $config['encrypt_name']  = TRUE;
                $this->upload->initialize($config);

                if ($this->upload->do_upload('gambar')) {
                    $data['gambar'] = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('produk/edit/' . $id);
                    return;
                }
            }

            $this->Produk_model->update($data, $id);
            $this->session->set_flashdata('success', 'Produk berhasil diupdate!');
            redirect('produk/manajemen');
        }
    }

    /**
     * Menghapus data produk.
     */
    public function hapus($id = null)
    {
        if ($this->session->userdata('Level') != 'admin') {
            redirect('auth');
        }

        if ($this->Produk_model->delete($id)) {
            $this->session->set_flashdata('success', 'Produk berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus produk!');
        }
        redirect('produk/manajemen');
    }
}
