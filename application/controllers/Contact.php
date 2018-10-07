<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('contact_model','contact',TRUE);
		$this->load->helper('countryblock');
		if(!checkcountry()){
			redirect('/out-of-region');
		}
	}

	function index()
	{
		$id = $this->session->userdata('id');
		$data['name'] = $this->common->getusername($id);
		$data['email'] = $this->common->getUseremail($id);
		$this->load->view('pages/contact', $data);
	}

	function savecontact()
	{
	   $this->load->library('form_validation');
	   $this->load->helper('string');
	   $this->form_validation->set_rules('name', 'Name', 'trim|required');
	   $this->form_validation->set_rules('email', 'Email', 'trim|required');
	   $this->form_validation->set_rules('message', 'Message', 'trim|required');

	   if($this->form_validation->run() == false)
	   {
		 $this->load->view('pages/contact');
	   }
	   else{
		   $name = $this->input->post('name');
		   $email = $this->input->post('email');
		   $subject = $this->input->post('subject');
		   $messages = $this->input->post('message');
		
		   $data = array(
				'name' => $name,
				'email' => $email,
				'subject' => $subject,
				'messages' => $messages ,
				'date_sent' => date("Y-m-d H:i:s")
			);
			$this->contact->addContact($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success"><button class="close" data-dismiss="alert">×</button><strong>Your message has been successfully sent. We will contact you very soon!</strong></div>');
			redirect('contact');
		   
	   }
	}
}
