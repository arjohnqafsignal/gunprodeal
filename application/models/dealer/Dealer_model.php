<?php
Class Dealer_model extends CI_Model
{

	function getUserinfobyid($id = 0)
	{
	   $this->db->where('id', $id);
	   $query = $this->db->get('dealers');
	   return $query->result();
	}

	function email_checkedit($email, $id)
	{
	   $this->db->where('email', $email);
	   $this->db->where('id !=', $id);
	   $query = $this->db->get('dealers');
	   return (count($query->result()) > 0)? true:false;
	}

	function updateuserprofile($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('dealers', $data); 
		return($this->db->affected_rows() > 0)? true:false;
	}

	function subscriptionExists($id){
	   $this->db->where('dealer_id', $id);
	   $query = $this->db->get('dealer_subscriptions');
	   return (count($query->result()) > 0)? true:false;
	}
	 
	function updateSubscription($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('dealer_subscriptions', $data); 
		return($this->db->affected_rows() > 0)? true:false;
	}

	function addSubscription($data)
	{
		$this->db->insert('dealer_subscriptions', $data);
		return($this->db->affected_rows() > 0)? true:false;
	}

	function countmyProduct($id = 0)
	{
	 	$this->db->where('dealer_id', $id);
	    $q = $this->db->get('products');
	    return $q->num_rows();
	}

	function getCurrentSubscription($id='')
	{
	   $this->db->where('id', $id);
	   $query = $this->db->get('subscriptions');
	   $ret = $query->row();
	   return isset($ret)? $ret->name: '';
	}

}
?>