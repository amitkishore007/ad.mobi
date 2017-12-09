<?php 
// defined('BASEPATH') OR exit('No direct script access allowed');



/**
* Admin controller to perform the operation
*/
class Admin extends CI_Controller
{
	

	public function __construct() {

		parent::__construct();
		
		$this->check_login();
		

		$this->load->model('adminModel');
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

	public function create_vandor() {

		if ($this->input->post()) {

			unset($_POST['vandor']);

			$output = $this->adminModel->create_vandor();

			echo json_encode($output);
			
		} else {

			return redirect('index');
		}
	}

	public function vandors() {

		$data['main_content'] = 'admin/vandor/vandor_list';

		$data['vandors']	 = $this->adminModel->all_user_type('vandor');

		$this->load->view('admin_includes/template',$data);

	}

	public function edit($id){

		if (!isset($id)) {
			return redirect('index');
		}
		$id = (int) $id;
		$data['main_content'] = 'admin/vandor/edit_vandor';
		$data['vandor']	 = $this->adminModel->find_vandor($id);
		$this->load->view('admin_includes/template',$data);


	}

	public function delete_vandor() {

		if ($this->input->post()) {

			unset($_POST['delete']);

			$output = $this->adminModel->delete_vandor();

			echo json_encode($output);
			
		} else {

			return redirect('index');
		}

	}


	public function my_profile() {

		$data['main_content'] = 'admin/profile/my-profile';
		$data['my_profile'] = $this->adminModel->get_my_info();;


		// print_r($data['my_profile']);
		$this->load->view('admin_includes/template',$data);


	}

	public function seller($id) {


		if (!isset($id)) {
			
			return redirect('admin');
		}

		$id = (int) $id;

		$data['main_content']  = 'admin/vandor/seller_single';

		$data['seller'] = $this->adminModel->get_seller($id);

		$this->load->view('admin_includes/template',$data);
	}


	

}