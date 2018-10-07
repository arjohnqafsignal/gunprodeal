<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/******************************************************************
*
*	Title		: 	About Us
*	Author		: 	Ronald Duque | ronaldduque24@gmail.com
*	Filename 	: 	Apiguide.php
*	Date 		: 	August 2018
*
******************************************************************/

class Apiguide extends CI_Controller 
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
		$data['category'] = $this->common->getallcategory();
		$data['subcategory'] = $this->common->getAllSubcategory();
		$this->load->view('pages/apiguide', $data);
	}

	
}
