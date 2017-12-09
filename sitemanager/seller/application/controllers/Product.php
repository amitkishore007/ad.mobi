<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


/**
* 
*/

class Product extends CI_Controller
{
	
	
	public function __construct() {

		parent::__construct();
		
		$this->check_login();
		

		$this->load->model('productModel');
		$this->load->model('categoryModel');
		$this->load->model('colorModel');
		$this->load->model('excelModel');
		$this->load->library('excel');
	

	}

	private function check_login(){

		if (!$this->session->userdata('is_logged_in')) {

			return redirect('shop');

		} elseif($this->session->userdata('role') !='vandor' && $this->session->userdata('role') !='superadmin'){

			return redirect('shop');
		}
	}


	public function create() {

		$data['main_content'] = 'admin/product/add_product';
		$data['categories'] = $this->categoryModel->allCategory();
		$data['colors'] = $this->colorModel->showColors();
		$data['excels']  = $this->excelModel->get_excels();



		$this->load->view('admin_includes/template',$data);

	}

	public function add_product() {

		if ($this->input->post('add_product')) {
			
			unset($_POST['add_product']);

// echo json_encode($_POST);
			$result = $this->productModel->add_product();
//
			echo json_encode($result);

		} else {

			$this->index();
		}
	}

	public function edit_product() {

		if ($this->input->post('edit_product')) {
			
			unset($_POST['edit_product']);


			$result = $this->productModel->edit_product();

			echo json_encode($result);

		} else {

			$this->index();
		}
	}

	public function delete(){

		if ($this->input->post()) {
			
			$output = $this->productModel->deleteProduct();

			echo json_encode($output);


		} else {

			return redirect('index');
		}


	}

	public function edit($id){


		if (!isset($id)) {
			
			return redirect('product');

		} else {

			$id = (int) $id;

			$data['main_content'] = 'admin/product/edit_product';
			$data['categories'] = $this->categoryModel->allCategory();
			$data['product'] = $this->productModel->find_product($id);
			if ($data['product']) {
  							
				$this->load->view('admin_includes/template',$data);
			
			} else {

				return redirect('product');
			}
			
		}



	}

	public function index() {


		$data['main_content']       = 'admin/product/product_list';
		$data['products']           = $this->productModel->all_products();
		$data['active_products']    = $this->productModel->get_products_by_state(1);
		$data['inactive_products']  = $this->productModel->get_products_by_state(0);
		$data['low_stock_products'] = $this->productModel->get_low_stock_products(5);
		

		$this->load->view('admin_includes/template',$data);


	}

	public function upload_image() {
          
				$config['upload_path']   = './uploads';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['encrypt_name']  = TRUE;
				$config['remove_spaces'] = TRUE;
				$output = array('status'=>false,'name'=>'','error'=>'');


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
				// $this->db->insert('product_images',['name'=>$data['file_name'],'user_id'=>$this->session->userdata('user_id')]);
				$output['status'] = true;
				$output['name']   = $data['file_name'];
				
				
            } else {
				$output['error'] = 'could not upload image, try later';

            }
            echo json_encode($output);
	}


	public function set_hot_sale() {

		if ($this->input->post()) {
			
			$status = $this->productModel->set_hote_sale();

			echo $status;

		} else {

			return redirect('product');
		}
	}

	public function change_status() {

		if ($this->input->post()) {
		
			$status = $this->productModel->set_status();

			echo $status;

		} else {

			return redirect('product');
		}
	}


	// public function upload_product_excel() {

	// 	if ($this->input->post()) {
			

	// 		$output = $this->productModel->add_product_by_excel();

	// 		echo json_encode($output);

	// 	} else {

	// 		return redirect('admin');
	// 	}
	// }

	// modal ajax
	public function get_product_images() {

		$output = '';
		$images = $this->productModel->get_product_images();

			$output .= '<div class="row ajax-modal-image">';
				$output .= '<div class="col-md-12">';
					$output .= '<div class="img-div">';
						$output .= '<ul class="images">';
						if ($images):
							foreach ($images as $image):
							$output .= '<li class="image">';
								$output .= '<label>';
								  $output .= '<input type="checkbox" id="image_'.$image->id.'" name="product-images" value="'.$image->name.'" />';
								  $output .= '<img src="'.base_url().'uploads/'.$image->name.'" data-input="image_'.$image->id.'" width="130">';
								$output .= '</label>';
							$output .= '</li>';
							endforeach;
						else: 
							$output .= '<h3>No images uploaded yet !</h3>';	
						endif;		
						$output .= '</ul>';
					$output .= '</div>';
				$output .= '</div>';
			$output .= '</div>';

			echo $output;

	}

	public function excelUploadOnly() {

				$config['upload_path']   = './excel/';
				$config['allowed_types'] = 'xlsx|csv|xls';
				$config['encrypt_name']  = TRUE;
				
				$output = array('status'=>false,'file'=>'','error'=>'');

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {

                $data = $this->upload->data();
                $output['file'] = './excel/'.$data['file_name'];
                $output['status'] = true;

		    }  else {
				$output['error'] = 'could not upload excel file, try later';

	            }
		   

		    echo json_encode($output);
	}

	public function uploadExcel() {


		
		// return false;
		if ($this->input->post()) {
			
			   $category = $this->categoryModel->getCategory($this->input->post('category'));
			   $excel_file = $this->input->post('excel_file');

			if ($category->unique_id=='mob-ac' || $category->unique_id=='mob-acc') {
				
				$output['status'] = $this->upload_mobile_acc($excel_file);
			}

			if ($category->unique_id=='ca-co') {
				
				$output['status'] = $this->upload_cases_cover($excel_file);
			}

			if ($category->unique_id=='po-ba') {
				
				$output['status'] = $this->upload_power_bank($excel_file);
			}

			if ($category->unique_id=='cable') {
				
				$output['status'] = $this->upload_cable($excel_file);
			}
			if ($category->unique_id=='se-st') {
				
				$output['status'] = $this->upload_selfie_stick($excel_file);
			}
			if ($category->unique_id=='mob-char') {
				
				$output['status'] = $this->upload_mobile_charger($excel_file);
			}

			if ($category->unique_id=='mob-len') {
				
				$output['status'] = $this->upload_mobile_lense($excel_file);
			}
			if ($category->unique_id=='battery') {
				
				$output['status'] = $this->upload_battery($excel_file);
			}
			if ($category->unique_id=='sc-gu') {
				
				$output['status'] = $this->upload_screen_guard($excel_file);
			}
			if ($category->unique_id=='mo-sk') {
				
				$output['status'] = $this->upload_mobile_skin($excel_file);
			}
			if ($category->unique_id=='ca-re') {
				
				$output['status'] = $this->upload_card_reader($excel_file);
			}
			if ($category->unique_id=='sp-pa') {
				
				$output['status'] = $this->upload_spare_parts($excel_file);
			}

			if ($category->unique_id=='mo-ho') {
				
				$output['status'] = $this->upload_mobile_holder($excel_file);
			}

			if ($category->unique_id =='lens-cleaner' || $category->unique_id=='lens-hood') {

				$output['status'] = $this->upload_lens_cleaner($excel_file);
			}

		} else{

			return redirect('admin');
		}


	
		echo json_encode($output);


	}

	public function upload_mobile_acc($excel) {

		 $objReader= PHPExcel_IOFactory::createReader('Excel2007');	// For excel 2007 	  
          //Set to read only
         $objReader->setReadDataOnly(true); 		  
        //Load excel file
		 $objPHPExcel=$objReader->load($excel);		 
         $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel      	 
         $output = array('status'=>'','header'=>'','rows'=>'');
        

         $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);                
          //loop from first data untill last data
         for($i=2;$i<=$totalrows;$i++)
          {
          	$data_product = array(
					'user_id'               =>$this->session->userdata('user_id'),
					
					'title'                 => $objWorksheet->getCellByColumnAndRow(0,$i)->getValue() ,			
					'subtitle'              => $objWorksheet->getCellByColumnAndRow(1,$i)->getValue() ,
					'type'                  => $objWorksheet->getCellByColumnAndRow(2,$i)->getValue() ,
					'price'                 => $objWorksheet->getCellByColumnAndRow(3,$i)->getValue() ,
					'compare_price'         => $objWorksheet->getCellByColumnAndRow(4,$i)->getValue() ,
					'quantity'              => $objWorksheet->getCellByColumnAndRow(5,$i)->getValue() ,
					'thumbnail'             => $objWorksheet->getCellByColumnAndRow(6,$i)->getValue() ,
					'thumbnail2'            => $objWorksheet->getCellByColumnAndRow(7,$i)->getValue() ,
					'thumbnail3'            => $objWorksheet->getCellByColumnAndRow(8,$i)->getValue(),
					'thumbnail4'            => $objWorksheet->getCellByColumnAndRow(9,$i)->getValue(),
					'sku'                   => $objWorksheet->getCellByColumnAndRow(10,$i)->getValue(),
					'category_id'           => $objWorksheet->getCellByColumnAndRow(11,$i)->getValue(),
					'description'           => $objWorksheet->getCellByColumnAndRow(12,$i)->getValue(),
					'shipping'              => $objWorksheet->getCellByColumnAndRow(13,$i)->getValue(),
					'status'                => $objWorksheet->getCellByColumnAndRow(14,$i)->getValue(),
					'brand'                 => $objWorksheet->getCellByColumnAndRow(15,$i)->getValue(),
					'color_code'            => $objWorksheet->getCellByColumnAndRow(16,$i)->getValue(),
					'color'                 => $objWorksheet->getCellByColumnAndRow(17,$i)->getValue(),
					'tags'                  => $objWorksheet->getCellByColumnAndRow(18,$i)->getValue(),
					'features'              => $objWorksheet->getCellByColumnAndRow(19,$i)->getValue(),
					'model_name'            => $objWorksheet->getCellByColumnAndRow(20,$i)->getValue(),
					'model_number'          => $objWorksheet->getCellByColumnAndRow(21,$i)->getValue(),
					'designed_for'          => $objWorksheet->getCellByColumnAndRow(22,$i)->getValue(),
					'suitable_for'          => $objWorksheet->getCellByColumnAndRow(23,$i)->getValue(),
					'height'                => $objWorksheet->getCellByColumnAndRow(24,$i)->getValue(),
					'width'                 => $objWorksheet->getCellByColumnAndRow(25,$i)->getValue(),
					'thickness'             => $objWorksheet->getCellByColumnAndRow(26,$i)->getValue(),
					'warrenty'              => $objWorksheet->getCellByColumnAndRow(27,$i)->getValue(),
					'warrenty_summary'      => $objWorksheet->getCellByColumnAndRow(28,$i)->getValue(),
					'warrenty_service_type' => $objWorksheet->getCellByColumnAndRow(29,$i)->getValue(),
					'covered_in_warrenty'   => $objWorksheet->getCellByColumnAndRow(30,$i)->getValue(),
					'no_in_warrenty'        => $objWorksheet->getCellByColumnAndRow(31,$i)->getValue(),
					'length'                => $objWorksheet->getCellByColumnAndRow(32,$i)->getValue(),
					'height_unit'           => $objWorksheet->getCellByColumnAndRow(33,$i)->getValue(),
					'width_unit'            => $objWorksheet->getCellByColumnAndRow(34,$i)->getValue(),
					'length_unit'           => $objWorksheet->getCellByColumnAndRow(35,$i)->getValue(),
					'thickness_unit'        => $objWorksheet->getCellByColumnAndRow(36,$i)->getValue(),
					'weight'                => $objWorksheet->getCellByColumnAndRow(37,$i)->getValue(),
					'weight_unit'           => $objWorksheet->getCellByColumnAndRow(38,$i)->getValue(), 
					 'upload_type' 			=>'excel',
					
				);
				

				if (!empty($data_product)) {
					
					$result = $this->productModel->upload_excel_products($data_product);
					if ($result) {
						
						$output['status'] = true;
					}

				}
			     
						  
          }
	           $output['header'] = $data_product;

			
            return $output['status'];

	}
	public function upload_cases_cover($excel) {

		 $objReader= PHPExcel_IOFactory::createReader('Excel2007');	// For excel 2007 	  
          //Set to read only
         $objReader->setReadDataOnly(true); 		  
        //Load excel file
		 $objPHPExcel=$objReader->load($excel);		 
         $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel      	 
         $output = array('status'=>'','header'=>'','rows'=>'');
        

         $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);                
          //loop from first data untill last data
         for($i=2;$i<=$totalrows;$i++)
          {
          	$data_product = array(
					'user_id'               =>$this->session->userdata('user_id'),
					
					'title'                 => $objWorksheet->getCellByColumnAndRow(0,$i)->getValue() ,			
					'subtitle'              => $objWorksheet->getCellByColumnAndRow(1,$i)->getValue() ,
					'type'                  => $objWorksheet->getCellByColumnAndRow(2,$i)->getValue() ,
					'price'                 => $objWorksheet->getCellByColumnAndRow(3,$i)->getValue() ,
					'compare_price'         => $objWorksheet->getCellByColumnAndRow(4,$i)->getValue() ,
					'quantity'              => $objWorksheet->getCellByColumnAndRow(5,$i)->getValue() ,
					'thumbnail'             => $objWorksheet->getCellByColumnAndRow(6,$i)->getValue() ,
					'thumbnail2'            => $objWorksheet->getCellByColumnAndRow(7,$i)->getValue() ,
					'thumbnail3'            => $objWorksheet->getCellByColumnAndRow(8,$i)->getValue(),
					'thumbnail4'            => $objWorksheet->getCellByColumnAndRow(9,$i)->getValue(),
					'sku'                   => $objWorksheet->getCellByColumnAndRow(10,$i)->getValue(),
					'category_id'           => $objWorksheet->getCellByColumnAndRow(11,$i)->getValue(),
					'description'           => $objWorksheet->getCellByColumnAndRow(12,$i)->getValue(),
					'shipping'              => $objWorksheet->getCellByColumnAndRow(13,$i)->getValue(),
					'status'                => $objWorksheet->getCellByColumnAndRow(14,$i)->getValue(),
					'brand'                 => $objWorksheet->getCellByColumnAndRow(15,$i)->getValue(),
					'color_code'            => $objWorksheet->getCellByColumnAndRow(16,$i)->getValue(),
					'color'                 => $objWorksheet->getCellByColumnAndRow(17,$i)->getValue(),
					'tags'                  => $objWorksheet->getCellByColumnAndRow(18,$i)->getValue(),
					'features'              => $objWorksheet->getCellByColumnAndRow(19,$i)->getValue(),
					'model_name'            => $objWorksheet->getCellByColumnAndRow(20,$i)->getValue(),
					'model_number'          => $objWorksheet->getCellByColumnAndRow(21,$i)->getValue(),
					'designed_for'          => $objWorksheet->getCellByColumnAndRow(22,$i)->getValue(),
					'suitable_for'          => $objWorksheet->getCellByColumnAndRow(23,$i)->getValue(),
					'height'                => $objWorksheet->getCellByColumnAndRow(24,$i)->getValue(),
					'width'                 => $objWorksheet->getCellByColumnAndRow(25,$i)->getValue(),
					'thickness'             => $objWorksheet->getCellByColumnAndRow(26,$i)->getValue(),
					'warrenty'              => $objWorksheet->getCellByColumnAndRow(27,$i)->getValue(),
					'warrenty_summary'      => $objWorksheet->getCellByColumnAndRow(28,$i)->getValue(),
					'warrenty_service_type' => $objWorksheet->getCellByColumnAndRow(29,$i)->getValue(),
					'covered_in_warrenty'   => $objWorksheet->getCellByColumnAndRow(30,$i)->getValue(),
					'no_in_warrenty'        => $objWorksheet->getCellByColumnAndRow(31,$i)->getValue(),
					'length'                => $objWorksheet->getCellByColumnAndRow(32,$i)->getValue(),
					'height_unit'           => $objWorksheet->getCellByColumnAndRow(33,$i)->getValue(),
					'width_unit'            => $objWorksheet->getCellByColumnAndRow(34,$i)->getValue(),
					'length_unit'           => $objWorksheet->getCellByColumnAndRow(35,$i)->getValue(),
					'thickness_unit'        => $objWorksheet->getCellByColumnAndRow(36,$i)->getValue(),
					'weight'                => $objWorksheet->getCellByColumnAndRow(37,$i)->getValue(),
					'weight_unit'           => $objWorksheet->getCellByColumnAndRow(38,$i)->getValue(), 
					'material'              => $objWorksheet->getCellByColumnAndRow(39,$i)->getValue(), 
					'upload_type' 			=>'excel',
				);
				

				if (!empty($data_product)) {
					
					$result = $this->productModel->upload_excel_products($data_product);
					if ($result) {
						
						$output['status'] = true;
					}

				}
			     
						  
          }
	           $output['header'] = $data_product;

			
            return $output['status'];

	}
	public function upload_power_bank($excel) {

			 $objReader= PHPExcel_IOFactory::createReader('Excel2007');	// For excel 2007 	  
          //Set to read only
         $objReader->setReadDataOnly(true); 		  
        //Load excel file
		 $objPHPExcel=$objReader->load($excel);		 
         $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel      	 
         $output = array('status'=>'','header'=>'','rows'=>'');
        

         $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);                
          //loop from first data untill last data
         for($i=2;$i<=$totalrows;$i++)
          {
          	$data_product = array(
					'user_id'               =>$this->session->userdata('user_id'),
					
					'title'                 => $objWorksheet->getCellByColumnAndRow(0,$i)->getValue() ,			
					'subtitle'              => $objWorksheet->getCellByColumnAndRow(1,$i)->getValue() ,
					'capacity'              => $objWorksheet->getCellByColumnAndRow(2,$i)->getValue() ,
					'capacity_unit'         => $objWorksheet->getCellByColumnAndRow(3,$i)->getValue() ,
					'type'                  => $objWorksheet->getCellByColumnAndRow(4,$i)->getValue() ,
					'price'                 => $objWorksheet->getCellByColumnAndRow(5,$i)->getValue() ,
					'compare_price'         => $objWorksheet->getCellByColumnAndRow(6,$i)->getValue() ,
					'quantity'              => $objWorksheet->getCellByColumnAndRow(7,$i)->getValue() ,
					'thumbnail'             => $objWorksheet->getCellByColumnAndRow(8,$i)->getValue() ,
					'thumbnail2'            => $objWorksheet->getCellByColumnAndRow(9,$i)->getValue() ,
					'thumbnail3'            => $objWorksheet->getCellByColumnAndRow(10,$i)->getValue(),
					'thumbnail4'            => $objWorksheet->getCellByColumnAndRow(11,$i)->getValue(),
					'sku'                   => $objWorksheet->getCellByColumnAndRow(12,$i)->getValue(),
					'category_id'           => $objWorksheet->getCellByColumnAndRow(13,$i)->getValue(),
					'description'           => $objWorksheet->getCellByColumnAndRow(14,$i)->getValue(),
					'shipping'              => $objWorksheet->getCellByColumnAndRow(15,$i)->getValue(),
					'status'                => $objWorksheet->getCellByColumnAndRow(16,$i)->getValue(),
					'brand'                 => $objWorksheet->getCellByColumnAndRow(17,$i)->getValue(),
					'color_code'            => $objWorksheet->getCellByColumnAndRow(18,$i)->getValue(),
					'color'                 => $objWorksheet->getCellByColumnAndRow(18,$i)->getValue(),
					'tags'                  => $objWorksheet->getCellByColumnAndRow(19,$i)->getValue(),
					'features'              => $objWorksheet->getCellByColumnAndRow(20,$i)->getValue(),
					'model_name'            => $objWorksheet->getCellByColumnAndRow(21,$i)->getValue(),
					'model_number'          => $objWorksheet->getCellByColumnAndRow(22,$i)->getValue(),
					'designed_for'          => $objWorksheet->getCellByColumnAndRow(23,$i)->getValue(),
					'suitable_for'          => $objWorksheet->getCellByColumnAndRow(24,$i)->getValue(),
					'height'                => $objWorksheet->getCellByColumnAndRow(25,$i)->getValue(),
					'width'                 => $objWorksheet->getCellByColumnAndRow(26,$i)->getValue(),
					'thickness'             => $objWorksheet->getCellByColumnAndRow(27,$i)->getValue(),
					'warrenty'              => $objWorksheet->getCellByColumnAndRow(28,$i)->getValue(),
					'warrenty_summary'      => $objWorksheet->getCellByColumnAndRow(29,$i)->getValue(),
					'warrenty_service_type' => $objWorksheet->getCellByColumnAndRow(30,$i)->getValue(),
					'covered_in_warrenty'   => $objWorksheet->getCellByColumnAndRow(31,$i)->getValue(),
					'no_in_warrenty'        => $objWorksheet->getCellByColumnAndRow(32,$i)->getValue(),
					'length'                => $objWorksheet->getCellByColumnAndRow(33,$i)->getValue(),
					'height_unit'           => $objWorksheet->getCellByColumnAndRow(34,$i)->getValue(),
					'width_unit'            => $objWorksheet->getCellByColumnAndRow(35,$i)->getValue(),
					'length_unit'           => $objWorksheet->getCellByColumnAndRow(36,$i)->getValue(),
					'thickness_unit'        => $objWorksheet->getCellByColumnAndRow(37,$i)->getValue(),
					'weight'                => $objWorksheet->getCellByColumnAndRow(38,$i)->getValue(),
					'weight_unit'           => $objWorksheet->getCellByColumnAndRow(39,$i)->getValue(), 
					'upload_type' 			=>'excel',
				);
				

				if (!empty($data_product)) {
					
					$result = $this->productModel->upload_excel_products($data_product);
					if ($result) {
						
						$output['status'] = true;
					}

				}
			     
						  
          }
	           $output['header'] = $data_product;

			
            return $output['status'];

	}

	public function upload_selfie_stick($excel) {

		 $objReader= PHPExcel_IOFactory::createReader('Excel2007');	// For excel 2007 	  
          //Set to read only
         $objReader->setReadDataOnly(true); 		  
        //Load excel file
		 $objPHPExcel=$objReader->load($excel);		 
         $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel      	 
         $output = array('status'=>'','header'=>'','rows'=>'');
        

         $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);                
          //loop from first data untill last data
         for($i=2;$i<=$totalrows;$i++)
          {
          	$data_product = array(
					'user_id'               =>$this->session->userdata('user_id'),
					
					'title'                 => $objWorksheet->getCellByColumnAndRow(0,$i)->getValue() ,			
					'subtitle'              => $objWorksheet->getCellByColumnAndRow(1,$i)->getValue() ,
					'type'                  => $objWorksheet->getCellByColumnAndRow(2,$i)->getValue() ,
					'price'                 => $objWorksheet->getCellByColumnAndRow(3,$i)->getValue() ,
					'compare_price'         => $objWorksheet->getCellByColumnAndRow(4,$i)->getValue() ,
					'quantity'              => $objWorksheet->getCellByColumnAndRow(5,$i)->getValue() ,
					'thumbnail'             => $objWorksheet->getCellByColumnAndRow(6,$i)->getValue() ,
					'thumbnail2'            => $objWorksheet->getCellByColumnAndRow(7,$i)->getValue() ,
					'thumbnail3'            => $objWorksheet->getCellByColumnAndRow(8,$i)->getValue(),
					'thumbnail4'            => $objWorksheet->getCellByColumnAndRow(9,$i)->getValue(),
					'sku'                   => $objWorksheet->getCellByColumnAndRow(10,$i)->getValue(),
					'category_id'           => $objWorksheet->getCellByColumnAndRow(11,$i)->getValue(),
					'description'           => $objWorksheet->getCellByColumnAndRow(12,$i)->getValue(),
					'shipping'              => $objWorksheet->getCellByColumnAndRow(13,$i)->getValue(),
					'status'                => $objWorksheet->getCellByColumnAndRow(14,$i)->getValue(),
					'brand'                 => $objWorksheet->getCellByColumnAndRow(15,$i)->getValue(),
					'color_code'            => $objWorksheet->getCellByColumnAndRow(16,$i)->getValue(),
					'color'                 => $objWorksheet->getCellByColumnAndRow(17,$i)->getValue(),
					'tags'                  => $objWorksheet->getCellByColumnAndRow(18,$i)->getValue(),
					'features'              => $objWorksheet->getCellByColumnAndRow(19,$i)->getValue(),
					'model_name'            => $objWorksheet->getCellByColumnAndRow(20,$i)->getValue(),
					'model_number'          => $objWorksheet->getCellByColumnAndRow(21,$i)->getValue(),
					'designed_for'          => $objWorksheet->getCellByColumnAndRow(22,$i)->getValue(),
					'suitable_for'          => $objWorksheet->getCellByColumnAndRow(23,$i)->getValue(),
					'height'                => $objWorksheet->getCellByColumnAndRow(24,$i)->getValue(),
					'width'                 => $objWorksheet->getCellByColumnAndRow(25,$i)->getValue(),
					'thickness'             => $objWorksheet->getCellByColumnAndRow(26,$i)->getValue(),
					'warrenty'              => $objWorksheet->getCellByColumnAndRow(27,$i)->getValue(),
					'warrenty_summary'      => $objWorksheet->getCellByColumnAndRow(28,$i)->getValue(),
					'warrenty_service_type' => $objWorksheet->getCellByColumnAndRow(29,$i)->getValue(),
					'covered_in_warrenty'   => $objWorksheet->getCellByColumnAndRow(30,$i)->getValue(),
					'no_in_warrenty'        => $objWorksheet->getCellByColumnAndRow(31,$i)->getValue(),
					'length'                => $objWorksheet->getCellByColumnAndRow(32,$i)->getValue(),
					'height_unit'           => $objWorksheet->getCellByColumnAndRow(33,$i)->getValue(),
					'width_unit'            => $objWorksheet->getCellByColumnAndRow(34,$i)->getValue(),
					'length_unit'           => $objWorksheet->getCellByColumnAndRow(35,$i)->getValue(),
					'thickness_unit'        => $objWorksheet->getCellByColumnAndRow(36,$i)->getValue(),
					'weight'                => $objWorksheet->getCellByColumnAndRow(37,$i)->getValue(),
					'weight_unit'           => $objWorksheet->getCellByColumnAndRow(38,$i)->getValue(), 
					'upload_type' 			=>'excel',
				);
				

				if (!empty($data_product)) {
					
					$result = $this->productModel->upload_excel_products($data_product);
					if ($result) {
						
						$output['status'] = true;
					}

				}
			     
						  
          }
	           $output['header'] = $data_product;

			
            return $output['status'];
		
	}

	public function upload_mobile_charger($excel) {

		 $objReader= PHPExcel_IOFactory::createReader('Excel2007');	// For excel 2007 	  
          //Set to read only
         $objReader->setReadDataOnly(true); 		  
        //Load excel file
		 $objPHPExcel=$objReader->load($excel);		 
         $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel      	 
         $output = array('status'=>'','header'=>'','rows'=>'');
        

         $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);                
          //loop from first data untill last data
         for($i=2;$i<=$totalrows;$i++)
          {
          	$data_product = array(
					'user_id'               =>$this->session->userdata('user_id'),
					
					'title'                 => $objWorksheet->getCellByColumnAndRow(0,$i)->getValue() ,			
					'subtitle'              => $objWorksheet->getCellByColumnAndRow(1,$i)->getValue() ,
					'type'                  => $objWorksheet->getCellByColumnAndRow(2,$i)->getValue() ,
					'price'                 => $objWorksheet->getCellByColumnAndRow(3,$i)->getValue() ,
					'compare_price'         => $objWorksheet->getCellByColumnAndRow(4,$i)->getValue() ,
					'quantity'              => $objWorksheet->getCellByColumnAndRow(5,$i)->getValue() ,
					'thumbnail'             => $objWorksheet->getCellByColumnAndRow(6,$i)->getValue() ,
					'thumbnail2'            => $objWorksheet->getCellByColumnAndRow(7,$i)->getValue() ,
					'thumbnail3'            => $objWorksheet->getCellByColumnAndRow(8,$i)->getValue(),
					'thumbnail4'            => $objWorksheet->getCellByColumnAndRow(9,$i)->getValue(),
					'sku'                   => $objWorksheet->getCellByColumnAndRow(10,$i)->getValue(),
					'category_id'           => $objWorksheet->getCellByColumnAndRow(11,$i)->getValue(),
					'description'           => $objWorksheet->getCellByColumnAndRow(12,$i)->getValue(),
					'shipping'              => $objWorksheet->getCellByColumnAndRow(13,$i)->getValue(),
					'status'                => $objWorksheet->getCellByColumnAndRow(14,$i)->getValue(),
					'brand'                 => $objWorksheet->getCellByColumnAndRow(15,$i)->getValue(),
					'color_code'            => $objWorksheet->getCellByColumnAndRow(16,$i)->getValue(),
					'color'                 => $objWorksheet->getCellByColumnAndRow(17,$i)->getValue(),
					'tags'                  => $objWorksheet->getCellByColumnAndRow(18,$i)->getValue(),
					'features'              => $objWorksheet->getCellByColumnAndRow(19,$i)->getValue(),
					'model_name'            => $objWorksheet->getCellByColumnAndRow(20,$i)->getValue(),
					'model_number'          => $objWorksheet->getCellByColumnAndRow(21,$i)->getValue(),
					'designed_for'          => $objWorksheet->getCellByColumnAndRow(22,$i)->getValue(),
					'suitable_for'          => $objWorksheet->getCellByColumnAndRow(23,$i)->getValue(),
					'height'                => $objWorksheet->getCellByColumnAndRow(24,$i)->getValue(),
					'width'                 => $objWorksheet->getCellByColumnAndRow(25,$i)->getValue(),
					'thickness'             => $objWorksheet->getCellByColumnAndRow(26,$i)->getValue(),
					'warrenty'              => $objWorksheet->getCellByColumnAndRow(27,$i)->getValue(),
					'warrenty_summary'      => $objWorksheet->getCellByColumnAndRow(28,$i)->getValue(),
					'warrenty_service_type' => $objWorksheet->getCellByColumnAndRow(29,$i)->getValue(),
					'covered_in_warrenty'   => $objWorksheet->getCellByColumnAndRow(30,$i)->getValue(),
					'no_in_warrenty'        => $objWorksheet->getCellByColumnAndRow(31,$i)->getValue(),
					'length'                => $objWorksheet->getCellByColumnAndRow(32,$i)->getValue(),
					'height_unit'           => $objWorksheet->getCellByColumnAndRow(33,$i)->getValue(),
					'width_unit'            => $objWorksheet->getCellByColumnAndRow(34,$i)->getValue(),
					'length_unit'           => $objWorksheet->getCellByColumnAndRow(35,$i)->getValue(),
					'thickness_unit'        => $objWorksheet->getCellByColumnAndRow(36,$i)->getValue(),
					'weight'                => $objWorksheet->getCellByColumnAndRow(37,$i)->getValue(),
					'weight_unit'           => $objWorksheet->getCellByColumnAndRow(38,$i)->getValue(), 
					'connector_type'           => $objWorksheet->getCellByColumnAndRow(39,$i)->getValue(), 
					'upload_type' 			=>'excel',
				);
				

				if (!empty($data_product)) {
					
					$result = $this->productModel->upload_excel_products($data_product);
					if ($result) {
						
						$output['status'] = true;
					}

				}
			     
						  
          }
	           $output['header'] = $data_product;

			
            return $output['status'];
		
	}
	public function upload_mobile_lense($excel) {

		 $objReader= PHPExcel_IOFactory::createReader('Excel2007');	// For excel 2007 	  
          //Set to read only
         $objReader->setReadDataOnly(true); 		  
        //Load excel file
		 $objPHPExcel=$objReader->load($excel);		 
         $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel      	 
         $output = array('status'=>'','header'=>'','rows'=>'');
        

         $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);                
          //loop from first data untill last data
         for($i=2;$i<=$totalrows;$i++)
          {
          	$data_product = array(
					'user_id'               =>$this->session->userdata('user_id'),
					
					'title'                 => $objWorksheet->getCellByColumnAndRow(0,$i)->getValue() ,			
					'subtitle'              => $objWorksheet->getCellByColumnAndRow(1,$i)->getValue() ,
					'type'                  => $objWorksheet->getCellByColumnAndRow(2,$i)->getValue() ,
					'price'                 => $objWorksheet->getCellByColumnAndRow(3,$i)->getValue() ,
					'compare_price'         => $objWorksheet->getCellByColumnAndRow(4,$i)->getValue() ,
					'quantity'              => $objWorksheet->getCellByColumnAndRow(5,$i)->getValue() ,
					'thumbnail'             => $objWorksheet->getCellByColumnAndRow(6,$i)->getValue() ,
					'thumbnail2'            => $objWorksheet->getCellByColumnAndRow(7,$i)->getValue() ,
					'thumbnail3'            => $objWorksheet->getCellByColumnAndRow(8,$i)->getValue(),
					'thumbnail4'            => $objWorksheet->getCellByColumnAndRow(9,$i)->getValue(),
					'sku'                   => $objWorksheet->getCellByColumnAndRow(10,$i)->getValue(),
					'category_id'           => $objWorksheet->getCellByColumnAndRow(11,$i)->getValue(),
					'description'           => $objWorksheet->getCellByColumnAndRow(12,$i)->getValue(),
					'shipping'              => $objWorksheet->getCellByColumnAndRow(13,$i)->getValue(),
					'status'                => $objWorksheet->getCellByColumnAndRow(14,$i)->getValue(),
					'brand'                 => $objWorksheet->getCellByColumnAndRow(15,$i)->getValue(),
					'color_code'            => $objWorksheet->getCellByColumnAndRow(16,$i)->getValue(),
					'color'                 => $objWorksheet->getCellByColumnAndRow(17,$i)->getValue(),
					'tags'                  => $objWorksheet->getCellByColumnAndRow(18,$i)->getValue(),
					'features'              => $objWorksheet->getCellByColumnAndRow(19,$i)->getValue(),
					'model_name'            => $objWorksheet->getCellByColumnAndRow(20,$i)->getValue(),
					'model_number'          => $objWorksheet->getCellByColumnAndRow(21,$i)->getValue(),
					'designed_for'          => $objWorksheet->getCellByColumnAndRow(22,$i)->getValue(),
					'suitable_for'          => $objWorksheet->getCellByColumnAndRow(23,$i)->getValue(),
					'height'                => $objWorksheet->getCellByColumnAndRow(24,$i)->getValue(),
					'width'                 => $objWorksheet->getCellByColumnAndRow(25,$i)->getValue(),
					'thickness'             => $objWorksheet->getCellByColumnAndRow(26,$i)->getValue(),
					'warrenty'              => $objWorksheet->getCellByColumnAndRow(27,$i)->getValue(),
					'warrenty_summary'      => $objWorksheet->getCellByColumnAndRow(28,$i)->getValue(),
					'warrenty_service_type' => $objWorksheet->getCellByColumnAndRow(29,$i)->getValue(),
					'covered_in_warrenty'   => $objWorksheet->getCellByColumnAndRow(30,$i)->getValue(),
					'no_in_warrenty'        => $objWorksheet->getCellByColumnAndRow(31,$i)->getValue(),
					'length'                => $objWorksheet->getCellByColumnAndRow(32,$i)->getValue(),
					'height_unit'           => $objWorksheet->getCellByColumnAndRow(33,$i)->getValue(),
					'width_unit'            => $objWorksheet->getCellByColumnAndRow(34,$i)->getValue(),
					'length_unit'           => $objWorksheet->getCellByColumnAndRow(35,$i)->getValue(),
					'thickness_unit'        => $objWorksheet->getCellByColumnAndRow(36,$i)->getValue(),
					'weight'                => $objWorksheet->getCellByColumnAndRow(37,$i)->getValue(),
					'weight_unit'           => $objWorksheet->getCellByColumnAndRow(38,$i)->getValue(), 
					'upload_type' 			=>'excel',
				);
				

				if (!empty($data_product)) {
					
					$result = $this->productModel->upload_excel_products($data_product);
					if ($result) {
						
						$output['status'] = true;
					}

				}
			     
						  
          }
	           $output['header'] = $data_product;

			
            return $output['status'];
		
	}
	public function upload_mobile_skin($excel) {
		

		 $objReader= PHPExcel_IOFactory::createReader('Excel2007');	// For excel 2007 	  
          //Set to read only
         $objReader->setReadDataOnly(true); 		  
        //Load excel file
		 $objPHPExcel=$objReader->load($excel);		 
         $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel      	 
         $output = array('status'=>'','header'=>'','rows'=>'');
        

         $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);                
          //loop from first data untill last data
         for($i=2;$i<=$totalrows;$i++)
          {
          	$data_product = array(
					'user_id'               =>$this->session->userdata('user_id'),
					
					'title'                 => $objWorksheet->getCellByColumnAndRow(0,$i)->getValue() ,			
					'subtitle'              => $objWorksheet->getCellByColumnAndRow(1,$i)->getValue() ,
					'type'                  => $objWorksheet->getCellByColumnAndRow(2,$i)->getValue() ,
					'price'                 => $objWorksheet->getCellByColumnAndRow(3,$i)->getValue() ,
					'compare_price'         => $objWorksheet->getCellByColumnAndRow(4,$i)->getValue() ,
					'quantity'              => $objWorksheet->getCellByColumnAndRow(5,$i)->getValue() ,
					'thumbnail'             => $objWorksheet->getCellByColumnAndRow(6,$i)->getValue() ,
					'thumbnail2'            => $objWorksheet->getCellByColumnAndRow(7,$i)->getValue() ,
					'thumbnail3'            => $objWorksheet->getCellByColumnAndRow(8,$i)->getValue(),
					'thumbnail4'            => $objWorksheet->getCellByColumnAndRow(9,$i)->getValue(),
					'sku'                   => $objWorksheet->getCellByColumnAndRow(10,$i)->getValue(),
					'category_id'           => $objWorksheet->getCellByColumnAndRow(11,$i)->getValue(),
					'description'           => $objWorksheet->getCellByColumnAndRow(12,$i)->getValue(),
					'shipping'              => $objWorksheet->getCellByColumnAndRow(13,$i)->getValue(),
					'status'                => $objWorksheet->getCellByColumnAndRow(14,$i)->getValue(),
					'brand'                => $objWorksheet->getCellByColumnAndRow(15,$i)->getValue(),
					'color_code'            => $objWorksheet->getCellByColumnAndRow(16,$i)->getValue(),
					'color'                 => $objWorksheet->getCellByColumnAndRow(17,$i)->getValue(),
					'tags'                  => $objWorksheet->getCellByColumnAndRow(18,$i)->getValue(),
					
					'designed_for'          => $objWorksheet->getCellByColumnAndRow(19,$i)->getValue(),
					'suitable_for'          => $objWorksheet->getCellByColumnAndRow(20,$i)->getValue(),
					'height'                => $objWorksheet->getCellByColumnAndRow(21,$i)->getValue(),
					'width'                 => $objWorksheet->getCellByColumnAndRow(22,$i)->getValue(),
					
					'length'                => $objWorksheet->getCellByColumnAndRow(23,$i)->getValue(),
					'height_unit'           => $objWorksheet->getCellByColumnAndRow(24,$i)->getValue(),
					'width_unit'            => $objWorksheet->getCellByColumnAndRow(25,$i)->getValue(),
					'length_unit'           => $objWorksheet->getCellByColumnAndRow(26,$i)->getValue(),
					'weight'                => $objWorksheet->getCellByColumnAndRow(27,$i)->getValue(),
					'weight_unit'           => $objWorksheet->getCellByColumnAndRow(28,$i)->getValue(), 
					'upload_type' 			=>'excel',
				);
				

				if (!empty($data_product)) {
					
					$result = $this->productModel->upload_excel_products($data_product);
					if ($result) {
						
						$output['status'] = true;
					}

				}
			     
						  
          }
	           $output['header'] = $data_product;

			
            return $output['status'];
	}


	public function upload_card_reader($excel) {

		 $objReader= PHPExcel_IOFactory::createReader('Excel2007');	// For excel 2007 	  
          //Set to read only
         $objReader->setReadDataOnly(true); 		  
        //Load excel file
		 $objPHPExcel=$objReader->load($excel);		 
         $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel      	 
         $output = array('status'=>'','header'=>'','rows'=>'');
        

         $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);                
          //loop from first data untill last data
         for($i=2;$i<=$totalrows;$i++)
          {
          	$data_product = array(
					'user_id'               =>$this->session->userdata('user_id'),
					
					'title'                 => $objWorksheet->getCellByColumnAndRow(0,$i)->getValue() ,			
					'subtitle'              => $objWorksheet->getCellByColumnAndRow(1,$i)->getValue() ,
					'type'                  => $objWorksheet->getCellByColumnAndRow(2,$i)->getValue() ,
					'price'                 => $objWorksheet->getCellByColumnAndRow(3,$i)->getValue() ,
					'compare_price'         => $objWorksheet->getCellByColumnAndRow(4,$i)->getValue() ,
					'quantity'              => $objWorksheet->getCellByColumnAndRow(5,$i)->getValue() ,
					'thumbnail'             => $objWorksheet->getCellByColumnAndRow(6,$i)->getValue() ,
					'thumbnail2'            => $objWorksheet->getCellByColumnAndRow(7,$i)->getValue() ,
					'thumbnail3'            => $objWorksheet->getCellByColumnAndRow(8,$i)->getValue(),
					'thumbnail4'            => $objWorksheet->getCellByColumnAndRow(9,$i)->getValue(),
					'sku'                   => $objWorksheet->getCellByColumnAndRow(10,$i)->getValue(),
					'category_id'           => $objWorksheet->getCellByColumnAndRow(11,$i)->getValue(),
					'description'           => $objWorksheet->getCellByColumnAndRow(12,$i)->getValue(),
					'shipping'              => $objWorksheet->getCellByColumnAndRow(13,$i)->getValue(),
					'status'                => $objWorksheet->getCellByColumnAndRow(14,$i)->getValue(),
					'brand'                 => $objWorksheet->getCellByColumnAndRow(15,$i)->getValue(),
					'color_code'            => $objWorksheet->getCellByColumnAndRow(16,$i)->getValue(),
					'color'                 => $objWorksheet->getCellByColumnAndRow(17,$i)->getValue(),
					'tags'                  => $objWorksheet->getCellByColumnAndRow(18,$i)->getValue(),
					'features'              => $objWorksheet->getCellByColumnAndRow(19,$i)->getValue(),
					'model_name'            => $objWorksheet->getCellByColumnAndRow(20,$i)->getValue(),
					'model_number'          => $objWorksheet->getCellByColumnAndRow(21,$i)->getValue(),
					'designed_for'          => $objWorksheet->getCellByColumnAndRow(22,$i)->getValue(),
					'suitable_for'          => $objWorksheet->getCellByColumnAndRow(23,$i)->getValue(),
					'height'                => $objWorksheet->getCellByColumnAndRow(24,$i)->getValue(),
					'width'                 => $objWorksheet->getCellByColumnAndRow(25,$i)->getValue(),
					'thickness'             => $objWorksheet->getCellByColumnAndRow(26,$i)->getValue(),
					'warrenty'              => $objWorksheet->getCellByColumnAndRow(27,$i)->getValue(),
					'warrenty_summary'      => $objWorksheet->getCellByColumnAndRow(28,$i)->getValue(),
					'warrenty_service_type' => $objWorksheet->getCellByColumnAndRow(29,$i)->getValue(),
					'covered_in_warrenty'   => $objWorksheet->getCellByColumnAndRow(30,$i)->getValue(),
					'no_in_warrenty'        => $objWorksheet->getCellByColumnAndRow(31,$i)->getValue(),
					'length'                => $objWorksheet->getCellByColumnAndRow(32,$i)->getValue(),
					'height_unit'           => $objWorksheet->getCellByColumnAndRow(33,$i)->getValue(),
					'width_unit'            => $objWorksheet->getCellByColumnAndRow(34,$i)->getValue(),
					'length_unit'           => $objWorksheet->getCellByColumnAndRow(35,$i)->getValue(),
					'thickness_unit'        => $objWorksheet->getCellByColumnAndRow(36,$i)->getValue(),
					'weight'                => $objWorksheet->getCellByColumnAndRow(37,$i)->getValue(),
					'weight_unit'           => $objWorksheet->getCellByColumnAndRow(38,$i)->getValue(), 
					'connector_type'           => $objWorksheet->getCellByColumnAndRow(39,$i)->getValue(), 
					'upload_type' 			=>'excel',
				);
				

				if (!empty($data_product)) {
					
					$result = $this->productModel->upload_excel_products($data_product);
					if ($result) {
						
						$output['status'] = true;
					}

				}
			     
						  
          }
	           $output['header'] = $data_product;

			
            return $output['status'];
		
	}
	public function upload_spare_parts($excel) {

		 $objReader= PHPExcel_IOFactory::createReader('Excel2007');	// For excel 2007 	  
          //Set to read only
         $objReader->setReadDataOnly(true); 		  
        //Load excel file
		 $objPHPExcel=$objReader->load($excel);		 
         $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel      	 
         $output = array('status'=>'','header'=>'','rows'=>'');
        

         $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);                
          //loop from first data untill last data
         for($i=2;$i<=$totalrows;$i++)
          {
          	$data_product = array(
					'user_id'               =>$this->session->userdata('user_id'),
					
					'title'                 => $objWorksheet->getCellByColumnAndRow(0,$i)->getValue() ,			
					'subtitle'              => $objWorksheet->getCellByColumnAndRow(1,$i)->getValue() ,
					'type'                  => $objWorksheet->getCellByColumnAndRow(2,$i)->getValue() ,
					'price'                 => $objWorksheet->getCellByColumnAndRow(3,$i)->getValue() ,
					'compare_price'         => $objWorksheet->getCellByColumnAndRow(4,$i)->getValue() ,
					'quantity'              => $objWorksheet->getCellByColumnAndRow(5,$i)->getValue() ,
					'thumbnail'             => $objWorksheet->getCellByColumnAndRow(6,$i)->getValue() ,
					'thumbnail2'            => $objWorksheet->getCellByColumnAndRow(7,$i)->getValue() ,
					'thumbnail3'            => $objWorksheet->getCellByColumnAndRow(8,$i)->getValue(),
					'thumbnail4'            => $objWorksheet->getCellByColumnAndRow(9,$i)->getValue(),
					'sku'                   => $objWorksheet->getCellByColumnAndRow(10,$i)->getValue(),
					'category_id'           => $objWorksheet->getCellByColumnAndRow(11,$i)->getValue(),
					'description'           => $objWorksheet->getCellByColumnAndRow(12,$i)->getValue(),
					'shipping'              => $objWorksheet->getCellByColumnAndRow(13,$i)->getValue(),
					'status'                => $objWorksheet->getCellByColumnAndRow(14,$i)->getValue(),
					'brand'                 => $objWorksheet->getCellByColumnAndRow(15,$i)->getValue(),
					'color_code'            => $objWorksheet->getCellByColumnAndRow(16,$i)->getValue(),
					'color'                 => $objWorksheet->getCellByColumnAndRow(17,$i)->getValue(),
					'tags'                  => $objWorksheet->getCellByColumnAndRow(18,$i)->getValue(),
					'features'              => $objWorksheet->getCellByColumnAndRow(19,$i)->getValue(),
					'model_name'            => $objWorksheet->getCellByColumnAndRow(20,$i)->getValue(),
					'model_number'          => $objWorksheet->getCellByColumnAndRow(21,$i)->getValue(),
					'designed_for'          => $objWorksheet->getCellByColumnAndRow(22,$i)->getValue(),
					'suitable_for'          => $objWorksheet->getCellByColumnAndRow(23,$i)->getValue(),
					'height'                => $objWorksheet->getCellByColumnAndRow(24,$i)->getValue(),
					'width'                 => $objWorksheet->getCellByColumnAndRow(25,$i)->getValue(),
					'thickness'             => $objWorksheet->getCellByColumnAndRow(26,$i)->getValue(),
					'warrenty'              => $objWorksheet->getCellByColumnAndRow(27,$i)->getValue(),
					'warrenty_summary'      => $objWorksheet->getCellByColumnAndRow(28,$i)->getValue(),
					'warrenty_service_type' => $objWorksheet->getCellByColumnAndRow(29,$i)->getValue(),
					'covered_in_warrenty'   => $objWorksheet->getCellByColumnAndRow(30,$i)->getValue(),
					'no_in_warrenty'        => $objWorksheet->getCellByColumnAndRow(31,$i)->getValue(),
					'length'                => $objWorksheet->getCellByColumnAndRow(32,$i)->getValue(),
					'height_unit'           => $objWorksheet->getCellByColumnAndRow(33,$i)->getValue(),
					'width_unit'            => $objWorksheet->getCellByColumnAndRow(34,$i)->getValue(),
					'length_unit'           => $objWorksheet->getCellByColumnAndRow(35,$i)->getValue(),
					'thickness_unit'        => $objWorksheet->getCellByColumnAndRow(36,$i)->getValue(),
					'weight'                => $objWorksheet->getCellByColumnAndRow(37,$i)->getValue(),
					'weight_unit'           => $objWorksheet->getCellByColumnAndRow(38,$i)->getValue(), 
					'upload_type' 			=>'excel',
				);
				

				if (!empty($data_product)) {
					
					$result = $this->productModel->upload_excel_products($data_product);
					if ($result) {
						
						$output['status'] = true;
					}

				}
			     
						  
          }
	           $output['header'] = $data_product;

			
            return $output['status'];
		
	}
	public function upload_mobile_holder($excel) {

		 $objReader= PHPExcel_IOFactory::createReader('Excel2007');	// For excel 2007 	  
          //Set to read only
         $objReader->setReadDataOnly(true); 		  
        //Load excel file
		 $objPHPExcel=$objReader->load($excel);		 
         $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel      	 
         $output = array('status'=>'','header'=>'','rows'=>'');
        

         $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);                
          //loop from first data untill last data
         for($i=2;$i<=$totalrows;$i++)
          {
          	$data_product = array(
					'user_id'               =>$this->session->userdata('user_id'),
					
					'title'                 => $objWorksheet->getCellByColumnAndRow(0,$i)->getValue() ,			
					'subtitle'              => $objWorksheet->getCellByColumnAndRow(1,$i)->getValue() ,
					'type'                  => $objWorksheet->getCellByColumnAndRow(2,$i)->getValue() ,
					'price'                 => $objWorksheet->getCellByColumnAndRow(3,$i)->getValue() ,
					'compare_price'         => $objWorksheet->getCellByColumnAndRow(4,$i)->getValue() ,
					'quantity'              => $objWorksheet->getCellByColumnAndRow(5,$i)->getValue() ,
					'thumbnail'             => $objWorksheet->getCellByColumnAndRow(6,$i)->getValue() ,
					'thumbnail2'            => $objWorksheet->getCellByColumnAndRow(7,$i)->getValue() ,
					'thumbnail3'            => $objWorksheet->getCellByColumnAndRow(8,$i)->getValue(),
					'thumbnail4'            => $objWorksheet->getCellByColumnAndRow(9,$i)->getValue(),
					'sku'                   => $objWorksheet->getCellByColumnAndRow(10,$i)->getValue(),
					'category_id'           => $objWorksheet->getCellByColumnAndRow(11,$i)->getValue(),
					'description'           => $objWorksheet->getCellByColumnAndRow(12,$i)->getValue(),
					'shipping'              => $objWorksheet->getCellByColumnAndRow(13,$i)->getValue(),
					'status'                => $objWorksheet->getCellByColumnAndRow(14,$i)->getValue(),
					'brand'                 => $objWorksheet->getCellByColumnAndRow(15,$i)->getValue(),
					'color_code'            => $objWorksheet->getCellByColumnAndRow(16,$i)->getValue(),
					'color'                 => $objWorksheet->getCellByColumnAndRow(17,$i)->getValue(),
					'tags'                  => $objWorksheet->getCellByColumnAndRow(18,$i)->getValue(),
					'features'              => $objWorksheet->getCellByColumnAndRow(19,$i)->getValue(),
					'model_name'            => $objWorksheet->getCellByColumnAndRow(20,$i)->getValue(),
					'model_number'          => $objWorksheet->getCellByColumnAndRow(21,$i)->getValue(),
					'designed_for'          => $objWorksheet->getCellByColumnAndRow(22,$i)->getValue(),
					'suitable_for'          => $objWorksheet->getCellByColumnAndRow(23,$i)->getValue(),
					'height'                => $objWorksheet->getCellByColumnAndRow(24,$i)->getValue(),
					'width'                 => $objWorksheet->getCellByColumnAndRow(25,$i)->getValue(),
					'thickness'             => $objWorksheet->getCellByColumnAndRow(26,$i)->getValue(),
					'warrenty'              => $objWorksheet->getCellByColumnAndRow(27,$i)->getValue(),
					'warrenty_summary'      => $objWorksheet->getCellByColumnAndRow(28,$i)->getValue(),
					'warrenty_service_type' => $objWorksheet->getCellByColumnAndRow(29,$i)->getValue(),
					'covered_in_warrenty'   => $objWorksheet->getCellByColumnAndRow(30,$i)->getValue(),
					'no_in_warrenty'        => $objWorksheet->getCellByColumnAndRow(31,$i)->getValue(),
					'length'                => $objWorksheet->getCellByColumnAndRow(32,$i)->getValue(),
					'height_unit'           => $objWorksheet->getCellByColumnAndRow(33,$i)->getValue(),
					'width_unit'            => $objWorksheet->getCellByColumnAndRow(34,$i)->getValue(),
					'length_unit'           => $objWorksheet->getCellByColumnAndRow(35,$i)->getValue(),
					'thickness_unit'        => $objWorksheet->getCellByColumnAndRow(36,$i)->getValue(),
					'weight'                => $objWorksheet->getCellByColumnAndRow(37,$i)->getValue(),
					'weight_unit'           => $objWorksheet->getCellByColumnAndRow(38,$i)->getValue(), 
					'connector_type'           => $objWorksheet->getCellByColumnAndRow(39,$i)->getValue(), 
					'upload_type' 			=>'excel',
				);
				

				if (!empty($data_product)) {
					
					$result = $this->productModel->upload_excel_products($data_product);
					if ($result) {
						
						$output['status'] = true;
					}

				}
			     
						  
          }
	           $output['header'] = $data_product;

			
            return $output['status'];
		
	}

	public function upload_cable($excel) {

		 $objReader= PHPExcel_IOFactory::createReader('Excel2007');	// For excel 2007 	  
          //Set to read only
         $objReader->setReadDataOnly(true); 		  
        //Load excel file
		 $objPHPExcel=$objReader->load($excel);		 
         $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel      	 
         $output = array('status'=>'','header'=>'','rows'=>'');
        

         $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);                
          //loop from first data untill last data
         for($i=2;$i<=$totalrows;$i++)
          {
          	$data_product = array(
					'user_id'               =>$this->session->userdata('user_id'),
					
					'title'                 => $objWorksheet->getCellByColumnAndRow(0,$i)->getValue() ,			
					'subtitle'              => $objWorksheet->getCellByColumnAndRow(1,$i)->getValue() ,
					'type'                  => $objWorksheet->getCellByColumnAndRow(2,$i)->getValue() ,
					'price'                 => $objWorksheet->getCellByColumnAndRow(3,$i)->getValue() ,
					'compare_price'         => $objWorksheet->getCellByColumnAndRow(4,$i)->getValue() ,
					'quantity'              => $objWorksheet->getCellByColumnAndRow(5,$i)->getValue() ,
					'thumbnail'             => $objWorksheet->getCellByColumnAndRow(6,$i)->getValue() ,
					'thumbnail2'            => $objWorksheet->getCellByColumnAndRow(7,$i)->getValue() ,
					'thumbnail3'            => $objWorksheet->getCellByColumnAndRow(8,$i)->getValue(),
					'thumbnail4'            => $objWorksheet->getCellByColumnAndRow(9,$i)->getValue(),
					'sku'                   => $objWorksheet->getCellByColumnAndRow(10,$i)->getValue(),
					'category_id'           => $objWorksheet->getCellByColumnAndRow(11,$i)->getValue(),
					'description'           => $objWorksheet->getCellByColumnAndRow(12,$i)->getValue(),
					'shipping'              => $objWorksheet->getCellByColumnAndRow(13,$i)->getValue(),
					'status'                => $objWorksheet->getCellByColumnAndRow(14,$i)->getValue(),
					'brand'                 => $objWorksheet->getCellByColumnAndRow(15,$i)->getValue(),
					'color_code'            => $objWorksheet->getCellByColumnAndRow(16,$i)->getValue(),
					'color'                 => $objWorksheet->getCellByColumnAndRow(17,$i)->getValue(),
					'tags'                  => $objWorksheet->getCellByColumnAndRow(18,$i)->getValue(),
					'features'              => $objWorksheet->getCellByColumnAndRow(19,$i)->getValue(),
					'model_name'            => $objWorksheet->getCellByColumnAndRow(20,$i)->getValue(),
					'model_number'          => $objWorksheet->getCellByColumnAndRow(21,$i)->getValue(),
					'designed_for'          => $objWorksheet->getCellByColumnAndRow(22,$i)->getValue(),
					'suitable_for'          => $objWorksheet->getCellByColumnAndRow(23,$i)->getValue(),
					'height'                => $objWorksheet->getCellByColumnAndRow(24,$i)->getValue(),
					'width'                 => $objWorksheet->getCellByColumnAndRow(25,$i)->getValue(),
					'thickness'             => $objWorksheet->getCellByColumnAndRow(26,$i)->getValue(),
					'warrenty'              => $objWorksheet->getCellByColumnAndRow(27,$i)->getValue(),
					'warrenty_summary'      => $objWorksheet->getCellByColumnAndRow(28,$i)->getValue(),
					'warrenty_service_type' => $objWorksheet->getCellByColumnAndRow(29,$i)->getValue(),
					'covered_in_warrenty'   => $objWorksheet->getCellByColumnAndRow(30,$i)->getValue(),
					'no_in_warrenty'        => $objWorksheet->getCellByColumnAndRow(31,$i)->getValue(),
					'length'                => $objWorksheet->getCellByColumnAndRow(32,$i)->getValue(),
					'height_unit'           => $objWorksheet->getCellByColumnAndRow(33,$i)->getValue(),
					'width_unit'            => $objWorksheet->getCellByColumnAndRow(34,$i)->getValue(),
					'length_unit'           => $objWorksheet->getCellByColumnAndRow(35,$i)->getValue(),
					'thickness_unit'        => $objWorksheet->getCellByColumnAndRow(36,$i)->getValue(),
					'weight'                => $objWorksheet->getCellByColumnAndRow(37,$i)->getValue(),
					'weight_unit'           => $objWorksheet->getCellByColumnAndRow(38,$i)->getValue(), 
					'connector_type'           => $objWorksheet->getCellByColumnAndRow(39,$i)->getValue(), 
					'upload_type' 			=>'excel',
				);
				

				if (!empty($data_product)) {
					
					$result = $this->productModel->upload_excel_products($data_product);
					if ($result) {
						
						$output['status'] = true;
					}

				}
			     
						  
          }
	           $output['header'] = $data_product;

			
            return $output['status'];
	}

	public function upload_battery($excel) {

		 $objReader= PHPExcel_IOFactory::createReader('Excel2007');	// For excel 2007 	  
          //Set to read only
         $objReader->setReadDataOnly(true); 		  
        //Load excel file
		 $objPHPExcel=$objReader->load($excel);		 
         $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel      	 
         $output = array('status'=>'','header'=>'','rows'=>'');
        

         $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);                
          //loop from first data untill last data
         for($i=2;$i<=$totalrows;$i++)
          {
          	$data_product = array(
					'user_id'               =>$this->session->userdata('user_id'),
					
					'title'                 => $objWorksheet->getCellByColumnAndRow(0,$i)->getValue() ,			
					'subtitle'              => $objWorksheet->getCellByColumnAndRow(1,$i)->getValue() ,
					'capacity'              => $objWorksheet->getCellByColumnAndRow(2,$i)->getValue() ,
					'capacity_unit'         => $objWorksheet->getCellByColumnAndRow(3,$i)->getValue() ,
					'type'                  => $objWorksheet->getCellByColumnAndRow(4,$i)->getValue() ,
					'price'                 => $objWorksheet->getCellByColumnAndRow(5,$i)->getValue() ,
					'compare_price'         => $objWorksheet->getCellByColumnAndRow(6,$i)->getValue() ,
					'quantity'              => $objWorksheet->getCellByColumnAndRow(7,$i)->getValue() ,
					'thumbnail'             => $objWorksheet->getCellByColumnAndRow(8,$i)->getValue() ,
					'thumbnail2'            => $objWorksheet->getCellByColumnAndRow(9,$i)->getValue() ,
					'thumbnail3'            => $objWorksheet->getCellByColumnAndRow(10,$i)->getValue(),
					'thumbnail4'            => $objWorksheet->getCellByColumnAndRow(11,$i)->getValue(),
					'sku'                   => $objWorksheet->getCellByColumnAndRow(12,$i)->getValue(),
					'category_id'           => $objWorksheet->getCellByColumnAndRow(13,$i)->getValue(),
					'description'           => $objWorksheet->getCellByColumnAndRow(14,$i)->getValue(),
					'shipping'              => $objWorksheet->getCellByColumnAndRow(15,$i)->getValue(),
					'status'                => $objWorksheet->getCellByColumnAndRow(16,$i)->getValue(),
					'brand'                 => $objWorksheet->getCellByColumnAndRow(17,$i)->getValue(),
					'color_code'            => $objWorksheet->getCellByColumnAndRow(18,$i)->getValue(),
					'color'                 => $objWorksheet->getCellByColumnAndRow(18,$i)->getValue(),
					'tags'                  => $objWorksheet->getCellByColumnAndRow(19,$i)->getValue(),
					'features'              => $objWorksheet->getCellByColumnAndRow(20,$i)->getValue(),
					'model_name'            => $objWorksheet->getCellByColumnAndRow(21,$i)->getValue(),
					'model_number'          => $objWorksheet->getCellByColumnAndRow(22,$i)->getValue(),
					'designed_for'          => $objWorksheet->getCellByColumnAndRow(23,$i)->getValue(),
					'suitable_for'          => $objWorksheet->getCellByColumnAndRow(24,$i)->getValue(),
					'height'                => $objWorksheet->getCellByColumnAndRow(25,$i)->getValue(),
					'width'                 => $objWorksheet->getCellByColumnAndRow(26,$i)->getValue(),
					'thickness'             => $objWorksheet->getCellByColumnAndRow(27,$i)->getValue(),
					'warrenty'              => $objWorksheet->getCellByColumnAndRow(28,$i)->getValue(),
					'warrenty_summary'      => $objWorksheet->getCellByColumnAndRow(29,$i)->getValue(),
					'warrenty_service_type' => $objWorksheet->getCellByColumnAndRow(30,$i)->getValue(),
					'covered_in_warrenty'   => $objWorksheet->getCellByColumnAndRow(31,$i)->getValue(),
					'no_in_warrenty'        => $objWorksheet->getCellByColumnAndRow(32,$i)->getValue(),
					'length'                => $objWorksheet->getCellByColumnAndRow(33,$i)->getValue(),
					'height_unit'           => $objWorksheet->getCellByColumnAndRow(34,$i)->getValue(),
					'width_unit'            => $objWorksheet->getCellByColumnAndRow(35,$i)->getValue(),
					'length_unit'           => $objWorksheet->getCellByColumnAndRow(36,$i)->getValue(),
					'thickness_unit'        => $objWorksheet->getCellByColumnAndRow(37,$i)->getValue(),
					'weight'                => $objWorksheet->getCellByColumnAndRow(38,$i)->getValue(),
					'weight_unit'           => $objWorksheet->getCellByColumnAndRow(39,$i)->getValue(), 
					'upload_type' 			=>'excel',
				);
				

				if (!empty($data_product)) {
					
					$result = $this->productModel->upload_excel_products($data_product);
					if ($result) {
						
						$output['status'] = true;
					}

				}
			     
						  
          }
	           $output['header'] = $data_product;

			
            return $output['status'];
	}



	public function upload_screen_guard($excel) {

		 $objReader= PHPExcel_IOFactory::createReader('Excel2007');	// For excel 2007 	  
          //Set to read only
         $objReader->setReadDataOnly(true); 		  
        //Load excel file
		 $objPHPExcel=$objReader->load($excel);		 
         $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel      	 
         $output = array('status'=>'','header'=>'','rows'=>'');
        

         $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);                
          //loop from first data untill last data
         for($i=2;$i<=$totalrows;$i++)
          {
				$title                 = $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();			
				$subtitle              = $objWorksheet->getCellByColumnAndRow(1,$i)->getValue(); //Excel Column 1
				$user_id               = $objWorksheet->getCellByColumnAndRow(2,$i)->getValue(); //Excel Column 2
				$price                 = $objWorksheet->getCellByColumnAndRow(3,$i)->getValue(); //Excel Column 3
				$old_price             = $objWorksheet->getCellByColumnAndRow(4,$i)->getValue(); //Excel Column 4
				$quantity              = $objWorksheet->getCellByColumnAndRow(5,$i)->getValue(); //Excel Column 4
				$thumbnail1            = $objWorksheet->getCellByColumnAndRow(6,$i)->getValue(); //Excel Column 4
				$thumbnail2            = $objWorksheet->getCellByColumnAndRow(7,$i)->getValue(); //Excel Column 4
				$thumbnail3            = $objWorksheet->getCellByColumnAndRow(8,$i)->getValue(); //Excel Column 4
				$thumbnail4            = $objWorksheet->getCellByColumnAndRow(9,$i)->getValue(); //Excel Column 4
				$sku                   = $objWorksheet->getCellByColumnAndRow(10,$i)->getValue(); //Excel Column 4
				$category_id           = $objWorksheet->getCellByColumnAndRow(11,$i)->getValue(); //Excel Column 4
				$description           = $objWorksheet->getCellByColumnAndRow(12,$i)->getValue(); //Excel Column 4
				$shipping_cost         = $objWorksheet->getCellByColumnAndRow(13,$i)->getValue(); //Excel Column 4
				$product_status        = $objWorksheet->getCellByColumnAndRow(14,$i)->getValue(); //Excel Column 4
				$brand                 = $objWorksheet->getCellByColumnAndRow(15,$i)->getValue(); //Excel Column 4
				$color_code            = $objWorksheet->getCellByColumnAndRow(16,$i)->getValue(); //Excel Column 4
				$color_name            = $objWorksheet->getCellByColumnAndRow(17,$i)->getValue(); //Excel Column 4
				$tags                  = $objWorksheet->getCellByColumnAndRow(18,$i)->getValue(); //Excel Column 4
				$features              = $objWorksheet->getCellByColumnAndRow(19,$i)->getValue(); //Excel Column 4
				$model_name            = $objWorksheet->getCellByColumnAndRow(20,$i)->getValue(); //Excel Column 4
				$model_num             = $objWorksheet->getCellByColumnAndRow(21,$i)->getValue(); //Excel Column 4
				$designed_for          = $objWorksheet->getCellByColumnAndRow(22,$i)->getValue(); //Excel Column 4
				$suitable_for          = $objWorksheet->getCellByColumnAndRow(23,$i)->getValue(); //Excel Column 4
				$height                = $objWorksheet->getCellByColumnAndRow(24,$i)->getValue(); //Excel Column 4
				$width                 = $objWorksheet->getCellByColumnAndRow(25,$i)->getValue(); //Excel Column 4
				$thickness             = $objWorksheet->getCellByColumnAndRow(26,$i)->getValue(); //Excel Column 4
				$warrenty              = $objWorksheet->getCellByColumnAndRow(27,$i)->getValue(); //Excel Column 4
				$warrenty_summary      = $objWorksheet->getCellByColumnAndRow(28,$i)->getValue(); //Excel Column 4
				$warrenty_survice_type = $objWorksheet->getCellByColumnAndRow(29,$i)->getValue(); //Excel Column 4
				$covered_in_warrenty   = $objWorksheet->getCellByColumnAndRow(30,$i)->getValue(); //Excel Column 4
				$not_in_warrenty       = $objWorksheet->getCellByColumnAndRow(31,$i)->getValue(); //Excel Column 4
				$is_fragile            = $objWorksheet->getCellByColumnAndRow(32,$i)->getValue(); //Excel Column 4
				$video_url             = $objWorksheet->getCellByColumnAndRow(33,$i)->getValue(); //Excel Column 4
				$length                = $objWorksheet->getCellByColumnAndRow(34,$i)->getValue(); //Excel Column 4
				$height_unit           = $objWorksheet->getCellByColumnAndRow(35,$i)->getValue(); //Excel Column 4
				$width_unit            = $objWorksheet->getCellByColumnAndRow(36,$i)->getValue(); //Excel Column 4
				$length_unit           = $objWorksheet->getCellByColumnAndRow(37,$i)->getValue(); //Excel Column 4
				$thickness_unit        = $objWorksheet->getCellByColumnAndRow(38,$i)->getValue(); //Excel Column 4
				$size                  = $objWorksheet->getCellByColumnAndRow(39,$i)->getValue(); //Excel Column 4
				$weight                = $objWorksheet->getCellByColumnAndRow(40,$i)->getValue(); //Excel Column 4
				$weight_unit           = $objWorksheet->getCellByColumnAndRow(41,$i)->getValue(); //Excel Column 4
				

				$data_product = array(

					'user_id'               =>$this->session->userdata('user_id'), 
					'title'                 =>$title,
					'price'                 =>$price,
					'compare_price'         =>$old_price,
					'quantity'              =>$quantity,
					'thumbnail'             =>$thumbnail1, 
					'sku'                   =>$sku,
					'category_id'           =>$category_id, 
					'description'           =>$description, 
					'shipping'              =>$shipping_cost, 
					'status'                =>1, 
					'thumbnail2'            =>$thumbnail2, 
					'thumbnail3'            =>$thumbnail3,
					'thumbnail4'            =>$thumbnail4,
					'subtitle'              =>$subtitle,
					'brand'                 =>$brand,
					'color'                 =>$color_name, 
					'tags'                  =>$tags,
					'features'              =>$features,
					'model_name'            =>$model_name,
					'model_number'           =>$model_num,
					'designed_for'          =>$designed_for,
					'suitable_for'          =>$suitable_for,
					'width'                 =>$width,
					'height'                =>$height,
					'length'                =>$length,
					'length_unit'           =>$length_unit,
					'width_unit'            =>$width_unit,
					'height_unit'           =>$height_unit,
					'warrenty'              =>$warrenty,
					'warrenty_summary'      =>$warrenty_summary,
					'warrenty_service_type' =>$warrenty_survice_type,
					'covered_in_warrenty'   =>$covered_in_warrenty, 
					'no_in_warrenty'        =>$not_in_warrenty,
					'is_fragile'            =>$is_fragile,
					'video_url'             =>$video_url, 
					'weight_unit'           =>$weight_unit,
					'upload_type'           =>'excel'
					);

				// $data_user = array('FirstName'=>$FirstName, 'LastName'=>$LastName ,'Email'=>$Email ,'Mobile'=>$Mobile , 'Address'=>$Address);
				if (!empty($data_product)) {
					
					$result = $this->productModel->upload_excel_products($data_product);
					if ($result) {
						
						$output['status'] = true;
					}

				}
			     
						  
          }
	           $output['header'] = $data_product;

			
            return $output['status'];
	}



	public function upload_lens_cleaner($excel) {
		

		 $objReader= PHPExcel_IOFactory::createReader('Excel2007');	// For excel 2007 	  
          //Set to read only
         $objReader->setReadDataOnly(true); 		  
        //Load excel file
		 $objPHPExcel=$objReader->load($excel);		 
         $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel      	 
         $output = array('status'=>'','header'=>'','rows'=>'');
        

         $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);                
          //loop from first data untill last data
         for($i=2;$i<=$totalrows;$i++)
          {
          	$data_product = array(
					'user_id'               =>$this->session->userdata('user_id'),
					
					'title'                 => $objWorksheet->getCellByColumnAndRow(0,$i)->getValue() ,			
					'subtitle'              => $objWorksheet->getCellByColumnAndRow(1,$i)->getValue() ,
					'type'                  => $objWorksheet->getCellByColumnAndRow(2,$i)->getValue() ,
					'price'                 => $objWorksheet->getCellByColumnAndRow(3,$i)->getValue() ,
					'compare_price'         => $objWorksheet->getCellByColumnAndRow(4,$i)->getValue() ,
					'quantity'              => $objWorksheet->getCellByColumnAndRow(5,$i)->getValue() ,
					'thumbnail'             => $objWorksheet->getCellByColumnAndRow(6,$i)->getValue() ,
					'thumbnail2'            => $objWorksheet->getCellByColumnAndRow(7,$i)->getValue() ,
					'thumbnail3'            => $objWorksheet->getCellByColumnAndRow(8,$i)->getValue(),
					'thumbnail4'            => $objWorksheet->getCellByColumnAndRow(9,$i)->getValue(),
					'sku'                   => $objWorksheet->getCellByColumnAndRow(10,$i)->getValue(),
					'category_id'           => $objWorksheet->getCellByColumnAndRow(11,$i)->getValue(),
					'description'           => $objWorksheet->getCellByColumnAndRow(12,$i)->getValue(),
					'shipping'              => $objWorksheet->getCellByColumnAndRow(13,$i)->getValue(),
					'status'                => $objWorksheet->getCellByColumnAndRow(14,$i)->getValue(),
					'brand'                => $objWorksheet->getCellByColumnAndRow(15,$i)->getValue(),
					'color_code'            => $objWorksheet->getCellByColumnAndRow(16,$i)->getValue(),
					'color'                 => $objWorksheet->getCellByColumnAndRow(17,$i)->getValue(),
					'tags'                  => $objWorksheet->getCellByColumnAndRow(18,$i)->getValue(),
					
					'designed_for'          => $objWorksheet->getCellByColumnAndRow(19,$i)->getValue(),
					'suitable_for'          => $objWorksheet->getCellByColumnAndRow(20,$i)->getValue(),
					'height'                => $objWorksheet->getCellByColumnAndRow(21,$i)->getValue(),
					'width'                 => $objWorksheet->getCellByColumnAndRow(22,$i)->getValue(),
					
					'length'                => $objWorksheet->getCellByColumnAndRow(23,$i)->getValue(),
					'height_unit'           => $objWorksheet->getCellByColumnAndRow(24,$i)->getValue(),
					'width_unit'            => $objWorksheet->getCellByColumnAndRow(25,$i)->getValue(),
					'length_unit'           => $objWorksheet->getCellByColumnAndRow(26,$i)->getValue(),
					'weight'                => $objWorksheet->getCellByColumnAndRow(27,$i)->getValue(),
					'weight_unit'           => $objWorksheet->getCellByColumnAndRow(28,$i)->getValue(), 
					'model_name'           => $objWorksheet->getCellByColumnAndRow(29,$i)->getValue(), 
					'upload_type' 			=>'excel',
				);
				

				if (!empty($data_product)) {
					
					$result = $this->productModel->upload_excel_products($data_product);
					if ($result) {
						
						$output['status'] = true;
					}

				}
			     
						  
          }
	           $output['header'] = $data_product;

			
            return $output['status'];
	}





}