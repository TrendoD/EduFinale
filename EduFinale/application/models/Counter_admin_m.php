<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Counter_admin_m extends CI_Model {
    
    public function total_users() {
        return $this->db->count_all('user');
    }

    public function total_mahasiswa() {
        return $this->db->where('tipe', 'mahasiswa')->count_all_results('user');
    }

    public function total_dosen() {
        return $this->db->where('tipe', 'dosen')->count_all_results('user');
    }

    public function total_proposal() {
        return $this->db->count_all('pengajuan_judul');
    }

    public function total_sidang() {
        return $this->db->count_all('pengajuan_sidang');
    }
    
    public function proposal_pending() {
        return $this->db->where('status', 'menunggu')
                      ->or_where('status', 'pending')
                      ->count_all_results('pengajuan_judul');
    }

    public function sidang_pending() {
        return $this->db->where('status', 'menunggu')
                      ->or_where('status', 'pending')
                      ->count_all_results('pengajuan_sidang');
    }
}