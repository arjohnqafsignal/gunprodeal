<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('countryblock');
		if(!checkcountry()){
			redirect('/out-of-region');
		}
	}
	
	function index()
	{
		$this->load->view('pages/subcription');
	}

	
}
