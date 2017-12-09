<?php 

defined('BASEPATH') OR exit('No direct script access allowed');


/**
* 
*/
class Payments extends CI_Controller
{
	
	
	public function __construct(){
		
		parent::__construct();
		$this->check_login();

	}

	private function check_login(){

		if (!$this->session->userdata('is_logged_in')) {

			return redirect('admin_login');

		} elseif($this->session->userdata('role') !='vandor' && $this->session->userdata('role') !='superadmin'){

			return redirect('shop');
		}
	}

	public function index() {

		$data['main_content'] = 'admin/payments/index';
		$this->load->view('admin_includes/template',$data);
	}



}