<?php


/**
* 
*/
class CheckoutModel extends CI_Model
{


	
	var $sms_api = '178420AtDu9lTWR59f056c8';

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
			$output["country"]        = form_error('country');
			$output["pincode"]        = form_error('pincode');
			$output["phone"]          = form_error('phone');
			$output["order_note"]     = form_error('order_note');
			$output["state"]     	= form_error('state');
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

				$output['email'] = 'Email address is already registered !!';
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
							
							$response = $this->send_message($info['phone']);
							$rslt = json_decode($response);

							$this->send_order_sms($info['phone'],'Thankyou for using mobicharge ! your order is being process, Please login to view the status ! '.base_url());
							$this->cart->destroy();
							$this->session->set_userdata('order_placed','Successfully order placed');
						}


				}

			}
		}



		}

		return $output;

	}


	private function send_message($number) {

			$auth_key = $this->sms_api;
			
			$url ='https://control.msg91.com/api/sendhttp.php?authkey='.$auth_key.'&mobiles='.$number.'&message=your order received,please login at Mobicharge%20http://www.mobicharge.co.in%20to view your order status status&sender=MOBICH&route=4&country=91';
			 if(!function_exists("curl_init")) return "cURL extension is not installed";
			    if (trim($url) == "") die("@ERROR@");
			    $curl = curl_init($url);
			    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
			    curl_setopt($curl, CURLOPT_POST, 1);                        
			    // curl_setopt($curl, CURLOPT_USERPWD, 'username:password');
			    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);                    
			    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);                          
			    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);                       
			    $response = curl_exec($curl);                                          
			    $resultStatus = curl_getinfo($curl);                                   
			   	
			    if($resultStatus['http_code'] == 200) {
			       
			        // All Ok
			    
			    } else {

			        return json_encode($resultStatus);                            
				}

			    $curl = null;
			    return utf8_encode($response);

	}


	private function send_order_mail() {


		
	}	

	private function send_order_sms($phone,$message) {

			// Authorisation details.
		$username = "kishoreamit5@gmail.com";
		$hash = "6bbd04aff8f0bbd4aa2c8f37bab6e7dbc325a6004e6bab205325ba3ffd13de89";
		
		// Config variables. Consult http://api.textlocal.in/docs for more info.
		$test = "0";
		
		// Data for text message. This is the text message data.
		$sender  = "TXTLCL"; // This is who the message appears to be from.
		$numbers = $phone; // A single number or a comma-seperated list of numbers
		$message = $message;
		// 612 chars or less
		// A single number or a comma-seperated list of numbers
		$message = urlencode($message);
		$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
		$ch = curl_init('http://api.textlocal.in/send/?');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch); // This is the result from the API
		curl_close($ch);

	}

}