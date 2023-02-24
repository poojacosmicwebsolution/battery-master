<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area_model extends CI_Model {

	
	public function getAllAreas()
	{
		$this->db->select("a.*,c.city");
		$this->db->join("tbl_cities c",'c.id = a.city_id','left');
		return $this->db->get("tbl_area a")->result_array();
		
	}
	public function getAllCities()
	{
		return $this->db->get("tbl_cities")->result_array();
		
	}
	function getSingleArea($id){
			$this->db->where("id",$id);
		return $this->db->get("tbl_area")->row_array();
	}
	function getSingleCity($id){
			$this->db->where("id",$id);
		return $this->db->get("tbl_cities")->row_array();
	}
}
