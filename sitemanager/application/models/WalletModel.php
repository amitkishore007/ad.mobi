<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


/**
* 
*/
class WalletModel extends CI_Model
{

	var $member_id    = 'AP17000148';
	var $api_password = 'cSvYD1a27';
	var $errors = array(

		0  => 'success',
		1  => 'Invalid Partner,Partner id not register with the system  Failed',
		2  => 'Service Not Available   Failed',
		3  => 'Invalid Request format(parse error) Failed',
		4  => 'Authentication error,invalid username or passowrd  Failed',
		5  => 'Argument mismatch Failed',
		6  => 'Invaid operator   Failed',
		7  => 'Duplicate order,Order ID must be unique   Failed',
		8  => 'Invalid Mobile no Failed',
		9  => 'Invalid Amount format   Failed',
		10  => 'invalid Recharge limit  Failed',
		11  => 'Recharge type error!itmust be normal or special Failed',
		12  => 'Empty request value,requerst with proper input  Failed',
		13  => 'Insufficent Fund  Failed',
		14  => 'Operator down,please try after some time! Failed',
		15  => 'Operator down,please try after some time! Failed',
		16  => 'Request Error! Failed',
		17  => 'Order Not found ! Failed    ',
		101  => 'Invalid format of personal account number.   Failed',
		102  => 'Invalid request message format!  Failed',
		103  => 'Session with such a number does not exist!   Failed',
		104  => 'The phone number does not match the previously entered number! Failed',
		105  => 'The payment amount does not match the previously entered amount ! Failed',
		106  => 'The account number does not match the previously entered number!  Failed',
		107  => 'Invalid Mobile Number. Make sure your number belongs to this provider.  Failed',
		108  => 'Repeated payment within 60 minutes from the end of payment effecting process. Failed',
		109  => 'This denomination is applicable in <Flexi OR Special> category Failed',
		110  => 'Invalid account number. Failed',
		111  => 'The card of the specified value is not registered in the system   Failed',
		112  => 'Session is expired. Try to start new session Failed',
		113  => 'Exceeded the maximum payment amount.   Failed',
		114  => 'Daily debit amount has been exceeded.  Failed',
		115  => 'AMOUNT ALL is invalid   Failed',
		116  => 'Duplicate number request received within allowed time frame of respective operator  Failed',
		999  => 'Unknown error!Try after some time later.  Failed',

		);
	
	public function get_my_wallet_money() {

		$wallet_money = $this->db->query('SELECT SUM(debit) + SUM(credit) as wallet_money FROM wallet WHERE user_id ='.$this->session->userdata('user_id'));
		

		if ($wallet_money) {
			
			return $wallet_money->row();
		}


	}

	public function check_wallet() {

		$cart_price  = $this->cart->total();

		$wallet_money = $this->get_my_wallet_money();

		$output = 'error';
		if ($cart_price > $wallet_money->wallet_money) {
			
			$output = 'success';
		}
		return $output;

	}
	public function add_wallet($user_id,$amount,$txnid) {

		$this->db->insert('wallet',[
			'user_id'=>$user_id,
			'credit'=>$amount,
			'transaction_id'=>$txnid
			]);

		if ($this->db->affected_rows()==1) {
			
			return true;
		}
	}



	public function recharge(){


		// {"num":"8800417260","circle":"5","amount":"11","recharge_type":"prepaid","request_id":"239934484"}

		$this->load->library('form_validation');

		$output = array('status'=>'false','error'=>'');
		if ($this->form_validation->run('recharge_validation')==FALSE) {
		
			$output['num'] = form_error('num');
			$output['circle'] = form_error('circle');
			$output['amount'] = form_error('amount');
			$output['recharge_type'] = form_error('recharge_type');
			$output['operator'] = form_error('operator');
			$output['request_id'] = form_error('request_id');
			$output['error'] = '';


		} else {

			$info = $this->input->post();
			$wallet = $this->get_my_wallet_money();

			if( $info['amount'] < 10){
			
				$output['error'] = 'plese enter a valid amount ! ';

			}else if (!isset($wallet) || $wallet->wallet_money < $info['amount']) {
				
				$output['error'] = 'Please add fund to your wallet !';
			
			} else {

				$result = json_decode($this->do_recharge($info['num'],$info['operator'],$info['recharge_type'],$info['amount'],$info['circle'],$info['request_id']));

				if ($result->ERROR == 0) {
						
						// success 
						// insert into recharge table

						$recharge_data = array('user_id'=>$this->session->userdata('user_id'),'type'=>'recharge','phone'=>$info['num'],'circle'=>$info['circle'],'amount'=>$info['amount'],'recharge_type'=>$info['recharge_type'],'operator'=>$info['operator'],'request_id'=>$info['request_id']);	

						$this->db->insert('recharge_bill',$recharge_data);

						if ($this->db->affected_rows()==1) {
							// insert into wallet as debit
							$data = array('credit'=>0,'debit'=>$info['amount'],'user_id'=>$this->session->userdata('user_id'));
							$this->db->insert('wallet',$data);
							if ($this->db->affected_rows()==1) {
								
								$output['status'] = 'success';
							}
							
						}

				} else {

					$output['error'] = $this->errors[$result->ERROR];

				}

			} 



		}

		return $output;

			

	}


	private function do_recharge($num,$operator_code,$recharge_type,$amount,$circle,$request_id) { 

			
			$url = "http://ezytm.in/get/".$recharge_type."/mobile?member_id=".$this->member_id."&api_password=".$this->api_password."&mobile_no=".$num."&operator_code=".$operator_code."&amount=".$amount."&member_request_id=".$request_id."&circle=".$circle."&recharge_type=NORMAL&user_var1=123&user_var2=56&user_var3=234";
			 if(!function_exists("curl_init")) return "cURL extension is not installed";
			    if (trim($url) == "") die("@ERROR@");
			    $curl = curl_init($url);
			    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
			    // curl_setopt($curl, CURLOPT_POST, 1);
			    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');                        
			    // curl_setopt($curl, CURLOPT_USERPWD, 'username:password');
			    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);                    
			    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);                          
			    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);                       
			    $response = curl_exec($curl);                                          
			    $resultStatus = curl_getinfo($curl);                                   
			    if($resultStatus['http_code'] == 200) {
			       
				   	$output = utf8_encode($response);
			        // All Ok
			    
			    } else {

			        $output = json_encode($resultStatus);                            
				}

			    $curl = null;
			    return $output;      
		}

}