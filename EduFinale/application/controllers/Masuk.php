<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sesi_m', 'sesi');
	}

	public function index(){
		if ($this->sesi->check()) {
			redirect('home');
		}
		$this->load->view('masuk_page');
	}

	public function process() {
		$this->load->model('User_m','userdata');
		
		// Get POST data and sanitize inputs
		$nim = $this->input->post('nim', TRUE);
		$password = $this->input->post('password', TRUE);
		
		// Validate required fields
		if (empty($nim) || empty($password)) {
			redirect('masuk?error=2');
		}

		// Use Query Builder for better security
		$res = $this->db->where('nim', $nim)
					   ->where('password', $password)
					   ->get('user')
					   ->row();
					   
		if ($res) {
			$session_data = array(
				'nim' => $res->nim,
				'nama' => $res->nama,
				'status' => $res->status
			);
			
			$this->sesi->start($session_data);
			redirect('home');
		} else {
			redirect('masuk?error=1');
		}
	}

}

/* End of file Masuk.php */
/* Location: ./application/controllers/Masuk.php */