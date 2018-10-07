<?php
Class Login_model extends CI_Model
{
	 #CHECK EMAIL AND PASSWORD
	 function login($email, $password)
	 {
	   $this->db->select('id, name, isconfirm');
	   $this->db->from('users');
	   $this->db->where('email', $email);
	   $this->db->where('password', MD5($password));
	   $this->db->limit(1);
	   $query = $this->db->get();
	   return ($query->num_rows() == 1)? $query->result(): false;
	 }
	#CHECK EMAIL 
	function loginemailcheck( $email = ''){
		$this->db->where('email', $email);
		$this->db->select('id');    
		$this->db->from('users');
		$query = $this->db->get();
		$ret = $query->row();
		return ( $query->num_rows() >= 1 ) ? $ret->id : false;  
	}
	
	#UPDATE USER PROFILE
	function updatepassword($id, $data){
		$this->db->where('id', $id);
		$this->db->update('users', $data); 
		return($this->db->affected_rows() > 0)? true:false;
	}
}
?>