<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


/**
* 
*/
class Seller_Support extends CI_Controller
{
	
	
	public function __construct() {

		parent::__construct();
		$this->load->model('sellerModel');

	}

	public function index() {

		$data['main_content'] = 'admin/seller_support/index';

		$data['issues'] = $this->sellerModel->get_issues();

		// print_r($data['issues']);
		
		$this->load->view('admin_includes/template',$data);
	}

}