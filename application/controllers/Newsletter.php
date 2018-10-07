<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('newsletter_model','newsletterdb',TRUE);
		$this->load->helper('countryblock');
		if(!checkcountry()){
			redirect('/out-of-region');
		}
	}
	function index()
	{
		$this->load->view('index');
	}
	
	function savesubscribe()
	{
	   $email = $this->input->post('email');
	   if ($this->newsletterdb->emailExists($email))
	   {
			echo '<div class="alert alert-danger"><strong><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Your email already subscribed!</strong></div>';
	   }
	   else
	   {
			$data = array(
				'email' => $email,
				'status' => 1,
				'created_at' => date("Y-m-d H:i:s")
			);
			$this->newsletterdb->addSubscriber($data);
			echo '<div class="alert alert-success"><strong><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Your email has been subscribed!</strong></div>';
		}
	}
	
}
