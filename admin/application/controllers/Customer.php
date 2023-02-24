<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(empty($this->session->userdata('aid'))){
			redirect(base_url("Auth"));
		}
		$this->load->model("Customer_model",'cm');
	}

	public function index()
	{
		// print_r($this->session->userdata());die;
		$data = array();
		$data['customer'] = $this->cm->getAllCustomer();
		$this->load->view('customer/customer-list',$data);
	}
	public function activate($customer_id){
		$this->db->where("id",$customer_id);
		$this->db->set("active","1");
		$this->db->update("tbl_users");
		$this->session->set_flashdata("success","Customer Activated Successfully...");
		redirect(base_url("Customer"));
	}
	public function deactivate($customer_id){
		$this->db->where("id",$customer_id);
		$this->db->set("active","0");
		$this->db->update("tbl_users");
		$this->session->set_flashdata("success","Customer Deactivated Successfully...");
		redirect(base_url("Customer"));
	}
}
