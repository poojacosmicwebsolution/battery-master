<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Return_model extends CI_Model {

	
	public function getAllReturn()
	{
		$this->db->select("r.*,u.username,o.order_no,od.product_name");
		$this->db->order_by("id","DESC");
		$this->db->join("tbl_users u","u.id=r.user_id","left");
		$this->db->join("tbl_orders o","o.id=r.order_id","left");
		$this->db->join("tbl_order_details od","od.id=r.order_detail_id","left");
		return $this->db->get("tbl_return_request r")->result_array();
		
	}
	
    public function getVideoDetails($id)
	{
		// $this->db->select("o.*,u.username as customer_name");
		$this->db->where("id",$id);
		$this->db->order_by("id","ASC");
		return $this->db->get("tbl_return_request")->result_array();
		
	}


	
}
