<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(empty($this->session->userdata('aid'))){
			redirect(base_url("Auth"));
		}
		$this->load->model("Product_model",'pm');
		$this->load->model("Media_model",'mm');
		$this->load->model("Category_model",'cm');
	}

	public function index()
	{
		// print_r($this->session->userdata());die;
		$data = array();
		$data['products'] = $this->pm->getAllProducts();	
		$this->load->view('products/products-list',$data);
	}
	public function add()
	{
		$data = array();
		$data['media'] = $this->mm->getAllMedia();
		$data['taxes'] = $this->common_model->getAllTaxes();
		$data['categories'] = $this->cm->getAllCategories();
		$this->load->view('products/products-add',$data);
	}
	public function add_product(){

		if(!empty($this->input->post('product_name'))){
		$this->load->helper('text');
		$this->load->helper('url');
		$slug = url_title(convert_accented_characters($this->input->post('product_name')), 'dash', true);

		if(!empty($this->input->post('id'))){
		    if(($this->input->post('coverage')==!null)){
		        $result = $this->db->where("product_id",$this->input->post('id'))->delete("tbl_product_coverage");
		        $coverage = $this->input->post('coverage');
		        for($i=0;$i<count($coverage);$i++){ 
		            $info = array(
		                "product_id"=>$this->input->post('id'),
		                "coverage_id"=>$coverage[$i]
		                );
		            $query = $this->db->insert("tbl_product_coverage",$info);
		        }
		    }
		    if(($this->input->post('padding')==!null)){
		        $result = $this->db->where("product_id",$this->input->post('id'))->delete("tbl_product_padding");
		        $padding = $this->input->post('padding');
		        for($i=0;$i<count($padding);$i++){ 
		            $info = array(
		                "product_id"=>$this->input->post('id'),
		                "padding_id"=>$padding[$i]
		                );
		            $query = $this->db->insert("tbl_product_padding",$info);
		        }
		    }
		    if(($this->input->post('fabric')==!null)){
		        $result = $this->db->where("product_id",$this->input->post('id'))->delete("tbl_product_fabric");
		        $fabric = $this->input->post('fabric');
		        for($i=0;$i<count($fabric);$i++){ 
		            $info = array(
		                "product_id"=>$this->input->post('id'),
		                "fabric_id"=>$fabric[$i]
		                );
		            $query = $this->db->insert("tbl_product_fabric",$info);
		        }
		    }
		    if(($this->input->post('sizes')==!null)){
		        $result = $this->db->where("product_id",$this->input->post('id'))->delete("tbl_product_sizes");
		        $sizes = $this->input->post('sizes');
		        for($i=0;$i<count($sizes);$i++){ 
		            $info = array(
		                "product_id"=>$this->input->post('id'),
		                "size_id"=>$sizes[$i]
		                );
		            $query = $this->db->insert("tbl_product_sizes",$info);
		        }
		    }
		     if(($this->input->post('trending_products')==!null)){
				$trending_products=1;
			}else{ 
				$trending_products=0;
			}

			if(($this->input->post('best_seller')==!null)){
				$best_seller=1;
			}else{ 
				$best_seller=0;
			}

	



	    	$ins = array(
	    		"category_id"=>$this->input->post('category_id'),
	    		"tax_id"=>$this->input->post('tax_id'),
	    		"name"=>$this->input->post('product_name'),
	    		"hsn_code"=>$this->input->post('hsn_code'),
	    		"trending_products"=>$trending_products,
	    		"best_seller"=>$best_seller,
	    		"description"=>$this->input->post('product_description'),
	    		"short_desc"=>$this->input->post('short_description'),
	    		"main_image"=>$this->input->post('path'),
	    		"type"=>$this->input->post('type'),
	    		"price"=>$this->input->post('price'),
	    		"special_price"=>$this->input->post('special_price'),
	    		"slug"=>$slug,
	    		"created"=>date("Y-m-d H:i:s"),
	    	);
	    	$this->db->where("id",$this->input->post("id"));
	    	$this->db->update("tbl_products",$ins);
	    	$this->session->set_flashdata("success","Product Updated Successfully");
		}else{
		     
		    if(($this->input->post('trending_products')==!null)){
				$trending_products=1;
			}else{ 
				$trending_products=0;
			}

			if(($this->input->post('best_seller')==!null)){
				$best_seller=1;
			}else{ 
				$best_seller=0;
			}


				
			$ins = array(
	    		"category_id"=>$this->input->post('category_id'),
	    		
	    		"tax_id"=>$this->input->post('tax_id'),
	    		
	    		"name"=>$this->input->post('product_name'),
	    		"hsn_code"=>$this->input->post('hsn_code'),
	    		"trending_products"=>$trending_products,
	    		"best_seller"=>$best_seller,
	    		"description"=>$this->input->post('product_description'),
	    		"short_desc"=>$this->input->post('short_description'),
	    		"main_image"=>$this->input->post('path'),
	    		"type"=>$this->input->post('type'),
	    		"price"=>$this->input->post('price'),
	    		"special_price"=>$this->input->post('special_price'),
	    		"slug"=>$slug,
	    		"created"=>date("Y-m-d H:i:s"),
	    	);
	    	$insert_id=$this->db->insert("tbl_products",$ins);
	    	$insert_id = $this->db->insert_id();
	    	if(($this->input->post('coverage')==!null)){
		        $coverage = $this->input->post('coverage');
		        for($i=0;$i<count($coverage);$i++){
		            $info = array(
		                "product_id"=>$insert_id,
		                "coverage_id"=>$coverage[$i]
		             );
		            $query = $this->db->insert("tbl_product_coverage",$info);
		        }
		    }
	    	if(($this->input->post('padding')==!null)){
		        $padding = $this->input->post('padding');
		        for($i=0;$i<count($padding);$i++){
		            $info = array(
		                "product_id"=>$insert_id,
		                "padding_id"=>$padding[$i]
		             );
		            $query = $this->db->insert("tbl_product_padding",$info);
		        }
		    }
	    	if(($this->input->post('fabric')==!null)){
		        $fabric = $this->input->post('fabric');
		        for($i=0;$i<count($fabric);$i++){
		            $info = array(
		                "product_id"=>$insert_id,
		                "fabric_id"=>$fabric[$i]
		             );
		            $query = $this->db->insert("tbl_product_fabric",$info);
		        }
		    }
	    	if(($this->input->post('sizes')==!null)){
		      //  $result = $this->db->where("product_id",$insert_id)->delete("tbl_product_sizes");
		        $sizes = $this->input->post('sizes');
		        for($i=0;$i<count($sizes);$i++){
		            $info = array(
		                "product_id"=>$insert_id,
		                "size_id"=>$sizes[$i]
		             );
		            $query = $this->db->insert("tbl_product_sizes",$info);
		        }
		    }
	    	$this->session->set_flashdata("success","Product Added Successfully");
		}
		}else{
			$this->session->set_flashdata("error","Product Name cannot be empty");
		}
    	redirect(base_url("Product"));
                       
               
	}
	public function edit($id)
	{
		$data = array();
		$data['product'] = $this->pm->getSingleProduct($id);
		$data['media'] = $this->mm->getAllMedia();
		$data['taxes'] = $this->common_model->getAllTaxes();
		$data['categories'] = $this->cm->getAllCategories(); 
		$sizes=$this->db->where("product_id",$id)->get('tbl_product_sizes')->result_array();
		$temp=array();
		foreach($sizes as $s){
		    $temp[] = $s['size_id'];
		}
		$data['sizes'] = $temp;
		$this->load->view('products/products-add',$data);
	}
	public function delete($id){
		$this->db->where("id",$id);
		$this->db->delete("tbl_products");
		$this->session->set_flashdata("success","Product Deleted Successfully");
		redirect(base_url("Product"));
	}
	public function variants($product_id){
		$data = array();
		$data['product'] = $this->pm->getSingleProduct($product_id);
		$data['variants'] = $this->pm->getProductVariants($product_id);
		$data['attributes'] = $this->pm->getProductAttributes($product_id);
		$data['media'] = $this->mm->getAllMedia();
		$data['all_attributes'] = $this->db->get("tbl_attributes")->result_array();
		$this->load->view('products/products-variant-attributes',$data);
	}
	public function add_attribute(){
		$product_id = $this->input->post("product_id");
		$attribute_id = $this->input->post("attribute_id");

		if(!empty($this->input->post("product_attribute_id"))){
			$product_attribute_id = $this->input->post("product_attribute_id");
			$ins = array(
				'attribute_id'=>$this->input->post("attribute_id"),
				'value'=>$this->input->post("attribute_value"),
				'code'=>$this->input->post("attribute_code"),
				'path'=>json_encode($this->input->post("path")),
				'product_id'=>$this->input->post("product_id"),
			);

			$this->db->where("id",$product_attribute_id);
			$res = $this->db->update("tbl_product_attributes",$ins);
			if($res){
				$this->session->set_flashdata("success","Attribute Updated for product.");
			}else{
				$this->session->set_flashdata("error","Error while updating attribute");

			}

		}else{


			$ins = array(
				'attribute_id'=>$this->input->post("attribute_id"),
				'value'=>$this->input->post("attribute_value"),
				'product_id'=>$this->input->post("product_id"),
				'code'=>$this->input->post("attribute_code"),
				'path'=>json_encode($this->input->post("path")),
			);
			$res = $this->db->insert("tbl_product_attributes",$ins);
				if($res){
				$this->session->set_flashdata("success","Attribute Added to product.");
			}else{
				$this->session->set_flashdata("error","Error while adding attribute to product");

			}

		}
		
		redirect(base_url()."Product/variants/".$product_id);
	}
	function delete_attribute($id,$product_id){
		$this->db->where("id",$id);
		$this->db->delete("tbl_product_attributes");
		$this->session->set_flashdata("success","Product Attribute Deleted Successfully");
		redirect(base_url("Product/variants/".$product_id));
	}
	function add_Variant(){
		$product_id = $this->input->post("product_id");

		if(!empty($this->input->post("product_variant_id"))){
			$product_variant_id = $this->input->post("product_variant_id");
			$ins = array(
				'variant_text'=>$this->input->post("variant_text"),
				'price'=>$this->input->post("price"),
				'special_price'=>$this->input->post("special_price"),
				'sku'=>$this->input->post("sku"),
				'stock'=>$this->input->post("stock"),
				'product_id'=>$this->input->post("product_id"),
			);
			$this->db->where("id",$product_variant_id);
			$res = $this->db->update("tbl_product_variants",$ins);
			if($res){
				$this->session->set_flashdata("success","Variant Updated for product.");
			}else{
				$this->session->set_flashdata("error","Error while updating variant");

			}

		}else{

			

			$ins = array(
				'variant_text'=>$this->input->post("variant_text"),
				'price'=>$this->input->post("price"),
				'special_price'=>$this->input->post("special_price"),
				'sku'=>$this->input->post("sku"),
				'stock'=>$this->input->post("stock"),
				'product_id'=>$this->input->post("product_id"),
			);
			$res = $this->db->insert("tbl_product_variants",$ins);
				if($res){
				$this->session->set_flashdata("success","Variant Added to product.");
			}else{
				$this->session->set_flashdata("error","Error while adding Variant to product");

			}

		}
		
		redirect(base_url()."Product/variants/".$product_id);
	}
	function delete_variant($id,$product_id){
		$this->db->where("id",$id);
		$this->db->delete("tbl_product_variants");
		$this->session->set_flashdata("success","Product Variant Deleted Successfully");
		redirect(base_url("Product/variants/".$product_id));
	}
	public function show_on_home()
	{
		
		$cat_id=$this->input->post('value');
		 $shows =$this->pm->getProductVariantOn_Off($cat_id);
		 foreach($shows as $show){
		if(($show['enable']==1)){
				$id=0;
			}
			
			if(($show['enable']==0)){
				$id=1;
			}
			
		 
		
		$ins = array(
	    		"enable"=>$id
	    		
	    	);
		// print_r($ins);
		// echo json_encode($ins);
	    	$this->db->where("id",$cat_id);
	    	$this->db->update("tbl_product_variants",$ins);
	    	// 
	    	 // print_r($this->db->last_query());
	    	 
	}
	}

}
