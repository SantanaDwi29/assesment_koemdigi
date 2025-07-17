<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('AuthModel');
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function register()
    {
        $this->load->view('register');
    }

    public function process_register()
    {
        $this->form_validation->set_rules('NamaLengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('Username', 'Username', 'required|min_length[5]|is_unique[db_user.Username]');
        $this->form_validation->set_rules('Password', 'Password', 'required|min_length[5 ]');
        $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[Password]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('auth/register');
        } else {
            $data = array(
                'NamaLengkap' => $this->input->post('NamaLengkap'),
                'Username'    => $this->input->post('Username'),
                'Password'    => password_hash($this->input->post('Password'), PASSWORD_DEFAULT), //untuk melakukan hashing password
                'Level'       => 'user',
            );


            $this->AuthModel->register_user($data);

            $this->session->set_flashdata('success', 'Registrasi berhasil! Silakan login.');
            redirect('auth');
        }
    }

    public function process_login()
    {
        $this->form_validation->set_rules('Username', 'Username', 'required');
        $this->form_validation->set_rules('Password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('auth');
        } else {
            $username = $this->input->post('Username');
            $password = $this->input->post('Password');

            $user = $this->AuthModel->get_user_by_username($username);

            if ($user) {
                if (password_verify($password, $user['Password'])) {
                    $session_data = array(
                        'idUser'      => $user['idUser'],
                        'Username'    => $user['Username'],
                        'NamaLengkap' => $user['NamaLengkap'],
                        'Level'       => $user['Level'],
                        'logged_in'   => TRUE
                    );
                    $this->session->set_userdata($session_data);
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('error', 'Password salah!');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('error', 'Username tidak ditemukan!');
                redirect('auth');
            }
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('dashboard', 'refresh');
    }
}
