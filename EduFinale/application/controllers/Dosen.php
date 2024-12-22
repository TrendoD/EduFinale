<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Check if user is logged in as dosen
        if(!$this->session->userdata('id') || $this->session->userdata('role') !== 'dosen') {
            redirect('masuk');
        }
    }

    public function detail($nim) {
        $data['title'] = 'Detail Mahasiswa Bimbingan';
        
        // Get existing detail data
        $this->db->where('nim', $nim);
        $data['detail'] = $this->db->get('pengajuan')->row();
        
        // Get dosen data
        $data['dosen'] = $this->db->get('dosen');
        
        // Get riwayat bimbingan
        $this->db->where('id_mahasiswa', $nim);
        $this->db->where('id_dosen', $this->session->userdata('id'));
        $this->db->order_by('pertemuan', 'ASC');
        $data['riwayat_bimbingan'] = $this->db->get('riwayat_bimbingan')->result();
        
        $this->load->view('part/header', $data);
        $this->load->view('form/detail_dosen', $data);
        $this->load->view('part/footer');
    }

    public function tambah_riwayat() {
        $data = array(
            'id_mahasiswa' => $this->input->post('id_mahasiswa'),
            'id_dosen' => $this->input->post('id_dosen'),
            'pertemuan' => $this->input->post('pertemuan'),
            'tanggal' => $this->input->post('tanggal'),
            'waktu_mulai' => $this->input->post('waktu_mulai'),
            'waktu_selesai' => $this->input->post('waktu_selesai'),
            'tempat' => $this->input->post('tempat'),
            'catatan' => $this->input->post('catatan')
        );
        
        $this->db->insert('riwayat_bimbingan', $data);
        
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Riwayat bimbingan berhasil ditambahkan');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan riwayat bimbingan');
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function hapus_riwayat($id_riwayat) {
        // Security check
        $this->db->where('id_riwayat', $id_riwayat);
        $this->db->where('id_dosen', $this->session->userdata('id'));
        $riwayat = $this->db->get('riwayat_bimbingan')->row();
        
        if(!$riwayat) {
            $this->session->set_flashdata('error', 'Data riwayat tidak ditemukan');
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        $this->db->where('id_riwayat', $id_riwayat);
        $this->db->delete('riwayat_bimbingan');
        
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Riwayat bimbingan berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus riwayat bimbingan');
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function edit_riwayat($id_riwayat) {
        // Security check
        $this->db->where('id_riwayat', $id_riwayat);
        $this->db->where('id_dosen', $this->session->userdata('id'));
        $riwayat = $this->db->get('riwayat_bimbingan')->row();
        
        if(!$riwayat) {
            $this->session->set_flashdata('error', 'Data riwayat tidak ditemukan');
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        $data = array(
            'pertemuan' => $this->input->post('pertemuan'),
            'tanggal' => $this->input->post('tanggal'),
            'waktu_mulai' => $this->input->post('waktu_mulai'),
            'waktu_selesai' => $this->input->post('waktu_selesai'),
            'tempat' => $this->input->post('tempat'),
            'catatan' => $this->input->post('catatan')
        );
        
        $this->db->where('id_riwayat', $id_riwayat);
        $this->db->update('riwayat_bimbingan', $data);
        
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Riwayat bimbingan berhasil diupdate');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengupdate riwayat bimbingan');
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
}
