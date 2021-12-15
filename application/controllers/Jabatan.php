<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_jabatan');
	}

	public function index()
	{
		if (!$this->session->userdata('username') && !$this->session->userdata('nama')) {
			$this->session->set_flashdata('login', '<div class="alert alert-danger alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
										<i class="fa fa-times-circle"></i> Harap login terlebih dahulu
									</div>');
				redirect(base_url(),'refresh');
		} else {
		$this->load->model('M_divisi');

		$data['tittle'] = 'Jabatan';
		$data['jabatan'] = $this->M_jabatan->get_jabatan()->result();
		$data['divisi'] = $this->M_divisi->get_divisi()->result();
		$data['cekdivisi'] = $this->M_divisi->get_divisi()->row_array();
		$data['cekjabatan'] = $this->M_jabatan->cek_jabatan()->row_array();
		$this->load->view('layout/header', $data);		
		$this->load->view('page/jabatan', $data);		
		$this->load->view('layout/footer');	
		}	
	}

	public function tambah_jabatan(){
		$data = array(
			'id_divisi' => $this->input->post('divisi'),
			'jabatan' => $this->input->post('jabatan'),
			'level' => $this->input->post('level')

		);

		$this->M_jabatan->tambah_jabatan($data);
		$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
										<i class="fa fa-check-circle"></i> Data berhasil ditambahkan
									</div>');
		redirect('jabatan','refresh');

	}

	function edit_jabatan($id_jabatan){
		$where = array('id_jabatan'=>$id_jabatan);
		$data['jabatan'] = $this->M_jabatan->edit_data($where,'id_jabatan')->result();
		$this->load->view('jabatan', $data);
	}

	function edit_data_jabatan(){
		$id_jabatan		= $this->input->post('id_jabatan');
		$divisi			= $this->input->post('divisi');
		$jabatan 		= $this->input->post('jabatan');
		$level			= $this->input->post('level');
		
		$data = array(
			'id_jabatan'	=> $id_jabatan,
			'id_divisi'		=> $divisi,
			'jabatan' 		=> $jabatan,
			'level' 		=> $level
		);

		$where = array('id_jabatan'=>$id_jabatan);

		$this->M_jabatan->update_data($where, $data, 'jabatan');
		 $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
										<i class="fa fa-check-circle"></i> Data berhasil disunting
									</div>');
		redirect('jabatan');

	}

	function delete()
	{
		$id = $this->uri->segment(3);
        $this->M_jabatan->delete($id);
       $this->session->set_flashdata('flash', '<div class="alert alert-warning alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
										<i class="fa fa-warning"></i> Data berhasil dihapus, cek kembali data
									</div>');
        redirect('jabatan', 'referesh');
	}

}

/* End of file Jabatan.php */
/* Location: ./application/controllers/Jabatan.php */