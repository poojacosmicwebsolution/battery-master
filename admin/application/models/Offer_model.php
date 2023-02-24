<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offer_model extends CI_Model {

	
	public function getAllOffer()
	{
		$this->db->select("*");
		$this->db->order_by("off.id","DESC");
// 		$this->db->join("tbl_categories c","c.id=off.category_id","left");
		return $this->db->get("tbl_offer_text off")->result_array();
		
	}
// 		public function getAllOffer()
// 	{
// 		$this->db->select("off.*,c.id as cat_id,c.name");
// 		$this->db->order_by("off.id","DESC");
// 		$this->db->join("tbl_categories c","c.id=off.category_id","left");
// 		return $this->db->get("tbl_offer_text off")->result_array();
		
// 	}
	function getSingleoffer($id){
			$this->db->where("id",$id);
		return $this->db->get("tbl_offer_text")->row_array();
	}
	
}
