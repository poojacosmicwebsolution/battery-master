<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {

	
	public function getAllOrder()
	{
		$this->db->select("o.*,ad.user_id,ad.name,ad.phone,ad.area,ad.pincode,ad.city,ad.address1,ad.address2,u.username as customer_name");
		$this->db->join("tbl_users u","u.id=o.user_id","left");
		$this->db->join("tbl_address ad","ad.id=o.address_id","left");
		$this->db->order_by("o.id","ASC");
		return $this->db->get("tbl_orders o")->result_array();
		
	}
	public function getCategories(){
		return $this->db->where('parent_id','0')->get("tbl_categories")->result_array();
	}
	function getSingleCategory($id){
			$this->db->where("id",$id);
		return $this->db->get("tbl_categories")->row_array();
	}
	
	public function getAllOrderDetails($order_id)
	{
		$this->db->select("od.*,o.promo_discount,p.hsn_code,pa.code");
		$this->db->order_by("id","ASC");
		$this->db->join("tbl_orders o","o.id=od.order_id","left");
		$this->db->join("tbl_products p","p.id=od.product_id","left");
		$this->db->join("tbl_product_attributes pa","pa.id=od.attribute_id","left");
		$this->db->where("order_id",$order_id);
		return $this->db->get("tbl_order_details od")->result_array();
		
	}
	
		function getOrderDetailbyid($order_id){
			// $this->db->select("id");
			$this->db->where("id",$order_id);
		return $this->db->get("tbl_orders")->result_array();
	}
	function getOrderDetailbyidemail($id){
			// $this->db->select("id");
			$this->db->where("id",$id);
		return $this->db->get("tbl_orders")->result_array();
	}
	public function getAllOrderDetailss($order_id)
	{   
	    $this->db->select('od.*,p.hsn_code,pa.value');
		$this->db->from('tbl_order_details od');
		$this->db->join('tbl_products p', 'od.product_id = p.id');
	    $this->db->join("tbl_product_attributes pa","pa.id=od.attribute_id","left");
		$this->db->where("order_id",$order_id);
	    $query = $this->db->get(); 
	    if($query->num_rows() != 0)
	    {
	        return $query->result_array();
	    }
	    else
	    {
	        return false;
	    }

		// $this->db->select("o.*,u.username as customer_name");
// 		$this->db->where("order_id",$order_id);
// 		return $this->db->get("tbl_order_details")->result_array();
		
	}
}
