<?php
Class Login_model extends CI_Model
{
	function login($username, $password)
	{
	   $this->db->select('id, first_name, last_name, status');
	   $this->db->from('dealers');
	   $this->db->where('username', $username);
	   $this->db->where('password', MD5($password));
	   $this->db->limit(1);
	   $query = $this->db->get();
	   return ($query->num_rows() == 1)? $query->result(): false;
	}

	function loginEmailCheck( $email = '') {
		$this->db->where('email', $email);
		$this->db->select('id');    
		$this->db->from('dealers');
		$query = $this->db->get();
		$ret = $query->row();
		return ( $query->num_rows() >= 1 ) ? $ret->id : false;  
	}
	
	function updatePassword($id, $data) {
		$this->db->where('id', $id);
		$this->db->update('dealers', $data); 
		return($this->db->affected_rows() > 0)? true:false;
	}
}
?>