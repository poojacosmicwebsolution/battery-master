<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(empty($this->session->userdata('aid'))){
			redirect(base_url("Auth"));
		}
		$this->load->model("Blog_model",'bm');
		$this->load->model("Media_model",'mm');
	}

	public function index()
	{
		// print_r($this->session->userdata());die;
		$data = array();
		$data['blog_categories'] = $this->bm->getAllBlogCategories();	
		$this->load->view('blog/blog-category-list',$data);
	}
	public function add()
	{
		$data = array();
		// $data['blog_category'] = $this->bm->getSingleCategory($id);
		$this->load->view('blog/add-blog-category',$data);
	}
	public function add_blog_category(){
		if(!empty($this->input->post('category_name'))){

		if(!empty($this->input->post('id'))){

			$this->load->helper('text');
			$this->load->helper('url');
			$slug = url_title(convert_accented_characters($this->input->post('category_name')), 'dash', true);
	    	$ins = array(
	    		"name"=>$this->input->post('category_name'),
	    		"slug"=>$slug,
	    		"modified"=>date("Y-m-d H:i:s"),
	    	);
	    	$this->db->where("id",$this->input->post("id"));
	    	$this->db->update("tbl_blog_categories",$ins);
	    	$this->session->set_flashdata("success","Category Updated Successfully");
		}else{
				$this->load->helper('text');
				$this->load->helper('url');
				$slug = url_title(convert_accented_characters($this->input->post('category_name')), 'dash', true);
			$ins = array(
	    		"name"=>$this->input->post('category_name'),
	    		"slug"=>$slug,
	    		"created"=>date("Y-m-d H:i:s"),
	    	);
	    	$this->db->insert("tbl_blog_categories",$ins);
	    	$this->session->set_flashdata("success","Category Added Successfully");
		}
		}else{
			$this->session->set_flashdata("error","Category Name cannot be empty");
		}
    	redirect(base_url("Blog"));
                       
               
	}
	public function edit($id)
	{
		$data = array();
		$data['category'] = $this->bm->getSingleCategory($id);
		$this->load->view('blog/add-blog-category',$data);
	}
	public function delete($id){
		$this->db->where("id",$id);
		$this->db->delete("tbl_blog_categories");
		$this->session->set_flashdata("success","Category Deleted Successfully");
		redirect(base_url("Blog"));
	}

	public function blog_list()
	{
		$data = array();
		$data['blogs'] = $this->bm->getAllBlog();
		$this->load->view('blog/blog-list',$data);
	}

	public function add_blogs()
	{
		$data = array();
		$data['blog_categories'] = $this->bm->getAllBlogCategories();
		$data['media'] = $this->mm->getAllMedia();
		$this->load->view('blog/add-blog',$data);
	}

	public function add_blog(){
		if(!empty($this->input->post('blog_title'))){

		if(!empty($this->input->post('id'))){

			$this->load->helper('text');
			$this->load->helper('url');
			$slug = url_title(convert_accented_characters($this->input->post('blog_title')), 'dash', true);
	    	$insg = array(
	    		"name"=>$this->input->post('blog_title'),
	   // 		"category_id"=>$this->input->post('category_id'),
	    		"description"=>$this->input->post('description'),
	    		"thumbnail"=>$this->input->post('thumbnail'),
	    		"image"=>$this->input->post('path'),
	    		"slug"=>$slug,
	    		"modified"=>date("Y-m-d H:i:s"),
	    	);
	    	$this->db->where("id",$this->input->post("id"));
	    	$this->db->update("tbl_blog",$insg);
	    	$this->session->set_flashdata("success","Category Updated Successfully");
		}else{
				$this->load->helper('text');
				$this->load->helper('url');
				$slug = url_title(convert_accented_characters($this->input->post('blog_title')), 'dash', true);
			$insg = array(
	    		"name"=>$this->input->post('blog_title'),
	   // 		"category_id"=>$this->input->post('category_id'),
	    		"description"=>$this->input->post('description'),
	    		"thumbnail"=>$this->input->post('thumbnail'),
	    		"image"=>$this->input->post('path'),
	    		"slug"=>$slug,
	    	);
	    	$this->db->insert("tbl_blog",$insg);
	    	$this->session->set_flashdata("success","Category Added Successfully");
		}
		}else{
			$this->session->set_flashdata("error","Category Name cannot be empty");
		}
    	redirect(base_url("Blog/blog_list"));
                       
               
	}

	public function edit_blog($id)
	{
		$data = array();
		$data['blog_categories'] = $this->bm->getAllBlogCategories();
		$data['media'] = $this->mm->getAllMedia();
		$data['blogs'] = $this->bm->getSingleBlog($id);
		$this->load->view('blog/add-blog',$data);
	}
	public function delete_blog($id){
		$this->db->where("id",$id);
		$this->db->delete("tbl_blog");
		$this->session->set_flashdata("success","Category Deleted Successfully");
		redirect(base_url("Blog/blog_list"));
	}

}
