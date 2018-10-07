<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('dealer/Subscription_model','subscriptiondb',TRUE);
	}
	
	function index()
	{
		
		if($this->session->userdata('dealer_login'))
		{
			$data['subscriptions'] = $this->common->getallSubscriptions();
			$this->load->view('dealers/subcriptions');
		} else {
			redirect('dealer-login');
		}
	}

	function select( $id = false )
	{
		$id = base64_decode($id);
		$result = $this->subscriptiondb->getDealerDetails($id);

		if( $result )
		{
			$sess_array = array();
			 foreach($result as $row)
			 {
			   if($row->status == 1){
				    $newdata = array(
					   'id'  => $row->id,
					   'name'     => $row->first_name.' '.$row->last_name,
					   'dealer_login' => true
					);
					$this->session->set_userdata($newdata);
			   }else{
				   $status = false;
			   }
			  
			 }
			$data['subscriptions'] = $this->common->getallSubscriptions();
			$this->load->view('dealers/subcriptions', $data);
		} else {
			redirect('dealer-login');
		}
	}

	function selectpackage( $id = false )
	{
		if($this->session->userdata('dealer_login'))
		{
			$subscriptions = $this->subscriptiondb->getAllSubscriptionbyid($id);
			foreach ($subscriptions as $item):
		        $data = array(
		            'id' =>$id,
		            'qty' => 1,
		            'name' => $item->name,
		            'description' => $item->description,
		            'price' => $item->price,  
		        
		        );
		        $this->cart->insert($data);
	    	endforeach;
	        redirect('dealer/subscription/mysubscription'); 
		} else {
			redirect('dealer-login');
		}
	}

	function mysubscription()
	{
		if($this->session->userdata('dealer_login'))
		{
			$id = $this->session->userdata('id');
			$data['userid'] = base64_encode($id);
			$this->load->view('dealers/mysubscription', $data);
		} else {
			redirect('dealer-login');
		}
	}
	
		
	function subscribenow()
	{

		if($this->session->userdata('dealer_login'))
		{
			$subcription = $this->security->xss_clean($this->input->post('subcription'));
			$pmethod = $this->security->xss_clean($this->input->post('pmethod'));
			$userid = $this->security->xss_clean($this->input->post('userid'));
			
			$order = array(
				'dealer_id' => base64_decode($userid),
				'subscription_id' => $subcription,
				'payment_method' => $pmethod,
				'status' => PENDING,
				'created_by' => $this->session->userdata('id'),
				'created_at' => date("Y-m-d H:i:s")
			);

			$this->subscriptiondb->insertSubscription($order);

			$message = '<div class="alert alert-success"><strong><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Your Subscription has been process. We will contact you very soon</strong></div>';
			$this->session->set_flashdata('message', $message);
			$this->cart->destroy();
			redirect('dealer/profile'); 
		} else {
			redirect('dealer-login');
		}
		
	}

	

	
}
