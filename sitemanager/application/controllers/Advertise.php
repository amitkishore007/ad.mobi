<?php 
defined('BASEPATH') OR exit('No direct script access allowed');



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