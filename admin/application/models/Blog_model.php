<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {

	
	public function getAllBlogCategories()
	{
		return $this->db->get("tbl_blog_categories")->result_array();
		
	}
	function getSingleCategory($id){
			$this->db->where("id",$id);
		return $this->db->get("tbl_blog_categories")->row_array();
	}
	public function getAllBlog()
	{
		return $this->db->get("tbl_blog")->result_array();
	}

	function getSingleBlog($id){
			$this->db->where("id",$id);
		return $this->db->get("tbl_blog")->row_array();
	}
}
