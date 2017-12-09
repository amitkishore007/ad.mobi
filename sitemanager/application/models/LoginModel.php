<?php 



/**
* 
*/
class LoginModel extends CI_Model
{
	
	public function login($user_type) {

		$info  = $this->input->post();

		$info['user_type'] = $user_type;
	
		$this->load->library('form_validation');

		$output = array();
		
		$output['status'] = "false";
		
		$output['error']    = "";
				

		if ($this->form_validation->run('login_form_validation')==FALSE) {
				
			$this->form_validation->set_error_delimiters('', '');
			$output['error']    = form_error('email') . ' : '.form_error('password');
			

		} else {

		
			$info['password'] = md5($info['password']);
			
			$result = $this->db->where($info)->get('users');

			if ($result->num_rows()) {
					
				$user  = $result->row();
				$data = array(

					'user_id'      => $user->id,
					'user_email'   => $user->email,
					'username'     => $user->username,
					'role'         => $user->user_type,
					'is_logged_in' => 1

					);

				$this->session->set_userdata($data);
				
				$output['status'] = "success";
			

			} else {
				
				$output['error']  = "Email/password did not matched !";
				
			}


		}

		return $output;

	}


	public function send_forgot_email() {

		$email  = $this->input->post('email');

		$output = 'false';

		$q = $this->db->where(['email'=>$email,'user_type'=>'user'])->get('users');

		if ($q->num_rows()) {
			
			$sent = $this->send_email($email);

			if ($sent) {
				
				$output = 'success';
			}
		} else {

			$output = 'not';
		}

		return $output;
	}

	 private function send_email($email) { 
         $from_email = 'info@mobicharge.co.in'; 
         $to_email = $email; 
   		
   		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'mail.mobicharge.co.in',
			'smtp_port' => 25,
			'smtp_user' => 'info@mobicharge.co.in',// your mail name
			'smtp_pass' => 'mobicharge@123',
			'mailtype'  => 'html', 
			'charset'   => 'iso-8859-1',
			 'wordwrap' => TRUE,
			 'crlf' => "\r\n",
			  'newline' => "\r\n"
		);
         //Load email library 
         $this->load->library('email',$config); 
   
         $this->email->from($from_email, 'Mobicharge '); 
         $this->email->to($to_email);
         $this->email->subject('Password reset mail'); 
         $msg = 'Plese click the link to reset the password<br/><a href="http://mobicharge.co.in/login/reset_password">Click here</a>';
         $this->email->message($msg); 
   
         //Send mail 
        $output = false;
         if($this->email->send()) {

	         $output = true;;
         }
        
        return $output;
          
      } 
	



}