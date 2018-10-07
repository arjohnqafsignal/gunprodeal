<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('product_model','product',TRUE);
		$this->load->model('category_model','category',TRUE);
		$this->load->helper('date');
		$this->load->helper('countryblock');
		if(!checkcountry()){
			redirect('/out-of-region');
		}
	}

	public function index()
	{		
			/* Get list menu */
			$listMenu = $this->category->listMenuHome( array( 'a.features' => '1') );


			/*  */
			foreach ($listMenu as $parseMenuKey => $parseListMenu) {
				$whereFeature = [
					'a.category_code' => $parseListMenu['category_code'] 
				];
				$listSubMenu = $this->category->listSubMenu( $whereFeature  );

				foreach ($listSubMenu as $parseListSubMenu) {
					
					$listMenu[$parseMenuKey]['subMenu'][] = $parseListSubMenu;
				}
			}

			/* Get products */
			$product = $this->product->getProducts( TRUE, 10 );

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
				/*$descriptions = $this->product->productDescriptions($parseProduct['id']);
				$latestProduct[$parseKey]['descriptions'] = count($descriptions) > 0 ? $descriptions[0]['descriptions'] : '';*/
			}


			$feature = $this->product->featureProducts('4');

			$result = [
				'details' => $product,
				'latestProduct' => $latestProduct,
				'feature' =>$feature,
				'menu' => $listMenu
			];
			$this->load->view('home/index',$result);
	}

	public function getTopBanners(){
		$result = $this->common->getBannersArray();
		echo json_encode($result);
	}
}
