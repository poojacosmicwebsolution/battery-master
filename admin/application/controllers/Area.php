<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(empty($this->session->userdata('aid'))){
			redirect(base_url("Auth"));
		}
		$this->load->model("Area_model",'am');
		$this->load->model("Media_model",'mm');
	}

	public function index()
	{
		// print_r($this->session->userdata());die;
		$data = array();
		$data['area'] = $this->am->getAllAreas();	
		$this->load->view('area/area-list',$data);
	}
	public function city()
	{
		// print_r($this->session->userdata());die;
		$data = array();
		$data['cities'] = $this->am->getAllCities();	
		$this->load->view('area/cities-list',$data);
	}
	public function add_city()
	{
		$data = array();
		// $data['media'] = $this->mm->getAllMedia();
		// $data['categories'] = $this->cm->getCategories();
		$this->load->view('area/cities-add',$data);
	}
	public function add_area()
	{
		$data = array();
		$data['cities'] = $this->am->getAllCities();
		// $data['categories'] = $this->cm->getCategories();
		$this->load->view('area/area-add',$data);
	}
	public function add_city_db(){
		if(!empty($this->input->post('city'))){

		if(!empty($this->input->post('id'))){


	    	$ins = array(
	    		"city"=>$this->input->post('city'),
	    		"modified"=>date("Y-m-d H:i:s"),
	    	);
	    	$this->db->where("id",$this->input->post("id"));
	    	$this->db->update("tbl_cities",$ins);
	    	$this->session->set_flashdata("success","City Updated Successfully");
		}else{
				
			$ins = array(
	    		"city"=>$this->input->post('city'),
	    		"created"=>date("Y-m-d H:i:s"),
	    	);
	    	$this->db->insert("tbl_cities",$ins);
	    	$this->session->set_flashdata("success","City Added Successfully");
		}
		}else{
			$this->session->set_flashdata("error","City Name cannot be empty");
		}
    	redirect(base_url("Area/city"));
                       
               
	}
	public function add_area_db(){
		if(!empty($this->input->post('area'))){

		if(!empty($this->input->post('id'))){


	    	$ins = array(
	    		"area"=>$this->input->post('area'),
	    		"city_id"=>$this->input->post('city_id'),
	    		"pincode"=>$this->input->post('pincode'),
	    		"delivery_charges"=>$this->input->post('delivery_charges'),
	    		"modified"=>date("Y-m-d H:i:s"),
	    	);
	    	$this->db->where("id",$this->input->post("id"));
	    	$this->db->update("tbl_area",$ins);
	    	$this->session->set_flashdata("success","Area Updated Successfully");
		}else{
				
			$ins = array(
	    		"area"=>$this->input->post('area'),
	    		"city_id"=>$this->input->post('city_id'),
	    		"pincode"=>$this->input->post('pincode'),
	    		"delivery_charges"=>$this->input->post('delivery_charges'),
	    		"created"=>date("Y-m-d H:i:s"),
	    	);
	    	$this->db->insert("tbl_area",$ins);
	    	$this->session->set_flashdata("success","Area Added Successfully");
		}
		}else{
			$this->session->set_flashdata("error","Area Name cannot be empty");
		}
    	redirect(base_url("Area"));
                       
               
	}
	public function edit_city($id)
	{
		$data = array();
		$data['city'] = $this->am->getSingleCity($id);
		$this->load->view('area/cities-add',$data);
	}
	public function edit_area($id)
	{
		$data = array();
		$data['area'] = $this->am->getSingleArea($id);
		$data['cities'] = $this->am->getAllCities();
		$this->load->view('area/area-add',$data);
	}
	public function delete_city($id){
		$this->db->where("id",$id);
		$this->db->delete("tbl_cities");
		$this->session->set_flashdata("success","City Deleted Successfully");
		redirect(base_url("Area/city"));
	}
	public function delete_area($id){
		$this->db->where("id",$id);
		$this->db->delete("tbl_area");
		$this->session->set_flashdata("success","Area Deleted Successfully");
		redirect(base_url("Area"));
	}

}
