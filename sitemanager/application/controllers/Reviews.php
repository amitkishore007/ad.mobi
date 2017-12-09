<?php

defined('BASEPATH') OR exit('No direct script access allowed');




/**
* 
*/
class Reviews extends CI_Controller
{
	
		
	public function __construct() {

		parent::__construct();
		$this->check_login();
		$this->load->model('orderModel');

	}

	private function check_login(){

		if (!$this->session->userdata('is_logged_in')) {

			return redirect('shop');

		} elseif($this->session->userdata('role') !='vandor' && $this->session->userdata('role') !='superadmin'){

			return redirect('shop');
		}
	}

	public function index() {


		$data['main_content'] = 'admin/reviews/index';
		// $data['my_reviews']  = $this->orderModel->get_my_product_reviews();
		$data['reviews']  = $this->orderModel->get_my_product_reviews();
		
	
		$this->load->view('admin_includes/template',$data);

	}

}