<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System_users_model extends CI_Model {

	
	public function getAllSystemUsers()
	{
		return $this->db->get("tbl_admin")->result_array();
		
	}
	function getSingleSystemUser($id){
			$this->db->where("id",$id);
		return $this->db->get("tbl_admin")->row_array();
	}
}
