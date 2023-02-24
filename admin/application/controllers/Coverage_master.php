<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coverage_master extends CI_Controller {

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
		$data['coverage'] = $this->getAllCoverage();	
		$this->load->view('coverage/coverage-list',$data);
	}
	public function add()
	{
		
		$this->load->view('coverage/coverage-add');
	}
	public function add_coverage(){
		if(!empty($this->input->post('coverage_name'))){

		if(!empty($this->input->post('id'))){


	    	$ins = array(
	    		"coverage_name"=>$this->input->post('coverage_name'),
	    		"display_order"=>$this->input->post('display_order'),
	    	);
	    	$this->db->where("id",$this->input->post("id"));
	    	$this->db->update("tbl_coverage",$ins);
	    	$this->session->set_flashdata("success","coverage Updated Successfully");
		}else{
			$ins = array(
	    		"coverage_name"=>$this->input->post('coverage_name'),
	    		"display_order"=>$this->input->post('display_order'),
	    		// "created"=>date("Y-m-d H:i:s"),
	    	);
	    	$this->db->insert("tbl_coverage",$ins);
	    	$this->session->set_flashdata("success","coverage Added Successfully");
		}
		}else{
			$this->session->set_flashdata("error","coverage Name cannot be empty");
		}
    	redirect(base_url("coverage_master"));
                       
               
	}
	public function edit($id)
	{
		$data = array();
		$data['coverage'] = $this->getSinglecoverage($id);
		$this->load->view('coverage/coverage-add',$data);
	}
	public function getAllCoverage(){
		return $this->db->get("tbl_coverage")->result_array();
	}
	public function getSinglecoverage($id){
		$this->db->where("id",$id);
		return $this->db->get("tbl_coverage")->row_array();
	}
	public function delete($id){
		$this->db->where("id",$id);
		$this->db->delete("tbl_coverage");
		$this->session->set_flashdata("success","coverage Deleted Successfully");
		redirect(base_url("coverage_master"));
	}

}
