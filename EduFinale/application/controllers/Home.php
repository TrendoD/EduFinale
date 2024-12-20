<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

class Home extends CI_Controller {
	private $user = null;
	public function __construct() {
		parent::__construct();
		$this->load->model('Sesi_m', 'sesi');
		$this->load->model('User_m', 'userdatabase');
		$this->load->model('Counter_m', 'counter');
		
		// Validate login first
		$this->sesi->validate_login();
		
		// Set timezone
		date_default_timezone_set('Asia/Jakarta');
		
		// Check if session exists using CI session
		if (!$this->session->userdata('nim')) {
			$this->session->set_flashdata('error', 'Session expired. Please login again.');
			redirect('masuk');
			return;
		}
		
		// Get user data and handle null case
		$user = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row();
		
		if (!$user) {
			$this->session->set_flashdata('error', 'User profile not found');
			$this->session->sess_destroy();
			redirect('masuk');
			return;
		}
		
		// Set default photo if not set
		if (!isset($user->photo)) {
			$user->photo = 'default.jpg';
		}
		
		$this->user = $user;
	}


	public function index() {
		switch ($this->user->tipe) {
			case 'mahasiswa':
				$data = array(
					'data' => $this->user,
					'counter_formulir'=>$this->counter->mahasiswa_formulir(),
					'counter_terima'=>$this->counter->mahasiswa_terima(),
					'counter_tinjau'=>$this->counter->mahasiswa_tinjau(),
					'counter_tolak'=>$this->counter->mahasiswa_tolak()
				);
				break;

			case 'dosen':
				$data = array(
					'data' => $this->user,
					'counter_dosen'=>$this->counter->dosen_counter()
				);
				break;

			case 'rmk':
				$data = array(
					'data' => $this->user,
					'counter_formulir'=>$this->counter->rmk_formulir(),
					'counter_terima'=>$this->counter->rmk_terima(),
					'counter_tinjau'=>$this->counter->rmk_tinjau(),
					'counter_tolak'=>$this->counter->rmk_tolak()
				);
				break;

			case 'kaprodi':
				$data = array(
					'data' => $this->user,
					'counter_formulir'=>$this->counter->kaprodi_formulir(),
					'counter_terima'=>$this->counter->kaprodi_terima(),
					'counter_tinjau'=>$this->counter->kaprodi_tinjau(),
					'counter_tolak'=>$this->counter->kaprodi_tolak()
				);
				break;
		}
		
		$this->load->view('part/header', $data);
		$this->load->view('main_page', $data);
		$this->load->view('part/footer');
	}

	public function profil($param=NULL) {
		$data = array(
			'data'=>$this->user,
			'success'=>$this->input->get('success'),
			'error'=>$this->input->get('error')
		);
		if ($param != NULL) {
			switch ($param) {
				case 'updateData':
					if (!$this->input->post('nim') || !$this->input->post('nama')) {
						redirect(base_url().'home/profil/?error=incomplete','refresh');
						return;
					}
					
					$newdata = array(
						'nama' => $this->input->post('nama'),
						'gender' => $this->input->post('gender'),
						'nim' => $this->input->post('nim')
					);

					// Only update password if provided
					if ($this->input->post('password')) {
						$newdata['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
					}
					
					// Validate if new NIM already exists for different user
					if ($newdata['nim'] !== $_SESSION['nim']) {
						$existing = $this->db->get_where('user', array('nim' => $newdata['nim']))->row();
						if ($existing) {
							redirect(base_url().'home/profil/?error=nim_exists','refresh');
							return;
						}
					}
					
					$this->db->where('nim', $_SESSION['nim']);
					if ($this->db->update('user', $newdata)) {
						// Update session with new NIM if changed
						if ($newdata['nim'] !== $_SESSION['nim']) {
							$_SESSION['nim'] = $newdata['nim'];
						}
						redirect(base_url().'home/profil/?success=data','refresh');
					} else {
						redirect(base_url().'home/profil/?error=update_failed','refresh');
					}
					break;

				case 'uploadPhoto':
					$config['upload_path']          = './img/profile/';
                	$config['allowed_types']        = 'gif|jpg|png|jpeg';
                	$this->load->library('upload', $config);
                	if ($this->upload->do_upload('photo')) {
                		$ext = $this->upload->data('file_ext');
                		$full_path = $this->upload->data('full_path');
                		$rand_name = generateRandomString(15);
                		rename($full_path, './img/profile/'.$rand_name.$ext);
                		$this->db->where('nim', $_SESSION['nim']);
                		$this->db->update('user', array('photo'=>$rand_name.$ext));
                        redirect('/home/profil?success=photo','refresh');
                	}else{
                		redirect('/home/profil?error=photo','refresh');
                	}
					break;

				default:
					# code...
					break;
			}
		}else{
			$this->load->view('part/header', $data);
			$this->load->view('profil_page', $data);
			$this->load->view('part/footer');
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url().'masuk','refresh');
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */