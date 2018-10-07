<?php
Class Product_model extends CI_Model
{
	function getAllMyProducts($id=0, $limit = 0, $offset=1000)
	{
	   $this->db->limit($limit, $offset);
	   $this->db->where('dealer_id', $id);
	   $this->db->order_by('title', 'asc');
	   $query = $this->db->get('products');
	   return $query->result();
	}

	function countMyProducts($id=0){
		$this->db->where('dealer_id', $id);
		return $this->db->count_all('products');
	}

	function getProductsByid($id=0)
	{
	   $this->db->where('id', $id);
	   $query = $this->db->get('products');
	   return $query->result();
	}

	function insertProducts($data){
		$this->db->insert('products', $data);
		return ($this->db->affected_rows() == '1') ? true : false;
	}
}
?>