<?php 


/**
* 
*/
class PrivacyModel extends CI_Model
{
		
public function findAll() {

		$q = $this->db->get('privacy_policies');
		
		if ($q->num_rows()) {
			
			return $q->result();
		}
	}

	public function createPrivacy() {


		$info  = $this->input->post();

	
		$this->load->library('form_validation');

			$output = array();
		
			$output['status']  = "";
			$output['title']    = "";
			$output['content']  = "";
			
					

		if ($this->form_validation->run('privacy_form_validation')==FALSE) {
			
			$this->form_validation->set_error_delimiters('', '');
			$output['status']  = "false";
			$output['title']    = form_error('heading');
			$output['content']  = form_error('content');
			$output['msg']     = 'error occured';

		} else {


			$this->db->insert('privacy_policies',$info);

			if ($this->db->affected_rows()) {
					
				
				$output['status'] = "true";	
				

			} else {

				$output['status'] = "false";
				
				$output['msg']   = "Privacy content could not be created, please try later";
				
			}

		}

		return $output;

	}


	public function find_privacy($id) {

		$q = $this->db->where(['id'=>$id])->get('privacy_policies');

		if ($q->num_rows()==1) {
			
			return $q->row();
		}

	}


	public function editAbout() {



		$info  = $this->input->post();

		
	
		$this->load->library('form_validation');

			$output = array();
		
			$output['status']  = "";
			$output['title']    = "";
			$output['content']  = "";
			
					

		if ($this->form_validation->run('privacy_form_validation')==FALSE) {
			
			$this->form_validation->set_error_delimiters('', '');
			$output['status']  = "false";
			$output['title']    = form_error('title');
			$output['content']  = form_error('content');
			$output['msg']     = 'error occured';

		} else {


			// $this->db->insert('about',$info);

			$id = $info['id'];
			unset($info['id']);
			$this->db->where(['id'=>$id])->update('privacy_policies',$info);

			if ($this->db->affected_rows()>=0) {
					
				
				$output['status'] = "true";	
				

			} else {

				$output['status'] = "false";
				
				$output['msg']   = "About content could not be updated, please try later";
				
			}

		}

		return $output;

	}

	public function change_status() {

		$info  = $this->input->post();

		$id = $info['id'];
		// return $info;

		$q = $this->db->where(['id'=>$id])->get('privacy_policies');
		$output = 'false';

		
		if ($q->num_rows()==1) {

				$this->db->update('privacy_policies',['status'=>0]);
				
				$q1 = $this->db->where(['id'=>$id])->update('privacy_policies',['status'=>1]);


				
				if ($this->db->affected_rows()>=0) {
					
					$output =  'true';

				} else {

					$output = 'error';
				}
		}

		return $output;


	}

	public function get_privacy() {

		$q  = $this->db->where(['status'=>1])->get('privacy_policies');

		if ($q->num_rows()) {
			
			return $q->row();
		}
	}


}