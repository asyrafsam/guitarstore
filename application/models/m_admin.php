<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class m_admin extends CI_Model
{

	var $table = 'guitar';
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// function cek_login($table,$where){		
	// 	return $this->db->get_where($table,$where);
	// }
	function get_all_guitars(){
		$this->db->from('guitar');
		$query = $this->db->get();
		return $query->result();
	}

	function guitarinsert($datainsert){
		$this->db->insert($this->table, $datainsert);
		// return $this->db->insert_id();
	}

	function delete_by_id($g_code){
		$this->db->where('g_code', $g_code);
		$this->db->delete($this->table);
	}
	
}
?>