<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(empty($this->session->userdata('aid'))){
			redirect(base_url("Auth"));
		}
		$this->load->model("Settings_model",'sm');
	}

	public function web()
	{
		// print_r($this->session->userdata());die;
		$data = array();
		$data['admin_logo'] = $this->sm->getSetting('admin_logo');
		$data['frontend_logo'] = $this->sm->getSetting('frontend_logo');
		$data['min_cart_amount'] = $this->sm->getSetting('min_cart_amount');
		$data['min_free_delivery_amount'] = $this->sm->getSetting('min_free_delivery_amount');
		$data['web_settings'] = $this->sm->getSetting('web_settings',true);
		$this->load->view('settings/web-settings',$data);
	}

	public function update_web_settings(){
		$post = $this->input->post();

		if(!empty($post)){

			if(!empty($this->input->post('web_logo'))){
				$web_logo = $this->input->post('web_logo');
				// print_r($this->sm->getSetting('web_logo'));die;
				if($this->sm->getSetting('web_logo',false) != false){
					 $this->db->where("variable",'web_logo');
					 $this->db->set("value",$web_logo);
					 $res =$this->db->update("tbl_settings");
					
				}else{
					$insert = array("variable"=>"web_logo","value"=>$web_logo);
					 $res =$this->db->insert("tbl_settings",$insert);
				}

			}

			if(!empty($this->input->post('min_cart_amount'))){
				$min_cart_amount = $this->input->post('min_cart_amount');
				// print_r($this->sm->getSetting('web_logo'));die;
				if($this->sm->getSetting('min_cart_amount',false) != false){
					 $this->db->where("variable",'min_cart_amount');
					 $this->db->set("value",$min_cart_amount);
					 $res =$this->db->update("tbl_settings");
					
				}else{
					$insert = array("variable"=>"min_cart_amount","value"=>$min_cart_amount);
					 $res =$this->db->insert("tbl_settings",$insert);
				}

			}

// 			if(!empty($this->input->post('referal_bonus'))){
// 				 $referal_bonus = $this->input->post('referal_bonus');
				
// 				// print_r($this->sm->getSetting('web_logo'));die;
// 				if($this->sm->getSetting('referal_bonus',false) != false){
// 					 $this->db->where("variable",'referal_bonus');
// 					 $this->db->set("value",$referal_bonus);
// 					 $res =$this->db->update("tbl_settings");
					 
					 
					
// 				}else{
// 					$insert = array("variable"=>"referal_bonus","value"=>$referal_bonus);
// 					 $res =$this->db->insert("tbl_settings",$insert);
// 				}

// 			}

			$json = json_encode($post);
			if($this->sm->getSetting("web_settings")){
				 $this->db->where("variable",'web_settings');
				 $this->db->set("value",$json);
				 $res =$this->db->update("tbl_settings");
				 if($res){
				 	$this->session->set_flashdata("success","Web settings Updated Successfully");
				 }else{
				 	$this->session->set_flashdata("error","Error while updating Web settings");

				 }
			}else{
				$insert = array("variable"=>"web_settings","value"=>$json);
				 $res =$this->db->insert("tbl_settings",$insert);
				 if($res){
				 	$this->session->set_flashdata("success","Web settings Added Successfully");
				 }else{
				 	$this->session->set_flashdata("error","Error while Adding Web settings");

				 }
			}
		}else{
			$this->session->set_flashdata("error","Please fill the form correctly");
		}
		redirect(base_url("Settings/web"));
	}
	

}
