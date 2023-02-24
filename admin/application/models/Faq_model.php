<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq_model extends CI_Model {

	
	public function getAllFaq()
	{
		return $this->db->get("tbl_faq")->result_array();
		
	}
	function getSingleFaq($id){
			$this->db->where("id",$id);
		return $this->db->get("tbl_faq")->row_array();
	}
}
