<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(empty($this->session->userdata('aid'))){
			redirect(base_url("Auth"));
		}
		$this->load->model("Media_model",'mm');
	}

	public function index()
	{
		// print_r($this->session->userdata());die;
		$data = array();
		$data['media'] = $this->mm->getAllMedia();
		$this->load->view('media/media-list',$data);
	}
	public function add()
	{
		// print_r($this->session->userdata());die;
		$this->load->view('media/media-add');
	}
	public function add_media(){
		$this->load->library("cropper");
		$file = $_FILES;
		
				$imgDir = './uploads/media/';
				$cropData = $this->input->post('cropData1');
				$file_name = strtolower( pathinfo($file['media']['name'], PATHINFO_FILENAME));
				$img = $this->cropper->uploadCroppedImageFileFromForm($file['media'], 1588, $cropData, $imgDir, $file_name.'-'.time().'-1');
				
				if($img){
					$ins = array(
                		"title"=>$img,
                		"name"=>$img,
                		"path"=>"uploads/media/".$img,
                		"created"=>date("Y-m-d H:i:s"),
                	);
                // 	echo "<pre>"; print_r($ins);
                	$this->db->insert("tbl_media",$ins);
                	// echo $img;
                	redirect(base_url("Media"));
				}else{
					$this->session->set_flashdata("error","Error while uploading Image");
                	redirect(base_url("Media/add"));
				}
		// echo "<pre>";
		// print_r(array($_POST,$_FILES));die;


		// $config['upload_path']          = './uploads/media';
  //               $config['allowed_types']        = 'gif|jpg|png|jpeg';

  //               $this->load->library('upload', $config);

  //               if ($this->upload->do_upload('media'))
  //               {

  //               	$data = $this->upload->data();
  //               	// print_r($data);
  //               	$ins = array(
  //               		"title"=>$data['raw_name'],
  //               		"name"=>$data['file_name'],
  //               		"path"=>"uploads/media/".$data['file_name'],
  //               		"created"=>date("Y-m-d H:i:s"),
  //               	);
  //               	$this->db->insert("tbl_media",$ins);
  //               	redirect(base_url("Media"));
                       
  //               }
  //               else
  //               {
  //               	$res = $this->upload->display_errors();
  //               	$this->session->set_flashdata("error",$res);
  //               	redirect(base_url("Media/add"));
  //               }
	}
	public function delete($id){
		$this->db->where("id",$id);
		$this->db->delete("tbl_media");
		$this->session->set_flashdata("success","Media Deleted Successfully");
		redirect(base_url("Media"));
	}
	
}
