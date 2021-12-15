<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jabatan extends CI_Model {

	public function get_jabatan(){
		// return $this->db->get('jabatan');
		return $this->db->query('SELECT jabatan.id_jabatan, jabatan.id_divisi, jabatan.jabatan, jabatan.level, divisi.divisi, divisi.id_divisi FROM jabatan JOIN divisi WHERE divisi.id_divisi = jabatan.id_divisi');
	}	

	public function get_semua(){
		return $this->db->query('SELECT divisi.id_divisi, divisi.divisi, jabatan.id_jabatan, jabatan.jabatan,jabatan.level FROM divisi JOIN jabatan ON divisi.id_divisi = jabatan.id_divisi ORDER BY divisi.divisi ASC');
	}

	public function tambah_jabatan($data){
		$this->db->insert('jabatan', $data);
	}

	public function cek_jabatan(){
		return $this->db->query("SELECT level from jabatan where level = 1");
	}

	public function edit_data($where, $table){
		return $this->db->get_where($table, $where);
	}


	function update_data($where,$data,$table){

    $this->db->where($where);
    $this->db->update($table,$data);

    } 

    public function delete($id){
		$this->db->where('id_jabatan',$id);
		$this->db->delete('jabatan');
	}
    

}

/* End of file M_jabatan.php */
/* Location: ./application/models/M_jabatan.php */