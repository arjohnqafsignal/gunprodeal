<?php
Class Common_model extends CI_Model
{
	function getusername($id='')
	{
	   $this->db->where('id', $id);
	   $query = $this->db->get('users');
	   $ret = $query->row();
	   return isset($ret)? $ret->name: '';
	}

	function getUseremail($id='')
	{
	   $this->db->where('id', $id);
	   $query = $this->db->get('users');
	   $ret = $query->row();
	   return isset($ret)? $ret->email: '';
	}

	function getDealerCompanyName($id='')
	{
	   $this->db->where('id', $id);
	   $query = $this->db->get('dealers');
	   $ret = $query->row();
	   return isset($ret)? $ret->company_name: '';
	}

	function getDealerCompanyUrl($id='')
	{
	   $this->db->where('id', $id);
	   $query = $this->db->get('dealers');
	   $ret = $query->row();
	   return isset($ret)? $ret->web_url: '';
	}

	function getProductTitlebyUPC($upc='')
	{
	   $this->db->limit('1');
	   $this->db->where('upc', $upc);
	   $query = $this->db->get('products');
	   $ret = $query->row();
	   return isset($ret)? $ret->title: '';
	}

	function getProductUPC($id)
	{
	   $this->db->limit('1');
	   $this->db->where('id', $id);
	   $query = $this->db->get('products');
	   $ret = $query->row();
	   return isset($ret)? $ret->upc: '';
	}

	function checkDealerExists($id){
	   $this->db->where('id', $id);
	   $query = $this->db->get('dealers');
	   return (count($query->result()) > 0)? true:false;
	}
	 
	function getallcategory()
	{
	   $this->db->order_by('category_code', 'asc');
	   $query = $this->db->get('categories');
	   return $query->result();
	}

	function getAllSubcategory()
	{
	   $this->db->order_by('sub_category_code', 'asc');
	   $query = $this->db->get('sub_categories');
	   return $query->result();
	}

	function getCategoryname($id=0)
	{
	   $this->db->where('id', $id);
	   $query = $this->db->get('categories');
	   $ret = $query->row();
	   return isset($ret)? $ret->name: '';
	}

	function getallStates()
	{
	   $this->db->order_by('name', 'asc');
	   $this->db->where('status', '1');
	   $query = $this->db->get('states');
	   return $query->result();
	}

	function getallBrand()
	{
	   $this->db->order_by('name', 'asc');
	   $this->db->where('status', '1');
	   $query = $this->db->get('brands');
	   return $query->result();
	}


	function getStatename($id=0)
	{
	   $this->db->where('id', $id);
	   $query = $this->db->get('states');
	   $ret = $query->row();
	   return isset($ret)? $ret->name: '';
	}

	function getStatebyDealer($id=0)
	{
	   $this->db->where('id', $id);
	   $query = $this->db->get('dealers');
	   $ret = $query->row();
	   return isset($ret)? $this->getStatename($ret->state): '';
	}
	
	
	function getallCountries()
	{
	   $this->db->order_by('name', 'asc');
	   $query = $this->db->get('countries');
	   return $query->result();
	}

	function getallSubscriptions()
	{
	   $this->db->order_by('price', 'asc');
	   $query = $this->db->get('subscriptions');
	   return $query->result();
	}

	function getBanner($location) {

		$this->db->select('image_url');
    	$this->db->from('ads');
    	$this->db->where('location_id', $location);
    	$this->db->order_by('created_at', 'DESC');
    	$result = $this->db->get();

		return $result->row();
	}
	
	function getPurchasedBanner($id) {
		$this->db->from('ads');
		$this->db->join('ad_locations', 'ad_locations.id = ads.location_id');
		$this->db->where('ad_locations.id', $id);
		$this->db->where('ad_locations.status', 'A');
		$this->db->where('ads.status', 'A');
		$this->db->select('ads.status, ads.image_url, ad_locations.status as l_status');
		$result = $this->db->get()->result_array();
		if($result){
			return $result[0]['image_url'];
		}else{
			return '';
		}
	}

	function getBannersArray($id = '1') {
		$this->db->from('ads');
		$this->db->join('ad_locations', 'ad_locations.id = ads.location_id');
		$this->db->where('ad_locations.id', $id);
		$this->db->where('ad_locations.status', 'A');
		$this->db->where('ads.status', 'A');
		$this->db->select('ads.image_url,ads.link_url');
		$result = $this->db->get()->result_array();
		return $result;
	}

	function timetoago($datetime, $full = false) {
	     $today = time();    
		 $createdday= strtotime($datetime); 
		 $datediff = abs($today - $createdday);  
		 $difftext="";  
		 $years = floor($datediff / (365*60*60*24));  
		 $months = floor(($datediff - $years * 365*60*60*24) / (30*60*60*24));  
		 $days = floor(($datediff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));  
		 $hours= floor($datediff/3600);  
		 $minutes= floor($datediff/60);  
		 $seconds= floor($datediff);  
		 //year checker  
		 if($difftext=="")  
		 {  
		   if($years>1)  
			$difftext=$years." years ago";  
		   elseif($years==1)  
			$difftext=$years." year ago";  
		 }  
		 //month checker  
		 if($difftext=="")  
		 {  
			if($months>1)  
			$difftext=$months." months ago";  
			elseif($months==1)  
			$difftext=$months." month ago";  
		 }  
		 //month checker  
		 if($difftext=="")  
		 {  
			if($days>1)  
			$difftext=$days." days ago";  
			elseif($days==1)  
			$difftext=$days." day ago";  
		 }  
		 //hour checker  
		 if($difftext=="")  
		 {  
			if($hours>1)  
			$difftext=$hours." hours ago";  
			elseif($hours==1)  
			$difftext=$hours." hour ago";  
		 }  
		 //minutes checker  
		 if($difftext=="")  
		 {  
			if($minutes>1)  
			$difftext=$minutes." minutes ago";  
			elseif($minutes==1)  
			$difftext=$minutes." minute ago";  
		 }  
		 //seconds checker  
		 if($difftext=="")  
		 {  
			if($seconds>1)  
			$difftext=$seconds." seconds ago";  
			elseif($seconds==1)  
			$difftext=$seconds." second ago";  
		 }  
		 return $difftext;  
	}
	
	function formatdate($date =''){
		 if($date !=''){
			 $formatdate = date('M d, Y', strtotime($date));
		 }else{
			 $formatdate = '';
		 }
		 return $formatdate;
	}
	
	function cleanurl($string) {
	    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
	    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
		$string = str_replace('--', '-', $string); // Replaces double spaces with hyphens.
		return $string;
	}

	function checkSession(){
		 $loginshow = true;
		 if($this->session->userdata('logged_in')){
			 $loginshow = false;
		 }

		 if($this->session->userdata('dealer_login')){
			 $loginshow = false;
		 }
		 return $loginshow;
	}

	function getIpAddress() 
	{
		
		$local = isset($_SERVER['LOCAL_ADDR'])? $_SERVER['LOCAL_ADDR'] : '';
		$port = isset($_SERVER['LOCAL_PORT'])? $_SERVER['LOCAL_PORT'] : '';
		$ip = $_SERVER['HTTP_USER_AGENT'].$local.$port.$_SERVER['REMOTE_ADDR'];
		return $ip;
	}

	function countMyWishlist()
	{
	   $id = $this->session->userdata('id');
	   $this->db->where('created_by', $id);
	   $q = $this->db->get('wishlists');
	   return $q->num_rows();
	}

	function countmyProduct()
	{
	 	$id = $this->session->userdata('id');
	 	$this->db->where('dealer_id', $id);
	    $q = $this->db->get('products');
	    return $q->num_rows();
	}
	
}
?>