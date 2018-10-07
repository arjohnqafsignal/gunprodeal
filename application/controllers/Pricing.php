<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pricing extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('pricing_model','pricedb',TRUE);
		$this->load->helper('countryblock');
		if(!checkcountry()){
			redirect('/out-of-region');
		}
	}
	
	function index()
	{
		$data['subscriptions'] = $this->pricedb->getAllSubscriptions();
		$this->load->view('pages/pricing', $data);
	}

	
}
