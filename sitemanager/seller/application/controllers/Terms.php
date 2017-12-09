<?php 
defined('BASEPATH') OR exit('No direct script access allowed');



/**
* 
*/
class Terms extends CI_Controller
{
	
	

	public function __construct() {

		parent :: __construct();

	}

	public function index() {

	}

	public function create() {

	}

	public function edit() {


	}


	public function store() {

		
	}

	public function delete() {


	}

	public function send() {


		$config = Array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'ssl://smtp.gmail.com',
		  'smtp_port' => 465,
		  'smtp_user' => 'kishoreamit5@gmail.com', // change it to yours
		  'smtp_pass' => 'pr@t@type@1993#', // change it to yours
		  'mailtype' => 'html',
		  'charset' => 'iso-8859-1',
		  'wordwrap' => TRUE
		);

	  $message = 'Your order was placed !';
      $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from('kishoreamit5@gmail.com'); // change it to yours
      $this->email->to('kishoreamit5@gmail.com');// change it to yours
      $this->email->subject('Order summary');
      $this->email->message($message);
      if($this->email->send())
     {
      echo 'Email sent.';
     }
     else
    {
     show_error($this->email->print_debugger());
    }
}


}