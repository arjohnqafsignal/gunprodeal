<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/******************************************************************
*
*	Title		: 	About Us
*	Author		: 	Ronald Duque | ronaldduque24@gmail.com
*	Filename 	: 	About.php
*	Date 		: 	July 2018
*
******************************************************************/

class About extends CI_Controller 
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
		$this->load->view('pages/about');
	}

	
}
