<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		// $this->load->model("Auth_model",'am');
		if(empty($this->session->userdata('aid'))){
			redirect(base_url("Auth"));
		}
	}

	public function index()
	{
		// print_r($this->session->userdata());die;
		$data = array();
		$data['total_customers'] = $this->get_total_customers();
		$data['customer_this_month'] = $this->get_customer_this_month();
		$this->load->view('dashboard/dashboard',$data);
	}
	function get_total_customers(){
		return $this->db->get("tbl_users")->num_rows();
	}
	function get_customer_this_month(){
		return $this->db->where('MONTH(created)',date("m"))->where('YEAR(created)',date("Y"))->get("tbl_users")->num_rows();
	}
}
