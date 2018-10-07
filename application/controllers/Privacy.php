<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/******************************************************************
*
*	Title		: 	About Us
*	Author		: 	Ronald Duque | ronaldduque24@gmail.com
*	Filename 	: 	Privacy.php
*	Date 		: 	August 2018
*
******************************************************************/

class Privacy extends CI_Controller 
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
		$this->load->view('pages/privacy');
	}

	
}
