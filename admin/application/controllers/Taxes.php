<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Taxes extends CI_Controller {

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
		$data['taxes'] = $this->getAllTaxes();	
		$this->load->view('taxes/taxes-list',$data);
	}
	public function add()
	{
		
		$this->load->view('taxes/taxes-add');
	}
	public function add_tax(){
		if(!empty($this->input->post('tax_name'))){

		if(!empty($this->input->post('id'))){


	    	$ins = array(
	    		"tax_name"=>$this->input->post('tax_name'),
	    		"percentage"=>$this->input->post('percentage'),
	    	);
	    	$this->db->where("id",$this->input->post("id"));
	    	$this->db->update("tbl_taxes",$ins);
	    	$this->session->set_flashdata("success","Tax Updated Successfully");
		}else{
			$ins = array(
	    		"tax_name"=>$this->input->post('tax_name'),
	    		"percentage"=>$this->input->post('percentage'),
	    		// "created"=>date("Y-m-d H:i:s"),
	    	);
	    	$this->db->insert("tbl_taxes",$ins);
	    	$this->session->set_flashdata("success","Tax Added Successfully");
		}
		}else{
			$this->session->set_flashdata("error","Tax Name cannot be empty");
		}
    	redirect(base_url("Taxes"));
                       
               
	}
	public function edit($id)
	{
		$data = array();
		$data['tax'] = $this->getSingleTax($id);
		$this->load->view('taxes/taxes-add',$data);
	}
	public function getAllTaxes(){
		return $this->db->get("tbl_taxes")->result_array();
	}
	public function getSingleTax($id){
		$this->db->where("id",$id);
		return $this->db->get("tbl_taxes")->row_array();
	}
	public function delete($id){
		$this->db->where("id",$id);
		$this->db->delete("tbl_taxes");
		$this->session->set_flashdata("success","Attribute Deleted Successfully");
		redirect(base_url("Taxes"));
	}

}
