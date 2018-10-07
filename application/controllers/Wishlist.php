<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('registration_model','register',TRUE);
		$this->load->model('wishlist_model','wishlistdb',TRUE);
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

	function addtowishlist(){
		if($this->session->userdata('logged_in'))
		{
			$data = array(
				'product_id' => $this->input->post('id'),
				'created_by' => $this->session->userdata('id'),
				'created_at' => date("Y-m-d H:i:s")
			);
			if($this->wishlistdb->insertWishlist($data)){
				echo "1";
			}else{
				echo "2";
			}
			
		} else {
			echo "0";
		}

	}
	
}
