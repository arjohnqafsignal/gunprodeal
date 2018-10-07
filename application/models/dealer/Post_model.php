<?php
Class Post_model extends CI_Model
{
	function getAllAdslocation()
	{
	   $this->db->order_by('price', 'desc');
	   $query = $this->db->get('ad_locations');
	   return $query->result();
	}

	function getAllAdslocationbyid($id=0)
	{
	   $this->db->where('id', $id);
	   $query = $this->db->get('ad_locations');
	   return $query->result();
	}

	function insertOrder($data){
		$this->db->insert('orders', $data);
		return ($this->db->affected_rows() == '1') ? true : false;
	}

	function insertOrderAds($data){
		$this->db->insert('order_ads', $data);
		return ($this->db->affected_rows() == '1') ? true : false;
	}
	
	function checkAdsexist($title=''){	
		$this->db->select('id');  
		$this->db->from('ads');
		$this->db->where('title', $title);
		$this->db->where('created_by', $this->session->userdata('id'));
		$query = $this->db->get();
		$result = $query->result();
		return ( count($result) > 0 ) ? true : false;  
	}

	function delete_tempimages($code =''){
		$this->db->where('code', $code);
		$this->db->delete('tbl_upload_temp');
		return ($this->db->affected_rows()=='1')? true : false ;
	}

	function deletemyads($id = 0){
		$this->db->where('id', $id);
		$this->db->delete('ads');
		return ($this->db->affected_rows()=='1')? true : false ;
	}

	function countmyads($id=0){
		$this->db->where('created_by', $id);
		return $this->db->count_all('ads');
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
	#UPDATE IMAGES BY ADS ID
	#-------------------------------------------------------------
	function updateads($data = array(), $id='0'){
			
		$this->db->where('id', $id);
		$this->db->update('tbl_post', $data);
		return ($this->db->affected_rows()=='1')? TRUE : FALSE ;
	}
	
	
}
?>