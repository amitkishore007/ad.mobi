<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


/**
* 
*/
class Order extends CI_Controller
{
	

	public function __construct() {

		parent::__construct();

		$this->check_login();

		$this->load->model('orderModel');

	}

	private function check_login(){

		if (!$this->session->userdata('is_logged_in')) {

			return redirect('admin_login');

		} elseif($this->session->userdata('role') !='vandor' && $this->session->userdata('role') !='superadmin'){

			return redirect('shop');
		}
	}

	public function index() {

		$data['main_content'] = 'admin/order/index';
		
		$data['my_orders']  = $this->orderModel->get_my_orders();
		// $data['my_reviews']  = $this->orderModel->get_my_product_reviews();
		// $data['reviews']  = $this->orderModel->get_my_product();

		
		//print_r($data['my_orders']);
		

		$this->load->view('admin_includes/template',$data);
	}


	public function change_status() {

		if ($this->input->post()) {
			
			$output = $this->orderModel->change_status();
			echo $output;
		} else {

			return redirect('shop');
		}


	}


	public function view_order($id) {

		if (!isset($id)) {
			
			return redirect('admin/order');
		}
		$id  = (int) $id;

		$data['main_content']  = 'admin/order/order_single';

		$data['order_single'] = $this->orderModel->get_order($id);

		$this->load->view('admin_includes/template',$data);


	}
	
	public function get_notification_count() {

		if ($this->input->post()) {
			
			$output = $this->orderModel->get_notification_count();

			echo $output;		

		} else {

			return redirect('admin');
		}
	}


	public function get_notification() {

		if ($this->input->post()) {
			
			$output = $this->orderModel->get_notification();

			echo $output;

		} else {


			return redirect('admin');
		}
	}


}