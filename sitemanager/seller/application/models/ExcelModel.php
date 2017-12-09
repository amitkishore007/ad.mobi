<?php 


/**
* 
*/
class ExcelModel extends CI_Model
{
	
	
	public function get_excels() {

		$this->db->select('excels.id,excels.name,categories.id,categories.name as category')->from('excels');
		$this->db->join('categories','excels.category_id = categories.id');
		$q = $this->db->get();
		
		if ($q->num_rows()) {
		
			return $q->result();
		}
	}

}