<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class m_login extends CI_Model
{

	// var $table = 'admin';
	// public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->load->database();
	// }

	// function cek_login($table,$where){		
	// 	return $this->db->get_where($table,$where);
	// }

	function tampil_data(){
		return $this->db->get('admin');
	}

	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}		
}
?>