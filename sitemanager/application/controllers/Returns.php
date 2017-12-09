<?php
defined('BASEPATH') OR exit('No direct script access allowed');




/**
* 
*/
class Returns extends CI_Controller
{
	
	
	public function __contruct()
	{
	 	parent::__contruct();

	 	$this->check_login();
	 	$this->load->model('returnsModel');

	}

	private function check_login(){

		if (!$this->session->userdata('is_logged_in')) {

			return redirect('shop');

		} elseif($this->session->userdata('role') !='vandor' && $this->session->userdata('role') !='superadmin'){

			return redirect('shop');
		}
	}


	public function index() {

		$data['main_content'] = 'admin/returns/index';

		$this->load->view('admin_includes/template',$data);
	}


}