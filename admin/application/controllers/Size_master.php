<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Size_master extends CI_Controller {

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
		$data['sizes'] = $this->getAllSizes();	
		$this->load->view('sizes/sizes-list',$data);
	}
	public function add()
	{
		
		$this->load->view('sizes/sizes-add');
	}
	public function add_size(){
		if(!empty($this->input->post('size_name'))){

		if(!empty($this->input->post('id'))){


	    	$ins = array(
	    		"size_name"=>$this->input->post('size_name'),
	    		"display_order"=>$this->input->post('display_order'),
	    	);
	    	$this->db->where("id",$this->input->post("id"));
	    	$this->db->update("tbl_sizes",$ins);
	    	$this->session->set_flashdata("success","Size Updated Successfully");
		}else{
			$ins = array(
	    		"size_name"=>$this->input->post('size_name'),
	    		"display_order"=>$this->input->post('display_order'),
	    		// "created"=>date("Y-m-d H:i:s"),
	    	);
	    	$this->db->insert("tbl_sizes",$ins);
	    	$this->session->set_flashdata("success","Size Added Successfully");
		}
		}else{
			$this->session->set_flashdata("error","Size Name cannot be empty");
		}
    	redirect(base_url("Size_master"));
                       
               
	}
	public function edit($id)
	{
		$data = array();
		$data['size'] = $this->getSingleSize($id);
		$this->load->view('sizes/sizes-add',$data);
	}
	public function getAllSizes(){
		return $this->db->get("tbl_sizes")->result_array();
	}
	public function getSingleSize($id){
		$this->db->where("id",$id);
		return $this->db->get("tbl_sizes")->row_array();
	}
	public function delete($id){
		$this->db->where("id",$id);
		$this->db->delete("tbl_sizes");
		$this->session->set_flashdata("success","Size Deleted Successfully");
		redirect(base_url("Size_master"));
	}

}
