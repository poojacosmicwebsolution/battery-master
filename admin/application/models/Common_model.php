<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model {

	function checkUser($data){
		$this->db->where("social_id",$data['oauth_uid']);
		$this->db->where("social_type",$data['oauth_provider']);
		$res = $this->db->get("tbl_users");
		if($res->num_rows() > 0){
			return $res->row_array();
		}else{

			if(!empty($data['email'])){
				$this->db->where("email",$data['email']);
				$res = $this->db->get("tbl_users")->row_array();
				if($res){
					$in = array(
						"social_type"=>$data['oauth_provider'],
						"social_id"=>$data['oauth_uid'],
						"social_data"=>json_encode($data),
					);
					$this->db->where("id",$res['id']);
					$this->db->update("tbl_users",$in);

					$this->db->where("id",$res['id']);
					return $this->db->get("tbl_users")->row_array();

				}else{
					$in = array(
						"username"=>$data['first_name']." ".$data['last_name'],
						"email"=>$data['email'],
						"social_type"=>$data['oauth_provider'],
						"social_id"=>$data['oauth_uid'],
						"social_data"=>json_encode($data),
					);
					$this->db->insert("tbl_users",$in);
					$last_id = $this->db->insert_id();

					$this->db->where("id",$last_id);
					return $this->db->get("tbl_users")->row_array();

				}
			}else{

				$in = array(
					"username"=>$data['first_name']." ".$data['last_name'],
					"email"=>$data['email'],
					"social_type"=>$data['oauth_provider'],
					"social_id"=>$data['oauth_uid'],
					"social_data"=>json_encode($data),
				);
				$this->db->insert("tbl_users",$in);
				$last_id = $this->db->insert_id();

				$this->db->where("id",$last_id);
				return $this->db->get("tbl_users")->row_array();
			}

		}
	}
	
	public function getAllMedia()
	{
		return $this->db->get("tbl_media")->result_array();
		
	}
	public function getSetting($variable,$jsonConvert = false)
	{
		$data =  $this->db->where("variable",$variable)->get("tbl_settings")->row_array();
		// return $data["value"];
		return $jsonConvert ? json_decode($data['value'],true) : $data['value'];
		
	}
	public function getAllTaxes(){
		return $this->db->get("tbl_taxes")->result_array();
	}
	function getSingleSlider($id){
			$this->db->where("id",$id);
		return $this->db->get("tbl_slider")->row_array();
	}
	
	function getAllDistributor(){
			
		return $this->db->get("tbl_distributor")->result_array();
	}
	
	function getAllRetailer(){
			
		return $this->db->get("tbl_retailer")->result_array();
	}
	
	function getAllstore(){
	    return $this->db->get("tbl_store")->result_array();
	}
	function getSingleStore($id){
	    $this->db->where("id",$id);
		return $this->db->get("tbl_store")->row_array();
	}
}
