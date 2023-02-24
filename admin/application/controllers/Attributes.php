<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attributes extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(empty($this->session->userdata('aid'))){
			redirect(base_url("Auth"));
		}
	}

	public function index()
	{
		// print_r($this->session->userdata());die;
		$data = array();
		$data['attributes'] = $this->getAllAttributes();	
		$this->load->view('attributes/attributes-list',$data);
	}
	public function add()
	{
		
		$this->load->view('attributes/attributes-add');
	}
	public function add_attribute(){
		if(!empty($this->input->post('attribute'))){

		if(!empty($this->input->post('id'))){


	    	$ins = array(
	    		"name"=>$this->input->post('attribute'),
	    	);
	    	$this->db->where("id",$this->input->post("id"));
	    	$this->db->update("tbl_attributes",$ins);
	    	$this->session->set_flashdata("success","Attribute Updated Successfully");
		}else{
			$ins = array(
	    		"name"=>$this->input->post('attribute'),
	    		"created"=>date("Y-m-d H:i:s"),
	    	);
	    	$this->db->insert("tbl_attributes",$ins);
	    	$this->session->set_flashdata("success","Attribute Added Successfully");
		}
		}else{
			$this->session->set_flashdata("error","Attribute Name cannot be empty");
		}
    	redirect(base_url("Attributes"));
                       
               
	}
	public function edit($id)
	{
		$data = array();
		$data['attribute'] = $this->getSingleAttribute($id);
		$this->load->view('attributes/attributes-edit',$data);
	}
	public function getAllAttributes(){
		return $this->db->get("tbl_attributes")->result_array();
	}
	public function getSingleAttribute($id){
		$this->db->where("id",$id);
		return $this->db->get("tbl_attributes")->row_array();
	}
	public function delete($id){
		$this->db->where("id",$id);
		$this->db->delete("tbl_attributes");
		$this->session->set_flashdata("success","Attribute Deleted Successfully");
		redirect(base_url("Attributes"));
	}

}
