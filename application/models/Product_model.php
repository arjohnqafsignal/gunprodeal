<?php
Class Product_model extends CI_Model
{
	// private $db;
    public $table = "products";
    public $table2 = "product_image";
    public $table3 = "product_descriptions";
    public $table4 = "dealers";
    public $table5 = "comments";
    public $table6 = "users";
    public $table7 = "categories";
    public $table8 = "ads";
    public $table9 = "ad_locations";
    public $table10 = "rate_product";
    public $table11 = "categories";
    public $table12 = "sub_categories";
    public $table13 = "states";
    public $table14 = "brands";
    public $tableProdInfo = "product_informations";

  //   # GET LASTEST PRODUCT
  //   function lastestProducts() {
  //   	$this->db->select('*');
  //   	$this->db->from($this->table);
  //   	$this->db->where('status', 'A');
  //   	$this->db->order_by('created_at', 'DESC');
  //   	$this->db->limit(20);
  //   	$result = $this->db->get();

		// return $result->result_array(); 
  //   }

    # GET FEATURE PRODUCT
    function featureProducts($id = '4') {
    	$this->db->select('A.*');
    	$this->db->from($this->table8. ' A');
    	$this->db->join($this->table9. ' B' , 'A.location_id = B.id');
		$this->db->where('B.id', $id);
		$this->db->where('A.status', 'A');
		$this->db->where('B.status', 'A');
		$this->db->order_by('id', 'asc');
    	$result = $this->db->get();
		return $result->result_array(); 
    }

    # GET PRODUCT
    function getProducts( $latestItem = FALSE, $limit = FALSE ) {
    	$this->db->select(' A.*, B.category_code, B.name, C.first_name, C.last_name, D.id as BRAND_ID, D.name as BRAND_NAME, E.name as STATE_NAME');
    	$this->db->from($this->table. ' A');
    	$this->db->join($this->table7. ' B', 'A.code = B.id');
		$this->db->join($this->table4. ' C', 'A.dealer_id = C.id');
		$this->db->join($this->table14. ' D', 'A.brand_id = D.id', 'LEFT');
		$this->db->join($this->table13. ' E', 'E.id = C.state', 'LEFT');
    	$this->db->where('A.status', 'A');
    	if ( $latestItem == TRUE ) {
    		$this->db->order_by('created_at', 'DESC');
    		$this->db->order_by('id', 'DESC');
    		$this->db->limit(20);
		}
		if ($limit != FALSE) {
			$this->db->order_by('rand()');
			$this->db->limit( $limit );
		}

    	$result = $this->db->get();
		return $result->result_array(); 
    }

	#GET ITEM NAME BY ID
	function productDetails($id) {

		$this->db->select("a.*,b.name AS CATEGORY_NAME ,c.list_name as SUB_CATEGORY_NAME, d.id as BRAND_ID, d.name as BRAND_NAME, f.name as STATE_NAME");
		$this->db->from($this->table. " a");
		$this->db->join($this->table11. " b", 'a.category_code = b.category_code', "LEFT");
		$this->db->join($this->table12. " c", 'a.sub_category_code = c.sub_category_code', "LEFT");
		$this->db->join($this->table14. ' d', 'a.brand_id = d.id', 'LEFT');
		$this->db->join($this->table4. ' e', 'e.id = a.dealer_id', 'LEFT');
		$this->db->join($this->table13. ' f', 'f.id = e.state', 'LEFT');
		
		$this->db->where('a.id', $id);
		$this->db->where('a.status', 'A');
		// $this->db->order_by("order", "asc");
		$result = $this->db->get();
		return $result->row_array(); 
	}	 

	/* Get product descriptions */
	function productDescriptions($id) {
		$this->db->select('descriptions');
		$this->db->from($this->table3);
		$this->db->where('product_id', $id);
		$this->db->where('status', 'A');
		$result = $this->db->get();
		return $result->result_array(); 
	}

	# GET IMAGES LINK BY ID
	function imagesLink($id) {

		$this->db->select('image_url');
		$this->db->from($this->table2);
		$this->db->where('product_id', $id);
		$this->db->where('status', 'A');
		$result = $this->db->get();
		return $result->result_array(); 
	}

	/* Get dealer */
	function dealer($id) {
		$this->db->select('a.*, b.name AS STATE_NAME');
		$this->db->from($this->table4. " a");
		$this->db->join($this->table13. " b", "a.state = b.id", "LEFT");
		$this->db->where('a.id', $id);
		$this->db->where('a.status', '1');
		$result = $this->db->get();
		return $result->row_array(); 
	}

	/* Get comments */
	function comments($product_id, $start = '0', $limit = 3) {
		$this->db->select('A.*, B.id as USER_ID, B.name as USERNAME');
		$this->db->from($this->table5. ' A');
		$this->db->join($this->table6 . ' B', 'A.user_id = B.id');
		$this->db->where('A.product_id', $product_id);
		$this->db->where('A.status', 'A');
		$this->db->limit($limit, $start);
		$this->db->order_by("A.created_at", "desc");
		$data = $this->db->get();

		$this->db->where('product_id', $product_id);
		$this->db->from($this->table5);
		$this->db->where('status', 'A');
		$count = $this->db->count_all_results();

		return array( 
				'data' => $data->result_array(),
				'count' => $count,
				'next' => ($count > $start + $limit) ? 'Y' : 'N',
				'start' => $start + $limit
			); 
		
	}

	/* Insert comments */
	function insert_comments($data) {
		return $result = $this->db->insert($this->table5, $data);
	}

	function compareProductbyUPC($upc = 0)
	{
	   $this->db->where('status', 'A');
	   $this->db->where('upc', $upc);
	   $query = $this->db->get($this->table);
	   return $query->result();
	}

	/* Insert rate */
	function insertRateProduct($data) {
		return $result = $this->db->insert($this->table10, $data);
	}

    function getRateProduct( $id ) {
    	$this->db->select('COUNT(*) AS total_rates, ROUND(AVG(rate),2) AS rating');
    	$this->db->where( 'status', 'A' );
    	$this->db->where( 'product_id', $id );
    	$this->db->from($this->table10);
    	$result = $this->db->get();
    	return $result->row_array(); 
    }

    function rateProductWithBreakDown( $id ) {
       $query = $this->db->query('SELECT 
			(SELECT COUNT(*) FROM rate_product WHERE product_id = "'.$id.'" AND rate = 5 ) AS FIVE,
			(SELECT COUNT(*) FROM rate_product WHERE product_id = "'.$id.'" AND rate = 4 ) AS FOUR,
			(SELECT COUNT(*) FROM rate_product WHERE product_id = "'.$id.'" AND rate = 3 ) AS THREE,
			(SELECT COUNT(*) FROM rate_product WHERE product_id = "'.$id.'" AND rate = 2 ) AS TWO,
			(SELECT COUNT(*) FROM rate_product WHERE product_id = "'.$id.'" AND rate = 1 ) AS ONE,
			(SELECT COUNT(*) FROM rate_product WHERE product_id  = "'.$id.'" ) as TOTAL_RATES,
			(select ROUND(AVG(rate),2) from rate_product where product_id  = "'.$id.'" ) as ROUND  
		');
        return $query->row_array();
    }

    function getUserRateProduct( $where ) {
    	$this->db->select("*");
    	$this->db->where( $where );
    	$this->db->from($this->table10);
    	$result = $this->db->get();
    	return $result->row_array(); 
    }

    function getRelatedProducts($id , $upc){
       $this->db->where('status', 'A');
	   $this->db->where('upc', $upc);
	   $this->db->where('id !=', $id);
	   $this->db->order_by('rand()');
	   $this->db->limit(4);
	   $query = $this->db->get($this->table);
	   return $query->result();
    }

    function getProductotherInformation($upc){
	   $this->db->where('product_upc', $upc);
	   $this->db->limit(1);
	   $query = $this->db->get($this->tableProdInfo);
	   return $query->row_array();
    }

}
?>
