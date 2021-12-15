<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Divisi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_divisi');
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
		$data['divisi'] = $this->M_divisi->get_divisi()->result();
		$data['tittle'] = 'Divisi';
		$this->load->view('layout/header',$data);
		$this->load->view('page/divisi', $data);		
		$this->load->view('layout/footer');
		}
	}

	public function tambah_divisi(){
		$data = array(
			'divisi' => $this->input->post('divisi'),
			'level' => $this->input->post('level')

		);

		$this->M_divisi->tambah_divisi($data);
		$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
										<i class="fa fa-check-circle"></i> Data berhasil ditambahkan
									</div>');
		redirect('divisi','refresh');

	}

	function edit_divisi($id_divisi){
		$where = array('id_divisi'=>$id_divisi);
		var_dump($where);
		$data['divisi'] = $this->M_divisi->edit_data($where,'id_divisi')->result();
		$this->load->view('divisi', $data);
	}

	function edit_data_divisi(){
		$id_divisi		= $this->input->post('id_divisi');
		$divisi			= $this->input->post('divisi');
		$level			= $this->input->post('level');


		$data = array(
			'divisi'		=> $divisi,
			'level'			=> $level
		);

		$where = array('id_divisi'=>$id_divisi);

		$this->M_divisi->update_data($where, $data, 'divisi');
		 $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
										<i class="fa fa-check-circle"></i> Data berhasil disunting
									</div>');
		redirect('divisi');

	}

	public function delete(){
		$id = $this->uri->segment(3);
        $this->M_divisi->delete($id);
       $this->session->set_flashdata('flash', '<div class="alert alert-warning alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
										<i class="fa fa-warning"></i> Data berhasil dihapus, cek kembali data
									</div>');
        redirect('divisi', 'referesh');
	}

}

/* End of file Divisi.php */
/* Location: ./application/controllers/Divisi.php */