<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    private $user = null;

    public function __construct() {
        parent::__construct();
        $this->load->model('Sesi_m', 'sesi');
        $this->load->model('Counter_admin_m', 'counter_admin');
        
        // Set timezone untuk Indonesia
        date_default_timezone_set('Asia/Jakarta');
        
        // Validate login
        $this->sesi->validate_login();
        
        // Get user data
        $user = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row();
        
        // Validate admin access
        if (!$user || $user->tipe !== 'admin') {
            redirect('home');
            return;
        }
        
        $this->user = $user;
    }

    public function index() {
        $data = array(
            'data' => $this->user,
            'total_users' => $this->counter_admin->total_users(),
            'total_mahasiswa' => $this->counter_admin->total_mahasiswa(),
            'total_dosen' => $this->counter_admin->total_dosen(),
            'total_proposal' => $this->counter_admin->total_proposal(),
            'total_sidang' => $this->counter_admin->total_sidang(),
            'proposal_pending' => $this->counter_admin->proposal_pending(),
            'sidang_pending' => $this->counter_admin->sidang_pending(),
            'timezone' => 'Asia/Jakarta (WIB)',
            'current_time' => date('d-m-Y H:i:s')
        );

        $this->load->view('part/header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('part/footer');
    }

    // ... kode lainnya tetap sama ...
}