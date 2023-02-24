<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fabric_master extends CI_Controller {

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
		$data['fabric'] = $this->getAllFabric();	
		$this->load->view('fabric/fabric-list',$data);
	}
	public function add()
	{
		
		$this->load->view('fabric/fabric-add');
	}
	public function add_fabric(){
		if(!empty($this->input->post('fabric_name'))){

		if(!empty($this->input->post('id'))){


	    	$ins = array(
	    		"fabric_name"=>$this->input->post('fabric_name'),
	    		"display_order"=>$this->input->post('display_order'),
	    	);
	    	$this->db->where("id",$this->input->post("id"));
	    	$this->db->update("tbl_fabric",$ins);
	    	$this->session->set_flashdata("success","Fabric Updated Successfully");
		}else{
			$ins = array(
	    		"fabric_name"=>$this->input->post('fabric_name'),
	    		"display_order"=>$this->input->post('display_order'),
	    		// "created"=>date("Y-m-d H:i:s"),
	    	);
	    	$this->db->insert("tbl_fabric",$ins);
	    	$this->session->set_flashdata("success","Fabric Added Successfully");
		}
		}else{
			$this->session->set_flashdata("error","Fabric Name cannot be empty");
		}
    	redirect(base_url("Fabric_master"));
                       
               
	}
	public function edit($id)
	{
		$data = array();
		$data['size'] = $this->getSingleSize($id);
		$this->load->view('fabric/fabric-add',$data);
	}
	public function getAllFabric(){
		return $this->db->get("tbl_fabric")->result_array();
	}
	public function getSingleSize($id){
		$this->db->where("id",$id);
		return $this->db->get("tbl_fabric")->row_array();
	}
	public function delete($id){
		$this->db->where("id",$id);
		$this->db->delete("tbl_sizes");
		$this->session->set_flashdata("success","Fabric Deleted Successfully");
		redirect(base_url("Fabric_master"));
	}

}
