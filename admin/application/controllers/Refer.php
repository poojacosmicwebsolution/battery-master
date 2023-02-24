<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Refer extends CI_Controller {

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
		$this->load->view('refer/refer-add',$data);
	}
}