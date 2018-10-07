<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportproduct extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('registration_model','register',TRUE);
		$this->load->model('wishlist_model','wishlistdb',TRUE);
		$this->load->model('Reportproduct_model', 'reportproduct', TRUE);
		$this->load->model('product_model','product',TRUE);
		$this->load->helper('countryblock');
		if(!checkcountry()){
			redirect('/out-of-region');
		}
	}
	
	function index()
	{
		if($this->session->userdata('logged_in'))
		{
			
			$id = $this->session->userdata('id');
			$this->load->library('pagination');
			$result_per_page = PERPAGE;  // the number of result per page
			$config['base_url'] = base_url() . '/dealer/product/index/';
			$countwish = $this->wishlistdb->countWishlist($id);
			$config['total_rows'] = $countwish;
			$config['per_page'] = $result_per_page;
			//*for boostrap pagination
			$config['full_tag_open'] = '<ul class="pagination pagination-lg">';
			$config['full_tag_close'] = '</ul>';            
			$config['prev_link'] = '<i class="fa fa-chevron-left" aria-hidden="true"></i>';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '<i class="fa fa-chevron-right" aria-hidden="true"></i>';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config["num_links"] = round( $config["total_rows"] / $config["per_page"] );
			//end boostrap pagination
			$this->pagination->initialize($config);
			$offset = ($this->uri->segment(4) != '')?$this->uri->segment(4):0;
			$data['countrow'] = $config['total_rows'];
			$data['results'] = $this->wishlistdb->getAllWishlist($id, $result_per_page, $offset);
			$data['info'] = $this->register->getuserinfobyid($id);
			$this->load->view('dashboard/wishlists', $data);
			
		} else {
			redirect('login');
		}


	}

	function reportItem(){
		if($this->session->userdata('logged_in'))
		{
			$data = array(
				'product_id' => $this->input->post('id'),
				'details' => $this->input->post('details'),
				'user_id' => $this->session->userdata('id'),
				'date_reported' => date("Y-m-d H:i:s")
			);
			if($this->reportproduct->insertReportProduct($data)){
				$this->emailReportProduct($data);
				echo "1";
			}else{
				echo "2";
			}
			
		} else {
			echo "0";
		}

	}

	function emailReportProduct($data)
	{
		$product_id = $data['product_id'];
		$user_id = $this->session->userdata('id');
		
		$product = $this->product->productDetails($product_id);
		$email = $this->common->getUseremail($user_id);

		$subject = 'Gun Sale Finder - Your item has been reported';
		$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
					<html xmlns="http://www.w3.org/1999/xhtml">
					<head>
						<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
						<title>gunsalefinder.com - Find Gun in America</title>
					</head>
					<body style="margin:0px;">';
		$message .='<font face="Segoe UI Semibold, Segoe UI Bold, Helvetica Neue Medium, Arial, sans-serif ">
						<table cellspacing="0" cellpadding="0" style="width: 100%; font-size: 15px;color: #383838;  line-height: 26px;">
							<tr>
								<td style="background:#ea8916;height:60px;padding:0;background:#fff;">
									<img src="'.base_url().'assets/images/header/gunpro-header.png" style="width: 100px;left:10px;height:77px;"/>
								</td>
								<!--<td style="width:100%;">
									<img src="'.base_url().'assets/img/EmailLogo-BG.png" style="height: 77px; max-height: 77px;width: 100%;" />
								</td>-->
							</tr>
						</table>
						<table cellspacing="0" cellpadding="0" style="padding:0 20px;width: 100%; font-size: 15px;color: #383838;  line-height: 26px;">
							<tr><td colspan="2"><br />Hi there '.$this->common->getusername($user_id).',</td></tr>
							<tr>
								<td colspan="2"><br />
									Your item has been reported. <br />
									Details: <i>'.$data['details'].'</i>
									
									<br /><br />
									Cheers, <br />
									Gunsalefinder
								</td>
							</tr>
						</table>
					</font>';
		$message .= "</body></html>";


		$this->load->library('email');
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
		$config['validation'] = TRUE;
		$this->email->initialize($config);
		$this->email->from(EMAILFROM, EMAILNAME);
		$this->email->to($email); 
		// $this->email->cc('another@another-example.com'); 
		$this->email->bcc(EMAILBCC); 

		$this->email->subject($subject);
		$this->email->message($message);	

		$issent = $this->email->send();
	}
	
}
