<?php
Class Contact_model extends CI_Model
{
	 function addContact($data){
		 $this->db->insert('contacts', $data);
		 return;
	 }
}
?>