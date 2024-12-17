<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {
    private $user = null;
    public function __construct() {
		parent::__construct();
		$this->load->model('Sesi_m', 'sesi');
		$this->load->model('User_m', 'userdatabase');
		$this->sesi->validate_login();
		$this->user = $this->db->get_where('user', array('nim'=>$_SESSION['nim']))->row();
		date_default_timezone_set("Asia/Jakarta");
	}

	public function index(){
		redirect(base_url().'home','refresh');
	}

	public function judul($param=null) {
		if ($this->user->tipe != "mahasiswa") redirect('/home','refresh');

		$arr = array();
		$config = array();
		$data = array(
			'data'=>$this->user, 
			'list'=>$this->db->get_where('pengajuan_judul', array('nim'=>$_SESSION['nim'])),
			'minat'=>$this->db->get('bidangminat'),
			'detail'=>$this->db->get_where('pengajuan_judul', array('nim'=>$_SESSION['nim']))->row(),
			'count'=>$this->db->get_where('pengajuan_judul', array('nim'=>$_SESSION['nim']))->num_rows(),
			'success'=>$this->input->get('success'),
			'error'=>$this->input->get('error'),
			'listdosen'=>$this->db->get_where('user', array('tipe'=>'dosen'))
		);
		if ($param == "add") {
			$arr['nama'] = $_SESSION['nama'];
			$arr['nim'] = $_SESSION['nim'];
			$arr['judul'] = $this->input->post('judul');
			$arr['tanggal'] = date("Y-m-d");
			$arr['status'] = 'pending';
			$arr['bidangminat'] = $this->input->post('bidangminat');
			$arr['dosbing1'] = $this->input->post('pilihandosen1');

			$config['upload_path']          = './berkas/';
            $config['allowed_types']        = 'pdf|docx|doc';
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('berkas')) {
            	redirect('/pengajuan/judul?error=upload_file','refresh');
            } else {
            	$arr['berkas'] = $this->upload->data('file_name'); 
            	$this->db->insert('pengajuan_judul', $arr);
            	redirect('/pengajuan/judul?success=true','refresh');
            }

        } elseif ($param == "revisi") {

        	if (isset($_FILES['berkas'])) {
        		$nim = $_SESSION['nim'];
        		$arr['judul'] = $this->input->post('judul');
        		$arr['status'] = 'pending';

        		if ($_FILES['berkas']['name'] == "") {
        			//Tidak Upload Berkas"      			        			
        			$this->db->where('nim', $nim);
        			$this->db->update('pengajuan_judul', $arr);

        		} else {
        			//Upload Berkas

        			$config['upload_path']          = './berkas/';
		            $config['allowed_types']        = 'pdf|docx|doc';
		            $this->load->library('upload', $config);

		            if ( ! $this->upload->do_upload('berkas')) {
		            	redirect('/pengajuan/judul?error=upload_file','refresh');
		            } else {
		            	$arr['berkas'] = $this->upload->data('file_name'); 
		            	$this->db->where('nim', $nim);
        				$this->db->update('pengajuan_judul', $arr);
		            }
        		}
        	} 
        	redirect('/pengajuan/judul','refresh');

		} else {
			$this->load->view('part/header', $data);
			$this->load->view('form/pengajuan_judul',$data);
			$this->load->view('part/footer');
		}
	}

	public function sidang($param=null) {
		if ($this->user->tipe != "mahasiswa") redirect('/home','refresh');

		$arr = array();
		
		// Ambil data detail dan inisialisasi jika kosong
		$detail = $this->db->get_where('pengajuan_sidang', array('nim'=>$_SESSION['nim']))->row();
		if (!$detail) {
			$detail = new stdClass();
			$detail->status = '';
			$detail->penguji = '';
			$detail->tglsidang = '';
			$detail->nilai = '';
		}

		$data = array(
			'data'=>$this->user, 
			'detail'=>$detail,
			'count'=>$this->db->get_where('pengajuan_sidang', array('nim'=>$_SESSION['nim']))->num_rows(),
			'success'=>$this->input->get('success'),
			'error'=>$this->input->get('error'),
			'listdosen'=>$this->db->get_where('user', array('tipe'=>'dosen')),
			'scan'=>$this->db->get_where('bukti_bimbingan', array('nim'=>$_SESSION['nim']))->result(),
			'berkas'=>$this->db->get_where('berkas_bimbingan', array('nim'=>$_SESSION['nim']))->result()
		);

		if ($param == "add") {
			$configScan = array();
			$configBuku = array();
			$arrScan = array();
			$arrBuku = array();
			$error = false;

			$arr['nama'] = $_SESSION['nama'];
			$arr['nim'] = $_SESSION['nim'];
			$arr['tanggal'] = date("Y-m-d");
			$arr['jam'] = date("H:i:s");
			$arr['judul'] = $this->db->get_where('pengajuan_judul', array('nim' => $_SESSION['nim']))->row()->judul;
			$arr['status'] = 'pending';

			$configScan['upload_path']          = './scan/';
            $configScan['allowed_types']        = 'jpg|jpeg|png';

            $configBuku['upload_path']          = './buku/';
            $configBuku['allowed_types']        = 'pdf|docx|doc';

            $this->load->library('upload');

            $this->upload->initialize($configScan);
			if ( ! $this->upload->do_upload('berkasttd')) {
				$error = true;
			} else {
				$arrScan['nim'] = $_SESSION['nim'];
				$arrScan['filename'] = $this->upload->data('file_name'); 
				$arrScan['date'] = date("Y-m-d H:i:s");
			}

			$this->upload->initialize($configBuku);
			if ( ! $this->upload->do_upload('berkaspdf')) {
				$error = true;
			} else {
				$arrBuku['nim'] = $_SESSION['nim'];
				$arrBuku['filename'] = $this->upload->data('file_name'); 
				$arrBuku['date'] = date("Y-m-d H:i:s");
			}

			if (!$error) {
				$this->db->insert('berkas_bimbingan', $arrBuku);
				$this->db->insert('bukti_bimbingan', $arrScan);
				$this->db->insert('pengajuan_sidang', $arr);
				redirect('/pengajuan/sidang?success=true','refresh');
			} else {
				redirect('/pengajuan/sidang?error=true','refresh');
			}

        } 

		$this->load->view('part/header', $data);
		$this->load->view('form/pengajuan_sidang',$data);
		$this->load->view('part/footer');
	}

	public function rmk() {
		if ($this->user->tipe != "rmk") redirect('/home','refresh');
		$data = array(
			'title'=>'Pengajuan Proposal Tugas Akhir',
			'data'=>$this->user, 
			'tipe'=>'rmk',
			'list'=>$this->db->get_where('pengajuan_judul', array('status'=>'pending')),
			'tabel_header'=>array('Tanggal', 'Judul'),
			'tabel_key'=>array('tanggal', 'judul')
		);
		$this->load->view('part/header', $data);
		$this->load->view('form/daftar_pengajuan',$data);
		$this->load->view('part/footer');
	}

	public function kaprodi() {
		if ($this->user->tipe != "kaprodi") redirect('/home','refresh');
		$data = array(
			'title'=>'Pengajuan Proposal Tugas Akhir',
			'data'=>$this->user, 
			'tipe'=>'kaprodi',
			'list'=>$this->db->get_where('pengajuan_judul', array('status'=>'pendingKaprodi')),
			'tabel_header'=>array('Tanggal', 'Tanggal Verifikasi', 'Judul'),
			'tabel_key'=>array('tanggal', 'tanggalverif', 'judul')
		);
		$this->load->view('part/header', $data);
		$this->load->view('form/daftar_pengajuan',$data);
		$this->load->view('part/footer');
	}

	public function dosen() {
		if ($this->user->tipe != "dosen") redirect('/home','refresh');
		$data = array(
			'title'=>'Bimbingan Mahasiswa',
			'data'=>$this->user, 
			'tipe'=>'dosen',
			$this->db->where('dosbing1', $this->user->nim),
			$this->db->or_where('dosbing2', $this->user->nim),
			'list'=>$this->db->get('pengajuan_judul'),
			'tabel_header'=>array('Tanggal', 'Judul', 'Nama', 'NIM'),
			'tabel_key'=>array('tanggal', 'judul', 'nama', 'nim'),
		);
		$this->load->view('part/header', $data);
		$this->load->view('form/daftar_pengajuan',$data);
		$this->load->view('part/footer');
	}

	public function hapus() {
		if ($this->user->tipe != "mahasiswa") redirect('/home','refresh');
		$nim = $this->input->post('nim');
		$action = $this->input->post('action');
		if ($nim == $_SESSION['nim']) {
			$this->db->where(array('nim'=>$_SESSION['nim']));
			$this->db->delete('pengajuan_judul');
			redirect('/pengajuan/judul','refresh');
		} else {
			redirect('/pengajuan/judul','refresh');
		}
	}
}

/* End of file Formulir.php */
/* Location: ./application/controllers/Formulir.php */