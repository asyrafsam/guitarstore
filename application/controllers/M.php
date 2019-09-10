<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class M extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');
        $this->load->helper('url');
	}
 
	function index(){
		//declare kena kat atas
		//['user'] untuk send ke view dalam bentuk foreach
		// $data['admin'] = $this->m_login->tampil_data()->result();
		// $this->load->view('v_tampil',$data);
		$this->load->view('public/header/header');
		$this->load->view('public/body/login');
		$this->load->view('public/footer/footer');
	}


	function aksi_login(){
		$icno = $this->input->post('icno');
		$password = $this->input->post('password');
		$where = array(
			'ic_no' => $icno,
			'pass' => $password
			);
		$cek = $this->m_login->cek_login("admin",$where)->num_rows();
		$data['admin'] = $this->m_login->cek_login("admin",$where)->result();
		if($cek > 0){


			// foreach ($data['admin'] as $u) {
			// 	echo $u->username;
			// 	echo '';
			// 	echo $u->password;
			// }
 
			
 				$data_session = array(
					'ic_no' => $icno,
					'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("admin"));
 
		}else{
			echo '<script language="javascript">';
    		echo 'alert("IC No and Password Wrong !");';
			echo '</script>';
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
	
}
?>