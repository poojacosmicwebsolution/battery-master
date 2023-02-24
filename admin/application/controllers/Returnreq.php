<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Returnreq extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(empty($this->session->userdata('aid'))){
			redirect(base_url("Auth"));
		}
		$this->load->model("Return_model",'rm');
		$this->load->model("Customer_model",'cm');
	}

	public function index()
	{
		// print_r($this->session->userdata());die;
		$data = array();
		$data['return'] = $this->rm->getAllReturn();	
		$this->load->view('return/return',$data);
	}
	
	public function ajaxVideoDetails(){
		$id = $this->input->post("id");
		$video_data = $this->rm->getVideoDetails($id);
		$str = "";
		$path = ASSETS1."/uploads";

		foreach ($video_data as $vid) {
// 			$str.="<tr><td>".$vid['product_name']."</td>";

            // echo $vid['video'];
			
			$str.="<video width='100%' height='240' controls><source src=".$path.'/'.$vid['video']." type='video/mp4'></video";
			
		}
		

		echo $str;

	}

	public function status(){
		$id = $this->input->post("id");
		$status = $this->input->post("status");
		
		$order_data = $this->om->getOrderDetailbyid($id);
	   
	   
	   if($order_data[0]['status'] == $status){
		   $this->session->set_flashdata("error","Already Placed Successfully...");
		redirect(base_url("Orders"));
	   }
	   if($order_data[0]['status'] == $status){
		   $this->session->set_flashdata("error","Already Packed Successfully...");
		redirect(base_url("Orders"));
	   }
	   if($order_data[0]['status'] == $status){
		   $this->session->set_flashdata("error","Already Shipped Successfully...");
		redirect(base_url("Orders"));
	   }
	   if($order_data[0]['status'] == $status){
		   $this->session->set_flashdata("error","Already Delivered Successfully...");
		redirect(base_url("Orders"));
	   }


	   $arr=array(
		   'status'=>$status
	   );
	   
   
		$this->db->where("id",$id);
		$this->db->update("tbl_orders", $arr);
		
		
		
		 
		
// 		echo "<pre>"; print_r($order_data); 
		
		
		$data['userdetails']=$this->cm->getUserDetails($order_data[0]['user_id']);
	   $userdetails=$this->cm->getUserDetails($order_data[0]['user_id']);
	   
	   // echo "<pre>"; print_r($userdetails);
	   // echo exit();
	   
	   $data['useraddress']=$this->cm->getUserAddress($order_data[0]['user_id']);
	   $useraddress=$this->cm->getUserAddress($order_data[0]['user_id']);
	   
	   
	   
	   // echo "<pre>"; print_r($useraddress);
	   
	   
	  // $data['orders']=$this->om->getOrderDetailbyidemail($order_data[0]['id']);

	  // $orders=$this->om->getOrderDetailbyidemail($order_data[0]['id']);
	   
	  // echo "<pre>"; print_r($orders);
	   
	   
	   $this->load->config('email');
	   $this->load->library('email');
	   
	   $from = $this->config->item('smtp_user');
	   $from1 = $this->config->item('user_mail');
	   $to = $userdetails[0]['email'];
	   // $to = $from;

	   $subject = $this->input->post('subject');
	   $message = $this->input->post('message');

	   $this->email->set_newline("\r\n");
	   $this->email->from($from);
	   $this->email->to($to);
	   $this->email->cc($from1);
	   $this->email->subject('Babu Fashion Order Status');
	   
	   
	   $this->data['details'][]=array(
	   // $details=array(
				
				'username'=> $userdetails[0]['username'],
				   'address'=> $useraddress[0]['address'],
				   'area'=> $useraddress[0]['area'],
				   'location'=> $useraddress[0]['location'],
				   'city'=> $useraddress[0]['city'],
				   'pincode'=> $useraddress[0]['pincode'],
				   'order'=>$order_data
				);
				//$address_text=implode(',', $address);
				
				//echo "<pre>"; print_r($address_text);
	   
		$body=$this->load->view('orders/email_order.php', $this->data,TRUE);		    	
	   //  $this->load->view('orders/email_order', $details);		    	
	   
	   // $this->load->view('orders/orders-list',$data);
	   // die();
	   
		$this->email->message($body);
		
	   
	   
	   $this->email->send();
	   
// 	    die();
// 		 exit();
		
		
		
		$this->session->set_flashdata("success","Status Updated Successfully...");
		redirect(base_url("Orders"));
	   

   }
	
	public function delete($id){
	

		$this->db->where("id",$id);
		$this->db->delete("tbl_return_request");
		$this->session->set_flashdata("success","Product Deleted Successfully");
		redirect(base_url("Returnreq"));
	}


	

}
