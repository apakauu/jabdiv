<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_divisi extends CI_Model {

	public function get_divisi(){
		return $this->db->get('divisi');
	}	

	public function tambah_divisi($data){
		$this->db->insert('divisi', $data);
	}


	public function edit_data($where, $table){
		return $this->db->get_where($table, $where);
	}


	function update_data($where,$data,$table){

    $this->db->where($where);
    $this->db->update($table,$data);

    } 

    public function delete($id){
		$this->db->where('id_divisi',$id);
		$this->db->delete('divisi');
	}

}

/* End of file M_divisi.php */
/* Location: ./application/models/M_divisi.php */