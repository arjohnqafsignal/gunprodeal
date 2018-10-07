<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bhcgetimages extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('api/bhc_model','product',true);
	}

	function index()
	{
		
		// connect and login to FTP server
		$ftp_server = FTPHOST;
		$ftp_username = FTPUSERNAME;
		$ftp_userpass = FTPPASSWORD;
		$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
		$login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);

		$result = $this->product->getAllBhcproducts();
		if($result)
		{
			foreach($result as $row)
			{
				$local_file = "assets/product-image/bhc".$row->code.".jpg";
				$server_file = "/BHC Digital Images ALL/".$row->code.".jpg";
				// download server file
				if (ftp_get($ftp_conn, $local_file, $server_file, FTP_ASCII))
				{
				  
				}
			}
		}
		// close connection
		ftp_close($ftp_conn);
	}


     
}
