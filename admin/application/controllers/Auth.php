<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("Auth_model",'am');
	}

	public function index()
	{
		if(isset($_POST['submit'])){
			$username = $this->input->post("username");
			$password = $this->input->post("password");

			$res = $this->am->getAdminByUsername($username);
			if($res){
				if(password_verify($password, $res['password'])){
					$this->session->set_userdata('aid',$res['id']);
					$this->session->set_userdata('aname',$res['name']);
					$this->session->set_userdata('ausername',$res['username']);
					$this->shiprocket_login();
					redirect(base_url("Dashboard"));

				}else{
					$this->session->set_flashdata('error','You have entered wrong password.');
					redirect(base_url());
				}
			}else{
				$this->session->set_flashdata('error','You have entered wrong username.');
				redirect(base_url());
			}
		}
		if($this->session->userdata('aid') && !empty($this->session->userdata('aid'))){
			redirect(base_url("Dashboard"));
		}
		$this->load->view('auth/login');
	}

	public function logout(){
		$this->session->unset_userdata('aid');
		$this->session->unset_userdata('aname');
		$this->session->unset_userdata('ausername');
		redirect(base_url("Auth"));
	}
	
	
	public function shiprocket_login(){
        $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://apiv2.shiprocket.in/v1/external/auth/login",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => "{\r\n    \"email\": \"dev@uvplus.in\",\r\n    \"password\": \"1RZQ3GXcl5i9\"\r\n}",
              CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/json",
                "postman-token: 532e95c0-d319-b10a-e890-0f33d336365a"
              ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
              echo "Err While logginng in to shiprocket." . $err;
            } else {
              // echo $response;
                $res = json_decode($response);
                // echo "<pre>"; print_r($res);
                if(isset($res->token) && !empty($res->token)){

                    $this->session->set_userdata("shiprocket_token",$res->token);
                }
                // echo $res->token;
            }
    }
}
