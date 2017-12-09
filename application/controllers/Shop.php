<?php 
defined('BASEPATH') OR exit('No direct script access allowed');



/**
* Shop controller for ecommerce 
*/
class Shop extends CI_Controller
{
	
	var $data = array();
	
	public function __construct(){

		parent::__construct();

		$this->load->model('categoryModel');
		$this->load->model('productModel');
		$this->load->model('sliderModel');
		$this->load->model('bannerModel');
		$this->load->model('shopModel');
		$this->load->model('logoModel');
		$this->load->model('walletModel');
		$this->load->model('userModel');
		$this->load->model('privacyModel');
		
	}
	
	public function shop_init() {

		$this->data['category_search_left'] = $this->categoryModel->fetchCategoryTree_frontend();
		
		$this->data['categories']           =  $this->categoryModel->allCategory_array();
		
		$this->data['logo'] 				  = $this->logoModel->getLogo(); 


		$this->data['cart_items']			  = $this->shopModel->getCartItem();

		$this->data['total_cart_price']	  = $this->cart->total();

		$this->data['total_cart_items']	  = $this->cart->total_items();

		$this->data['home_categories']	  = $this->categoryModel->home_category();
		
		$this->data['top_categories']	  = $this->categoryModel->get_top_category();

		$this->data['privacy_policy'] = $this->privacyModel->get_privacy();

		$this->data['prepaid_operators'] = $this->shopModel->get_prepaid_operator();

		// print_r($this->data['top_categories']);

		if ($this->session->userdata('is_logged_in')) {
			
			$this->data['wallet']		 = $this->walletModel->get_my_wallet_money();
			// print_r($this->data['wallet']);
		}

	}

	public function index() {

		$this->data['main_content']         = 'public/home';
		
		$this->shop_init();

		$this->data['banners']              = $this->bannerModel->getAll(1);
		
		$this->data['slides']               = $this->sliderModel->getAll();
		
		$this->data['latest_products']	 = $this->productModel->getLatestProducts(10);

		$this->data['hot_sale']             = $this->productModel->find_hot_sale();
		
		$this->data['banner_shop_category'] = $this->bannerModel->getBanner('shop_category');
		
		$this->data['banner_shop_arrival'] = $this->bannerModel->getBanner('below_arrival');

		$this->data['third_category'] = $this->categoryModel->get_home_category_type('three');
		
		$this->data['fourth_category'] = $this->categoryModel->get_home_category_type('four');

		if (isset($this->data['third_category'])) {
			
			$this->data['third_category_product'] = $this->productModel->get_category_product($this->data['third_category']);
		}
		if (isset($this->data['fourth_category'])) {
			
			$this->data['fourth_category_product'] = $this->productModel->get_category_product($this->data['fourth_category']);
		}

		$this->load->view('includes/template',$this->data);



	}

	private function first_twenty_first_catProduct($cat_id,$limit,$offset){

	
		$result = array('status'=>'false','output'=>'');

		$output  = '';

			
			$result['status'] = 'success';

			$output .= '<div class="ltabs-items-inner ltabs-slider ">';

			

					$array = $this->productModel->get_cat_products($cat_id,$limit,$offset); 

					if(isset($array)): 		
				
					foreach ($array as $product) :
				

				$output .= '<div class="product ">';
				$output .= '<div class="product-outer">';
				$output .= '<div class="product-inner">';
				$output .= '<span class="loop-product-categories"><a href="'.$product->category_id.'" rel="tag">'.$product->category.'</a></span>';
				$output .= '<a href="'.base_url('shop/quickview/'.$product->id).'">';
				$output .= '<h3>'.$product->title.'</h3>';
				$output .= '<div class="product-thumbnail">';
				if(!isset($product->thumbnail)):
					
							$output .= '<img  data-echo="'.base_url('assets/img/placeholder.jpg').'" class="img-responsive" alt="">';

					else:
						if($product->upload_type=='excel'):
							$output .= '<img data-echo="'.$product->thumbnail.'" class="img-responsive" alt="">';
						else:
							$output .= '<img  data-echo="'.base_url('uploads/'.$product->thumbnail).'" class="img-responsive" alt="">';
						endif;

				endif;
				
				$output .= '</div>';
				$output .= '</a>';
				$output .= '<div class="price-add-to-cart">';
				$output .= '<span class="price">';
				$output .= '<span class="electro-price">';
				$output .= '<ins><span class="amount">Rs.'.$product->compare_price.' </span></ins>';
				$output .= '<span class="amount"> Rs.'.$product->price.'</span>';
				$output .= '</span>';
				$output .= '</span>';
				$output .= '<a rel="nofollow" href="javascript:void(0);" data-productId="'.$product->id.'" data-productQty="1" class="button add_to_cart_button addToCart">Add to cart</a>';
				$output .= '</div><!-- /.price-add-to-cart -->';
				$output .= '<div class="hover-area">';
				$output .= '<div class="action-buttons">';
				$output .= '<a href="javascript:void(0);" data-productId="'.$product->id.'" rel="nofollow" class="add_to_wishlist"> Wishlist</a>';
				// $output .= '<a href="javascript:void(0);" class="add-to-compare-link"> Compare</a>';
				$output .= '</div>';
				$output .= '</div>';
				$output .= '</div><!-- /.product-inner -->';
				$output .= '</div><!-- /.product-outer -->';
				$output .= '</div><!-- /.product -->';

				endforeach;	
			
				else :
						$output .= '<h4 class="text-center">No Products in this list !</h4>';
	
				endif;

					 	
										


					
					$result['output'] = $output;
	

		return $result;

	}


	private function first_twelve_first_catProduct($cat_id,$limit,$offset){

	
		$result = array('status'=>'false','output'=>'');

		$output  = '';

			

		$array = $this->productModel->get_cat_products($cat_id,$limit,$offset); 

		$result['status'] = 'success';

		if(isset($array)): 		
		
		
			foreach ($array as $product) :
		

			$output .= '<li class ="product">';
			$output .= '<div class="product-outer">';
			$output .= '<div class="product-inner">';
			$output .= '<span class="loop-product-categories"><a href="'.$product->category_id.'" rel="tag">'.$product->category.'</a></span>';
			$output .= '<a href="'.base_url('shop/quickview/'.$product->id).'">';
			$output .= '<h3>'.$product->title.'</h3>';
			
			$output .= '<div class ="product-thumbnail">';
			

			if(!isset($product->thumbnail)):
				
						$output .= '<img  data-echo="'.base_url('assets/img/placeholder.jpg').'" class="img-responsive" alt="">';

				else:
					if($product->upload_type=='excel'):
						$output .= '<img data-echo="'.$product->thumbnail.'" class="img-responsive" alt="">';
					else:
						$output .= '<img  data-echo="'.base_url('uploads/'.$product->thumbnail).'" class="img-responsive" alt="">';
					endif;

			endif;
			$output .= '</div>';
			$output .= '</a>';
			$output .= '<div class="price-add-to-cart">';
			$output .= '<span class      ="price">';
			$output .= '<span class      ="electro-price">';
			$output .= '<ins><span class="amount">Rs.'.$product->compare_price.' </span></ins>';
			$output .= '<span class="amount"> Rs.'.$product->price.'</span>';
			$output .= '</span>';
			$output .= '</span>';
			$output .= '<a rel="nofollow" href="'.base_url('shop/quickview/'.$product->id).'" data-productId="'.$product->id.'" data-productQty="1" class="button add_to_cart_button addToCart">Add to cart</a>';
			$output .= '</div><!-- /.price-add-to-cart -->';
			$output .= '<div class="hover-area">';
			$output .= '<div class="action-buttons">';
		
			$output .= '<a href="javascript:void();" data-productId="'.$product->id.'" rel="nofollow" class="add_to_wishlist">';
			$output .= 'Wishlist</a>';
		
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div><!-- /.product-inner -->';
			$output .= '</div><!-- /.product-outer -->';
			$output .= '</li>';


			endforeach;	
		
			else :
				$output .= '<h4 class="text-center">No Products in this list !</h4>';
		endif;

		$result['output'] = $output;



	

		return $result;

	}



	public function quickview($id) {

	$this->shop_init();

		if (!isset($id)) {
			
				return redirect('shop');
		}

		$id = (int) $id;

		$quick_product = $this->productModel->get_product($id);

		if ($quick_product) {

			$this->data['quick_product'] = $quick_product;		
			$this->data['main_content'] = 'public/quickview';

			$this->load->view('includes/template',$this->data);
				
		} else {

			return redirect('shop');
		}
	}

 	public function get_cat_products(){

 		if ($this->input->post()) {

 			$cat_id = (int) $this->input->post('cat_id');
 			$offset = (int) $this->input->post('offset');
 			$limit  = 1;

 			$result = $this->first_twenty_first_catProduct($cat_id,$limit,$offset);
 		 	echo json_encode($result);
 		} else {

 			return redirect('shop');
 		}
 	}


 	public function get_cat_products_two(){

 		if ($this->input->post()) {

 			$cat_id = (int) $this->input->post('cat_id');
 			$offset = (int) $this->input->post('offset');
 			$limit  = 12;

 			$result = $this->first_twelve_first_catProduct($cat_id,$limit,$offset);
 		 	echo json_encode($result);
 		} else {

 			return redirect('shop');
 		}
 	}

	public function add_to_cart() {


		if ($this->input->post()) {
			
			$status = $this->shopModel->add_to_cart();

			echo $status;

		} else {


			return redirect('shop');
		}

	}


	public function update_cart(){

		if ($this->input->post()) {
			
			$cart_data = $this->shopModel->get_cart();

			echo json_encode($cart_data);

		} else {

			return redirect('shop');
		}



	}

	public function remove_product() {

		if ($this->input->post()) {
			
			$info = $this->input->post();

			$q = $this->cart->remove($info['product_hash']);

			$output = array('status'=>'false','total_price'=>$this->cart->total());

			if ($q) {
				 
				 $output['status']  = 'success';

			} else {

				$output['status']  = 'error';
			}

			echo json_encode($output);

		} else {

			return redirect('shop');
		}

	}

	


	public function search() {

		if ($this->input->post()) {
			
			$products = $this->productModel->search();

			echo $products;


		} else  {

			return redirect('shop');

		}
	}


	public function search_product(){

			
		$this->shop_init();

		
		$s        =  $this->input->get('s')  ? addslashes(urldecode(trim($this->input->get('s')))) : ''  ;
		$category = (int) $this->input->get('category')  ? addslashes(urldecode(trim($this->input->get('category')))) : ''  ;

		

		if (isset($s) && isset($category)) {
			
			$this->data['latest_products']	 = $this->productModel->getLatestProducts(10);

			$this->data['search_products'] = $this->productModel->searchProducts($s,$category);

			$this->data['search_products_limit'] = $this->productModel->getLimit();
			
			$this->data['search_products_count'] = $this->productModel->count_search_products($s,$category);

			$this->data['main_content'] = 'public/products';

			$this->load->view('includes/template',$this->data);


		} else {

			return redirect('shop');
		}

	}


	public function checkout() {

		
		$this->data['main_content'] = 'public/checkout';
		$this->shop_init();

		if(!$this->data['total_cart_items']){
			return redirect('shop');
		}

		if ($this->session->userdata('is_logged_in')) {
			$this->data['myinfo']  = $this->userModel->get_my_details();
		}

		$this->load->view('includes/template',$this->data);
	}

	public function payment() {

		$this->shop_init();
		$this->data['main_content'] = 'public/payment';
        $this->load->view('includes/template',$this->data);


	}

	   public function ccavRequestHandler() {

	   	$data['main_content'] = 'public/ccavRequestHandler';
	  
        $this->load->view('includes/template',$data);

    }


    public function wallet() {

    	
    	$this->data['main_content'] = 'public/wallet';

    	$this->shop_init();

    	// print_r($_SESSION);

    	$this->load->view('includes/template',$this->data); 
    }


   public function failure() {

   	if ($this->input->post()) {
			
			$this->data['message'] = '';
			$status                =$_POST["status"];
			$firstname             =$_POST["firstname"];
			$amount                =$_POST["amount"];
			$txnid                 =$_POST["txnid"];
			
			$posted_hash           =$_POST["hash"];
			$key                   =$_POST["key"];
			$productinfo           =$_POST["productinfo"];
			$email                 =$_POST["email"];
			$salt                  ="H2y2OzafAe";

if (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        
                  }
	else {	  

        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

         }
		 $hash = hash("sha512", $retHashSeq);
  
       if ($hash != $posted_hash) {
	       $this->data['message'] =  "Invalid Transaction. Please try again";
		   }
	   else {

         $this->data['message']= "<h3>Your order status is ". $status .".</h3>". "<h4>Your transaction id for this transaction is ".$txnid.". You may try making the payment by clicking the link below.</h4>";
          
		 } 

   	$this->data['main_content'] = 'public/failure';
	$this->shop_init();
   	$this->load->view('includes/template',$this->data);

   	} else {

   		return redirect('shop');
   	}

   }

    public function success() {

    if ($this->input->post()) {
    
     $this->data['message'] = '';

	$status      =$_POST["status"];
	$firstname   =$_POST["firstname"];
	$amount      =$_POST["amount"];
	$txnid       =$_POST["txnid"];
	$posted_hash =$_POST["hash"];
	$key         =$_POST["key"];
	$productinfo =$_POST["productinfo"];
	$email       =$_POST["email"];
	$salt        ="H2y2OzafAe";

	if (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        
        }
	else {	  

        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.'Add money to wallet'.'|'.$amount.'|'.$txnid.'|'.$key;

        }
		 $hash = hash("sha512", $retHashSeq);
		 
       if ($hash != $posted_hash) {
	     
	       $this->data['message']  = "Successfully added amount in your wallet";
		 
	   	  $this->walletModel->add_wallet($this->session->userdata('user_id'),$amount,$txnid);
		   }
	   else {

	   	  $this->walletModel->add_wallet($this->session->userdata('user_id'),$amount,$txnid);
           	   
          $this->data['message'] = "<h3>Thank You. Your order status is ". $status .".</h3>"."<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>". "<h4>you have added Rs. " . $amount ." in your wallet</h4>";
           
		   } 	
   
   	$this->data['main_content'] = 'public/success';
   	$this->shop_init();
   	$this->load->view('includes/template',$this->data);

    } else {

    	return redirect('shop');
    }
   

   }

   public function generate_hash() {

   	if ($this->input->post()) {
   	
		$price        = $this->input->post('price');
		$MERCHANT_KEY = $this->input->post('merchant_key');
		$txnid        = $this->input->post('txnid');
		$SALT         = 'H2y2OzafAe';
		$username     = $this->input->post('username');
		$email        = $this->input->post('email');
		$udf          = $this->input->post('udf');
		

   		$hash_string = $MERCHANT_KEY."|".$txnid."|".$price."|Add money to wallet|".$username."|".$email."|".$udf."||||||||||".$SALT;
		$hash = hash('sha512', $hash_string); 

		echo $hash;

   	} else {

   		return redirect('shop');
   	}

   }

   public function load_more() {

   	if ($this->input->post()) {
   		
   		$output  = $this->productModel->load_more();
   	
   		echo $output;
   	
   	} else {
   	
   		return redirect('shop');
   	
   	}

 }


	public function get_product_count() {

	 		if ($this->input->post()) {
	 		
	 			$output = $this->productModel->get_product_count();
	 			echo $output;
	 		} else {

	 			return redirect('shop');
	 		}
	 }

	public function category($id) {

		if (!isset($id)) {
			
			return redirect('shop');

		} 

		$this->shop_init();
		$id = (int) $id;

		$this->data['main_content'] = 'public/category_view';
		$this->data['curr_cat'] = $this->categoryModel->getCategory($id);
		$this->data['child_category'] = $this->categoryModel->get_child_categories($id);

		$this->load->view('includes/template',$this->data);

	}

	public function recharge() {

		if ($this->input->post()) {
			
			$output = $this->walletModel->recharge();

			echo json_encode($output);

		} else {

			return redirect('shop');

		}		

		// echo $this->do_recharge('8800417260','1','prepaid',100,5);
	}

 

	public function home() {

		$this->shop_init();

		$this->data['main_content'] = 'public/shop';

		$this->data['latest_products'] = $this->productModel->getLatestProducts(21);

		$this->data['products_limit'] = $this->productModel->getLimit();

		$this->data['total_products'] = $this->productModel->get_total_products_count(1);

		$this->load->view('includes/template',$this->data);

	}

	public function user_signup() {

		$this->shop_init();

		$this->data['main_content'] = 'public/user_signup';
		$this->load->view('includes/template',$this->data);


	}


	public function my_account() {



		if (!$this->session->userdata('is_logged_in') || $this->session->userdata('role')!='user') {
			
			return redirect('shop');
		}

		$this->shop_init();

		$this->data['main_content'] = 'public/my_account';

		$this->data['personal_info'] = $this->userModel->get_my_details();

		$this->load->view('includes/template',$this->data);

	}

	public function save_personal_info() {

		if ($this->input->post()) {
			
			$output = $this->userModel->save_info();

			echo json_encode($output);

		} else {

			return redirect('shop');

		}

	}

	public function my_orders() {

		if (!$this->session->userdata('is_logged_in') || $this->session->userdata('role')!='user') {
			
			return redirect('shop');
		}

		$this->shop_init();

		$this->data['main_content'] = 'public/my_orders';

		$this->data['my_orders'] = $this->userModel->get_my_orders();

		$this->load->view('includes/template',$this->data);
	}

	public function wishlist() {

		if (!$this->session->userdata('is_logged_in') || $this->session->userdata('role')!='user') {
			
			return redirect('shop');
		}

		$this->shop_init();

		$this->data['main_content'] = 'public/my_wishlist';

		$this->data['my_wishlist'] = $this->userModel->get_my_wishlist();

		// print_r($this->data['my_wishlist']);
		$this->load->view('includes/template',$this->data);
	}


	public function address() {

		if (!$this->session->userdata('is_logged_in') || $this->session->userdata('role')!='user') {
			
			return redirect('shop');
		}

		$this->shop_init();

		$this->data['main_content'] = 'public/my_address';

		// $this->data['my_wishlist'] = $this->userModel->get_my_wishlist();

		// print_r($this->data['my_wishlist']);
		$this->load->view('includes/template',$this->data);
	}

	public function forgot_password() {

		if (!$this->session->userdata('is_logged_in') || $this->session->userdata('role')!='user') {
			
			return redirect('shop');
		}

		$this->shop_init();

		$this->data['main_content'] = 'public/forgot_password';

		// $this->data['my_wishlist'] = $this->userModel->get_my_wishlist();

		// print_r($this->data['my_wishlist']);
		$this->load->view('includes/template',$this->data);
	}

	public function customer_support() {

		$this->shop_init();

		$this->data['main_content'] = 'public/user_support';

		$this->load->view('includes/template',$this->data);
	}

	


	public function upload_image() {
          
				$config['upload_path']   = './uploads';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['encrypt_name']  = TRUE;
				$config['remove_spaces'] = TRUE;
				$output = array('status'=>false,'name'=>'','error'=>'');


            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {

                $data = $this->upload->data();

				$config['image_library']  = 'gd2';
				$config['source_image']   = './uploads/'.$data['file_name'];
				$config['new_image']      = './uploads/';
				$config['maintain_ratio'] = TRUE;
				$config['width']          = 400;
				$config['height']         = 400;
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

	public function my_review() {

		$this->data['main_content'] = 'public/user_reviews';
		$this->shop_init();


		$this->load->view('includes/template',$this->data);
	}

	public function help_and_faq() {

		$this->data['main_content'] = 'public/terms_and_condition/help_and_faq';
		$this->shop_init();

		$this->load->view('includes/template',$this->data);

	}
	public function help_centre() {

		$this->data['main_content'] = 'public/terms_and_condition/help_centre';
		$this->shop_init();

		$this->load->view('includes/template',$this->data);

	}
	public function infringement() {

		$this->data['main_content'] = 'public/terms_and_condition/infringement';
		$this->shop_init();

		$this->load->view('includes/template',$this->data);

	}
	public function payment_security() {

		$this->data['main_content'] = 'public/terms_and_condition/payment_security';
		$this->shop_init();

		$this->load->view('includes/template',$this->data);

	}

	public function recharge_policy() {

		$this->data['main_content'] = 'public/terms_and_condition/recharge_policy';
		$this->shop_init();

		$this->load->view('includes/template',$this->data);
	}

	public function return_and_cancellation() {

		$this->data['main_content'] = 'public/terms_and_condition/return_and_cancellation';
		$this->shop_init();

		$this->load->view('includes/template',$this->data);
	}

	public function return_policy() {

		$this->data['main_content'] = 'public/terms_and_condition/return_policy';
		$this->shop_init();

		$this->load->view('includes/template',$this->data);
	}

	public function shipping_policy() {

		$this->data['main_content'] = 'public/terms_and_condition/shipping_policy';
		$this->shop_init();

		$this->load->view('includes/template',$this->data);
	}

	public function terms_of_use() {
		$this->data['main_content'] = 'public/terms_and_condition/terms_of_use';
		$this->shop_init();

		$this->load->view('includes/template',$this->data);
	}	


	public function add_to_wishlist() {

		if ($this->input->post()) {
			
			$output = $this->shopModel->add_to_wishlist();

			echo $output;

		} else {

			return redirect('shop');
		}
	}
	
	
	public function get_operator() {

		if ($this->input->post()) {
			
			$output = $this->shopModel->get_operator();
			echo json_encode($output);

		} else {

			return redirect('shop');
		}
	}



}
