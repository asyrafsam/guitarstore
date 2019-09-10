<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class admin extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('m_admin');
        $this->load->helper('url');
	}
 
	function index(){
		//declare kena kat atas
		//['user'] untuk send ke view dalam bentuk foreach
		$data['guitars'] = $this->m_admin->get_all_guitars();
		// $this->load->view('v_tampil',$data);
		$this->load->view('admin/header/header');
		$this->load->view('admin/body/body', $data);
		$this->load->view('admin/footer/footer');
	}

	function insertguitar(){

		$datainsert = array(

			'g_code' => $this->input->post('code'),
			'g_brand' => $this->input->post('brand'),
			'g_price' => $this->input->post('price'),
			'g_category' => $this->input->post('category'),

			);

		$datainsert = $this->m_admin->guitarinsert($datainsert);
		echo json_encode(array("status" => TRUE));

	}

	function deleteguitar($id){
		$this->m_admin->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	function guitar_delete($g_code){
		$this->m_admin->delete_by_id($g_code);
		echo json_encode(array("status" => TRUE));
	}
}
?>

