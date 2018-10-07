<?php
Class Subscribe_model extends CI_Model
{
	function addRegistration($data)
	{
		 $this->db->insert('dealers', $data);
		 return($this->db->affected_rows() > 0)? true:false;
	}

	function getAllStates()
	{
	   $this->db->where('status', 1);
	   $query = $this->db->get('states');
	   return $query->result();
	}

	function getAllCountries()
	{
	   $this->db->where('status', 1);
	   $query = $this->db->get('countries');
	   return $query->result();
	}
}
?>