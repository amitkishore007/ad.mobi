<?php 

/**
* 
*/
class UserModel extends CI_Model
{
	
	

	public function get_my_details(){

		$q = $this->db->where(['id'=>$this->session->userdata('user_id')])->get('users');

		if ($q->num_rows()) {
			
			return $q->row();
		}

	}

	public function save_info() {


		$this->load->library('form_validation');

		$info = $this->input->post();
		
		$output = array('status'=>'false','fname'=>'','lname'=>"",'phone'=>"",'gender'=>"");

		if ($this->form_validation->run('save_user_info')==FALSE) {
			
			$output['fname']  = form_error('fname');
			$output['lname']  = form_error('lname');
			
			$output['phone']  = form_error('phone');
			$output['gender'] = form_error('gender');
	

		} else {

			$this->db->set($info)->where(['id'=>$this->session->userdata('user_id')])->update('users');
			if ($this->db->affected_rows()==1) {
					
					$output['status'] = 'success';
			}
		}

		return $output;

	}

	public function get_my_orders() {

		$this->db->select('products.upload_type,products.color,products.color_code,products.title,products.id as product_id,products.user_id as seller_id,users.fname as seller_fname,users.lname as seller_lname,users.username as seller_username,cart.order_id,products.thumbnail,order_product.fname,order_product.lname,order_product.email,order_product.phone,order_product.country,order_product.city,order_product.pincode,order_product.address,order_product.payment_method,order_product.purchase_date as order_date,order_product.order_note,cart.notify,cart.order_status,cart.qty,cart.subtotal,cart.id as cart_id,order_product.created_at,cart.delivery_date');
		$this->db->where(['order_product.user_id'=>$this->session->userdata('user_id')])->from('cart');
		$this->db->join('products','cart.product_id = products.id ');
		$this->db->join('users','users.id = products.user_id');
		$q = $this->db->join('order_product','order_product.id = cart.order_id')->order_by('order_product.created_at','DESC')->get();
		

		return $q->result();
	}

	public function get_my_wishlist() {

		$this->db->select('products.upload_type,products.color,products.color_code,products.title,products.id as product_id,products.user_id as seller_id,users.fname as seller_fname,users.lname as seller_lname,users.username as seller_username,products.thumbnail,products.quantity,products.price')->from('products');
		$this->db->where(['wishlist.user_id'=>$this->session->userdata('user_id')]);
		$this->db->join('users','users.id = products.user_id');
		$this->db->join('wishlist','wishlist.product_id = products.id');
		$q = $this->db->get();

		if ($q->num_rows()) {
			
			return $q->result();
		}

	}

}