<?php
Class Wishlist_model extends CI_Model
{
	function getAllWishlist($id=0, $limit = 0, $offset=1000)
	{
	   
	    $this->db->select('product.*,wish.id as wid');  
		$this->db->from('wishlists AS wish');
		$this->db->join('products AS product', 'wish.product_id = product.id');
		$this->db->where('wish.created_by', $id);
		$this->db->order_by('wish.created_at', 'DESC'); 
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result();
	}

	function countWishlist($id=0){
		$this->db->where('created_by', $id);
		return $this->db->count_all('wishlists');
	}

	function countMyWishlist($id=0)
	{
	   $this->db->where('id', $id);
	   $query = $this->db->get('products');
	   return $query->result();
	}

	function insertProducts($data){
		$this->db->insert('products', $data);
		return ($this->db->affected_rows() == '1') ? true : false;
	}

	function insertWishlist($data){
		$this->db->insert('wishlists', $data);
		return ($this->db->affected_rows() == '1') ? true : false;
	}
}
?>