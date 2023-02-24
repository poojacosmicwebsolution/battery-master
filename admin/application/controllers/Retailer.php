<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Retailer extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(empty($this->session->userdata('aid'))){
			redirect(base_url("Auth"));
		}
		$this->load->model("Common_model",'cm');
	}

	public function index()
	{
		// print_r($this->session->userdata());die;
		$data = array();
		$data['retailer'] = $this->cm->getAllRetailer();
		$this->load->view('retailer/retailer-list',$data);
	}
	
	public function delete($id)
	{
		$this->db->where("id",$id);
		$this->db->delete("tbl_retailer");
		$this->session->set_flashdata("success","Retailer delete Successfully...");
		redirect(base_url("Retailer"));
	}
	
	
}
