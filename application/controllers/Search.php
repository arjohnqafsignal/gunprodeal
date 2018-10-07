<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller 
{

	function __construct() {
		parent::__construct();
		$this->load->model('search_model','search',TRUE);
		$this->load->model('category_model','category',TRUE);
		$this->load->model('product_model','product',TRUE);
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->helper('date');
		$this->load->library('cart');
		$this->load->library('session');
		$this->load->helper('countryblock');
		if(!checkcountry()){
			redirect('/out-of-region');
		}
	}

	public function index( $sortfield='created_at', $order='desc' , $catCode=0, $subCatCode=0, $dealer=0, $brand=0, $offset = '0' ) {

		/* Get list menu */
		$category = $this->category->listMenuSearch($dealer);
		$brandList = $this->search->brands($dealer);
		/*  */
		foreach ($category as $parseMenuKey => $parseListMenu) {
			
			$whereCategory = [ 'a.category_code' => $parseListMenu['category_code'] ];
			if ($dealer != '0') $where['a.dealer_id'] = $dealer;

			$listSubMenu = $this->category->listSubMenu( $whereCategory );
			foreach ($listSubMenu as $parseListSubMenu) {
				
				$category[$parseMenuKey]['subMenu'][] = $parseListSubMenu;
			}
		}

		/*  Get dealer details */
		$dealerDetails = ($dealer != 0) ? $this->search->dealers( $dealer ) : '';
		
		$pMin = ($this->input->post('pMin') != null) ? $this->input->post('pMin') : '0';
		$pMax = ($this->input->post('pMax') != null) ? $this->input->post('pMax') : '10000.00';

		/**/
		$where['a.title'] = $this->input->post('txtSearch');
		$where['a.status'] = 'A';
		$betweenPrice['a.price >= '] = $pMin;
		$betweenPrice['a.price <= '] = $pMax;
		if ($catCode != '0') $where['a.category_code'] = $catCode;
		if ($subCatCode != '0') $where['a.sub_category_code'] = $subCatCode;
		if ($dealer != '0') $where['a.dealer_id'] = $dealer;
		if ($brand != '0') $where['a.brand_id'] = $brand;
		$limit = 6;

		/*Get product*/
		$product = $this->search->listProduct($where, $limit, $offset, $sortfield, $order, $betweenPrice);

		$searchCount = $this->search->countProduct($where, $betweenPrice);

		$config = [
			'base_url' => base_url().'search/index/'.$sortfield.'/'.$order.'/'.$catCode.'/'.$subCatCode.'/'.$dealer.'/'.$brand,
			'total_rows' => $searchCount,
			'per_page' => $limit,
			'full_tag_open' => "<ul class='pagination pagination-lg'>",
			'full_tag_close' => "</ul>",
			'num_tag_open' => '<li>',
			'num_tag_close' => '</li>',
			'next_tag_open' => "<li >",
			'next_tag_close' => "</li>",
			'prev_tag_open' => "<li>",
			'prev_tag_close' => "</li>",
			'first_tag_open' => "<li>",
			'first_tag_close' => "</li>",
			'last_tag_open' => "<li>",
			'last_tag_close' => "</li>",
			'cur_tag_open' => '<li id="currentPage" class="active" ><a>',
			'cur_tag_close' => '</a></li>',
			'prev_link' => "<span class='fa fa-chevron-left'> </span>",
			'next_link' => "<span class='fa fa-chevron-right'> </span>",
			'use_page_numbers' => FALSE,
			'num_links' => 4,
			'reuse_query_string' => TRUE,
		];
		$this->pagination->initialize($config); 
		$pageLinks = $this->pagination->create_links();

		// $feature = $this->product->featureProducts();
		
		$data = [
			'product' => $product
			,'category' => $category
			,'brand' => $brandList
			,'paginate' => [
				'pageLinks' => $pageLinks
				,'offset' =>  ($searchCount > $offset) ? $offset + 1 : $searchCount + 1
				,'limit' => ($searchCount > $limit && ($limit + $offset) < $searchCount) ? $limit + $offset : $searchCount
				,'count' => $searchCount
			]
			,'postData' => $this->input->post()
			,'currLink' => base_url().'search/index/'
			,'currOrder' => $order
			,'currOffset' => $offset
			,'catCode' => $catCode
			,'subCatCode' => $subCatCode
			,'compareList' => $this->session->userdata('compare_components')
			,'compareIdList' => $this->session->userdata('compareId_components') ?: 0
			,'dealer' => $dealerDetails
			,'dealerId' => $dealer
			,'brandId' => $brand
			,'priceMin' => $pMin
			,'priceMax' => $pMax
			// ,'feature' => $feature
		];

		// echo '<pre>';
		// var_dump($data);
		// die();

		$this->load->view("common/loading_modal");
   		//$this->load->view("common/alert");
   		//$this->load->view("common/prompt");
		$this->load->view('search/index', $data);
		$this->load->view('common/globalJS');
	}

	/*Search Item by title*/
	public function searchFilter() {
		$result = $this->search->productListFilter( $this->input->get('filter') );
		echo json_encode($result);
	}

	

}
