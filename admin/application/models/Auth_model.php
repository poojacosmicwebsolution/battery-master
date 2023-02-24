<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	
	public function getAdminByUsername($username)
	{
		$this->db->where("username",$username);
		$res = $this->db->get("tbl_admin");
		if($res->num_rows() == 1){
			return $res->row_array();
		}else{
			return false;
		}
	}
}
