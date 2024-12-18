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

		// Get user data by NIM only (don't check password yet)
		$user = $this->db->where('nim', $nim)
						->get('user')
						->row();
					   
		// Verify if user exists and password matches
		if ($user && password_verify($password, $user->password)) {
			$session_data = array(
				'nim' => $user->nim,
				'nama' => $user->nama,
				'status' => $user->status
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