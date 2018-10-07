<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bhcget extends CI_Controller 
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

		$filename = "BHC_Catalog_".date('m-d-Y_hia').".csv";
		$local_file = "assets/csv/".$filename;
		$server_file = "/GunSaleFinder/Data_Feeds/BHC_Catalog.csv";

		// download server file
		if (ftp_get($ftp_conn, $local_file, $server_file, FTP_ASCII))
		{
		  
		 	$id = 5;
		 	$data = array(
				'filename' => $filename,
				'updated_by' => $id ,
				'updated_at' => date("Y-m-d H:i:s")
			);
			$this->product->updateFilename($id, $data);
			echo "Successfully download $server_file.";
		}
		else
		{
		  echo "Error downloading $server_file.";
		}
		// close connection
		ftp_close($ftp_conn);
	}


     
}
