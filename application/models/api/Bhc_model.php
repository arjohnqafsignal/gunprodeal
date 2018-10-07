<?php
Class Bhc_model extends CI_Model
{
	public $table = 'products';
	public $table2 = 'dealers';
    public $table3 = 'brands';
    public $table4 = 'product_descriptions';

    function getAllBhcproducts($id = 0)
    {
       $this->db->where('id', BHC);
       $query = $this->db->get($this->table);
       return $query->result();
    }

    function getCsvFilename($id='5')
    {
       $this->db->where('dealer_id', $id);
       $this->db->limit(1);
       $query = $this->db->get('dealer_files');
       $ret = $query->row();
       return isset($ret)? $ret->filename: '';
    }

    #All product will be inactive
	public function inactiveProducts( $where = false ){

		$data = [
            'status' => 'I'
        ];

        $this->db->where( 'dealer_id', BHC );
        $this->db->update($this->table, $data); 
    }

    public function ifProductExists( $upc, $code ) {

        $this->db->select('id,count(*) as counts');
        $this->db->where('upc', $upc );
        $this->db->where('code', $code );
        $this->db->where('dealer_id', BHC );
        $this->db->from($this->table);
        $result = $this->db->get();
        echo $this->db->last_query();
		return $result->result_array(); 
        // return $countRecord = $this->db->count_all_results();

        // if ($countRecord == '0' ) {
            
        //     $this->db->insert($this->table, $data);
        //     echo $this->db->last_query();
        //     return ;
        // }
        // else {
        //     unset($data['upc']);
        //     $this->db->set($data);
        //     $this->db->where('upc', $upc);
        //      $this->db->update($this->table);
        //      echo $this->db->last_query();
        //      return;
        // }
    }

    public function productInsertBatch( $data ) {
        echo $this->db->last_query();
        $this->db->insert_batch($this->table, $data);
        return;
    }

    public function productUpdaBatch( $data ) {
        echo $this->db->last_query();
        $this->db->update_batch($this->table, $data, 'id'); 
        return;
    }

    function updatefilename($id, $data)
    {
        $this->db->where('dealer_id', $id);
        $this->db->update('dealer_files', $data); 
        return($this->db->affected_rows() > 0)? true:false;
    }

    function getCategoryCode($category)
    {
        switch ($category) {
            case ("H600"):
                $list['category'] = 'FIREARM';
                $list['subcategory'] = 'RIFLES';
                return $list;
                break;
            case ("H601"):
                $list['category'] = 'FIREARM';
                $list['subcategory'] = 'SHOTGUN';
                return $list;
                break;
            case ("H602"):
                $list['category'] = 'FIREARM';
                $list['subcategory'] = 'PISTOLS';
                return $list;
                break;
            case ("H603"):
                $list['category'] = 'FIREARM';
                $list['subcategory'] = 'REVOLVERS';
                return $list;
                break;
            case ("H605"):
                $list['category'] = 'GUNPRTS';
                $list['subcategory'] = 'ACTION_KITS';
                return $list;
                break;
            case ("H606"):
                $list['category'] = 'NFAITEM';
                $list['subcategory'] = 'SUPPRESSORS';
                return $list;
                break;
            case ("H607"):
                $list['category'] = 'NFAITEM';
                $list['subcategory'] = 'SHORT_BBL_RIFLES_SOT';
                return $list;
                break;
            case ("H608"):
                $list['category'] = 'NFAITEM';
                $list['subcategory'] = 'SHORT_BBL_SHOTGUNS_SOT';
                return $list;
                break;
            case ("H610"):
                $list['category'] = 'AMMO';
                $list['subcategory'] = 'CENTERFIRE_ROUNDS';
                return $list;
                break;
            case ("H619"):
                $list['category'] = 'MAGAZIN';
                $list['subcategory'] = 'MAGAZINES';
                return $list;
                break;
            case ("H631"):
                $list['category'] = 'GUNPRTS';
                $list['subcategory'] = 'HANDGUN_BARRELS';
                return $list;
                break;
            case ("H645"):
                $list['category'] = 'OPTICSS';
                $list['subcategory'] = 'RIFLE_SCOPES';
                return $list;
                break;
            case ("H646"):
                $list['category'] = 'OPTICSS';
                $list['subcategory'] = 'SCOPE_ACCESSORIES';
                return $list;
                break;
            case ("H647"):
                $list['category'] = 'AMMO';
                $list['subcategory'] = 'RIFLE_SCOPES';
                return $list;
                break;
            case ("H648"):
                $list['category'] = 'FIREARM';
                $list['subcategory'] = 'AIR_GUN_RIFLES';
                return $list;
                break;
            case ("H649"):
                $list['category'] = 'ACSRIES';
                $list['subcategory'] = 'BLACK_POWDER_KITS';
                return $list;
                break;
            case ("H650"):
                $list['category'] = 'GEARS';
                $list['subcategory'] = 'CLEANING_SOLVENTS_LUBRICANTS';
                return $list;
                break;
            case ("H655"):
                $list['category'] = 'RELOAD';
                $list['subcategory'] = 'RELOADING_BULLETS';
                return $list;
                break;
            case ("H656"):
                $list['category'] = 'RELOAD';
                $list['subcategory'] = 'RELOADING_ACCESSORIES';
                return $list;
                break;
            case ("H659"):
                $list['category'] = 'GEARS';
                $list['subcategory'] = 'GUN_CASES';
                return $list;
                break;
            case ("H660"):
                $list['category'] = 'ACSRIES';
                $list['subcategory'] = 'AIR_GUN_ACCESSORIES';
                return $list;
                break;
            case ("H661"):
                $list['category'] = 'KNIVES';
                $list['subcategory'] = 'KNIVES_AND_TOOLS';
                return $list;
                break;
            case ("H665"):
                $list['category'] = 'GEARS';
                $list['subcategory'] = 'GAME_CALLS';
                return $list;
                break;
            case ("H680"):
                $list['category'] = 'ARCHERY';
                $list['subcategory'] = 'ARCHERY_ACCESSORIES';
                return $list;
                break;
            case ("H699"):
                $list['category'] = 'GEARS';
                $list['subcategory'] = 'SAFES_VAULTS';
                return $list;
                break;
            case ("H700"):
                $list['category'] = 'GEARS';
                $list['subcategory'] = 'APPAREL';
                return $list;
                break;
            case ("H701"):
                $list['category'] = 'GEARS';
                $list['subcategory'] = 'HUNTING_ELECTRONICS';
                return $list;
                break;
            case ("H702"):
                $list['category'] = 'GEARS';
                $list['subcategory'] = 'DECOYS';
                return $list;
                break;
            case ("H999"):
                $list['category'] = 'ACSRIES';
                $list['subcategory'] = 'DISPLAYS';
                return $list;
                break;
            case ("MISC"):
                $list['category'] = 'ACSRIES';
                $list['subcategory'] = '';
                return $list;
                break;
            default:
               return [];
        }
    }

    function getShippingfee($categorycode)
    {
        switch ($categorycode) {
            case ("ACSRIES" || "ARCHERY" || "FISHING" || "GUNPRTS" || "GEARS" || "KNIVESS" || "MAGAZINES" || "OPTICSS"):
                return '8.95';
                break;
            case ("AMMO" || "RELOAD"):
                return '10.95';
                break;
            case ("FIREARM" || "NFAITEM"):
                return '14.95';
                break;
            default:
               return '0';
        }
    }

    public function getIdUpc( $upc ) {
        $this->db->select('id,upc');
        $this->db->where('upc', $upc );
        $this->db->where('dealer_id', BHC );
        $this->db->from($this->table);
        $result = $this->db->get();
		return $result->row_array(); 
    }

    public function productDescription( $id, $description ) {

        $this->db->select('count(*) as counts');
        $this->db->where('product_id', $id );
        $this->db->from($this->table4);
        $result = $this->db->get();
        $ifExists = $result->row_array(); 

        if ($ifExists['counts'] == '0') {
            $this->db->insert($this->table4,  ['product_id' => $id, 'descriptions' => $description, 'status' => 'A' ] );
            echo $this->db->last_query();
            return;
        }
        else {
            $this->db->set('descriptions', $description);
            $this->db->set('status', 'A');
            $this->db->where('product_id', $id);
            $this->db->update($this->table4);
            echo $this->db->last_query();
            return;
        }
        
    }
}