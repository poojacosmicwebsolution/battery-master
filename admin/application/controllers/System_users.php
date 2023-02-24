<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System_users extends CI_Controller {
	public  $rights;
	function __construct(){
		parent::__construct();
		if(empty($this->session->userdata('aid'))){
			redirect(base_url("Auth"));
		}
		$this->load->model("System_users_model",'sum');
	$this->rights = array("customer","categories","promo_code","media","product","setting","location","faq");
	}

	public function index()
	{
		// print_r($this->session->userdata());die;
		$data = array();
		$data['users'] = $this->sum->getAllSystemUsers();	
		$this->load->view('system-users/system-users-list',$data);
	}
	public function add()
	{
		$data = array();
		$data['rights'] = $this->rights;
		$this->load->view('system-users/system-users-add',$data);
	}
	public function add_user(){
		// print_r($_POST);die;
		if(!empty($this->input->post('name'))){

		if(!empty($this->input->post('id'))){


	    	$ins = array(
	    		"name"=>$this->input->post('name'),
	    		"username"=>$this->input->post('username'),
	    		"rights"=>implode(",",$this->input->post('rights')),
	    		"usertype"=>$this->input->post('usertype'),
	    		// "modified"=>date("Y-m-d H:i:s"),
	    	);
	    	if(!empty($this->input->post('password'))){
	    		$ins['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
	    	}
	    	$this->db->where("id",$this->input->post("id"));
	    	$this->db->update("tbl_admin",$ins);
	    	$this->session->set_flashdata("success","User Updated Successfully");
		}else{
				
			$ins = array(
	    		"name"=>$this->input->post('name'),
	    		"username"=>$this->input->post('username'),
	    		"rights"=>implode(",",$this->input->post('rights')),
	    		"usertype"=>$this->input->post('usertype'),
	    		"password"=>password_hash($this->input->post('password'), PASSWORD_DEFAULT),
	    		"created"=>date("Y-m-d H:i:s"),
	    	);
	    	$this->db->insert("tbl_admin",$ins);
	    	$this->session->set_flashdata("success","User Added Successfully");
		}
		}else{
			$this->session->set_flashdata("error","User Name cannot be empty");
		}
    	redirect(base_url("System_users"));
                       
               
	}
	public function edit($id)
	{
		$data = array();
		$data['user'] = $this->sum->getSingleSystemUser($id);
		$data['rights'] = $this->rights;
		$this->load->view('system-users/system-users-add',$data);
	}
	public function delete($id){
		$this->db->where("id",$id);
		$this->db->delete("tbl_categories");
		$this->session->set_flashdata("success","Category Deleted Successfully");
		redirect(base_url("Categories"));
	}

}
