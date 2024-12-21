<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {
    private $user = null;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('chat_model');
        
        // Validate login first
        if($this->session->userdata('nim') == "") {
            redirect('home/masuk');
        }
        
        // Get user data and handle null case
        $user = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row();
        
        if (!$user) {
            $this->session->set_flashdata('error', 'User profile not found');
            $this->session->sess_destroy();
            redirect('home/masuk');
            return;
        }
        
        // Set default photo if not set
        if (!isset($user->photo) || empty($user->photo)) {
            $user->photo = 'user.png';
        }
        
        $this->user = $user;
    }

    public function index() {
        if($this->user->tipe == 'mahasiswa') {
            // Get dosen pembimbing dari database
            $sql = "SELECT DISTINCT u.* FROM user u 
                   INNER JOIN pengajuan_judul p ON (u.nim = p.dosbing1 OR u.nim = p.dosbing2)
                   WHERE p.nim = ?";
            $query = $this->db->query($sql, array($this->user->nim));
            if($query->num_rows() > 0) {
                $data['pembimbing'] = $query->result();
            } else {
                $data['pembimbing'] = array();
            }
        } else if($this->user->tipe == 'dosen') {
            // Get mahasiswa bimbingan
            $sql = "SELECT DISTINCT u.* FROM user u 
                   INNER JOIN pengajuan_judul p ON u.nim = p.nim
                   WHERE (p.dosbing1 = ? OR p.dosbing2 = ?)";
            $query = $this->db->query($sql, array($this->user->nim, $this->user->nim));
            if($query->num_rows() > 0) {
                $data['mahasiswa'] = $query->result();
            } else {
                $data['mahasiswa'] = array();
            }
        }

        $data['data'] = $this->user;
        
        $this->load->view('part/header', $data);
        $this->load->view('chat/index', $data);
        $this->load->view('part/footer');
    }

    public function get_messages() {
        $sender_id = $this->user->nim;
        $receiver_id = $this->input->get('receiver_id');
        
        $messages = $this->chat_model->get_messages($sender_id, $receiver_id);
        echo json_encode($messages);
    }

    public function send_message() {
        $sender_id = $this->user->nim;
        $receiver_id = $this->input->post('receiver_id');
        $message = $this->input->post('message');
        
        $result = $this->chat_model->send_message($sender_id, $receiver_id, $message);
        echo json_encode(['success' => $result]);
    }

    public function mark_as_read() {
        $sender_id = $this->input->post('sender_id');
        $receiver_id = $this->user->nim;
        
        $result = $this->chat_model->mark_as_read($sender_id, $receiver_id);
        echo json_encode(['success' => $result]);
    }
}