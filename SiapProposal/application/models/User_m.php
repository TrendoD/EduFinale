<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {

	public function insert($data) {
		$insert_data = array(
			'nim' => $data['nim'],
			'password' => $data['password'],
			'nama' => $data['nama'],
			'gender' => $data['gender'],
			'status' => 'mahasiswa'
		);
		
		return $this->db->insert('user', $insert_data);
	}

	public function get($data) {
		$result = $this->db->where('nim', $data['nim'])
						  ->get('user')
						  ->row();
						  
		return isset($result) ? $result : (object)array('error'=>'1');
	}

	public function data($nim) {
		$result = $this->db->where('nim', $nim)
						  ->get('user')
						  ->row();
						  
		return isset($result) ? $result : (object)array('error'=>'1');
	}


}

/* End of file User_m.php */
/* Location: ./application/models/User_m.php */