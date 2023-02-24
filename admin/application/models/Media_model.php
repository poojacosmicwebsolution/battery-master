<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media_model extends CI_Model {

	
	public function getAllMedia()
	{
		return $this->db->get("tbl_media")->result_array();
		
	}
}
