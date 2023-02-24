<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery_time extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(empty($this->session->userdata('aid'))){
			redirect(base_url("Auth"));
		}
		// $this->load->model("Delivery_time_model",'cm');
		$this->load->model("Media_model",'mm');
	}

	public function index()
	{
		$data = array();
		$data['delivery_times'] = $this->getAllDeliveryTimes();	
		$this->load->view('delivery-time/delivery-time-list',$data);
	}
	public function add_time(){
		if(!empty($this->input->post('time'))){

		if(!empty($this->input->post('id'))){


	    	$ins = array(
	    		"time"=>$this->input->post('time'),
	    	);
	    	$this->db->where("id",$this->input->post("id"));
	    	$this->db->update("tbl_delivery_time",$ins);
	    	$this->session->set_flashdata("success","Time Updated Successfully");
		}else{
			$ins = array(
	    		"time"=>$this->input->post('time'),
	    	);
	    	$this->db->insert("tbl_delivery_time",$ins);
	    	$this->session->set_flashdata("success","Time Added Successfully");
		}
		}else{
			$this->session->set_flashdata("error","Time cannot be empty");
		}
    	redirect(base_url("Delivery_time"));
                       
               
	}
	public function edit($id)
	{
		$data = array();
		$data['dtime'] = $this->getSingleDeliveryTime($id);
		// $data = array();
		$data['delivery_times'] = $this->getAllDeliveryTimes();	
		$this->load->view('delivery-time/delivery-time-list',$data);
	}
	public function delete($id){
		$this->db->where("id",$id);
		$this->db->delete("tbl_delivery_time");
		$this->session->set_flashdata("success","Category Deleted Successfully");
		redirect(base_url("Categories"));
	}

	public function getAllDeliveryTimes(){
		// $this->db->where("id",$id);
		return $this->db->get("tbl_delivery_time")->result_array();
	}
	public function getSingleDeliveryTime($id){
		// $this->db->where("id",$id);
		return $this->db->where("id",$id)->get("tbl_delivery_time")->row_array();
	}

}
