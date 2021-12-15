<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['tittle'] = 'Login aplikasi';
		$this->load->view('layout/header');
		$this->load->view('page/login', $data);		
		// $this->load->view('layout/footer');
	}

	public function masuk(){
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run() == false){
			$data['tittle'] = 'Login aplikasi';
			$this->load->view('layout/header', $data);
			$this->load->view('page/login', $data);		
			$this->load->view('layout/footer');
		} else {
			$this->proseslogin();
		}	

	}

	public function proseslogin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['username' => $username])->row_array();

		if($user){
			
			if (md5($password) == $user['password']) {
				$data = [
					'username' => $user['username'],
					'nama' => $user['nama']
				];

				$this->session->set_userdata($data);
				$this->session->set_flashdata('login', '<div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
										<i class="fa fa-check-circle"></i> Anda berhasil login
									</div>');

				redirect('home', 'refresh');
			} else {
				$this->session->set_flashdata('login', '<div class="alert alert-danger alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
										<i class="fa fa-times-circle"></i> Password anda salah
									</div>');
				redirect(base_url(),'refresh');
			}
		} else {
			$this->session->set_flashdata('login', '<div class="alert alert-danger alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
										<i class="fa fa-times-circle"></i> Username anda salah
									</div>');
				redirect(base_url(),'refresh');
		}
	}

	public function keluar(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('nama');

		$this->session->set_flashdata('login', '<div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
										<i class="fa fa-check-circle"></i> Anda telah berhasil logout
									</div>');
			redirect(base_url(),'refresh');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */