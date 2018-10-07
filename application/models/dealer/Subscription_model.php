<?php
Class Subscription_model extends CI_Model
{
	function getAllSubscriptionlocation()
	{
	   $this->db->order_by('price', 'desc');
	   $query = $this->db->get('ad_locations');
	   return $query->result();
	}

	function getAllSubscriptionbyid($id=0)
	{
	   $this->db->where('id', $id);
	   $query = $this->db->get('subscriptions');
	   return $query->result();
	}

	function insertSubscription($data){
		$this->db->insert('dealer_subscriptions', $data);
		return ($this->db->affected_rows() == '1') ? true : false;
	}

	function insertOrderSubscription($data){
		$this->db->insert('order_ads', $data);
		return ($this->db->affected_rows() == '1') ? true : false;
	}
	
	function checkSubscriptionexist($title=''){	
		$this->db->select('id');  
		$this->db->from('ads');
		$this->db->where('title', $title);
		$this->db->where('created_by', $this->session->userdata('id'));
		$query = $this->db->get();
		$result = $query->result();
		return ( count($result) > 0 ) ? true : false;  
	}

	function delete_images($id = 0)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_post_images');
		return ($this->db->affected_rows()=='1')? TRUE : FALSE ;
	}

	function updateads($data = array(), $id='0'){
			
		$this->db->where('id', $id);
		$this->db->update('tbl_post', $data);
		return ($this->db->affected_rows()=='1')? TRUE : FALSE ;
	}

	function getDealerDetails($id)
	{
	   $this->db->select('id, first_name, last_name, status');
	   $this->db->from('dealers');
	   $this->db->where('id', $id);
	   $this->db->limit(1);
	   $query = $this->db->get();
	   return ($query->num_rows() == 1)? $query->result(): false;
	}
	
	
}
?>