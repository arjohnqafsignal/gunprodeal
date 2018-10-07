<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/******************************************************************
*
*	Title		: 	Terms and Conditions
*	Author		: 	Ronald Duque | ronaldduque24@gmail.com
*	Filename 	: 	Terms.php
*	Date 		: 	August 2018
*
******************************************************************/

class Terms extends CI_Controller 
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
		$this->load->view('pages/term-and-conditions');
	}

	
}
