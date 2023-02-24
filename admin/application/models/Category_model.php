<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

	
	public function getAllCategories()
	{
		return $this->db->get("tbl_categories")->result_array();
		
	}
	public function getCategories(){
		return $this->db->where('parent_id','0')->get("tbl_categories")->result_array();
	}
	function getSingleCategory($id){
			$this->db->where("id",$id);
		return $this->db->get("tbl_categories")->row_array();
	}
}
