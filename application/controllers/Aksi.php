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

}

/* End of file Aksi.php */
/* Location: ./application/controllers/Aksi.php */