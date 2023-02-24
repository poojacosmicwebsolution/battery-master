<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offer extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(empty($this->session->userdata('aid'))){
			redirect(base_url("Auth"));
		}
		$this->load->model("Product_model",'pm');
		$this->load->model("Category_model",'cm');
		$this->load->model("Media_model",'mm');
		$this->load->model("Offer_model",'off');
	}

	public function index()
	{
		// print_r($this->session->userdata());die;
		$data = array();
		$data['offer'] = $this->off->getAllOffer();
		$this->load->view('offer/offer-list',$data);
	}
	public function add()
	{
		$data = array();
		$data['media'] = $this->mm->getAllMedia();
		$data['categories'] = $this->cm->getAllCategories();
		$this->load->view('offer/offer-add',$data);
	}
	public function add_offer(){

		if(!empty($this->input->post('id'))){
	    	$ins = array(
	    		"title"=>$this->input->post('title'),
	    		"text"=>$this->input->post('text'),
	    		"link"=>$this->input->post('link'),
	   // 		"category_id"=>$this->input->post('category_id'),
	    		"image"=>$this->input->post('path'),
	    		"modified"=>date("Y-m-d H:i:s"),
	    	);
	    	$this->db->where("id",$this->input->post("id"));
	    	$this->db->update("tbl_offer_text",$ins);
	    	$this->session->set_flashdata("success","Offer Updated Successfully");
		}else{
			$ins=array(
	    		"title"=>$this->input->post('title'),
	    		"text"=>$this->input->post('text'),
	    		"link"=>$this->input->post('link'),
	   // 		"category_id"=>$this->input->post('category_id'),
	    		"image"=>$this->input->post('path'),
	    		"modified"=>date("Y-m-d H:i:s"),
	    	);
	    	$this->db->insert("tbl_offer_text",$ins);
	    	$this->session->set_flashdata("success","Offer Added Successfully");
		}
    	redirect(base_url("Offer"));
                       
               
	}
	public function edit($id)
	{
		$data = array();
		$data['media'] = $this->mm->getAllMedia();
		$data['offer'] = $this->off->getSingleoffer($id);
		$data['categories'] = $this->cm->getAllCategories();
		$this->load->view('offer/offer-add',$data);
	}
	
	public function getOffer()
	{
		return $this->db->get("tbl_offer_text")->row_array();

	}
	public function delete($id){
		$this->db->where("id",$id);
		$this->db->delete("tbl_offer_text");
		$this->session->set_flashdata("success","Offer Deleted Successfully");
		redirect(base_url("Offer"));
	}

}
