<?php
Class Category_model extends CI_Model
{
	// private $db;
    public $table = "categories";
    public $table2 = "sub_categories";
    public $table3 = "products";
    public $table4 = "dealers";

    /* Get list menu */
    /* Used 
    ** home/index || search/index
    */
    function listMenuSearch( $dealer = false ) {

    	$this->db->select('a.category_code, a.name, b.sub_category_code , count(b.category_code) as count_product');
    	$this->db->from($this->table." a");
        if ($dealer) $this->db->join($this->table3." b", 'a.category_code = b.category_code and b.dealer_id = "'.$dealer.'"', 'left'); 
        if (!$dealer) $this->db->join($this->table3." b", 'a.category_code = b.category_code', 'left'); 
        $this->db->where('a.status', 'A');
        $this->db->group_by("a.category_code");
    	$result = $this->db->get();
		return $result->result_array(); 
    }

    function listMenuHome( $where = false ) {

        $this->db->select('a.category_code, a.name, count(a.category_code) as count_product');
        $this->db->from($this->table." a");
        $this->db->where('a.status', 'A');
        if ( $where )
            $this->db->where( $where );
        $this->db->group_by("a.category_code");
        $result = $this->db->get();

        return $result->result_array(); 
    }

    /* Get list sub menu */
    /* Used 
    ** home/index || search/index
    */
    function listSubMenu( $where ) {
    	$this->db->select('a.category_code, a.sub_category_code,a.list_name, a.list_link,  count(b.sub_category_code) as count_product');
    	$this->db->from($this->table2." a");
        $this->db->join($this->table3." b", 'a.sub_category_code = b.sub_category_code', 'left'); 
    	$this->db->where('a.status', 'A');
    	$this->db->where( $where );
        $this->db->group_by("a.sub_category_code");
    	$result = $this->db->get();

		return $result->result_array(); 
    }

}
?>