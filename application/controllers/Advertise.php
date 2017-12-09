<?php 


/**
* 
*/
class Advertise extends CI_Controller
{
	
	public function index() {

		$data['main_content'] = 'admin/advertise/index';

		$this->load->view('admin_includes/template',$data);
	}
}