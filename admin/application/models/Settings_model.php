<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {

	
	public function getSetting($variable,$jsonConvert = false)
	{
		$data =  $this->db->where("variable",$variable)->get("tbl_settings")->row_array();
		// return $data["value"];
		 if(!empty($data)){

			return $jsonConvert ? json_decode($data['value'],true) : $data['value'];
		}else{
			return false;
		}

	}

	
}