<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(empty($this->session->userdata('aid'))){
			redirect(base_url("Auth"));
		}
		$this->load->model("Common_model",'cm');
		// $this->load->model("Media_model",'mm');
	}

	public function index()
	{
		// print_r($this->session->userdata());die;
		$data = array();
		$data['store'] = $this->cm->getAllstore();	
		$this->load->view('store/store_list',$data);
	}
	
		public function add()
	{
		$data = array();
		$data['store'] = $this->cm->getAllstore();	
		
		$this->load->view('store/store_add',$data);
	}
	public function add_store(){
		if(!empty($this->input->post('title'))){

		if(!empty($this->input->post('id'))){


	    	$ins = array(
	    		"title"=>$this->input->post('title'),
	    		"lat"=>$this->input->post('lat'),
	    		"log"=>$this->input->post('log'),
	    		"address"=>$this->input->post('address'),
	    	);
	    	$this->db->where("id",$this->input->post("id"));
	    	$this->db->update("tbl_store",$ins);
	    	$this->session->set_flashdata("success","Store Updated Successfully");
		}else{
				// $this->load->helper('text');
				// $this->load->helper('url');
				// $slug = url_title(convert_accented_characters($this->input->post('category_name')), 'dash', true);
			$ins = array(
	    		"title"=>$this->input->post('title'),
	    		"lat"=>$this->input->post('lat'),
	    		"log"=>$this->input->post('log'),
	    		"address"=>$this->input->post('address'),
	    	);
	    	$this->db->insert("tbl_store",$ins);
	    	$this->session->set_flashdata("success","Store Added Successfully");
		}
		}else{
			$this->session->set_flashdata("error","Store Name cannot be empty");
		}
    	redirect(base_url("Store"));
                       
               
	}
	public function edit($id)
	{
		$data = array();
		$data['sstore'] = $this->cm->getSingleStore($id);
	    $data['store'] = $this->cm->getAllstore();	
		$this->load->view('store/store_add',$data);
	}
	public function delete($id){
		$this->db->where("id",$id);
		$this->db->delete("tbl_store");
		$this->session->set_flashdata("success","Store Deleted Successfully");
		redirect(base_url("Store"));
	}
	
}