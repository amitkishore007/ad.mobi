<?php 

/**
* 
*/
class Sms extends CI_Controller
{
	
	public function send_order_sms() {

			// Authorisation details.
		$username = "kishoreamit5@gmail.com";
		$hash = "6bbd04aff8f0bbd4aa2c8f37bab6e7dbc325a6004e6bab205325ba3ffd13de89";

		// Config variables. Consult http://api.textlocal.in/docs for more info.
		$test = "0";

		// Data for text message. This is the text message data.
		$sender  = "TXTLCL"; // This is who the message appears to be from.
		$numbers = '8800417260'; // A single number or a comma-seperated list of numbers
		$message = 'Thankyou for using mobicharge ! your order is being process, Please login to view the status !'.base_url();
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

		print_r($result);

	}
}