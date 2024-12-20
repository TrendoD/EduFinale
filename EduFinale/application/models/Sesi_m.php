<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sesi_m extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function start($data) {
        $this->session->set_userdata([
            'login' => TRUE,
            'nim' => $data['nim'],
            'nama' => $data['nama'],
            'status' => $data['status']
        ]);
    }

    public function check() {
        return $this->session->userdata('login') ? TRUE : FALSE;
    }

    public function validate_login() {
        if (!$this->session->userdata('login')) {
            redirect('masuk');
        }
    }
}

/* End of file Sesi_m.php */
/* Location: ./application/models/Sesi_m.php */