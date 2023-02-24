<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Size_calculator extends CI_Controller {

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
		$this->load->view('size-calculator/size-cal-list',$data);
	}
	public function add()
	{
		
		$this->load->view('size-calculator/add-size-cal');
	}
	public function add_size(){
		if(!empty($this->input->post('bust_size'))){
		    
		  //  $bust_size=$this->input->post('bust_size');
		  // $bust_arr = implode(",",$bust_size);
		    
		  //  $band_size=$this->input->post('band_size');
		  // $band_arr = implode(",",$band_size);

		if(!empty($this->input->post('id'))){
            

	    	$ins = array(
	    		"bust_size"=>$this->input->post('bust_size'),
	    		"b_size"=>$this->input->post('b_size'),
	    		"band_size"=>$this->input->post('band_size'),
	    		"cup"=>$this->input->post('cup'),
	    	);
	    	$this->db->where("id",$this->input->post("id"));
	    	$this->db->update("tbl_size_calculator",$ins);
	    	$this->session->set_flashdata("success","Size Updated Successfully");
		}else{
			$ins = array(
	    		"bust_size"=>$this->input->post('bust_size'),
	    		"b_size"=>$this->input->post('b_size'),
	    		"band_size"=>$this->input->post('band_size'),
	    		"cup"=>$this->input->post('cup'),
	    	);
	    	$this->db->insert("tbl_size_calculator",$ins);
	    	$this->session->set_flashdata("success","Size Added Successfully");
		}
		}else{
			$this->session->set_flashdata("error","Size Name cannot be empty");
		}
    	redirect(base_url("Size_calculator"));
                       
               
	}
	public function edit($id)
	{
		$data = array();
		$data['size'] = $this->getSingleSize($id);
		$this->load->view('size-calculator/add-size-cal',$data);
	}
	public function getAllSizes(){
		return $this->db->get("tbl_size_calculator")->result_array();
	}
	public function getSingleSize($id){
		$this->db->where("id",$id);
		return $this->db->get("tbl_size_calculator")->row_array();
	}
	public function delete($id){
		$this->db->where("id",$id);
		$this->db->delete("tbl_size_calculator");
		$this->session->set_flashdata("success","Size Deleted Successfully");
		redirect(base_url("Size_calculator"));
	}

}
