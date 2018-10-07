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

class Block extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->load->view('home/block');
	}

	
}
