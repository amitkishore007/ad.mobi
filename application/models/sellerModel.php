<?php 


/**
* 
*/
class SellerModel extends CI_Model
{
	
	public function get_issues() {

		$q = $this->db->get('issue');

		if ($q->num_rows()) {
			

			return $q->result();

		}

	}
}