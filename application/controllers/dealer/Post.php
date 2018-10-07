<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('dealer/post_model','postdb',TRUE);
		$this->load->helper('string');
		$this->load->library('image_lib');
		$this->load->helper('text');
		$this->load->library('pagination');
	}

	function index()
    {
		if($this->session->userdata('dealer_login'))
		{
			$data['results'] = $this->postdb->getAllAdslocation();
			$this->load->view('ads/postad', $data);
		} else {
			$message = '<div class="alert alert-success"><strong><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Your must login as Dealer to continue!</strong></div>';
			$this->session->set_flashdata('dealermessage', $message);
			redirect('dealer-login');
		}
	}

	function addpackage($id)
	{
		
        if($this->session->userdata('dealer_login'))
		{
			$ads = $this->postdb->getAllAdslocationbyid($id) ;
			foreach ($ads as $item):
		        $data = array(
		            'id' =>$id,
		            'qty' => 1,
		            'name' => $item->title,
		            'size' => $item->size,
		            'price' => $item->price,  
		        
		        );
		        $this->cart->insert($data);
	    	endforeach;
	        redirect('dealer/post/mycart'); 
		} else {
			redirect('dealer-login');
		}
	}

	function mycart()
	{
		if($this->session->userdata('dealer_login'))
		{
			$id = $this->session->userdata('id');
			$data['userid'] = $id ;
			$this->load->view('ads/mycart', $data);
		} else {
			redirect('dealer-login');
		}
	}
	
	function remove($rowid) 
    {

		if($this->session->userdata('dealer_login'))
		{
			if ($rowid==="all"){
				$this->cart->destroy();
			}else{
				$data = array(
				'rowid' => $rowid,
				'qty' => 0
				);
				$this->cart->update($data);
			}
			redirect('dealer/post/mycart');
		} else {
			redirect('dealer-login');
		}

	}
	
	function purchasenow()
	{

		if($this->session->userdata('dealer_login'))
		{
			$total = $this->security->xss_clean($this->input->post('total'));
			$pmethod = $this->security->xss_clean($this->input->post('pmethod'));
			
			$order = array(
				'total' => $total,
				'payment_method' => $pmethod,
				'status' => 0,
				'created_by' => $this->session->userdata('id'),
				'created_at' => date("Y-m-d H:i:s")
			);

			$this->postdb->insertOrder($order);
			$ord_id = $this->db->insert_id();
			if ($cart = $this->cart->contents()):
				foreach ($cart as $item):
					$order_item = array(
						'order_id' => $ord_id,
						'ads_id' => $item['id'],
						'qty' => $item['qty'],
						'price' => $item['price'],
						'status' => 'P'
					);
					$this->postdb->insertOrderAds($order_item);
				endforeach;
			endif;

			$message = '<div class="alert alert-success"><strong><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Your Order has been placed. We will contact you very soon</strong></div>';
			$this->session->set_flashdata('message', $message);
			$this->cart->destroy();
			redirect('dealer/post/mycart');
		} else {
			redirect('dealer-login');
		}
		
	}
	
	function saveads() 
	{
		$this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>', '</div>');
		$this->form_validation->set_rules('category', 'Category', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('subcategory', 'Sub category', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[300]');
		$this->form_validation->set_rules('price', 'Price', 'trim|required|max_length[12]');
		$this->form_validation->set_rules('location', 'location', 'trim|max_length[300]');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['category'] = $this->common->getallcategory();
			$data['location'] = $this->common->getallcity();
			$data['code'] = random_string('alnum',6);
			$this->load->view('postads', $data);
		}
		else
		{
			$code = $this->security->xss_clean($this->input->post('code'));
			$title = $this->security->xss_clean($this->input->post('title'));
			$category = $this->security->xss_clean($this->input->post('category'));
			$subcategory = $this->security->xss_clean($this->input->post('subcategory'));
			$location = $this->security->xss_clean($this->input->post('location'));
			$price = $this->security->xss_clean($this->input->post('price'));
			$description = $this->security->xss_clean($this->input->post('editor1'));
		
			
			if($this->ads->checkadsexist($title)=== FALSE)
			{
				$data = array(
					'title' => $title,
					'category' => $category,
					'subcategory' => $subcategory,
					'location' => $location,
					'price' => $price,
					'description' => $description,
					'enabled'=> 0,
					'created_date' => date('Y-m-d H:i:s'),
					'created_by' => $this->session->userdata('id')
				);
				
				if($this->ads->save_post($data) !== FALSE)
				{
					$id = $this->db->insert_id(); 
					$this->ads->insert_images($id, $code);
					$this->ads->delete_tempimages($code);
					$message = '<div class="alert alert-success"><strong><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Your listing has been submitted for approval.</strong></div>';
					$this->session->set_flashdata('message', $message);
					redirect("ads/pendingads");
				}
				else{
					$message = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Error Occurs. Please reports to administrator</div>';
					$this->session->set_flashdata('message', $message);
					$data['category'] = $this->common->getallcategory();
					$data['location'] = $this->common->getallcity();
					$data['code'] = random_string('alnum',6);
					$this->load->view('postads', $data);
				}
			}
			else{
				$message = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Error Occurs. Please reports to administrator</div>';
				$this->session->set_flashdata('message', $message);
				redirect("ads/post");
			}
		
		}
	}
	
	function editpost($id)
	{
		if($this->session->userdata('dealer_login'))
		{
			$data['category'] = $this->common->getallcategory();
			$data['location'] = $this->common->getallcity();
			$data['ads'] = $this->ads->getadsbyid($id);
			$data['adsimages'] = $this->ads->getadsimages($id);
			$data['code'] = random_string('alnum',6);
			$this->load->view('editads', $data);
		} else {
			redirect('login');
		}
		
	}

	function deleteimages($adsid = 0, $id = 0)
	{
		if($this->ads->delete_images($id) !== FALSE)
		{
			redirect("ads/editpost/".$adsid);
		}
		else{
			$message = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Error Occurs. Please reports to administrator</div>';
			$this->session->set_flashdata('message', $message);
			redirect('ads/pendingads');
		}
	}

	function updateads()
	{
		
		$adsid = $this->input->post('adsid');
		$this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>', '</div>');
		$this->form_validation->set_rules('category', 'Category', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('subcategory', 'Sub category', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[300]');
		$this->form_validation->set_rules('price', 'Price', 'trim|required|max_length[12]');
		$this->form_validation->set_rules('location', 'location', 'trim|max_length[300]');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['category'] = $this->common->getallcategory();
			$data['location'] = $this->common->getallcity();
			$data['ads'] = $this->ads->getadsbyid($adsid);
			$data['adsimages'] = $this->ads->getadsimages($id);
			$data['code'] = random_string('alnum',6);
			$this->load->view('editads/'.$adsid, $data);
		}
		else
		{
			$code = $this->input->post('code');
			$data = array(
				'title' => $this->input->post('title'),
				'category' => $this->input->post('category'),
				'subcategory' => $this->input->post('subcategory'),
				'location' => $this->input->post('location'),
				'price' => $this->input->post('price'),
				'description' => $this->input->post('editor1'),
				'enabled'=> 1,
				'created_date' => date('Y-m-d H:i:s'),
				'created_by' => $this->session->userdata('id')
			);
			
			if($this->ads->updateads($data, $adsid) !== FALSE)
			{
				$this->ads->insert_images($adsid, $code);
				$this->ads->delete_tempimages($code);
				$message = '<div class="alert alert-success"><strong><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Your item has been updated.</strong></div>';
				$this->session->set_flashdata('message', $message);
				redirect("ads/pendingads");
			}
			else
			{
				$message = '<div class="alert alert-success"><strong><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Item has been added to watchlist.</strong></div>';
				$this->session->set_flashdata('message', $message);
				redirect("ads/pendingads");
			}
		}
	}

	function addwatchlist($id = 0, $title = 0)
	{
		$data = array(
			'ads_id' => $id,
			'created_date' => date('Y-m-d H:i:s'),
			'user_id' =>$this->session->userdata('id')
		);
		
		if($this->ads->save_watchlist($data, $id) !== FALSE)
		{
			$message = '<div class="alert alert-success"><strong><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Item has been added to watchlist.</strong></div>';
			$this->session->set_flashdata('message', $message);
			redirect('ads/viewpost/'.$id.'/'.$title);
			
		}
		else{
			$message = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Error Occurs. Please reports to administrator</div>';
			$this->session->set_flashdata('message', $message);
			redirect('ads/viewpost/'.$id.'/'.$title);
		}
		
	}
	
	function adslist($id = 0)
	{
		/*PAGING*/
		$result_per_page = PERPAGE;  // the number of result per page
		$config['base_url'] = base_url() . '/ads/adslist/'.$id.'/';
		$config['total_rows'] = $this->ads->countmyads($id);
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
		$offset = ($this->uri->segment(3) != '')?$this->uri->segment(3):0;
		$data['myads'] = $this->ads->getmyads($id, $result_per_page, $offset);
		$data['countrow'] = $config['total_rows'];
		/*PAGING*/
		$data['info'] = $this->register->getuserinfobyid($id);
		//$data['myads'] = $this->ads->getmyads($id);
		$data['city'] = $this->common->getallcity();
		$this->load->view('adslist', $data);
	}
	
	# REPORT ADS
	#-------------------------------------------------------------
	function reportsads($id = 0, $title = 0)
	{
		if($this->session->userdata('dealer_login'))
		{
			$reason = $this->input->post('reason');
			$comment = $this->input->post('comment');
			$data = array(
				'ads_id' => $id,
				'reason' => $reason,
				'comments' => $comment,
				'created_date' => date('Y-m-d H:i:s'),
				'user_id' =>$this->session->userdata('id')
			);
			
			if($this->ads->save_reported($data, $id) !== FALSE)
			{
				$this->session->set_flashdata('message', '<div class="alert alert-success"><strong><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Item has been reported to administrator.</strong></div>');
				redirect('ads/viewpost/'.$id.'/'.$title);
				
			}
			else{
				$message = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Error Occurs. Please reports to administrator</div>';
				$this->session->set_flashdata('message', $message);
				redirect('ads/viewpost/'.$id.'/'.$title);
			}
		}else {
			redirect('login');
		}
		
	}
	# SEND EMAIL
	#-------------------------------------------------------------
	function sendemail($id = 0, $title = 0)
	{
		
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$contact = $this->input->post('contact');
		$message = $this->input->post('message');
		$data = array(
			'name' => $name,
			'email' => $email,
			'contact' => $contact,
			'message' => $message,
			'created_date' => date('Y-m-d H:i:s'),
			'created_by' =>$this->session->userdata('id')
		);
		
		if($this->ads->save_sendemail($data) !== FALSE)
		{
			$message = '<div class="alert alert-success"><strong><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Your message has been sent to seller.</strong></div>';
			$this->session->set_flashdata('message', $message);
			redirect('ads/viewpost/'.$id.'/'.$title);
			
		}
		else{
			$message = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Error Occurs. Please reports to administrator</div>';
			$this->session->set_flashdata('message', $message);
			redirect('ads/viewpost/'.$id.'/'.$title);
		}
		
	}
	
}
