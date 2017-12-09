<?php 
defined('BASEPATH') OR exit('No direct script access allowed');



/**
* 
*/
class Checkout extends CI_Controller
{
	
	public function __construct(){

		parent::__construct();

		$this->load->model('categoryModel');
		$this->load->model('productModel');
		$this->load->model('sliderModel');
		$this->load->model('bannerModel');
		$this->load->model('checkoutModel');
		$this->load->model('shopModel');
		$this->load->model('logoModel');
		$this->load->model('walletModel');
		
	}

	public function index() {

		$data['main_content']         = 'public/checkout';
		
		$data['category_search_left'] = $this->categoryModel->fetchCategoryTree_frontend();
		
		$data['categories']           =  $this->categoryModel->allCategory_array();
		
		$data['logo'] 				  = $this->logoModel->getLogo(); 

		$data['cart_items']			  = $this->shopModel->getCartItem();

		$data['total_cart_price']	  = $this->cart->total();

		$data['total_cart_items']	  = $this->cart->total_items();

		$data['home_categories']	  = $this->categoryModel->home_category();

		
		

		$this->load->view('includes/template',$data);

	}

	public function order_checkout() {

		
		if ($this->input->post()) {
			
			$output = $this->checkoutModel->checkout();

			echo json_encode($output);

		} else {

			return redirect('shop');

		}

		// print_r($_POST);
	}


	public function order_confirmation() {

		$data['main_content'] 		 = 'public/invoice'; 

		$data['category_search_left'] = $this->categoryModel->fetchCategoryTree_frontend();
		
		$data['categories']           =  $this->categoryModel->allCategory_array();
		
		$data['logo'] 				  = $this->logoModel->getLogo(); 

		$data['cart_items']			  = $this->shopModel->getCartItem();

		$data['total_cart_price']	  = $this->cart->total();

		$data['total_cart_items']	  = $this->cart->total_items();

		$data['home_categories']	  = $this->categoryModel->home_category();


		$this->load->view('includes/template',$data);

	}

	public function check_wallet() {

		if ($this->input->post()) {
				
			$output = $this->walletModel->check_wallet();

			echo $output;
		} else {

			return redirect('shop');
		}

	}
}

