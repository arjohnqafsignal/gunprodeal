<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/******************************************************************
*
*	Title		: 	Faqs
*	Author		: 	Ronald Duque | ronaldduque24@gmail.com
*	Filename 	: 	Faqs.php
*	Date 		: 	July 2018
*
******************************************************************/

class Faqs extends CI_Controller 
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
		$this->load->view('pages/faqs');
	}

	
}
