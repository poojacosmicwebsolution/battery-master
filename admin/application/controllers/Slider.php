<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(empty($this->session->userdata('aid'))){
			redirect(base_url("Auth"));
		}
		$this->load->model("Common_model",'cm');
		$this->load->model("Media_model",'mm');
	}

	public function index()
	{
		// print_r($this->session->userdata());die;
		$data = array();
		$data['slider'] = $this->getAllSlider();	
		$this->load->view('slider/slider-list',$data);
	}
	public function add()
	{
		$data = array();
		$data['media'] = $this->mm->getAllMedia();
		$this->load->view('slider/slider-add',$data);
	}
	public function add_slider(){
		if(!empty($this->input->post('slider'))){

		if(!empty($this->input->post('id'))){


	    	$ins = array(
	    		"slider"=>$this->input->post('slider'),
	    		"image"=>$this->input->post('path'),
	    		"href"=>$this->input->post('sliderlink'),
	    		"modified"=>date("Y-m-d H:i:s"),
	    	);
	    	$this->db->where("id",$this->input->post("id"));
	    	$this->db->update("tbl_slider",$ins);
	    	$this->session->set_flashdata("success","Slider Updated Successfully");
		}else{
			$ins = array(
	    		"slider"=>$this->input->post('slider'),
	    		"image"=>$this->input->post('path'),
	    		"href"=>$this->input->post('sliderlink'),
	    		"created"=>date("Y-m-d H:i:s"),
	    	);
	    	$this->db->insert("tbl_slider",$ins);
	    	$this->session->set_flashdata("success","SLider Added Successfully");
		}
		}else{
			$this->session->set_flashdata("error","Slider type cannot be empty");
		}
    	redirect(base_url("Slider"));
                       
               
	}
	public function edit($id)
	{
		$data = array();
		$data['slider'] = $this->getSingleSlider($id);
		$data['media'] = $this->mm->getAllMedia();
		$this->load->view('slider/slider-add',$data);
	}
	public function delete($id){
		$this->db->where("id",$id);
		$this->db->delete("tbl_slider");
		$this->session->set_flashdata("success","Slider Deleted Successfully");
		redirect(base_url("Slider"));
	}
	public function getAllSlider(){
		return $this->db->get("tbl_slider")->result_array();
	}
	function getSingleSlider($id){
			$this->db->where("id",$id);
		return $this->db->get("tbl_slider")->row_array();
	}
	
	public function show_on_home()
	{
		
		$cat_id=$this->input->post('value');
		
		 $shows =$this->cm->getSingleSlider($cat_id);
		 
		 
		 foreach($shows as $show){
		     
		     
		     
		if(($show['show_on_home']==1)){
				$id=0;
			}
			
			if(($show['show_on_home']==0)){
				$id=1;
			}
			
		 
		
		$ins = array(
	    		"show_on_home"=>$id
	    		
	    	);
		// print_r($ins);
		// echo json_encode($ins);
	    	$this->db->where("id",$cat_id);
	    	$this->db->update("tbl_slider",$ins);
	    	// 
	    	 // print_r($this->db->last_query());
	    	 
	}
	}

}
