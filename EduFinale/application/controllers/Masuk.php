<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Sesi_m', 'sesi');
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['url', 'form']);
        $this->load->database();
    }

    public function index() {
        // If already logged in, redirect based on user type
        if ($this->session->userdata('login')) {
            $tipe = $this->session->userdata('tipe');
            if ($tipe === 'admin') {
                redirect('admin/index');
            } else {
                redirect('home/index');
            }
            return;
        }
        
        $this->load->view('masuk_page');
    }

    public function process() {
        // Set validation rules
        $this->form_validation->set_rules('nim', 'NIM/Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', 'Semua field harus diisi');
            redirect('masuk');
            return;
        }

        // Get and sanitize input
        $nim = $this->input->post('nim', TRUE);
        $password = $this->input->post('password', TRUE);

        // Get user from database
        $user = $this->db->where('nim', $nim)
                        ->get('user')
                        ->row();

        // Verify user credentials
        if ($user && password_verify($password, $user->password)) {
            // Set session data
            $session_data = [
                'login' => TRUE,
                'user_id' => $user->id,
                'nim' => $user->nim,
                'nama' => $user->nama,
                'tipe' => $user->tipe,
                'gender' => $user->gender,
                'photo' => $user->photo
            ];
            
            $this->session->set_userdata($session_data);

            // Redirect based on user type
            switch ($user->tipe) {
                case 'admin':
                    redirect('admin/index');
                    break;
                case 'mahasiswa':
                case 'dosen':
                case 'rmk':
                case 'kaprodi':
                default:
                    redirect('home/index');
                    break;
            }
        } else {
            $this->session->set_flashdata('error', 'NIM/Username atau Password salah');
            redirect('masuk');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('masuk');
    }
}
