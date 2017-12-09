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
				
			
			$output['error']    = form_error('email') . ' <br/>'.form_error('password');
			

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


	



}