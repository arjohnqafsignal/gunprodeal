<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promotion extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('promotion_model','promotiondb',TRUE);
		$this->load->model('product_model','product',TRUE);
		$this->load->model('category_model','category',TRUE);
		$this->load->helper('date');
		$this->load->helper('countryblock');
		if(!checkcountry()){
			redirect('/out-of-region');
		}
	}

	function index()
	{
		$data['results'] = $this->promotiondb->getAllpromotion();
		$this->load->view('promotions/index', $data);
	}

	public function home()
	{
		/* Get list menu */
		$listMenu = $this->category->listMenu( array( 'b.feature' => '1') );


		/*  */
		foreach ($listMenu as $parseMenuKey => $parseListMenu) {
			$whereFeature = [
				'a.category_code' => $parseListMenu['category_code'] 
				,'a.sub_category_code' => $parseListMenu['sub_category_code']
			];
			$listSubMenu = $this->category->listSubMenu( $whereFeature  );

			foreach ($listSubMenu as $parseListSubMenu) {
				
				$listMenu[$parseMenuKey]['subMenu'][] = $parseListSubMenu;
			}
		}

		/* Get products */
		$product = $this->product->getProducts();

		/* Foreach the product array and insert the images */
		foreach ($product as $parseKey => $parseProduct) {
			$resultImages = $this->product->imagesLink($parseProduct['id']);

			if (count($resultImages) >= 1 ) $product[$parseKey]['images'][] = $parseProduct['image_url']; 

			foreach ($resultImages as $parseImage) {
				$product[$parseKey]['images'][] = $parseImage['image_url'];
			}

			$product[$parseKey]['rate'] = $this->product->getRateProduct( $parseProduct['id'] );
		}

		/* Get lastest products */
		$latestProduct = $this->product->getProducts(TRUE);

		/* Foreach the product array and insert the images */
		foreach ($latestProduct as $parseKey => $parseProduct) {
			$latestImages = $this->product->imagesLink($parseProduct['id']);

			foreach ($latestImages as $parseImage) {
				$latestProduct[$parseKey]['images'][] = $parseImage['image_url'];
			}

			/* Item Descriptions get 1 record only*/
			$descriptions = $this->product->productDescriptions($parseProduct['id']);
			$latestProduct[$parseKey]['descriptions'] = count($descriptions) > 0 ? $descriptions[0]['descriptions'] : '';
		}


		$feature = $this->product->featureProducts();

		$result = [
			'details' => $product,
			'latestProduct' => $latestProduct,
			'feature' =>$feature,
			'menu' => $listMenu
		];

		$this->load->view('home/index',$result);
	}


	function learnmore()
	{
		$this->load->view('promotions/learnmore');
	}

	function startnow()
	{

		if($this->session->userdata('logged_in'))
		{
			redirect('profile');
		} else {
			redirect('login');
		}
	}

	function facebook( $id )
	{
		$userid = base64_decode(urldecode($id));
		$ip = $this->common->getIpAddress();
	   if ($this->promotiondb->ipAddressExists($ip))
	   {
	   		$this->session->set_flashdata('message', '<div class="alert alert-danger"><button class="close" data-dismiss="alert">x</button><strong>Points  already counts to this computer!</strong></div>');
			redirect('');
	   } else {
	   		$data = array(
				'user_id' => $userid,
				'promo_id' => 1,
				'promo_type' => 'facebook',
				'points' => 1,
				'ipaddress' => $ip,
				'created_by' => $this->session->userdata('id'),
				'created_at' => date("Y-m-d H:i:s")
			);
			$this->promotiondb->addPointsHistory($data);

			if ($this->promotiondb->userPointExists($userid)) {
				$this->promotiondb->incresePoints($userid);
			} else {
				$data = array(
					'user_id' => $userid,
					'points' => 1
				);
				$this->promotiondb->addUserPoints($data);
			}
			$this->home();

	   }
	}

	function twitter( $id )
	{
		$userid = base64_decode(urldecode($id));
		$ip = $this->common->getIpAddress();
	   if ($this->promotiondb->ipAddressExists($ip))
	   {
	   		$this->session->set_flashdata('message', '<div class="alert alert-danger"><button class="close" data-dismiss="alert">x</button><strong>Points  already counts to this computer!</strong></div>');
			redirect('');
	   } else {
	   		$data = array(
				'user_id' => $userid,
				'promo_id' => 1,
				'promo_type' => 'twitter',
				'points' => 1,
				'ipaddress' => $ip,
				'created_by' => $this->session->userdata('id'),
				'created_at' => date("Y-m-d H:i:s")
			);
			$this->promotiondb->addPointsHistory($data);

			if ($this->promotiondb->userPointExists($userid)) {
				$this->promotiondb->incresePoints($userid);
			} else {
				$data = array(
					'user_id' => $userid,
					'points' => 1
				);
				$this->promotiondb->addUserPoints($data);
			}
			$this->home();

	   }
	}

	function linkedin( $id )
	{
		$userid = base64_decode(urldecode($id));
		$ip = $this->common->getIpAddress();
	   if ($this->promotiondb->ipAddressExists($ip))
	   {
	   		$this->session->set_flashdata('message', '<div class="alert alert-danger"><button class="close" data-dismiss="alert">x</button><strong>Points  already counts to this computer!</strong></div>');
			redirect('');
	   } else {
	   		$data = array(
				'user_id' => $userid,
				'promo_id' => 1,
				'promo_type' => 'linkedin',
				'points' => 1,
				'ipaddress' => $ip,
				'created_by' => $this->session->userdata('id'),
				'created_at' => date("Y-m-d H:i:s")
			);
			$this->promotiondb->addPointsHistory($data);

			if ($this->promotiondb->userPointExists($userid)) {
				$this->promotiondb->incresePoints($userid);
			} else {
				$data = array(
					'user_id' => $userid,
					'points' => 1
				);
				$this->promotiondb->addUserPoints($data);
			}
	        $this->home();
			//redirect();

	   }
	}

	function googleplus( $id )
	{
		$userid = base64_decode(urldecode($id));
		$ip = $this->common->getIpAddress();
	   if ($this->promotiondb->ipAddressExists($ip))
	   {
	   		$this->session->set_flashdata('message', '<div class="alert alert-danger"><button class="close" data-dismiss="alert">x</button><strong>Points  already counts to this computer!</strong></div>');
			redirect('');
	   } else {
	   		$data = array(
				'user_id' => $userid,
				'promo_id' => 1,
				'promo_type' => 'googleplus',
				'points' => 1,
				'ipaddress' => $ip,
				'created_by' => $this->session->userdata('id'),
				'created_at' => date("Y-m-d H:i:s")
			);
			$this->promotiondb->addPointsHistory($data);

			if ($this->promotiondb->userPointExists($userid)) {
				$this->promotiondb->incresePoints($userid);
			} else {
				$data = array(
					'user_id' => $userid,
					'points' => 1
				);
				$this->promotiondb->addUserPoints($data);
			}
			$this->home();

	   }
	}

	function shareblog( $id )
	{
		$userid = base64_decode(urldecode($id));
		$ip = $this->common->getIpAddress();
	   if ($this->promotiondb->ipAddressExists($ip))
	   {
	   		$this->session->set_flashdata('message', '<div class="alert alert-danger"><button class="close" data-dismiss="alert">x</button><strong>Points  already counts to this computer!</strong></div>');
			redirect('');
	   } else {
	   		$data = array(
				'user_id' => $userid,
				'promo_id' => 1,
				'promo_type' => 'blog',
				'points' => 1,
				'ipaddress' => $ip,
				'created_by' => $this->session->userdata('id'),
				'created_at' => date("Y-m-d H:i:s")
			);
			$this->promotiondb->addPointsHistory($data);

			if ($this->promotiondb->userPointExists($userid)) {
				$this->promotiondb->incresePoints($userid);
			} else {
				$data = array(
					'user_id' => $userid,
					'points' => 1
				);
				$this->promotiondb->addUserPoints($data);
			}
			$this->home();

	   }
	}

	function referrallink( $id )
	{
		$userid = base64_decode(urldecode($id));
		$ip = $this->common->getIpAddress();
	   if ($this->promotiondb->ipAddressExists($ip))
	   {
	   		$this->session->set_flashdata('message', '<div class="alert alert-danger"><button class="close" data-dismiss="alert">x</button><strong>Points  already counts to this computer!</strong></div>');
			redirect('');
	   } else {
	   		$data = array(
				'user_id' => $userid,
				'promo_id' => 1,
				'promo_type' => 'referal',
				'points' => 1,
				'ipaddress' => $ip,
				'created_by' => $this->session->userdata('id'),
				'created_at' => date("Y-m-d H:i:s")
			);
			$this->promotiondb->addPointsHistory($data);

			if ($this->promotiondb->userPointExists($userid)) {
				$this->promotiondb->incresePoints($userid);
			} else {
				$data = array(
					'user_id' => $userid,
					'points' => 1
				);
				$this->promotiondb->addUserPoints($data);
			}
			$this->home();

	   }
	}

	function shareemail( )
	{
	   $email = $this->input->post('email');
	   if ($this->promotiondb->emailExists($email))
	   {
			echo '<div class="alert alert-danger"><strong><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Link email already to this email!</strong></div>';
	   }
	   else
	   {
			$data = array(
				'email' => $email,
				'user_id' => $this->session->userdata('id'),
				'status' => PENDING,
				'created_at' => date("Y-m-d H:i:s")
			);
			if($this->promotiondb->addSharedEmail($data)){
			
				$id = $this->db->insert_id();
				$shareid = base64_encode($id);
				$subject = 'Welcome to Gun Sale Finder!';
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
									</tr>
								</table>
								<table cellspacing="0" cellpadding="0" style="padding:0 20px;width: 100%; font-size: 15px;color: #383838;  line-height: 26px;">
									<tr><td colspan="2"><br />Hi there ,</td></tr>
									<tr>
										<td colspan="2"><br />
											Your friend want you to take a look at this awesome site<br />
											<a href="'.base_url('promotion/shareemailpoints/'.$shareid).'" target="_blank" style="color: #FFF; text-decoration: none; background-color: #08c; border-radius: 5px; padding: 3px 10px;">Check Now </a>&nbsp; &nbsp; or copy the following link: '.base_url('promotion/shareemailpoints/'.$shareid).'<br /><br /> 
											If the link doesn&#39;t work, please contact our support team through <a href="mailto:cs@gunsalefinder.com" style="color:#08c;text-decoration:none;">cs@gunsalefinder.com.ph</a> or call <a href="tel:+6329551000" style="color:#08c;text-decoration:none;">+6329551000</a>.<br /><br />
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

					if($issent){
						echo '<div class="alert alert-success"><strong><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Thank you for sharing us!</strong></div>';
					}else {
						echo '<div class="alert alert-danger"><button class="close" data-dismiss="alert">x</button><strong>Error in sending email. Please report this to administrator.</strong></div>';
					}
			}
		}

	}

	function shareemailpoints( $id )
	{
		$id = base64_decode($id);
		$ip = $this->common->getIpAddress();
		$result = $this->promotiondb->getSharedEmailbyid($id);
		if($result)
		{
			$data['status'] = 1;
			$this->promotiondb->updateSharedEmail($id,$data);

			foreach($result as $row)
			{
				$userid = $row->user_id;
			}

			$data = array(
				'user_id' => $userid,
				'promo_id' => 1,
				'promo_type' => 'email',
				'points' => 1,
				'ipaddress' => $ip,
				'created_by' => $this->session->userdata('id'),
				'created_at' => date("Y-m-d H:i:s")
			);
			$this->promotiondb->addPointsHistory($data);

			if ($this->promotiondb->userPointExists($userid)){
				$this->promotiondb->incresePoints($userid);
			} else {
				$data = array(
					'user_id' => $userid,
					'points' => 1
				);
				$this->promotiondb->addUserPoints($data);
			}
			$this->home();


		}
	    else
	    {
			$message = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Link already expired!</div>';
			$this->session->set_flashdata('message', $message);
			redirect('');
	    }
	}
	
}
