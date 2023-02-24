<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Facebookauth extends CI_Controller { 
    function __construct() { 
        parent::__construct(); 
         
        // Load facebook oauth library 
        $this->load->library('facebook'); 
         
        // Load user model 
        $this->load->model('Common_model','user'); 
    } 
     
    public function index(){ 
        $userData = array(); 
         
        // Authenticate user with facebook 
        if($this->facebook->is_authenticated()){ 
            // Get user info from facebook 
            $fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,picture'); 
            // print_r($fbUser);die;
            // Preparing data for database insertion 
            $userData['oauth_provider'] = 'facebook'; 
            $userData['oauth_uid']    = !empty($fbUser['id'])?$fbUser['id']:'';; 
            $userData['first_name']    = !empty($fbUser['first_name'])?$fbUser['first_name']:''; 
            $userData['last_name']    = !empty($fbUser['last_name'])?$fbUser['last_name']:''; 
            $userData['email']        = !empty($fbUser['email'])?$fbUser['email']:''; 
            $userData['gender']        = !empty($fbUser['gender'])?$fbUser['gender']:''; 
            $userData['picture']    = !empty($fbUser['picture']['data']['url'])?$fbUser['picture']['data']['url']:''; 
            $userData['link']        = !empty($fbUser['link'])?$fbUser['link']:'https://www.facebook.com/'; 
             
            // Insert or update user data to the database 
            $userID = $this->user->checkUserSocial($userData); 
             
            // Check user data insert or update status 
            if(!empty($userID)){ 
                $data['userData'] = $userData; 
                $res = $this->db->where("id",$userID)->get("tbl_users")->row_array();
                $this->session->set_userdata('id',$res['id']);
                    $this->session->set_userdata('user',$res['username']);
                    $this->session->set_userdata('email',$res['email']);
                    $this->session->set_flashdata('success','Login Succesfully');

                // $this->ion_auth_model->identity_column = "id";
                //  $this->ion_auth_model->set_session($user);
                // $this->ion_auth_model->update_last_login($user->id);



                // $this->ion_auth_model->clear_login_attempts($user->id);

                // $this->ion_auth_model->clear_forgotten_password_code($user->id);

                // redirect('home', 'refresh');

                $this->session->set_userdata('userData', $userData);
                redirect(base_url());
                die;

                // $this->ion_auth->clear_login_attempts($identity);

                // $this->ion_auth->clear_forgotten_password_code($identity);


                 
                // Store the user profile info into session 
            }else{ 
               $data['userData'] = array(); 
               // echo "empty";
            } 
             
            // Facebook logout URL 
            $data['logoutURL'] = $this->facebook->logout_url(); 
        }else{ 
            // Facebook authentication url 
            // $data['authURL'] =  $this->facebook->login_url(); 
            redirect($this->facebook->login_url());
        } 
         redirect(base_url());
        // Load login/profile view 
        // $this->load->view('fb_auth',$data); 
    } 
    public function login(){
        if($this->facebook->is_authenticated()){ 
            // Get user info from facebook 
            $fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,picture'); 
            // print_r($fbUser);die;
 
            // Preparing data for database insertion 
            $userData['oauth_provider'] = 'facebook'; 
            $userData['oauth_uid']    = !empty($fbUser['id'])?$fbUser['id']:'';; 
            $userData['first_name']    = !empty($fbUser['first_name'])?$fbUser['first_name']:''; 
            $userData['last_name']    = !empty($fbUser['last_name'])?$fbUser['last_name']:''; 
            $userData['email']        = !empty($fbUser['email'])?$fbUser['email']:''; 
            $userData['gender']        = !empty($fbUser['gender'])?$fbUser['gender']:''; 
            $userData['picture']    = !empty($fbUser['picture']['data']['url'])?$fbUser['picture']['data']['url']:''; 
            $userData['link']        = !empty($fbUser['link'])?$fbUser['link']:'https://www.facebook.com/'; 
             
            // Insert or update user data to the database 
            $userID = $this->user->checkUserSocial($userData); 
             
            // Check user data insert or update status 
            if(!empty($userID)){ 
                $data['userData'] = $userData; 

                $res = $this->db->where("id",$userID)->get("tbl_users")->row_array();
                $this->session->set_userdata('id',$res['id']);
                    $this->session->set_userdata('user',$res['username']);
                    $this->session->set_userdata('email',$res['email']);
                    $this->session->set_flashdata('success','Login Succesfully');
                // $this->ion_auth_model->identity_column = "id";

                // $this->ion_auth_model->set_session($user);
                // $this->ion_auth_model->update_last_login($user->id);



                // $this->ion_auth_model->clear_login_attempts($user->id);

                // $this->ion_auth_model->clear_forgotten_password_code($user->id);

                redirect(base_url());
                 
                // Store the user profile info into session 
                $this->session->set_userdata('userData', $userData); 
            }else{ 
               $data['userData'] = array(); 
               // echo "empty";
            } 
             
            // Facebook logout URL 
            $data['logoutURL'] = $this->facebook->logout_url(); 
        }else{ 
            // Facebook authentication url 
            $data['authURL'] =  $this->facebook->login_url(); 
        }

        // $this->load->view('fb_auth',$data); 
        redirect(base_url());
    }
 
    public function logout() { 
        // Remove local Facebook session 
        $this->facebook->destroy_session(); 
        // Remove user data from session 
        $this->session->unset_userdata('userData'); 
        // Redirect to login page 
        // redirect('Home','refresh'); 
        redirect(base_url()."Oauth/logout");
        // redirect(base_url());
    } 
}