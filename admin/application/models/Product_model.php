<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

	
	public function getAllProducts()
	{
		return $this->db->get("tbl_products")->result_array();
		
	}
	function getSingleProduct($id){
			$this->db->where("id",$id);
		return $this->db->get("tbl_products")->row_array();
	}
	function getProductVariants($product_id){
		$this->db->where("product_id",$product_id);
		return $this->db->get("tbl_product_variants")->result_array();
	}

	function getProductAttributes($product_id){
		$this->db->select("pa.*,a.name as attribute_name");
		$this->db->where("pa.product_id",$product_id);
		$this->db->join("tbl_attributes a",'a.id=pa.attribute_id','left');
		return $this->db->get("tbl_product_attributes pa")->result_array();
	}
	function getProductVariantOn_Off($id){
			$this->db->where("id",$id);
		return $this->db->get("tbl_product_variants")->row_array();
	}
}
