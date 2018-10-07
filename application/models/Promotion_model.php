<?php
Class Promotion_model extends CI_Model
{
	
	function getAllpromotion()
	{
	   $this->db->where('status', '1');
	   $query = $this->db->get('promotions');
	   return $query->result();
	}

	function emailExists($email){
	   $this->db->where('email', $email);
	   $query = $this->db->get('share_emails');
	   return (count($query->result()) > 0)? true:false;
	}

	function ipAddressExists($ip){
	   $this->db->where('ipaddress', $ip);
	   $query = $this->db->get('user_points_history');
	   return (count($query->result()) > 0)? true:false;
	}

	function addSharedEmail($data)
	{
		$this->db->insert('share_emails', $data);
		return($this->db->affected_rows() > 0)? true:false;
	}

	function getSharedEmailbyid($id = 0)
	{
	   $this->db->where('id', $id);
	   $this->db->where('status', PENDING);
	   $query = $this->db->get('share_emails');
	   return ($query->num_rows() == 1)? $query->result(): false;
	}

	function updateSharedEmail($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('share_emails', $data); 
		return($this->db->affected_rows() > 0)? true:false;
	}

	function userPointExists($userid)
	{
	   $this->db->where('user_id', $userid);
	   $query = $this->db->get('user_points');
	   return (count($query->result()) > 0)? true:false;
	}

	function incresePoints($id)
	{
	    $this->db->where('user_id', $id);
	    $this->db->set('points', 'points'."+1", FALSE);
	    $this->db->update('user_points'); 
	}

	function addUserPoints($data)
	{
		$this->db->insert('user_points', $data);
		return($this->db->affected_rows() > 0)? true:false;
	}

	function addPointsHistory($data)
	{
		$this->db->insert('user_points_history', $data);
		return($this->db->affected_rows() > 0)? true:false;
	}
	
}
?>