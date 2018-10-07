<?php
Class Search_model extends CI_Model
{
	public $table = 'products';
	public $table2 = 'dealers';
	public $table3 = 'brands';
	#GET ITEM NAME BY TITLE
	public function productListFilter($where){

		$this->db->select("id, title, sku, upc, count(upc) as COUNT_UPC_SAME ");
		$this->db->from($this->table);
		$this->db->like('upc', $where);
		$this->db->group_by('upc'); 
		$upc = $this->db->get();

		if ($upc->num_rows() > 0) 
		{
			 $row = $upc->custom_result_object('CustomProductDetails');
			 return $row;
		}

		$this->db->select("id, title, sku");
	    $this->db->from($this->table);
	    $this->db->like('title', $where);
	    // $this->db->order_by("order", "asc");
	    $result = $this->db->get();
		return $row = $result->custom_result_object('CustomProductDetails');			
	 }	 

	# All products
	public function listProduct($where, $limit, $offset, $sortfield, $order, $betweenPrice) {
		$this->db->select('a.*,b.id as BRAND_ID, b.name as BRAND_NAME, (SELECT 
            ROUND(AVG(rate), 2)
        FROM
            rate_product
        WHERE
            product_id = a.id) AS rating,
         (SELECT 
            COUNT(*)
        FROM
            rate_product
        WHERE
            product_id = a.id) AS total_rates');
		$this->db->from($this->table. " a");
		$this->db->join($this->table3. " b", "a.brand_id = b.id", "LEFT");
		$this->db->like($where);
		$this->db->limit($limit, $offset);
		$this->db->where( $betweenPrice );
		$this->db->order_by($sortfield, $order);
		$this->db->order_by('a.id', 'acs');
		$result = $this->db->get();
		return $result->result_array();
	}

	# Pagination of product
	public function countProduct($where = '', $betweenPrice) {
		$this->db->from($this->table. " a");
		$this->db->like($where);
		$this->db->where( $betweenPrice );
		return $this->db->count_all_results();
	}

	public function dealers( $id ) {
		$this->db->select("*");
		$this->db->from($this->table2);
		$this->db->where('id', $id);
		// $this->db->where('a.status', 'A');
		$result = $this->db->get();
		return $result->row_array(); 
	}

	public function brands() {
		$this->db->select('*');
		$this->db->from($this->table3);
		$result = $this->db->get();
		return $result->result_array();
	}

}

/* Custom Response for product Table*/
class CustomProductDetails {

	public $title;
	public $sku;
	public $description;
	public $price;
	public $image_url;
	public $productLink;
	// public $compareUpc;
	public $productId;
	public $upc;
	// public $COUNT_UPC_SAME;

    public function __set($title ,$value) {

        if ($title === 'id') {
            $this->productId = $value;
            $this->productLink = base_url().'product/viewProduct?id='.$value;
		}

		if ($title == 'COUNT_UPC_SAME' && $value > 1)  {
			$this->productLink = base_url().'compare/prices/'.$this->upc;
		}
	}
}
?>