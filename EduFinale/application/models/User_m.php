<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {

    protected $table = 'user';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_user_by_nim($nim) {
        return $this->db->where('nim', $nim)
                       ->get($this->table)
                       ->row();
    }

    public function validate_login($nim, $password) {
        $user = $this->get_user_by_nim($nim);
        
        if ($user && password_verify($password, $user->password)) {
            return $user;
        }
        
        return false;
    }

    public function update_user($nim, $data) {
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        
        return $this->db->where('nim', $nim)
                       ->update($this->table, $data);
    }

    public function create_user($data) {
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        
        return $this->db->insert($this->table, $data);
    }

    public function delete_user($nim) {
        return $this->db->where('nim', $nim)
                       ->delete($this->table);
    }

    public function check_nim_exists($nim) {
        return $this->db->where('nim', $nim)
                       ->count_all_results($this->table) > 0;
    }

    public function get_user_status($nim) {
        $user = $this->get_user_by_nim($nim);
        return $user ? $user->status : null;
    }

    public function get_user_type($nim) {
        $user = $this->get_user_by_nim($nim);
        return $user ? $user->tipe : null;
    }
}
