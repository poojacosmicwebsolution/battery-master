<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(empty($this->session->userdata('aid'))){
			redirect(base_url("Auth"));
		}
		$this->load->model("Faq_model",'fm');
	}

	public function index()
	{
		// print_r($this->session->userdata());die;
		$data = array();
		$data['faq'] = $this->fm->getAllFaq();	
		$this->load->view('faq/faq-list',$data);
	}
	public function add()
	{
		$data = array();
		$this->load->view('faq/faq-add',$data);
	}
	public function add_faq(){
		if(!empty($this->input->post('question'))){

		if(!empty($this->input->post('id'))){


	    	$ins = array(
	    		"question"=>$this->input->post('question'),
	    		"answer"=>$this->input->post('answer'),
	    		"modified"=>date("Y-m-d H:i:s"),
	    	);
	    	$this->db->where("id",$this->input->post("id"));
	    	$this->db->update("tbl_faq",$ins);
	    	$this->session->set_flashdata("success","FAQ Updated Successfully");
		}else{
				
			$ins = array(
	    		"question"=>$this->input->post('question'),
	    		"answer"=>$this->input->post('answer'),
	    		"created"=>date("Y-m-d H:i:s"),
	    	);
	    	$this->db->insert("tbl_faq",$ins);
	    	$this->session->set_flashdata("success","FAQ Added Successfully");
		}
		}else{
			$this->session->set_flashdata("error","Question Name cannot be empty");
		}
    	redirect(base_url("Faq"));
                       
               
	}
	public function edit($id)
	{
		$data = array();
		$data['faq'] = $this->fm->getSingleFaq($id);
		$this->load->view('faq/faq-add',$data);
	}
	public function delete($id){
		$this->db->where("id",$id);
		$this->db->delete("tbl_faq");
		$this->session->set_flashdata("success","FAQ Deleted Successfully");
		redirect(base_url("Faq"));
	}

}
