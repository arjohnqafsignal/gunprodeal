<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/******************************************************************
*
*	Title		: 	About Us
*	Author		:   JaneDoe
*	Filename 	: 	Bhc.php
*	Date 		: 	September 2018
*
******************************************************************/

class Bhc extends CI_Controller 
{

	function __construct()
	{
        parent::__construct();
        $this->load->model('api/bhc_model');
	}

    public function parseCsv( ) {
        $filename = $this->bhc_model->getCsvFilename();
        $default = base_url('assets/product-image/').'default.jpg';
        echo '<pre>';
        ini_set('max_execution_time', 5000);
        /* 
        **    [0] => product_name
        **    [1] => universal_product_code
        **    [2] => short_description
        **    [3] => long_description
        **    [4] => category_code
        **    [5] => category_description
        **    [6] => product_price
        **    [7] => small_image_path
        **    [8] => Large_image_path
        **    [9] => product_weight
        **    [10] => marp
        **    [11] => msrp
        */

        // Inactvie rerords       
        $this->bhc_model->inactiveProducts();

        $report = fopen( base_url() . "assets/csv/".$filename,"r");
        $row = 1;
        while (($line = fgets($report)) !== false) {

            if($row == 1){ $row++; continue; }
            $line = str_replace('"', '', preg_replace('/\r\n/', '', $line));
            $line = explode(',', $line);

            $productcode = isset($line[0]) ? $line[0]  : '';
            $title = isset($line[2]) ? $line[2]  : '';
            $list = $this->bhc_model->getCategoryCode($line[4]);
            $category = isset($list['category']) ? $list['category'] : '';
            $subcategory = isset($list['subcategory']) ? $list['subcategory'] : '';
            $shipping_fee = $this->bhc_model->getShippingfee($category);
            $upc =  isset($line[1]) ? $line[1] : '';
            $description = isset($line[3]) ? $line[3]  : '';
            $price = isset($line[11]) ? $line[11]  : '';
            $image_url = ($productcode !='') ? base_url('assets/product-image/bhc/').$productcode.'.jpg' : $default;

            $productData = [
                'code' => trim($productcode)
                ,'title' => trim($title)
                ,'category_code' => trim($category)
                ,'sub_category_code' => trim($subcategory)
                ,'upc' => trim($upc)
                ,'price' => trim($price)
                ,'shipping_fee' => trim($shipping_fee)
                ,'image_url' => trim($image_url)
                ,'status' => 'A'
                ,'dealer_id' => BHC
            ];
            
            $countRecord = $this->bhc_model->ifProductExists( $upc ,$productcode );

            if ($countRecord[0]['counts'] == '0' ) {
                $insertBatch[] = $productData;
            }
            else {
                // unset($productData['upc']);
                $productData['id'] = $countRecord[0]['id'];
                $updateBatch[] = $productData;
            }
        }
var_dump('DONE');
		if (is_array($insertBatch)) {
            $limitInserteBatch = array_chunk($insertBatch, 3000);
            foreach ($limitInserteBatch as $parsedArray) {
                $this->bhc_model->productInsertBatch($parsedArray);
            }
        }

        if (is_array($updateBatch)) {
            $limitUpdateBatch = array_chunk($updateBatch, 3000);
            foreach ($limitUpdateBatch as $parsedArray) {
                $this->bhc_model->productUpdaBatch($parsedArray);
            }
        }
var_dump('DONE2');

        $_report = fopen( base_url() . "assets/csv/".$filename,"r");
        $row = 1;
        while (($_line = fgets($_report)) !== false) {
            
            if($row == 1){ $row++; continue; }
            $_line = str_replace('"', '', preg_replace('/\r\n/', '', $_line));
            $_line = explode(',', $_line);

            $_upc =  isset($_line[1]) ? $_line[1] : '';
            $_long_description =  isset($_line[3]) ? $_line[3] : '';

            $_details = $this->bhc_model->getIdUpc( $_upc );
            var_dump($_details);
            var_dump('UPDATE INSERT '.$_upc);
            echo $this->bhc_model->productDescription($_details['id'], $_long_description );
        }
    }
	
}
