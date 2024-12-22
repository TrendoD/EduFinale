<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aksi extends CI_Controller {
	private $user = null;
    public function __construct() {
		parent::__construct();
		$this->load->model('Sesi_m', 'sesi');
		$this->load->model('User_m', 'userdatabase');
		$this->sesi->validate_login();
		$this->user = $this->db->get_where('user', array('nim'=>$_SESSION['nim']))->row();
	}

	public function index() {
		redirect('/home','refresh');
	}

	public function RMK() {
		if ($this->user->tipe != 'rmk') redirect('/home','refresh');

		$action = $this->input->post('action');
		$id = $this->input->post('id');
		$nim = $this->input->post('nim');
		$info = $this->input->post('info');
		$newdata = array();

		if ($id=="" || $nim=="") redirect('/home','refresh');

		if ($action=="terima") {
			$newdata['status'] = 'pendingKaprodi';
			$newdata['info'] = $info;
			$newdata['tanggalverif'] = date("Y-m-d");
			$this->db->where(array('nim'=>$nim, 'id'=>$id));
			$this->db->update('pengajuan_judul', $newdata);
			redirect('/pengajuan/rmk','refresh');

		} elseif ($action=="tolak") {
			$newdata['status'] = 'tolak';
			$newdata['info'] = $info;
			$this->db->where(array('nim'=>$nim, 'id'=>$id));
			$this->db->update('pengajuan_judul', $newdata);
			redirect('/pengajuan/rmk','refresh');
		} elseif ($action=="revisi") {
			$newdata['status'] = 'revisi';
			$newdata['info'] = $info;
			$this->db->where(array('nim'=>$nim, 'id'=>$id));
			$this->db->update('pengajuan_judul', $newdata);
			redirect('/pengajuan/rmk','refresh');
		}
	}

	public function Kaprodi() {
		if ($this->user->tipe != 'kaprodi') redirect('/home','refresh');
		
		$action = $this->input->post('action');
		$id = $this->input->post('id');
		$nim = $this->input->post('nim');
		$dosen2 = $this->input->post('pilihandosen2');
		$newdata = array();
		$newdata['dosbing2'] = $dosen2;
		$newdata['status'] = 'diterima';
		
		$this->db->where(array('id'=>$id, 'nim'=>$nim));
		$this->db->update('pengajuan_judul', $newdata);
		redirect('/pengajuan/kaprodi','refresh');
	}

    public function tambah_riwayat() {
        if ($this->user->tipe != 'dosen') redirect('/home','refresh');
        
        $id_mahasiswa = $this->input->post('id_mahasiswa');
        
        $data = array(
            'id_mahasiswa' => $id_mahasiswa,
            'id_dosen' => $this->user->nim,
            'pertemuan' => $this->input->post('pertemuan'),
            'tanggal' => $this->input->post('tanggal'),
            'waktu_mulai' => $this->input->post('waktu_mulai'),
            'waktu_selesai' => $this->input->post('waktu_selesai'),
            'tempat' => $this->input->post('tempat'),
            'catatan' => $this->input->post('catatan'),
            'created_at' => date('Y-m-d H:i:s')
        );
        
        $this->db->insert('riwayat_bimbingan', $data);
        
        // Get pengajuan_judul id
        $pengajuan = $this->db->get_where('pengajuan_judul', array('nim' => $id_mahasiswa))->row();
        if ($pengajuan) {
            // Submit form POST ke detail
            echo '<form id="redirectForm" method="POST" action="'.base_url('detail').'">';
            echo '<input type="hidden" name="id" value="'.$pengajuan->id.'">';
            echo '</form>';
            echo '<script>document.getElementById("redirectForm").submit();</script>';
        } else {
            redirect('/home','refresh');
        }
    }
    
    public function hapus_riwayat($id) {
        if ($this->user->tipe != 'dosen') redirect('/home','refresh');
        
        // Ambil id_mahasiswa sebelum hapus
        $riwayat = $this->db->get_where('riwayat_bimbingan', array(
            'id_riwayat' => $id,
            'id_dosen' => $this->user->nim
        ))->row();
        
        if($riwayat) {
            $id_mahasiswa = $riwayat->id_mahasiswa;
            
            $this->db->where('id_riwayat', $id);
            $this->db->where('id_dosen', $this->user->nim);
            $this->db->delete('riwayat_bimbingan');
            
            // Get pengajuan_judul id
            $pengajuan = $this->db->get_where('pengajuan_judul', array('nim' => $id_mahasiswa))->row();
            if ($pengajuan) {
                // Submit form POST ke detail
                echo '<form id="redirectForm" method="POST" action="'.base_url('detail').'">';
                echo '<input type="hidden" name="id" value="'.$pengajuan->id.'">';
                echo '</form>';
                echo '<script>document.getElementById("redirectForm").submit();</script>';
            } else {
                redirect('/home','refresh');
            }
        } else {
            redirect('/home','refresh');
        }
    }

}

/* End of file Aksi.php */
/* Location: ./application/controllers/Aksi.php */