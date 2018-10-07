<?php
Class Pricing_model extends CI_Model
{

	function getAllSubscriptions()
	{
	   $this->db->where('status', 1);
	   $query = $this->db->get('subscriptions');
	   return $query->result();
	}

}
?>