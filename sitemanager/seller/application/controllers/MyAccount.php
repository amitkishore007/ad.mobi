<?php

/**
* 
*/
class MyAccount extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

	
	}

	public function check_login() {

		if (!$this->session->userdata('is_logged_in')) {
			
			return redirect('shop');

		} elseif($this->session->userdata('role')!='user') {

			return redirect('admin');
		}

	}


	public function index() {

		$data['main_content'] = 'public/my_account';

		$this->load->view('includes/template',$data);
	}



}