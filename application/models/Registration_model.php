<?php
Class Registration_model extends CI_Model
{
	 function getusers()
	 {
	   $query = $this->db->get('users');
	   return $query->result();
	 }
	
	 function getuserinfobyid($id = 0)
	 {
	   $this->db->where('id', $id);
	   $query = $this->db->get('users');
	   return $query->result();
	 }

	function addRegistration($data)
	{
		$this->db->insert('users', $data);
		return($this->db->affected_rows() > 0)? true:false;
	}
	
	function deleteUser($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('users'); 
		return($this->db->affected_rows() > 0)? true:false;
	}

	function updateRegistration($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('users', $data); 
		return($this->db->affected_rows() > 0)? true:false;
	}

	function validateAccount($data, $id){
		$this->db->where('id', $id);
		$this->db->update('users', $data);
		return ($this->db->affected_rows() == '1') ? true : false;
	}
	
}
?>