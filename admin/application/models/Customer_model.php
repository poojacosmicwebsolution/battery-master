<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {

	
	public function getAllCustomer()
	{
		return $this->db->get("tbl_users")->result_array();
		
	}
	public function getAllCustomerAddress()
	{
		$this->db->select("ua.*,u.*");
		$this->db->join("tbl_users u","u.id=ua.user_id","left");
		return $this->db->get("tbl_address ua")->result_array();
		
	}
	
	public function getUserDetails($id)
	{
		return $this->db->where('id',$id)->get("tbl_users")->result_array();
		
	}

	public function getUserAddress($id)
	{
		return $this->db->where('user_id',$id)->get("tbl_address")->result_array();
		
	}
}
