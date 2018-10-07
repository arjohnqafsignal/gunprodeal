<?php
Class Postdeal_model extends CI_Model
{
	function getAllAdslocationbyid($id=0)
	{
	   $this->db->where('id', $id);
	   $query = $this->db->get('products');
	   return $query->result();
	}

	function insertProducts($data){
		$this->db->insert('products', $data);
		return ($this->db->affected_rows() == '1') ? true : false;
	}

	function insertProductDescription($data){
		$this->db->insert('product_descriptions', $data);
		return ($this->db->affected_rows() == '1') ? true : false;
	}

	function insertProductInfo($data){
		$this->db->insert('product_informations', $data);
		return ($this->db->affected_rows() == '1') ? true : false;
	}

	function delete_tempimages($code =''){
		$this->db->where('code', $code);
		$this->db->delete('upload_temp');
		return ($this->db->affected_rows()=='1')? true : false ;
	}

	function countmyads($id=0){
		$this->db->where('created_by', $id);
		return $this->db->count_all('products');
	}
	
	function getadsimages($id=0)
	{
	   $this->db->where('ads_id', $id);
	   $query = $this->db->get('ads_images');
	   return $query->result();
	}

	function delete_images($id = 0)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_post_images');
		return ($this->db->affected_rows()=='1')? TRUE : FALSE ;
	}

	function getSubcategory($code=0)
	{
		$this->db->where('category_code', $code);
		$query = $this->db->get('sub_categories');
		$x = array();
		if($query->result())
		{
			foreach ($query->result() as $row)
			{
				$x[$row->sub_category_code] = $row->list_name;
			}
			return $x;
		}
		else
		{
			return false;
		}
	}

	function checkDealsExist($code=''){	
		$this->db->select('id');  
		$this->db->from('products');
		$this->db->where('code', $code);
		$this->db->where('dealer_id', $this->session->userdata('id'));
		$query = $this->db->get();
		$result = $query->result();
		return ( count($result) > 0 ) ? TRUE : FALSE;  
	}

	function insertImages($id = 0, $code =''){
		$sql = "INSERT INTO `product_image` (`product_id`,image_url) SELECT '$id', filename FROM `upload_temp` WHERE `code` ='$code';";
		$query = $this->db->query($sql);
		return ($this->db->affected_rows() > 0)? TRUE : FALSE ;
	}
	
	function getProductURL($code='')
	{
	   $this->db->order_by('id', 'ASC');
	   $this->db->where('code', $code);
	   $this->db->limit(1);
	   $query = $this->db->get('upload_temp');
	   $ret = $query->row();
	   return isset($ret)? $ret->filename: '';
	}

	function deleteTempimages($code =''){
		$this->db->where('code', $code);
		$this->db->delete('upload_temp');
		return ($this->db->affected_rows()=='1')? TRUE : FALSE ;
	}

	function getDealsbyid($id=0)
	{
	   $this->db->where('id', $id);
	   $query = $this->db->get('products');
	   return $query->result();
	}

	function getDealImages($id = 0)
	{	
		$this->db->from('product_image');
		$this->db->where('product_id', $id);
		$query = $this->db->get();
		return $query->result();
	}
	
}
?>