<?php 

/**
* 
*/
class AdminModel extends CI_Model
{
	

	public function check_login($info) {

		$info  = $this->input->post();

		$info['user_type'] = 'superadmin';
	
		$this->load->library('form_validation');

		$output = array();
		
		$output['status'] = "";
		
		$output['msg']    = "";
				

		if ($this->form_validation->run('login_form_validation')==FALSE) {
				
			$output['status'] = "false";
			$output['msg']    = "Email/password did not matched !";

		} else {

		
			$info['password'] = md5($info['password']);
			
			$result = $this->db->where($info)->get('users');

			if ($result->num_rows()) {
					
				$admin  = $result->row();
				$data = array(
					'user_id'=>$admin->id,
					'user_email'=>$admin->email,
					'role'=>$admin->user_type,
					'is_logged_in'=>true
					);
				$this->session->set_userdata($data);
				
				$output['status'] = "true";
				
				$output['msg']    = "success";

			} else {

				$output['status'] = "false";
				
				$output['msg']          = "Admin not found";
				
			}


		}

		return $output;

	}



	public function upload_image() {
          
			$config['upload_path']   = './uploads';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['encrypt_name']  = TRUE;
			$config['remove_spaces'] = TRUE;

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
				$this->db->insert('product_images',['name'=>$data['file_name'],'user_id'=>$this->session->userdata('user_id')]);
            }
	}



	public function create_vandor() {

		$info  = $this->input->post();

		$this->load->library('form_validation');

			$output = array();
		
			$output['status']  = "";
			$output['name']    = "";
			$output['email']  = "";
			$output['password']    = "";
					

		if ($this->form_validation->run('vandor_form_validation')==FALSE) {
			
			$this->form_validation->set_error_delimiters('', '');
			$output['status']   = "false";
			$output['name']     = form_error('username');
			$output['email']    = form_error('email');
			$output['password'] = form_error('password');
			$output['msg']      = 'error occured';

		} else {

			$info['password'] = md5($info['password']);
			$info['user_type'] = 'vandor';

			$this->db->insert('users',$info);

			if ($this->db->affected_rows()) {
					
				
				$output['status'] = "true";	
				

			} else {

				$output['status'] = "false";
				
				$output['msg']   = "vandor could not be created, please try later";
				
			}


		}

		return $output;


	}


	public function all_user_type($type) {

		$q = $this->db->where(['user_type'=>$type])->order_by('created_at','DESC')->get('users');

		if ($q->num_rows()) {

			return $q->result();
		}
	}

	public function find_vandor($id) {

		$q = $this->db->where(['id'=>$id])->get('users');

		if ($q->num_rows()==1) {

			return $q->row();
		}
	}

	public function delete_vandor() {

		$id = (int) $this->input->post('id');

		$output = array('status'=>'false','msg'=>'');

		$q = $this->db->where(['id'=>$id,'user_type'=>'vandor'])->get('users');

		if ($q->num_rows()==1) {
			
			//perform the delete operation
			$this->db->where(['id'=>$id])->delete('users');

			if ($this->db->affected_rows()==1) {
				
				$output['status'] = 'true';
				$output['msg']	 ='success';


			}

		} 

		return $output;

	}


	public function get_my_info() {

		$this->db->select('users.id as user_id, users.username, users.fname,users.lname,users.gender,users.phone,users.phone,users.email,users.country as seller_country,users.city as seller_city,users.state as seller_state,users.landmark,users.zipcode,users.address,users.user_type,users.address_two,bank_details.account_holder_name,bank_details.account_number,bank_details.bank_name,bank_details.state,bank_details.city,bank_details.branch,bank_details.ifsc,bank_details.business_pan,bank_details.pan')->from('users');
		$this->db->where(['users.id'=>$this->session->userdata('user_id')]);
		$this->db->join('bank_details','bank_details.user_id = users.id','left');

		$q = $this->db->get();

		if ($q->num_rows()) {
			
			return $q->row();
		}

	}	

	public function get_seller($id) {

		$this->db->select('users.id as user_id, users.username, users.fname,users.lname,users.gender,users.phone,users.phone,users.email,users.country,users.city,users.state,users.zipcode,users.address,users.user_type,users.address_two,bank_details.account_holder_name,bank_details.account_number,bank_details.bank_name,bank_details.state,bank_details.city,bank_details.branch,bank_details.ifsc,bank_details.business_pan')->from('users');
		$this->db->where(['users.id'=>$id]);
		$this->db->join('bank_details','bank_details.user_id = users.id','left');

		$q = $this->db->get();

		if ($q->num_rows()) {
			
			return $q->row();
		}

	}	


	public function change_address() {

		$info  = $this->input->post();

		$this->load->library('form_validation');

			$output = array();
		
			$output['status']   = "false";
			$output['country']  = "";
			$output['state']    = "";
			$output['city']     = "";
			$output['address']  = "";
			$output['landmark'] = "";
			$output['zipcode']  = "";
			

		if ($this->form_validation->run('vendor_address_form_validation')==FALSE) {
			
			$this->form_validation->set_error_delimiters('', '');
			$output['status']   = "false";
			$output['country']  = form_error('country');
			$output['state']    = form_error('state');
			$output['city']     = form_error('city');
			$output['address']  = form_error('address');
			$output['landmark'] = form_error('landmark');
			$output['zipcode']  = form_error('zipcode');
			
			$output['msg']      = 'error occured';

		} else {

			

			
			$this->db->set($info)->where(['id'=>$this->session->userdata('user_id')])->update('users');

			if ($this->db->affected_rows()==1) {
					
				
				$output['status'] = "true";	
				

			} 


		}

		return $output;


	}



	public function change_bank() {

		$info  = $this->input->post();

		$this->load->library('form_validation');

			$output = array();
		
			$output['status']   = "false";
			
			$output['state']    = "";
			
			$output['holder_holder_name']    = '';
			$output['account_number'] = '';
			$output['bank_name']      = '';
			$output['branch']         = '';
			$output['ifsc']           = '';
			$output['business_pan']   = '';
			$output['pan']            = '';
			$output['state']          = '';
			$output['city']           = '';

		if ($this->form_validation->run('vendor_bank_form_validation')==FALSE) {
			
			$this->form_validation->set_error_delimiters('', '');
			
			$output['holder_holder_name'] = form_error('holder_holder_name');
			$output['account_number']     = form_error('account_number');
			$output['bank_name']          = form_error('bank_name');
			$output['branch']             = form_error('branch');
			$output['ifsc']               = form_error('ifsc');
			$output['business_pan']       = form_error('business_pan');
			$output['pan']                = form_error('pan');
			$output['state']              = form_error('state');
			$output['city']               = form_error('city');
			$output['msg']      = 'error occured';

		} else {

			
			$q = $this->db->where(['user_id'=>$this->session->userdata('user_id')])->get('bank_details');
			
			if ($q->num_rows()) {
				
				$this->db->set($info)->where(['user_id'=>$this->session->userdata('user_id')])->update('bank_details');

				if ($this->db->affected_rows()==1) {
						
					
					$output['status'] = "true";	
					

				} 
				
			} else {

				$info['user_id']  = $this->session->userdata('user_id');
				$this->db->insert('bank_details',$info);

				if ($this->db->affected_rows()==1) {
						
					
					$output['status'] = "true";	
					

				} 

			}


		}

		return $output;


	}

	public function change_personal_info() {

		$info  = $this->input->post();

		$this->load->library('form_validation');

			$output = array();
		
			$output['status']   = "false";
			$output['username']  = "";
			$output['fname']    = "";
			$output['lname']     = "";
			$output['gender']  = "";
			

		if ($this->form_validation->run('vendor_personal_form_validation')==FALSE) {
			
			$this->form_validation->set_error_delimiters('', '');
			$output['status']   = "false";
			$output['username'] = form_error('username');
			$output['fname']    = form_error('fname');
			$output['lname']    = form_error('lname');
			$output['gender']   = form_error('gender');
			
			$output['msg']      = 'error occured';

		} else {

			

			
			$this->db->set($info)->where(['id'=>$this->session->userdata('user_id')])->update('users');

			if ($this->db->affected_rows()==1) {
					
				
				$output['status'] = "true";	
				

			} 


		}

		return $output;


	}

	public function submit_seller_support() {


		$info  = $this->input->post();

		$this->load->library('form_validation');

			$output = array();
		
			$output['status']     = "false";
			$output['issue_type'] = "";
			$output['subject']    = "";
			$output['details']    = "";
			$output['phone']      = "";
			

		if ($this->form_validation->run('vendor_support_form_validation')==FALSE) {
			
			$this->form_validation->set_error_delimiters('', '');
		
			$output['issue_type'] = form_error('issue_id');
			$output['subject']    = form_error('subject');
			$output['details']    = form_error('details');
			$output['callback']   = form_error('phone');
			
			$output['msg']      = 'error occured';

		} else {

			$info['seller_id'] =$this->session->userdata('user_id');
			$this->db->insert('seller_support',$info);

			if ($this->db->affected_rows()) {
					
				
				$output['status'] = "true";	
				

			} 


		}

		return $output;
	}


}