<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


/**
* 
*/
class Report extends CI_Controller
{
	
	
	public function index() {

		$data['main_content'] = 'admin/reports/index';

		$this->load->view('admin_includes/template',$data);
	}

	


}