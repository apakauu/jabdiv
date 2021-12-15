<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_jabatan');
		$this->load->model('M_divisi');
	}

	public function index()
	{
		if (!$this->session->userdata('username') && !$this->session->userdata('nama')) {
			
			$this->session->set_flashdata('login', '<div class="alert alert-danger alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
										<i class="fa fa-times-circle"></i> Harap login terlebih dahulu
									</div>');
			redirect(base_url());
		}else{
		$data['data_semua'] = $this->M_jabatan->get_semua()->result();
		$data['tittle'] = 'Home';
		$this->load->view('layout/header', $data);
		$this->load->view('page/home', $data);		
		$this->load->view('layout/footer');
		}
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */