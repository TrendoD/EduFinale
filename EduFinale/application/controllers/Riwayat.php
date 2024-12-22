<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {
    private $user = null;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Sesi_m', 'sesi');
        $this->sesi->validate_login();
        $this->user = $this->db->get_where('user', array('nim'=>$_SESSION['nim']))->row();
    }

    public function index() {
        if ($this->user->tipe != 'mahasiswa') redirect('/home','refresh');
        
        // Get user's pengajuan_judul data
        $pengajuan = $this->db->get_where('pengajuan_judul', array('nim' => $this->user->nim))->row();
        
        // Get riwayat bimbingan data
        $this->db->select('r.*, d.nama as nama_dosen')
                 ->from('riwayat_bimbingan r')
                 ->join('user d', 'd.nim = r.id_dosen', 'left')
                 ->where('r.id_mahasiswa', $this->user->nim)
                 ->order_by('r.tanggal', 'DESC')
                 ->order_by('r.waktu_mulai', 'DESC');
        
        $riwayat = $this->db->get()->result();

        $data = array(
            'data' => $this->user,
            'pengajuan' => $pengajuan,
            'riwayat' => $riwayat
        );

        $this->load->view('part/header', $data);
        $this->load->view('riwayat_page', $data);
        $this->load->view('part/footer');
    }
}
