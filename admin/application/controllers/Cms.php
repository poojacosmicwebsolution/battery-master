<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(empty($this->session->userdata('aid'))){
			redirect(base_url("Auth"));
		}
		// $this->load->model("Cms_model",'cm');
		$this->load->model("Settings_model",'sm');
	}

	public function index()
	{
		// print_r($this->session->userdata());die;
		$data = array();
		$data['about_us'] = $this->sm->getSetting('about_us');
		$data['privacy_policy'] = $this->sm->getSetting('privacy_policy');
		$data['contact_us'] = $this->sm->getSetting('contact_us');
		$data['terms_and_conditions'] = $this->sm->getSetting('terms_and_conditions');
		$data['refund_policy'] = $this->sm->getSetting('refund_policy');
		// print_r($data);die;
		$this->load->view('cms/cms-list',$data);
	}
	public function update($key=""){
		if(!empty($key)){
			$checkExisting = $this->sm->getSetting($key);

			if($checkExisting){


		    	$ins = array(
		    		"value"=>$this->input->post('value'),
		    		"modified"=>date("Y-m-d H:i:s"),
		    	);
		    	$this->db->where("variable",$key);
		    	$this->db->update("tbl_settings",$ins);
		    	$this->session->set_flashdata("success","Data Updated Successfully");
			}else{
					
				$ins = array(
		    		"variable"=>$key,
		    		"value"=>$this->input->post('value'),
		    		"created"=>date("Y-m-d H:i:s"),
		    	);
		    	$this->db->insert("tbl_settings",$ins);
		    	$this->session->set_flashdata("success","Data Added Successfully");
			}
		}else{
			$this->session->set_flashdata("error","Key cannot be empty");
    		// redirect(base_url("Cms"));
		}
    	redirect(base_url("Cms"));
                       
               
	}
	

}
