<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(empty($this->session->userdata('aid'))){
			redirect(base_url("Auth"));
		}
		$this->load->model("Category_model",'cm');
		$this->load->model("Media_model",'mm');
	}

	public function index()
	{
		// print_r($this->session->userdata());die;
		$data = array();
		$data['categories'] = $this->cm->getAllCategories();	
		$this->load->view('categories/categories-list',$data);
	}
	public function add()
	{
		$data = array();
		$data['media'] = $this->mm->getAllMedia();
		$data['categories'] = $this->cm->getCategories();
		$this->load->view('categories/categories-add',$data);
	}
	public function add_category(){
		if(!empty($this->input->post('category_name'))){

		if(!empty($this->input->post('id'))){


	    	$ins = array(
	    		"name"=>$this->input->post('category_name'),
	    		"cat_img"=>$this->input->post('path'),
	   // 		"row_order"=>$this->input->post('order'),
	    		"parent_id"=>!empty($this->input->post('parent_id')) ? $this->input->post('parent_id') : '0',
	    		"modified"=>date("Y-m-d H:i:s"),
	    	);
	    	$this->db->where("id",$this->input->post("id"));
	    	$this->db->update("tbl_categories",$ins);
	    	$this->session->set_flashdata("success","Category Updated Successfully");
		}else{
				$this->load->helper('text');
				$this->load->helper('url');
				$slug = url_title(convert_accented_characters($this->input->post('category_name')), 'dash', true);
			$ins = array(
	    		"name"=>$this->input->post('category_name'),
	    		"cat_img"=>$this->input->post('path'),
	   // 		"row_order"=>$this->input->post('order'),
	    		"parent_id"=>!empty($this->input->post('parent_id')) ? $this->input->post('parent_id') : '0',
	    		"slug"=>$slug,
	    		"created"=>date("Y-m-d H:i:s"),
	    	);
	    	$this->db->insert("tbl_categories",$ins);
	    	$this->session->set_flashdata("success","Category Added Successfully");
		}
		}else{
			$this->session->set_flashdata("error","Category Name cannot be empty");
		}
    	redirect(base_url("Categories"));
                       
               
	}
	public function edit($id)
	{
		$data = array();
		$data['category'] = $this->cm->getSingleCategory($id);
		$data['media'] = $this->mm->getAllMedia();
		$data['categories'] = $this->cm->getCategories();
		$this->load->view('categories/categories-add',$data);
	}
	public function delete($id){
		$this->db->where("id",$id);
		$this->db->delete("tbl_categories");
		$this->session->set_flashdata("success","Category Deleted Successfully");
		redirect(base_url("Categories"));
	}

}
