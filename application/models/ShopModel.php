<?php 



/**
* 
*/
class ShopModel extends CI_Model
{
	public function __construct() {

		parent::__construct();
	}

	public function add_to_cart() {

		// print_r($_POST);

		$info = $this->input->post();

		$product_id = $info['product_id'];

		$q = $this->db->where(['id'=>$product_id])->get('products');

		if ($q->num_rows()) {
				

				$product = $q->row();


				// print_r($product);
				$data = array(
			     
			        'id'      => $product->id,
			        'qty'     => $info['product_qty'],
			        'price'   => $product->price,
			        'name'    => $product->title ? $product->title : 'Nill',
			        'thumbnail'=>$product->thumbnail ? $product->thumbnail : 'Nill',
			        'upload_type'=>$product->upload_type
			        
				);

				$q1 = $this->cart->insert($data);

				if ($q1) {
		

					$output = 'success';

				} else {

					$output = 'error';

				}


		
		} else {

			$output = 'error';


		}

		return $output;

	}


	public function getCartItem() {

		return $this->cart->contents();
	}

	public function get_cart() {

		$cart_items = $this->getCartItem();
		$total_items= $this->cart->total_items();

				$output = '';

				$array = array('output'=>'','items'=>0,'price'=>'');

		if ($total_items) {
			// fetch the cart items and send back to ajax request
				
				$output .= '<ul class="cart_list product_list_widget">
					';
	
			foreach ($cart_items as $item) {

			
			
				$output .='<li class="mini_cart_item" id="'.$item['rowid'].'">';
				$output .='<a title="Remove this item" class="remove removeProduct" data-productHash="'.$item['rowid'].'" data-productId="'.$item['id'].'" href="javascript:void(0);">×</a>';
				$output .='<a href="'.base_url('shop/quickview/'.$item['id']).'">';
				if(!isset($item['thumbnail'])):
				
						$output .= '<img  data-echo="'.base_url('assets/img/placeholder.jpg').'" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">';

				else:
					if($item['thumbnail']=='excel'):
						$output .= '<img data-echo="'.$item['thumbnail'].'" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">';
					else:
						$output .= '<img  data-echo="'.base_url('uploads/'.$item['thumbnail']).'" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">';
					endif;

				endif;
				
				$output .='</a>';
				$output .='<span class="quantity">'.$item['qty'].' × <span class="amount">Rs.'.$item['subtotal'].'</span></span>';
				$output .='</li>';

			}
			
				
				$output .= '</ul><!-- end product list -->';
				$output .= '<p class="total"><strong>Subtotal:</strong> <span class="amount">Rs.'.$this->cart->total().'</span></p>';
				$output .= '<p class="buttons">';
				$output .= '<a class="button wc-forward" href="'.base_url('cart').'">View Cart</a>';
				$output .= '<a class="button checkout wc-forward" href="'.base_url('shop/checkout').'">Checkout</a>';
				$output .= '</p>';



		} else {

			$output = '<span class="text-center"> Nothing in your shopping cart</span>';


		}
		$array['output'] = $output;
		$array['items'] = $this->cart->total_items();
		$array['price'] = $this->cart->total();


		return $array;
	}


	public function create_user($user_type) {

		

		$this->load->library('form_validation');

		$output = array('status'=>'false','name'=>'','email'=>'','phone'=>'','password'=>'','retype'=>'','state'=>'','city'=>'','address'=>'','zipcode'=>'');

		if ($this->form_validation->run('user_registration_form_validation')==FALSE) {

			 	$this->form_validation->set_error_delimiters('', '');
				$output['name']     = form_error('name');
				$output['email']    = form_error('email');
				$output['phone']    = form_error('phone');
				$output['password'] = form_error('password');
				$output['retype']   = form_error('retype-password');
				$output['state']    = form_error('state');
				$output['city']     = form_error('city');
				$output['address']  = form_error('address');
				$output['zipcode']  = form_error('zipcode');


		} else {

			
			unset($_POST['retype-password']);
			$info = $this->input->post();
			$info['username'] = $info['name'];
			unset($info['name']);	
			
			$info['password'] = md5($info['password']);
			$info['user_type'] = $user_type;


			$this->db->insert('users',$info);

			if ($this->db->affected_rows()==1) {
				
				$q = $this->db->where(['email'=>$info['email']])->get('users');
				$user = $q->row();
				$data = array(
					'is_logged_in'=>1,
					'username'=>$user->username,
					'user_id'=>$user->id,
					'user_email'=>$user->email
					);

				$this->session->set_userdata($data);
				
				$output['status'] = 'success';
			} 
		}

		return $output;



	}

	public function add_to_wishlist() {

		$product_id = (int) $this->input->post('product_id');

		$q = $this->db->where(['product_id'=>$product_id,'user_id'=>$this->session->userdata('user_id')])->get('wishlist');

		$output = 'success';
		
		if (!$q->num_rows()) {
			
			$this->db->insert('wishlist',['product_id'=>$product_id,'user_id'=>$this->session->userdata('user_id')]);

			if (!$this->db->affected_rows()) {
				
				$output = 'error';
			}
		}
		return $output;

	}

	public function get_operator() {

		$category = $this->input->post('option');

		$q = $this->db->where(['category'=>$category])->get('operators');

		$output = array('status'=>'false','output'=>'');

		$output['output'] .='<option>Select Operator</option>';

		if ($q->num_rows()) {
			
			foreach ($q->result() as $operator) {
				
				$output['output'] .= '<option value="'.$operator->operator_id.'">'.$operator->name.'</option>';
			}
			$output['status']='true';
		}

		return $output;
	}

	public function get_prepaid_operator() {

		$q = $this->db->where(['category'=>'prepaid'])->get('operators');

		if ($q->num_rows()) {
			
			return $q->result();
		}
	}


}



		
	
		
