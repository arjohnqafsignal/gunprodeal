<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('dealer/product_model','productdb',TRUE);
		$this->load->model('dealer/dealer_model','dealerdb',TRUE);
	}
	
	function index()
	{
		if($this->session->userdata('dealer_login'))
		{
			
			$id = $this->session->userdata('id');
			$this->load->library('pagination');
			$result_per_page = PERPAGE;  // the number of result per page
			$config['base_url'] = base_url() . '/dealer/product/index/';
			$config['total_rows'] = $this->productdb->countMyProducts($id);
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
			$data['results'] = $this->productdb->getAllMyProducts($id, $result_per_page, $offset);
			$data['info'] = $this->dealerdb->getUserinfobyid($id);
			$this->load->view('dealers/myproducts', $data);
			
		} else {
			redirect('dealer-login');
		}


	}

	function select( $id = false )
	{
		$id = base64_decode($id);
		if( $this->common->checkDealerExists($id) )
		{
			$data['subscriptions'] = $this->common->getallSubscriptions();
			$this->load->view('dealers/subcriptions');
		} else {
			redirect('dealer-login');
		}
	}

	
}
