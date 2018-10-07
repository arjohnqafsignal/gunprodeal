<?php
Class Profile_model extends CI_Model
{

	function getUserinfobyid($id = 0)
	{
	   $this->db->where('id', $id);
	   $query = $this->db->get('users');
	   return $query->result();
	}

	function email_checkedit($email, $id)
	{
	   $this->db->where('email', $email);
	   $this->db->where('id !=', $id);
	   $query = $this->db->get('users');
	   return (count($query->result()) > 0)? true:false;
	}

	function updateuserprofile($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('users', $data); 
		return($this->db->affected_rows() > 0)? true:false;
	}	 
}
?>