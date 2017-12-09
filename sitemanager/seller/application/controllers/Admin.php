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

			return redirect('login');

		} elseif($this->session->userdata('role') !='vandor'){

			return redirect('login');
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

	public function edit_address() {

		$data['main_content']  = 'admin/profile/edit_address';
		$data['my_profile'] = $this->adminModel->get_my_info();;


		$this->load->view('admin_includes/template',$data);

	}

	public function change_address() {

		if ($this->input->post()) {
			
			$output  = $this->adminModel->change_address();

			echo json_encode($output);	

		} else {

			return redirect('admin');
		}
	}

	public function edit_bank() {

		$data['main_content']  = 'admin/profile/edit_bank';
		$data['my_profile'] = $this->adminModel->get_my_info();;


		$this->load->view('admin_includes/template',$data);

	}

	public function change_bank() {

		if ($this->input->post()) {
			
			$output  = $this->adminModel->change_bank();

			echo json_encode($output);	

		} else {

			return redirect('admin');
		}
	}

	public function edit_personal_info() {

		$data['main_content']  = 'admin/profile/edit_personal';
		$data['my_profile'] = $this->adminModel->get_my_info();;


		$this->load->view('admin_includes/template',$data);

	}

	public function change_personal_info() {

		if ($this->input->post()) {
			
			$output  = $this->adminModel->change_personal_info();

			echo json_encode($output);	

		} else {

			return redirect('admin');
		}
	}


	public function upload_attachment() {
     
     			$config['upload_path']   = './uploads';
				$config['allowed_types'] = 'gif|jpg|png|doc|docx|csv|xls|xlsx|pdf|jpg|png|bmp';
				$config['encrypt_name']  = TRUE;
				$config['remove_spaces'] = TRUE;
				$output = array('status'=>false,'name'=>'','error'=>'');


            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {

                $data = $this->upload->data();
				
				$output['status'] = true;
				$output['name']   = $data['file_name'];
				
				
            } else {
				$output['error'] = 'could not upload image, try later';

            }
            echo json_encode($output);
	}

	public function submit_seller_support() {

		if ($this->input->post()) {
			
			$output = $this->adminModel->submit_seller_support();

			echo json_encode($output);

		} else {

			return redirect('admin');
		}

	}
	

}