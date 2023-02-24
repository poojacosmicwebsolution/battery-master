<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Padding_master extends CI_Controller {

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
		$data['padding'] = $this->getAllPadding();	
		$this->load->view('padding/padding-list',$data);
	}
	public function add()
	{
		
		$this->load->view('padding/padding-add');
	}
	public function add_padding(){
		if(!empty($this->input->post('padding_name'))){

		if(!empty($this->input->post('id'))){


	    	$ins = array(
	    		"padding_name"=>$this->input->post('padding_name'),
	    		"display_order"=>$this->input->post('display_order'),
	    	);
	    	$this->db->where("id",$this->input->post("id"));
	    	$this->db->update("tbl_Padding",$ins);
	    	$this->session->set_flashdata("success","Padding Updated Successfully");
		}else{
			$ins = array(
	    		"padding_name"=>$this->input->post('padding_name'),
	    		"display_order"=>$this->input->post('display_order'),
	    		// "created"=>date("Y-m-d H:i:s"),
	    	);
	    	$this->db->insert("tbl_padding",$ins);
	    	$this->session->set_flashdata("success","Padding Added Successfully");
		}
		}else{
			$this->session->set_flashdata("error","Padding Name cannot be empty");
		}
    	redirect(base_url("Padding_master"));
                       
               
	}
	public function edit($id)
	{
		$data = array();
		$data['padding'] = $this->getSinglePadding($id);
		$this->load->view('padding/padding-add',$data);
	}
	public function getAllPadding(){
		return $this->db->get("tbl_padding")->result_array();
	}
	public function getSinglePadding($id){
		$this->db->where("id",$id);
		return $this->db->get("tbl_padding")->row_array();
	}
	public function delete($id){
		$this->db->where("id",$id);
		$this->db->delete("tbl_padding");
		$this->session->set_flashdata("success","Padding Deleted Successfully");
		redirect(base_url("Padding_master"));
	}

}
