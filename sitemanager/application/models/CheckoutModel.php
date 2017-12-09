<?php


/**
* 
*/
class CheckoutModel extends CI_Model
{


	
	
	public function checkout() {

		$info = $this->input->post();


		$this->load->library('form_validation');

		$output = array('status'=>'false','fname'=>'','lname'=>'','email'=>'','address'=>'','address2'=>'','city'=>'','country'=>'','pincode'=>'','phone'=>'','order_note'=>'','state'=>'','payment_method'=>'');
		$check = true;
		if ($this->form_validation->run('checkout_form_validation')==FALSE) {
			

			$output['status']     = 'false';
			$this->form_validation->set_error_delimiters('', '');
			$output["fname"]          = form_error('fname');
			$output["lname"]          = form_error('lname');
			$output["email"]          = form_error('email');
			$output["address"]        = form_error('address');
			$output["address2"]       = form_error('address2');
			$output["city"]           = form_error('city');
			$output["country"]       = form_error('country');
			$output["pincode"]        = form_error('pincode');
			$output["phone"]          = form_error('phone');
			$output["order_note"]     = form_error('order_note');
			$output["state"]     = form_error('state');
			$output["payment_method"] = form_error('payment_method');
			

		} else {


			$info['order_status']   = 'pending';
			$info['payment_status'] = 'pending';

			$type = $info['type'];
			unset($info['type']);
			
			if ($this->session->userdata('is_logged_in')) {
				$info['user_id']  = $this->session->userdata('user_id');
			
			} elseif($type=='create_account') {

				$qry  = $this->db->where(['email'=>$info['email']])->get('users');

				if ($qry->num_rows()) {
				
					$check = false;
				}			

				if ($check) {
						# code...

					$array = array(
					'fname'       =>$info['fname'],
					'lname'       =>$info['lname'],
					'phone'       =>$info['phone'],
					'email'       =>$info['email'],
					'password'    =>md5($info['password']),
					'country'     =>$info['country'],
					'state'       =>$info['state'],
					'city'        =>$info['city'],
					'zipcode'     =>$info['pincode'],
					'address'     =>$info['address'],
					'user_type'   =>'user'
					// 'address_two' =>$info['address2']
					);

				
				$this->db->insert('users',$array);	
				// return $array;
				
				if ($this->db->affected_rows()) {
					
					$info['user_id'] = $this->db->insert_id();

				}
			} else {

				$output['email'] = 'Email field should be unique !';
			}	 

				
		}

		if ($check) {
			# code...
		
			unset($info['password']);

			if ($this->cart->total_items()>0) {

				$check = 0;
				
				$this->db->insert('order_product',$info);

				if ($this->db->affected_rows()) {

						$order_id = $this->db->insert_id();

						$output['status'] = 'true';
						$cart_items = $this->cart->contents();

						foreach ($cart_items as $item) {
							
							$this->db->insert('cart',['product_id'=>$item['id'],'order_id'=>$order_id,'qty'=>$item['qty'],'subtotal'=>$item['subtotal']]);

							$check = 1;
						}

						if ($check) {
							
							$output['status'] = 'true';
							$this->cart->destroy();
							$this->session->set_userdata('order_placed','Successfully order placed');
						}


				}

			}
		}



		}

		return $output;

	}


	private function send_order_mail() {


		
	}	

}