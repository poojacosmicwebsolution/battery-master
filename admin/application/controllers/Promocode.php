<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promocode extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(empty($this->session->userdata('aid'))){
			redirect(base_url("Auth"));
		}
		$this->load->model("Promocode_model",'pm');
		// $this->load->model("Media_model",'mm');
	}

	public function index()
	{
		// print_r($this->session->userdata());die;
		$data = array();
		$data['promocodes'] = $this->pm->getAllPromocodes();	
		$this->load->view('promocode/promocode-list',$data);
	}
	public function add()
	{
		$data = array();
		$this->load->view('promocode/promocode-add',$data);
	}
	public function add_promocode(){
		if(!empty($this->input->post('code'))){

		if(!empty($this->input->post('id'))){


	    	$ins = array(
	    		"code"=>$this->input->post('code'),
	    		"type"=>$this->input->post('type'),
	    		"value"=>$this->input->post('value'),
	    		"start_date"=>date("Y-m-d",strtotime($this->input->post('start_date'))),
	    		"end_date"=>date("Y-m-d",strtotime($this->input->post('end_date'))),
	    		"modified"=>date("Y-m-d H:i:s"),
	    	);
	    	$this->db->where("id",$this->input->post("id"));
	    	$this->db->update("tbl_promo_codes",$ins);
	    	$this->session->set_flashdata("success","Promo Code Updated Successfully");
		}else{
				
			$ins = array(
	    		"code"=>$this->input->post('code'),
	    		"type"=>$this->input->post('type'),
	    		"value"=>$this->input->post('value'),
	    		"start_date"=>date("Y-m-d",strtotime($this->input->post('start_date'))),
	    		"end_date"=>date("Y-m-d",strtotime($this->input->post('end_date'))),
	    		"created"=>date("Y-m-d H:i:s"),
	    	);
	    	$this->db->insert("tbl_promo_codes",$ins);
	    	$this->session->set_flashdata("success","Promo Code Added Successfully");
		}
		}else{
			$this->session->set_flashdata("error","Promo Code cannot be empty");
		}
    	redirect(base_url("Promocode"));
                       
               
	}
	public function edit($id)
	{
		$data = array();
		$data['promocode'] = $this->pm->getSinglePromocode($id);
		$this->load->view('promocode/promocode-add',$data);
	}
	public function delete($id){
		$this->db->where("id",$id);
		$this->db->delete("tbl_promo_codes");
		$this->session->set_flashdata("success","Promo code Deleted Successfully");
		redirect(base_url("Promocode"));
	}

}
