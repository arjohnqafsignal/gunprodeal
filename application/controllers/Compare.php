<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compare extends CI_Controller 
{

	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->model('product_model','product',TRUE);
		$this->load->helper('countryblock');
		if(!checkcountry()){
			redirect('/out-of-region');
		}
	}
	
	function index() {
		$compareSession = $this->session->userdata('compare_components');
		$data = [
			'sessionProduct' => $compareSession
		];

		$this->load->view('compare/index', $data);
	}


	/* Add to Compare 
	** Get product details and save to session
	*/
	public function addCompare() {

		$productId = $this->input->post('id');
		
		/* Details of product */
		$details = $this->product->productDetails($productId);

		/* Name of array */
		$nameSession = 'id-'.$productId;

		/* Remove the other information */
		unset($details['status']);
		unset($details['created_at']);
		unset($details['updated_by']);
		unset($details['updated_at']);
		$itemDetails = array( $nameSession => $details );

		$oldSession = $this->session->userdata('compare_components');
		if ($oldSession) $itemDetails = $oldSession + $itemDetails ;

		/* Save session */
		$this->session->set_userdata('compare_components' , $itemDetails);

		/* Add product id in session for disabling the 'add to compare' button */
		$oldIdSession = $this->session->userdata('compareId_components');
		$oldIdSession != NULL ? array_push( $oldIdSession, $productId) : $oldIdSession = array($productId);
		
		/* Save session */
		$this->session->set_userdata('compareId_components' , $oldIdSession);
	}

	/* Remove session per id */
	public function removeCompareItem() {
		$productId = $this->input->post('id');
		unset($_SESSION['compare_components']['id-'.$productId]);
		foreach($_SESSION['compareId_components'] as $key => $value) {
			var_dump($value);
			if($value == $productId) {
				unset($_SESSION['compareId_components'][$key]);
			}
		}
	}

	// public function removeall() {
	// 	$this->session->sess_destroy();
	// }

	function prices( $upc = false)
	{
		if($this->session->userdata('logged_in'))
		{
			$data['product'] = $this->common->getProductTitlebyUPC($upc);
			$data['results'] = $this->product->compareProductbyUPC($upc);
			$this->load->view('compare/compareprices', $data);
		} else {
			redirect('login');
		}
	}
	
}
