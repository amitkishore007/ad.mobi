<?php 



/**
* 
*/
class ProductModel extends CI_Model
{
	

	var $products_limit = 21;

	public function add_product() {

		$info  = $this->input->post();
		// return $info;
	
		$this->load->library('form_validation');

			$output = array();
			$output['status']            = '';
			$output["product_name     "] = '';
			$output["product_desc     "] = '';
			$output["product_price    "] = '';
			$output["product_qty  "    ] = '';
			$output["product_status   "] = '';
			$output["product_sku      "] = '';
			$output["product_shipping "] = '';
			$output["product_thumb "]    = '';
			$output['msg']               = '';
		if ($this->form_validation->run('product_upload_validation')==FALSE) {
		
			$output['status']            = 'false';
			$output["product_name"]      = form_error('title');
			$output["product_desc"]      = form_error('description');
			$output["product_price"]     = form_error('price');
			$output["product_status"]    = form_error('status');
			$output["product_sku"]       = form_error('sku');
			$output["product_qty"]       = form_error('quantity');
			$output["product_shipping "] = form_error('shipping');
			$output["product_thumb"]     = form_error('thumbnail');
			$output["category"]          = form_error('category_id');
			$output['msg']               = '';
			
		} else {


			$info['user_id'] = $this->session->userdata('user_id');
			$this->db->insert('products',$info);

			if ($this->db->affected_rows()) {
				

				$output['status']            = 'true';
				$output['msg']				 = 'Success';
			

			} else {

				$output['status']            = 'false';
				$output['msg']				 = 'There was an error please try later !';

			}


		}
		// return $info;
			return $output;

	}


	public function edit_product() {

		$info       = $this->input->post();
		$product_id = $this->input->post('product_id');
		// return $info;
		unset($info['product_id']);
		$this->load->library('form_validation');

			$output = array();
			$output['status']            = '';
			$output["product_name     "] = '';
			$output["product_desc     "] = '';
			$output["product_price    "] = '';
			$output["product_qty  "    ] = '';
			$output["product_status   "] = '';
			$output["product_sku      "] = '';
			$output["product_shipping "] = '';
			$output["product_thumb "]    = '';
			$output['msg']               = '';
		if ($this->form_validation->run('product_upload_validation')==FALSE) {
		
			$output['status']            = 'false';
			$output["product_name"]      = form_error('title');
			$output["product_desc"]      = form_error('description');
			$output["product_price"]     = form_error('price');
			$output["product_status"]    = form_error('status');
			$output["product_sku"]       = form_error('sku');
			$output["product_qty"]       = form_error('quantity');
			$output["product_shipping "] = form_error('shipping');
			$output["product_thumb"]     = form_error('thumbnail');
			$output["category"]          = form_error('category_id');
			$output['msg']               = '';
			
		} else {


			$user_id = $this->session->userdata('user_id');

			// return $info;

			$q = $this->db->where(['user_id'=>$user_id,'id'=>$product_id])->get('products');
			
			if ($this->session->userdata('role')=='superadmin' || $q->num_rows()) {

				
				//perform the update
				$this->db->where(['id'=>$product_id])->update('products',$info);


				if ($this->db->affected_rows()>=0) {
					

					$output['status']            = 'true';
					$output['msg']				 = 'Success';
				

				} else {

					$output['status']            = 'false';
					$output['msg']				 = 'There was an error please try later !';

				}

				

			} else {

				//abort the update
					$output['status']            = 'false';
					$output['msg']				 = 'You do not have permission to !';

					
			}

			// $this->db->insert('products',$info);


		}
		// return $info;
			return $output;

	}





	public function all_products(){

		$this->db->select('products.id as product_id,products.upload_type,products.user_id as user_id,products.title,products.price,products.thumbnail,products.created_at,products.status,products.hot_sale,users.username');
		$this->db->from('products');
		if($this->session->userdata('role')=='vandor'){
			$this->db->where(['user_id'=>$this->session->userdata('user_id')]);
		}
		$this->db->join('users', 'products.user_id = users.id');
		$this->db->order_by('created_at','DESC');

		$query = $this->db->limit(20)->get();
		

		return $query->result();

	}


	public function find_product($id) {

	$q = $this->db->where(['id'=>$id,'user_id'=>$this->session->userdata('user_id')])->get('products');

		if ($q->num_rows()) {
			
			return $q->row();
		}
	}

	public function get_product($id) {

	$q = $this->db->select('categories.name as category,products.upload_type,products.features,products.model_name,products.model_number,products.id,products.category_id,products.thumbnail,products.thumbnail2,products.thumbnail3,products.thumbnail4,products.title,products.quantity,products.price,products.sku,products.suitable_for,products.type as product_type,products.capacity,products.capacity_unit,products.compare_price,products.description,products.shipping,products.status,products.hot_sale,products.subtitle,products.brand,products.color,products.color_code,products.tags')->from('products')->where(['products.id'=>$id])->join('categories','categories.id = products.category_id')->get();

		if ($q->num_rows()) {
			
			return $q->row();
		}
	}


	public function deleteProduct() {

		$id = (int) $this->input->post('product_id');

		$output = array('status'=>'false','msg'=>'');

		$q = $this->db->where(['id'=>$id])->get('products');
		
		if ($q->num_rows()==1) {
			
			$this->db->where(['id'=>$id])->delete('products');

			if ($this->db->affected_rows()==1) {
				
				$output['status'] = 'true';
				$output['msg'] = 'Successfuly deleted';
			}
		}

		return $output;

	}


	public function find_hot_sale() {

		$q = $this->db->where(['hot_sale'=>1,'status'=>1])->get('products');
		
		if ($q->num_rows()) {
			
			return $q->result();
		}
	}


	public function set_hote_sale() {

		$info = $this->input->post();

		$product_id = (int) $info['id'];

		$output = 'false';

		$q = $this->db->where(['id'=>$product_id])->get('products');
		
			if ($q->num_rows()) {

					if ($info['change']=='active') {

						// update hot sale to 1
							
							$this->db->where(['id'=>$product_id])->update('products',['hot_sale'=>1]);

							if ($this->db->affected_rows()>=0) {
								
								$output = 'true';
							}
						

					} else {

						// update hot sale to zero
						$this->db->where(['id'=>$product_id])->update('products',['hot_sale'=>0]);

							if ($this->db->affected_rows()>=0) {
								
								$output = 'true';
							}
					}
					
				} else {

					$output = 'error';
				}


				return $output;				

	}


	public function set_status() {

		$info = $this->input->post();

		$product_id = (int) $info['id'];

		$output = 'false';

		$q = $this->db->where(['id'=>$product_id])->get('products');
		
			if ($q->num_rows()) {

					if ($info['change']=='active') {

						// update hot sale to 1
							
							$this->db->where(['id'=>$product_id])->update('products',['status'=>1]);

							if ($this->db->affected_rows()>=0) {
								
								$output = 'true';
							}
						

					} else {

						// update hot sale to zero
						$this->db->where(['id'=>$product_id])->update('products',['status'=>0]);

							if ($this->db->affected_rows()>=0) {
								
								$output = 'true';
							}
					}
					
				} else {

					$output = 'error';
				}


				return $output;				

	}



	public function get_cat_products($cat_id,$limit,$offset){

		$q =  $this->db->select('categories.name as category,products.upload_type,products.features,products.model_name,products.model_number,products.id,products.category_id,products.thumbnail,products.thumbnail2,products.thumbnail3,products.thumbnail4,products.title,products.quantity,products.price,products.sku,products.suitable_for,products.type as product_type,products.capacity,products.capacity_unit,products.compare_price,products.description,products.shipping,products.status,products.hot_sale,products.subtitle,products.brand,products.color,products.color_code,products.tags')->from('products')->where(['category_id'=>$cat_id])->join('categories','categories.id = products.category_id')->order_by('products.created_at','DESC')->limit($limit,$offset)->get();


		if ($q->num_rows()) {
			
			return $q->result();
		}

	}


	public function getLatestProducts($limit) {

		$q = $this->db->select('categories.name as category,products.upload_type,products.features,products.model_name,products.model_number,products.id,products.category_id,products.thumbnail,products.thumbnail2,products.thumbnail3,products.thumbnail4,products.title,products.quantity,products.price,products.sku,products.suitable_for,products.type as product_type,products.capacity,products.capacity_unit,products.compare_price,products.description,products.shipping,products.status,products.hot_sale,products.subtitle,products.brand,products.color,products.color_code,products.tags')->from('products')->where(['products.status'=>1])->join('categories','categories.id = products.category_id')->order_by('products.created_at','DESC')->limit($limit)->get();
		if ($q->num_rows()) {
			
			return $q->result();
		}
	}

	public function get_total_products_count($status) {

		$q = $this->db->where(['status'=>$status])->count_all_results('products');

		return $q;
	}

	public function search() {

		$info = $this->input->post();

		$product = $info['product'];

		$cat_id = $info['cat_id'];

		$this->db->like('title',$product);
		
		$this->db->like('category_id',$cat_id);
		
		$this->db->limit(10);
		
		$q = $this->db->get('products');
	
		$output = '';

		if ($q->num_rows()) {
	
				
			foreach ($q->result() as $product) {
				
				$output .='<li>'.$product->title.'</li>';

			} 
		}  
		echo $output;
	}

	public function load_more() {

		$offset   = $this->input->post('offset');
		$category = $this->input->post('category');
		$s        = $this->input->post('s');
		$this->db->select('categories.name as category,products.upload_type,products.features,products.model_name,products.model_number,products.id,products.category_id,products.thumbnail,products.thumbnail2,products.thumbnail3,products.thumbnail4,products.title,products.quantity,products.price,products.sku,products.suitable_for,products.type as product_type,products.capacity,products.capacity_unit,products.compare_price,products.description,products.shipping,products.status,products.hot_sale,products.subtitle,products.brand,products.color,products.color_code,products.tags')->from('products');
		
		$this->db->like('products.title',$s);
		$this->db->like('products.category_id',$category);
		$this->db->where(['products.status'=>1]);
		$this->db->join('categories','categories.id = products.category_id');
		$this->db->limit($this->products_limit,$offset);
		$this->db->order_by('products.created_at','DESC');
		$q = $this->db->get();

		$output = '';
		$i=1;
		if ($q->num_rows()) {
			
			foreach ($q->result() as $product) {
				$class='';

				if ($i==1) {
					$class='first';
				}
				if ($i==3) {
					$class='last';	
				}

				$output .='<li class="product '.$class.'  ">';
				$output .='<div class="product-outer" style="height: 396px;">';
				$output .='<div class="product-inner">';
				$output .='<span class="loop-product-categories">';
				$output .='<a href="'.base_url('shop/search_product?category='.$product->category_id.'&name=').'" rel="tag">'.$product->category.'</a></span>';
				$output .='<a href="'.base_url('shop/quickview/'.$product->id).'">';
				$output .='<h3>'.$product->title.'</h3>';
				$output .='<div class="product-thumbnail">';
				if(isset($product->thumbnail)):
					if($product->upload_type=='excel'){
					$output .='<img src="'.$product->thumbnail.'" alt="">	';

					} else {
						
					$output .='<img src="'.base_url('uploads/'.$product->thumbnail).'" >	';
					}
					else:
						
					$output .='<img src="'.base_url('assets/img/placeholder.jpg').'" >	';

				endif;
				$output .='</div>';
				$output .='</a>';
				$output .='<div class="price-add-to-cart">';
				$output .='<span class="price">';
				$output .='<span class="electro-price">';
				$output .='<ins><span class="amount">Rs.'.$product->price.'</span></ins>';
				$output .='<del><span class="amount">Rs.'.$product->compare_price.'</span></del>';
				$output .='</span>';
				$output .='</span>';
				$output .='<a rel="nofollow" href="javascript:void(0);"  data-productId="'.$product->id.'" data-productQty="1" class="button add_to_cart_button addToCart">Add to cart</a>';
				$output .='</div>';
				$output .='<div class="hover-area">';
				$output .='<div class="action-buttons">';
				$output .='<a href="javascript:void(0);" rel="nofollow"  class="add_to_wishlist "> Wishlist</a>';
				$output .='</div>';
				$output .='</div>';
				$output .='</div>';
				$output .='</div>';
           		$output .='</li>';
				
				if ($i==3) {
						
						$i=0;
				}
				$i++;

			}

		}

		return $output;

	}
	public function getLimit() {

		return $this->products_limit;
	}

	public function count_search_products($product,$cat) {

		$this->db->like('title',$product);
		$this->db->like('category_id',$cat);
		$this->db->from('products');
		$q = $this->db->count_all_results();;

		return $q;
	}

	public function searchProducts($product,$cat) {

		$this->db->like('title',$product);
		$this->db->like('category_id',$cat);
		$this->db->limit($this->products_limit);
		$q = $this->db->get('products');

		if ($q->num_rows()) {
			
			return $q->result();
		}

	}


	public function upload_product_excel() {

		//Path of files were you want to upload on localhost (C:/xampp/htdocs/ProjectName/uploads/excel/)	 
         $configUpload['upload_path'] = './excel/';
         $configUpload['allowed_types'] = 'xls|xlsx|csv';
         $configUpload['max_size'] = '5000';
         $this->load->library('upload', $configUpload);
         $this->upload->do_upload('userfile');	
         $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
         $file_name = $upload_data['file_name']; //uploded file name
		 $extension=$upload_data['file_ext'];    // uploded file extension
		
		//$objReader =PHPExcel_IOFactory::createReader('Excel5');     //For excel 2003 
		 $objReader= PHPExcel_IOFactory::createReader('Excel2007');	// For excel 2007 	  
          //Set to read only
          $objReader->setReadDataOnly(true); 		  
        //Load excel file
		 $objPHPExcel=$objReader->load('./excel/'.$file_name);		 
         $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel      	 
         $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);                
          //loop from first data untill last data
          for($i=2;$i<=$totalrows;$i++)
          {
              $FirstName= $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();			
              $LastName= $objWorksheet->getCellByColumnAndRow(1,$i)->getValue(); //Excel Column 1
			  $Email= $objWorksheet->getCellByColumnAndRow(2,$i)->getValue(); //Excel Column 2
			  $Mobile=$objWorksheet->getCellByColumnAndRow(3,$i)->getValue(); //Excel Column 3
			  $Address=$objWorksheet->getCellByColumnAndRow(4,$i)->getValue(); //Excel Column 4
			  $data_user=array('FirstName'=>$FirstName, 'LastName'=>$LastName ,'Email'=>$Email ,'Mobile'=>$Mobile , 'Address'=>$Address);
			  $this->excel_data_insert_model->Add_User($data_user);
              
						  
          }
             unlink('./excel/'.$file_name); //File Deleted After uploading in database .			 
           return  redirect(base_url() . "admin/product");
	           
	}


	public function get_product_images() {

		$id  = (int) $this->session->userdata('user_id');

		$q = $this->db->select('id,name,user_id')->where(['user_id'=>$id])->get('product_images');

		if ($q->num_rows()) {
			
			return $q->result();
		}
	}


	public function upload_excel_products($excel_data) {

		// print_r($excel_data);
		$this->db->insert('products',$excel_data);
		if ($this->db->affected_rows()==1) {
			return true;
		}

	}

	public function get_products_by_state($state) {

		if ($this->session->userdata('role')=='superadmin') {
				
			$this->db->select('products.title,products.id,products.thumbnail,products.upload_type,products.status,users.id as user_id,users.username')->from('products')->where(['status'=>$state]);
			$this->db->join('users','products.user_id = users.id');

			$q = $this->db->order_by('products.created_at','DESC')->limit(20)->get();
		}else {

			$this->db->select('products.title,products.id,products.thumbnail,products.status,users.id as user_id,users.username,products.upload_type')->from('products')->where(['user_id'=>$this->session->userdata('user_id'),'status'=>$state]);
			$this->db->join('users','products.user_id = users.id');
			$q = $this->db->order_by('products.created_at','DESC')->limit(20)->get();
			
		}

		if ($q->num_rows()) {
			
			return $q->result();
		}


	}

	public function get_low_stock_products($quantity) {

		if ($this->session->userdata('role')=='superadmin') {
				
			$this->db->select('products.title,products.id,products.thumbnail,products.upload_type,products.status,users.id as user_id,users.username')->from('products')->where(['quantity <'=>$quantity]);
			$this->db->join('users','products.user_id = users.id');

			$q = $this->db->order_by('products.created_at','DESC')->limit(20)->get();
		}else {

			$this->db->select('products.title,products.id,products.thumbnail,products.status,users.id as user_id,users.username,products.upload_type')->from('products')->where(['user_id'=>$this->session->userdata('user_id'),'quantity <'=>$quantity]);
			$this->db->join('users','products.user_id = users.id');
			$q = $this->db->order_by('products.created_at','DESC')->limit(20)->get();
			
		}

		if ($q->num_rows()) {
			
			return $q->result();
		}


	}

	public function get_product_count() {

		$cat_id = (int) $this->input->post('cat_id');

		$q = $this->db->select('id')->from('products')->where(['category_id'=>$cat_id])->count_all_results();

		return $q;
	}


	public function get_category_product($category) {

		$cat_id   = $category->id;

		$q = $this->db->where(['category_id'=>$cat_id])->limit(10)->get('products');

		if ($q->num_rows()) {
			
			return $q->result();
		}

	}


	


}



 

