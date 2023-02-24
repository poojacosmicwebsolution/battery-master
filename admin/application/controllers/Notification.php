<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(empty($this->session->userdata('aid'))){
			redirect(base_url("Auth"));
		}
	}

	public function index()
	{
		// print_r($this->session->userdata());die;
		$data = array();
		$this->load->view('notification/notification-add',$data);
	}
	public function send()
	{
			$title=$this->input->post("title");
			$message=$this->input->post("message");
		$msg = array (
				"type" => "av",
				"title" => $title ,
				// "color"   =>"#0f974d",
				// "image"   =>"https://www.1441pizzeria.com/images/logo.png",
				"message" => $message,
				// 'android' => $icons,
				"body" => $message
			);

		$getAllUser = $this->getAllUserFCM();
		$allId = array();
		$i=0;
		$j = 0;
		foreach ($getAllUser as $user) {

			$allId[$j][] = $user['fcm_id'];

			if($i%500 == 0){
				$j++;
			}
			$i++;
		}

		foreach($allId as $a){
			$this->sendNotification($a,$msg);
		}

		$this->session->set_flashdata("success",'Notification Sent Successfully');
		redirect("Notification");



	}
	public function getAllUserFCM(){
		$this->db->select("fcm_id");
		return $this->db->get("tbl_users")->result_array();
	}

	public function sendNotification($registrationIds, $msg){
		$API_ACCESS_KEY = NOTIFICATION_KEY;
			$fields = array(
				'registration_ids' 	=> $registrationIds,
				'data' => $msg,
				'priority' => 'normal'
			);
			$headers = array(
				'Authorization: key=' . $API_ACCESS_KEY,
				'Content-Type: application/json'
			);

			$ch = curl_init();
			curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
			curl_setopt( $ch,CURLOPT_POST, true );
			curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
			curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
			curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
			$result = curl_exec($ch );
			curl_close( $ch );
			return $result;
	}
	
}
