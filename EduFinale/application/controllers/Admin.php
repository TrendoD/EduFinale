<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    private $user = null;

    public function __construct() {
        parent::__construct();
        $this->load->model('Sesi_m', 'sesi');
        $this->load->model('Counter_admin_m', 'counter_admin');
        $this->load->database();
        
        // Set timezone untuk Indonesia
        date_default_timezone_set('Asia/Jakarta');
        
        // Validate login
        $this->sesi->validate_login();
        
        // Get user data
        $user = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row();
        
        // Validate admin access
        if (!$user || $user->tipe !== 'admin') {
            redirect('home');
            return;
        }
        
        $this->user = $user;
    }

    public function index() {
        // Reset session data
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('error');
        
        $data = array(
            'data' => $this->user,
            'total_users' => $this->counter_admin->total_users(),
            'total_mahasiswa' => $this->counter_admin->total_mahasiswa(),
            'total_dosen' => $this->counter_admin->total_dosen(),
            'total_proposal' => $this->counter_admin->total_proposal(),
            'total_sidang' => $this->counter_admin->total_sidang(),
            'proposal_pending' => $this->counter_admin->proposal_pending(),
            'sidang_pending' => $this->counter_admin->sidang_pending()
        );

        $this->load->view('part/header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('part/footer');
    }

    public function users() {
        $this->load->helper(array('form', 'url'));
        
        $users = $this->db->get('user')->result();
        
        $data = array(
            'data' => $this->user,
            'users' => $users
        );
        
        $this->load->view('part/header', $data);
        $this->load->view('admin/users', $data);
        $this->load->view('part/footer');
    }

    public function add_user() {
        header('Content-Type: application/json');
        
        $nim = $this->input->post('nim');
        $existing_user = $this->db->get_where('user', ['nim' => $nim])->row();
        if($existing_user) {
            echo json_encode(['status' => 'error', 'message' => 'NIM/Username sudah digunakan!']);
            return;
        }

        if(!$this->input->post('nim') || !$this->input->post('nama') || 
           !$this->input->post('password') || !$this->input->post('tipe') || 
           !$this->input->post('gender')) {
            echo json_encode(['status' => 'error', 'message' => 'Semua field harus diisi!']);
            return;
        }

        $data = array(
            'nim' => $this->input->post('nim'),
            'nama' => $this->input->post('nama'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'tipe' => $this->input->post('tipe'),
            'gender' => $this->input->post('gender'),
            'photo' => 'user.png'
        );
            
        if($this->db->insert('user', $data)) {
            echo json_encode(['status' => 'success', 'message' => 'User berhasil ditambahkan!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal menambahkan user!']);
        }
    }

    public function edit_user() {
        header('Content-Type: application/json');
        
        $user_id = $this->input->post('user_id');
        $nim = $this->input->post('nim');
        
        $user = $this->db->get_where('user', ['id' => $user_id])->row();
        if(!$user) {
            echo json_encode(['status' => 'error', 'message' => 'User tidak ditemukan!']);
            return;
        }

        if(!$nim || !$this->input->post('nama') || 
           !$this->input->post('tipe') || !$this->input->post('gender')) {
            echo json_encode(['status' => 'error', 'message' => 'Semua field harus diisi!']);
            return;
        }

        if($nim != $user->nim) {
            $existing_user = $this->db->get_where('user', ['nim' => $nim])->row();
            if($existing_user) {
                echo json_encode(['status' => 'error', 'message' => 'NIM/Username sudah digunakan!']);
                return;
            }
        }

        $data = array(
            'nim' => $nim,
            'nama' => $this->input->post('nama'),
            'tipe' => $this->input->post('tipe'),
            'gender' => $this->input->post('gender')
        );

        if($this->input->post('password')) {
            $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        }
            
        $this->db->where('id', $user_id);
        if($this->db->update('user', $data)) {
            echo json_encode(['status' => 'success', 'message' => 'User berhasil diupdate!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal mengupdate user!']);
        }
    }

    public function delete_user($id = null) {
        header('Content-Type: application/json');
        
        if (!$id) {
            echo json_encode(['status' => 'error', 'message' => 'ID user tidak valid']);
            return;
        }

        $user = $this->db->get_where('user', ['id' => $id])->row();
        if (!$user) {
            echo json_encode(['status' => 'error', 'message' => 'User tidak ditemukan']);
            return;
        }
        
        if ($user->nim === $this->session->userdata('nim')) {
            echo json_encode(['status' => 'error', 'message' => 'Tidak dapat menghapus akun sendiri']);
            return;
        }

        $this->db->trans_start();
        $this->db->where('id', $id);
        $result = $this->db->delete('user');
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE || !$result) {
            echo json_encode(['status' => 'error', 'message' => 'Gagal menghapus user']);
            return;
        }

        echo json_encode(['status' => 'success', 'message' => 'User berhasil dihapus']);
    }

    public function profile() {
        $data = array(
            'data' => $this->user
        );
        
        $this->load->view('part/header', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('part/footer');
    }

    public function update_profile() {
        header('Content-Type: application/json');
        
        if(!$this->input->post('nama') || !$this->input->post('gender')) {
            echo json_encode(['status' => 'error', 'message' => 'Nama dan Jenis Kelamin harus diisi!']);
            return;
        }

        $data = array(
            'nama' => $this->input->post('nama'),
            'gender' => $this->input->post('gender')
        );
        
        if($this->input->post('password')) {
            $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        }
        
        if(!empty($_FILES['photo']['name'])) {
            $config['upload_path'] = './img/profile/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 2048;
            $config['file_name'] = uniqid();
            
            $this->load->library('upload');
            $this->upload->initialize($config);
            
            if($this->upload->do_upload('photo')) {
                $uploaded_data = $this->upload->data();
                $data['photo'] = $uploaded_data['file_name'];
                
                if($this->user->photo != 'user.png') {
                    $old_photo = FCPATH . 'img/profile/' . $this->user->photo;
                    if(file_exists($old_photo)) {
                        unlink($old_photo);
                    }
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => strip_tags($this->upload->display_errors())]);
                return;
            }
        }
        
        $this->db->where('nim', $this->user->nim);
        if($this->db->update('user', $data)) {
            echo json_encode(['status' => 'success', 'message' => 'Profil berhasil diupdate!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal mengupdate profil!']);
        }
    }
}
