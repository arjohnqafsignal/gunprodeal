<?php
Class Newsletter_model extends CI_Model
{
	function emailExists($email){
	   $this->db->where('email', $email);
	   $query = $this->db->get('newsletters');
	   return (count($query->result()) > 0)? TRUE:FALSE;
	}

	 function addSubscriber($data){
		 $this->db->insert('newsletters', $data);
		 return;
	 }
}
?>