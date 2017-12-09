<?php 
// defined('BASEPATH') OR exit('No direct script access allowed');



/**
* Admin controller to perform the operation
*/
class Vandor extends CI_Controller
{
	

	public function __construct() {

		parent::__construct();
		
		if (!$this->session->userdata('is_logged_in')) {
			return redirect('admin_login');
		}

		if ($this->session->userdata('role') != 'vandor') {
			
			return redirect('admin_login');
		}
		

		$this->load->model('adminModel');
		$this->load->model('orderModel');
	}

	

	public function index() {

		 $this->dashboard();		
	}

	public function dashboard() {

		$data['main_content'] = 'admin/dashboard_view';

		if ($this->session->userdata('role')=='superadmin') {		
					
			$data['orders'] = $this->orderModel->get_orders_count();		
		} else {		
			$data['orders'] = $this->orderModel->get_my_orders_count();		
		}

		$this->load->view('admin_includes/template',$data);
		
		
	}

	public function create_category() {

		$data['main_content'] = 'admin/category/create_category';
		$data['categories']	 = $this->adminModel->all_category();
	

		$this->load->view('admin_includes/template',$data);			

	}





	public function products() {

		$data['main_content'] = 'admin/product/product_list';

		$this->load->view('admin_includes/template',$data); 
	}

	public function upload_image() {


		echo $this->adminModel->upload_image();

	}


	public function create() {

		$data['main_content'] = 'admin/vandor/create_vandor';

		$this->load->view('admin_includes/template',$data); 


	}

	
	
	

}