<?php 


/**
* 
*/
class OrderModel extends CI_Model
{
	
	

	public function get_orders_count() {

		return $this->db->count_all_results('order_product');

	}

	public function get_my_orders_count() {

		$q = $this->db->where(['products.user_id'=>$this->session->userdata('user_id')])->select('cart.product_id,products.user_id')->from('cart')->join('products','cart.product_id = products.id ')->count_all_results();

		return $q;
	}


	public function get_my_orders() {

		$this->db->select('products.id as product_id,products.user_id as seller_id,cart.order_id,products.thumbnail,order_product.fname,order_product.lname,order_product.email,order_product.phone,order_product.country,order_product.city,order_product.pincode,order_product.address,order_product.payment_method,order_product.purchase_date as order_date,order_product.order_note,cart.notify,cart.order_status,cart.delivery_date,cart.qty,cart.subtotal,cart.id as cart_id,order_product.created_at');
		$this->db->where(['products.user_id'=>$this->session->userdata('user_id')])->from('cart');
		$this->db->join('products','cart.product_id = products.id ');
		$q = $this->db->join('order_product','order_product.id = cart.order_id')->order_by('order_product.created_at','DESC')->get();
		

		return $q->result();
	}

	// public function get_my_product_reviews() {


	// 	$orders = $this->get_my_orders();


	// 	$reviews = array();

	// 	if (isset($orders)) {
		
	// 		foreach ($orders as $order) {
				
	// 		     $this->db->select('products.id as product_id,products.title, products.thumbnail,reviews.id as review_id,reviews.rating,reviews.comment,reviews.created_at')->from('reviews')->where(['product_id'=>$order->product_id]);
	// 		     $this->db->join('products','products.id = reviews.product_id');
	// 		$q = $this->db->join('users','users.id = reviews.user_id')->get();
	// 			$reviews[] = $q->result(); 
	// 		}
	// 	}

	// 	return $reviews;
	// 	// print_r($reviews);
	// }


	public function get_my_product_reviews() {


		  $this->db->select('users.username,users.email,reviews.user_id as user_id,reviews.id as review_id, reviews.rating, reviews.comment,reviews.created_at,products.id as product_id,products.title,products.thumbnail')->from('products')->where(['products.user_id'=>$this->session->userdata('user_id')]);
			  $this->db->join('reviews','reviews.product_id = products.id');
	 	 $reviews =  $this->db->join('users','users.id = reviews.user_id')->get();
   	 	
	   	if ($reviews->num_rows()) {
	   		
	   		return $reviews->result();
	   	}
	   
	}


	public function change_status() {

		$order_id  = (int) $this->input->post('order_id');
		$status = $this->input->post('status');
		$output = 'false';

		$q = $this->db->where(['id'=>$order_id])->get('cart');

		if ($q->num_rows()) {
		
			$qry = $this->db->set('order_status',$status)->where(['id'=>$order_id])->update('cart');

			if ($this->db->affected_rows()) {
				
				$output = 'success';
			}

		}
		return $output;
	}

	public function get_order($id){


		$this->db->select('products.id as product_id,products.title,products.user_id as seller_id,cart.id as order_id,products.thumbnail,order_product.fname,order_product.lname,order_product.email,order_product.phone,order_product.country,order_product.city,order_product.state,order_product.pincode,order_product.address,order_product.address2,order_product.payment_method,order_product.purchase_date as order_date,order_product.order_note,order_product.order_status,order_product.created_at,cart.qty,cart.subtotal');
		$this->db->where(['cart.product_id'=>$id])->from('cart');
		$this->db->join('products','cart.product_id = products.id ');
		$q = $this->db->join('order_product','order_product.id = cart.order_id')->order_by('order_product.created_at','DESC')->get();
		
		if ($q->num_rows()) {
					
			if ($this->change_notification_status($q->row()->order_id)) {
				# code...
				return $q->row();
			}
			
		}


	}

	public function change_notification_status($cart_id) {

		return $this->db->set('notify',1)->where(['id'=>$cart_id])->update('cart');

	}



	public function get_notification_count() {

		$orders = $this->get_my_orders();
		$count = 0;
		if (isset($orders)) {
			foreach ($orders as $order) {
				
				if ($order->notify==0) {
					
					$count++;
				}
			}
		}

		return $count;

	}


	public function get_notification() {

		$orders = $this->get_my_orders();
		$output = '';
		if (isset($orders)) {
			foreach ($orders as $order) {
				if ($order->notify==0) {
					
				// get the notification
					$output .= '<li class="'.$order->cart_id.'" data-orderDate="'.strtotime($order->created_at).'">';
					$output .= '<a href="'.base_url('order/view_order/'.$order->product_id).'">';
					$output .= '<span class="time">'.$this->timeago($order->created_at).'</span>';
					$output .= '<span class="details">';
					$output .= '<span class="label label-sm label-icon label-success">';
					$output .= '<i class="fa fa-plus"></i>';
					$output .= '</span> New Order from '.$order->fname.'. </span>';
					$output .= '</a>';
					$output .= '</li>';
					
				}
			}
		}

		return $output;

	}

	// private function time_ago($time) {

	// 	$post_date = $time;
	// 	$now = time();

	// 	// will echo "2 hours ago" (at the time of this post)
	// 	return timespan($post_date, $now) . ' ago';
	// }

	private function timeago($date) {
	   $timestamp = strtotime($date);	
	   
	   $strTime = array("second", "minute", "hour", "day", "month", "year");
	   $length = array("60","60","24","30","12","10");

	   $currentTime = time();
	   if($currentTime >= $timestamp) {
			$diff     = time()- $timestamp;
			for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
			$diff = $diff / $length[$i];
			}

			$diff = round($diff);
			return $diff . " " . $strTime[$i] . "(s) ago ";
	   }
	}


}