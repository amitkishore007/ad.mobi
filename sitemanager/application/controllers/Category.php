<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
* 
*/
class Category extends CI_Controller
{
	
	
	public function __construct() {

		parent::__construct();
		
		$this->check_login();
		

		$this->load->model('categoryModel');

	}

	private function check_login(){

		if (!$this->session->userdata('is_logged_in')) {

			return redirect('shop');

		} elseif($this->session->userdata('role') !='superadmin'){

			return redirect('shop');
		}
	}

	public function create() {

		$data['main_content'] = 'admin/category/create_category';

		$data['categories'] = $this->categoryModel->allCategory();

		
		$this->load->view('admin_includes/template',$data);

	}


	public function store_category() {


		if ($this->input->post('category')) {


			unset($_POST['category']);

			// print_r($_POST);
			$result = $this->categoryModel->create_category();

			echo json_encode($result);

			
		} else {

			$this->dashboard();
		}

	}

	public function top_category() {

		if ($this->input->post()) {
			
			$output = $this->categoryModel->top_category();

			echo $output;

		} else {

			return redirect('admin');
		}
	}


	public function edit_category() {


		if ($this->input->post('category')) {


			unset($_POST['category']);

			// print_r($_POST);
			$result = $this->categoryModel->edit_category();

			echo json_encode($result);

			
		} else {

			$this->dashboard();
		}

	}

	public function delete(){

		if ($this->input->post()) {
			
			$output = $this->categoryModel->deleteCategory();

			echo json_encode($output);


		} else {

			return redirect('category');
		}


	}

	public function edit($id){


		if (!isset($id)) {
			
			return redirect('category');
		}

		$id  = (int) $id;
		$data['main_content'] = 'admin/category/edit_category';
		$data['category']	 = $this->categoryModel->find_category($id);
		$data['categories']	 = $this->categoryModel->allCategory();

		if ($data['category']) {
			
			$this->load->view('admin_includes/template',$data);
		
		} else {

			return redirect('category');
		}


	}

	public function index() {


		$data['main_content'] = 'admin/category/category_list';
		$data['categories'] = $this->categoryModel->fetchCategoryTree();
		$this->load->view('admin_includes/template',$data);


	}


	public function home_category() {

		$data['main_content'] = 'admin/category/home_category';

		$data['categories'] = $this->categoryModel->allCategory();

	// print_r($data['categories']);
		$data['category_one_one']   = $this->categoryModel->get_admin_home_category('one',1);
		$data['category_one_two']   = $this->categoryModel->get_admin_home_category('one',2);
		$data['category_one_three'] = $this->categoryModel->get_admin_home_category('one',3);
		$data['category_two_one']   = $this->categoryModel->get_admin_home_category('two',1);
		$data['category_two_two']   = $this->categoryModel->get_admin_home_category('two',2);
		$data['category_two_three'] = $this->categoryModel->get_admin_home_category('two',3);
		
		$this->load->view('admin_includes/template',$data);
	}

	public function set_home_category() {

		if ($this->input->post()) {
			
			$output = $this->categoryModel->set_home_category();

			echo $output;


		} else {

			return redirect('category');
		}


	}

	public function get_variations() {

		if ($this->input->post()) {
			
			$output = $this->categoryModel->get_variations();

			echo json_encode($output);

		} else {

			return redirect('admin');
		}
	}

	public function upload_image() {
          
				$config['upload_path']   = '../uploads';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['encrypt_name']  = TRUE;
				$config['remove_spaces'] = TRUE;
				$output = array('status'=>false,'name'=>'','error'=>'');


            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {

                $data = $this->upload->data();

				$config['image_library']  = 'gd2';
				$config['source_image']   = '../uploads/'.$data['file_name'];
				$config['new_image']      = '../uploads/';
				$config['maintain_ratio'] = TRUE;
				$config['width']          = 250;
				// $config['height']         = 400;
				$config['overwrite']      = TRUE;
				
				$this->load->library('image_lib', $config); 
				if (!$this->image_lib->resize()) {
				    return 'There was en error with image uploading, try later!';
				}

				// return $data['file_name'];
				// $this->db->insert('product_images',['name'=>$data['file_name'],'user_id'=>$this->session->userdata('user_id')]);
				$output['status'] = true;
				$output['name']   = $data['file_name'];
				
				
            } else {
				$output['error'] = 'could not upload image, try later';

            }
            echo json_encode($output);
	}


}