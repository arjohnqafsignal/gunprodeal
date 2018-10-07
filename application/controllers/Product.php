<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller 
{

	function __construct() {
		parent::__construct();
		$this->load->model('product_model','product',TRUE);
		$this->load->model('promotion_model','promotiondb',TRUE);
		$this->load->helper('date');
		$this->load->library('form_validation');
		$this->load->helper('countryblock');
		if(!checkcountry()){
			redirect('/out-of-region');
		}
	}

	public function index() {
		$this->load->view('home/index');
	}

	public function category() {
		$result = $this->product->catgeory();
		
	}

	/* View product details and picture */
	public function viewProduct() {
		$id = $this->input->get('id');

		/* Details of product */
		$result = $this->product->productDetails($id);
		
		/* Item Descriptions */
		$descriptions = $this->product->productDescriptions($id);
		$result['descriptions'] = count($descriptions) > 0 ? $descriptions : '';

		/* Links of images */
		$images = $this->product->imagesLink($id);
		$result['images'] = count($images) > 0 ? $images : '';

		/* Get Dealer Details */
		$dealer_id = $result['dealer_id'];
		$dealer = $this->product->dealer($result['dealer_id']);
		$result['dealer'] = count($dealer) > 0 ? $dealer : '';

		/* commets */
		$comments = $this->product->comments($id);
		$result['comments'] = count($comments) > 0 ? $comments : '';

		/* SCALE RATE */
		$result['rateScale'] = $this->product->rateProductWithBreakDown($id);

		/* Get ruser rate product */
		$where = [
			'product_id' => $id
			,'user_id' => $this->session->userdata('id')
		];
		$result['rateDetails'] = json_encode($this->product->getUserRateProduct( $where ));

		$upc = $this->common->getProductUPC($id);
		$result['related'] = $this->product->getRelatedProducts($id, $upc);
		$result['productinfo'] = $this->product->getProductotherInformation($upc);
		$this->load->view('product/index', $result);
		$this->load->view('product/modal', $result);
		$this->load->view('product/rateModal', $result);
		$this->load->view('product/reportModal', $result);
		$this->load->view('common/alert');
		$this->load->view('common/globalJS');
		$this->load->view('common/loading_modal');
		$this->load->view('product/script', $result);
	}

	/* LoadMore comments */
	public function loadMoreComments() {
		$product_id = $this->input->post('product_id');
		$start = $this->input->post('start');
		
		$comments = $this->product->comments($product_id, $start);

		if (is_array($comments['data']) && count($comments['data'] > 0)) {
			$views = '';
			foreach ($comments['data'] as $key => $value) {
				$views .=  $this->load->view('product/comments', $value, TRUE); 
			}

			$result = [
				'views' => $views,
				'next' => $comments['next'],
				'start' => $comments['start'],
			];
			echo json_encode($result);
		}
			
	}

	public function insert_comments() {

		$this->form_validation->set_rules('txtComment', 'Comment', 'trim|required');
		if ($this->form_validation->run() === FALSE)  {
			echo json_encode(array("errCode"=>"R09090", "errMsg"=>validation_errors())); 
			return;
		}

		// Check session
        if ( !$this->session->userdata('logged_in') ) {
            // Echo error msg if ajax request
            if ($this->input->is_ajax_request()) {
                echo json_encode(array("errCode"=>"R00002", "errMsg"=>R00002));
                exit;
            }

            redirect(base_url()."home");
            exit;
        }

        $userid = $this->session->userdata('id');
       	$data = array(
			'user_id' => $userid,
			'promo_id' => 1,
			'promo_type' => 'comments',
			'points' => 1,
			'ipaddress' => isset($ip) ? $ip : '' ,
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
		
		$txtEmail = $this->input->post('txtEmail');
		$txtComment = $this->input->post('txtComment');
		$product_id = $this->input->post('product_id');

		$data = [
			'product_id' => $product_id
			,'message' => $txtComment
			,'created_at' => date("Y-m-d H:i:s")
			// ,'created_by' => 
			,'user_id' => $userid
			,'status' => 'P'
		];

		$this->product->insert_comments($data);
		echo json_encode(array( 'errCode' => 'R00003','errMsg' => R00003));
		return;
	}

	public function rateProduct() {

		// Check session
        if ( !$this->session->userdata('logged_in') ) {
            // Echo error msg if ajax request
            if ($this->input->is_ajax_request()) {
                echo json_encode(array("errCode"=>"R00002", "errMsg"=>R00002));
                exit;
            }

            redirect(base_url()."home");
            exit;
        }

        /* Form Validation */
		$this->form_validation->set_rules('rate', 'Rate', 'trim|required');
		$this->form_validation->set_rules('remarks', 'Remarks', 'trim|required');
		if ($this->form_validation->run() === FALSE)  {
			echo json_encode(array("errCode"=>"R09090", "errMsg"=>validation_errors())); 
			return;
		}

        $data = [
        	'post_date' => date("Y-m-d")
			,'post_time' => date("H:i:s")
			,'product_id' => $this->input->post('product_id')
			,'rate' => $this->input->post('rate')
			,'remarks' => $this->input->post('remarks')
			,'status' => 'I'
			,'user_id' => $this->session->userdata('id')
        ];

        $this->product->insertRateProduct($data);
        echo json_encode(array( 'errCode' => 'R00004','errMsg' => R00004));
		return;

	}

}
