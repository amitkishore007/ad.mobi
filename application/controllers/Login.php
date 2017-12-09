<?php 


/**
* 
*/
class Login extends CI_Controller
{
	

	public function __construct() {

		parent::__construct();
		$this->load->model('categoryModel');
		$this->load->model('productModel');
		$this->load->model('sliderModel');
		$this->load->model('bannerModel');
		$this->load->model('shopModel');
		$this->load->model('logoModel');
		$this->load->model('loginModel');

	}

	private function check_login(){

		if ($this->session->userdata('is_logged_in')) {
		
			return redirect('shop');
		}
	}

	public function index() {

		$this->check_login();


		$this->data['main_content'] = 'public/login';

		$this->shop_init();
		$this->load->view('includes/template',$this->data);

	}
	
	public function login() {

		if ($this->input->post()) {

			$user = $this->loginModel->login('user');
			  
			echo json_encode($user);

				
		} else {

			return redirect('shop');
		}

	}


	public function login_vandor() {
		$this->check_login();


		$this->data['main_content'] = 'public/vandor_login';

		$this->shop_init();
		$this->load->view('includes/template',$this->data);
	}

	public function vandor_login() {

		if ($this->input->post()) {

			$user = $this->loginModel->login('vandor');
			  
			echo json_encode($user);

				
		} else {

			return redirect('shop');
		}

	}

	public function shop_init() {

		$this->data['category_search_left'] = $this->categoryModel->fetchCategoryTree_frontend();
		
		$this->data['categories']           =  $this->categoryModel->allCategory_array();
		
		$this->data['logo'] 				  = $this->logoModel->getLogo(); 

		$this->data['cart_items']			  = $this->shopModel->getCartItem();

		$this->data['total_cart_price']	  = $this->cart->total();

		$this->data['total_cart_items']	  = $this->cart->total_items();

		$this->data['home_categories']	  = $this->categoryModel->home_category();

	}

	public function signup() {

		$this->check_login();

		$this->data['main_content'] = 'public/user_signup';

		$this->shop_init();
		$this->load->view('includes/template',$this->data);

	}


	public function create_user() {

		if ($this->input->post()) {

			$output = $this->shopModel->create_user('user');

			echo json_encode($output);
			
		} else {

			return redirect('shop/signup');
		}
	}

	public function create_vandor() {

		if ($this->input->post()) {

			$output = $this->shopModel->create_user('vandor');

			echo json_encode($output);
			
		} else {

			return redirect('shop/signup');
		}
	}

	public function logout() {

		$this->check_login();

		$data = array(

			'user_id'     , 
			'user_email'  , 
			'username'    , 
			'role'        , 
			'is_logged_in'
		);

		$this->session->unset_userdata($data);
		$this->session->session_destroy();

		return redirect('shop');
	}

	public function vandor_signup() {

		$this->check_login();
		$this->shop_init();

		$this->data['main_content'] = 'public/vandor_signup';

		$this->load->view('includes/template',$this->data);


	}
	
	public function forgot_password() {

		$this->check_login();
		$this->shop_init();

		$this->data['main_content'] = 'public/forgot_password';

		$this->load->view('includes/template',$this->data);

	}

	public function forgot_password_email() {

		if ($this->input->post()) {
				
				$output = $this->loginModel->send_forgot_email();

				echo $output;

		} else {

			return redirect('login/forgot_password');
		}
	}
	
}