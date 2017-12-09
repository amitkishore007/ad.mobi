<?php 
defined('BASEPATH') OR exit('No direct script access allowed');



/**
* 
*/
class Privacy extends CI_Controller
{
	
	

	public function __construct() {

		parent :: __construct();
		$this->check_login();
		$this->load->model('privacyModel');

	}

	private function check_login(){

		if (!$this->session->userdata('is_logged_in')) {

			return redirect('shop');

		} elseif($this->session->userdata('role') !='superadmin'){

			return redirect('shop');
		}
	}


	public function index() {

		$data['main_content'] = 'admin/privacy/index';
		$data['privacy'] = $this->privacyModel->findAll();

	
		$this->load->view('admin_includes/template',$data);

	}

	public function create() {

		$data['main_content'] = 'admin/privacy/create';

		$this->load->view('admin_includes/template',$data);


	}

	public function create_privacy() {

		if ($this->input->post()) {

			unset($_POST['privacy']);
			
			
			$status = $this->privacyModel->createPrivacy();

			echo json_encode($status);

		} else {

			return redirect('privacy');
		}

	}

	public function edit($id) {

		if (!isset($id)) {
			
			return redirect('privacy');
		}
		$id = (int) $id;

		$data['main_content'] = 'admin/privacy/edit';
		$data['privacy_content']  = $this->privacyModel->find_privacy($id);


		$this->load->view('admin_includes/template',$data);

	}


	public function store() {

		if ($this->input->post()) {

			unset($_POST['edit']);
			
			$status = $this->privacyModel->editAbout();

			echo json_encode($status);

		} else {

			return redirect('privacy/index');
		}


	}

	public function delete() {

		if ($this->input->post()) {

			unset($_POST['delete']);

			$status = $this->privacyModel->deleteAbout();

			echo json_encode($status);
			
		} else {

			return redirect('privacy');
		}


	}

	public function change_status() {

		if ($this->input->post()) {
		
			$status = $this->privacyModel->change_status();
			echo $status;

		} else {

			return redirect('privacy');
		}
	}


}