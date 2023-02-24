<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promocode_model extends CI_Model {

	
	public function getAllPromocodes()
	{
		return $this->db->get("tbl_promo_codes")->result_array();
		
	}
	function getSinglePromocode($id){
			$this->db->where("id",$id);
		return $this->db->get("tbl_promo_codes")->row_array();
	}
}
