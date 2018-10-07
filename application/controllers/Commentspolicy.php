<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/******************************************************************
*
*	Title		: 	About Us
*	Author		: 	Ronald Duque | ronaldduque24@gmail.com
*	Filename 	: 	Commentspolicy.php
*	Date 		: 	August 2018
*
******************************************************************/

class Commentspolicy extends CI_Controller 
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
		$this->load->view('pages/commentspolicy');
	}

	
}
