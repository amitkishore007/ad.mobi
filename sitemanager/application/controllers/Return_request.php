<?php 
defined('BASEPATH') OR exit('No direct script access allowed');



/**
* 
*/
class Return_request extends CI_Controller
{
	

	public function index() {

		$data['main_content'] = 'admin/return_request/index';

		// $data['issues'] = $this->sellerModel->get_issues();

		// print_r($data['issues']);
		
		$this->load->view('admin_includes/template',$data);
	}
	
}