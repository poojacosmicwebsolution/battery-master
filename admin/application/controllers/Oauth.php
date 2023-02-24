<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 

// include_once APPPATH . "libraries/Google/Client.php";
// include_once APPPATH . "libraries/Google/Service/Oauth2.php";
 
class Oauth extends CI_Controller { 
     
    function __construct(){ 
        parent::__construct(); 
         
        /* Load google oauth library */ 
        $this->load->library('google'); 
        $this->load->model('Common_model',"common"); 
         
        /* Load user model */ 
        // $this->load->model('user'); 
    } 
     
    public function index(){ 
         /* Redirect to profile page if the user already logged in */
        if($this->session->userdata('loggedIn') == true){ 
            redirect('oauth/profile/'); 
        } 
         
        if(isset($_GET['code'])){ 
             
             /* Authenticate user with google */
            if($this->google->getAuthenticate()){ 
             
                 /* Get user info from google */
                $gpInfo = $this->google->getUserInfo(); 
                 
                 /* Preparing data for database insertion */
                $userData['oauth_provider'] = 'google'; 
                $userData['oauth_uid']         = $gpInfo['id']; 
                $userData['first_name']     = $gpInfo['given_name']; 
                $userData['last_name']         = $gpInfo['family_name']; 
                $userData['email']             = $gpInfo['email']; 
                $userData['gender']         = !empty($gpInfo['gender'])?$gpInfo['gender']:''; 
                $userData['locale']         = !empty($gpInfo['locale'])?$gpInfo['locale']:''; 
                $userData['picture']         = !empty($gpInfo['picture'])?$gpInfo['picture']:''; 
                 
                 /* Insert or update user data to the database  */
                $userdata = $this->common->checkUser($userData); 

                  if(!empty($userdata)){ 

                    $this->session->set_userdata('uid',$userdata['id']);
                    $this->session->set_userdata('username',$userdata['username']);
                    $this->session->set_userdata('email',$userdata['email']);


                    // $userdata = 
                    // $this->session->set_userdata("id",$userdata['id']);
                    // $this->session->set_userdata("username",$userdata['username']);
                    // $this->session->set_userdata("email",$userdata['email']);
                    // $this->session->set_userdata("mobile",$userdata['mobile']);
                    // $this->session->set_userdata("usertype",'user');
                    // $data['userData'] = $userData; 
                    // $user = $this->db->where("id",$userID)->get("users")->row();

                    // $this->ion_auth_model->identity_column = "id";
                    //  $this->ion_auth_model->set_session($user);
                    // $this->ion_auth_model->update_last_login($user->id);



                    // $this->ion_auth_model->clear_login_attempts($user->id);

                    // $this->ion_auth_model->clear_forgotten_password_code($user->id);

                    redirect(base_url().'home', 'refresh');

                    $this->session->set_userdata('userData', $userData);
                    redirect(base_url().'home', 'refresh');
                    die;
                }
                 
                 /* Store the status and user profile info into session */
                // $this->session->set_userdata('loggedIn', true); 
                // $this->session->set_userdata('userData', $userData); 
                 
                 /* Redirect to profile page */
                redirect('home', 'refresh'); 
            } 
        }  
         
         /* Google authentication url */
         // echo $this->google->
         $loginURL = $this->google->loginURL();
        $data['loginURL'] =$loginURL;
         // print_r($data);die;
        redirect($loginURL);
         /* Load google login view */
        $this->load->view('user_authentication/index',$data); 
    } 
     public function callback(){ 
         /* Redirect to profile page if the user already logged in */
        if($this->session->userdata('loggedIn') == true){ 
            redirect('oauth/profile/'); 
        } 
         
        if(isset($_GET['code'])){ 
             
             /* Authenticate user with google */
            if($this->google->getAuthenticate()){ 
             
                 /* Get user info from google */
                $gpInfo = $this->google->getUserInfo(); 
                 
                 /* Preparing data for database insertion */
                $userData['oauth_provider'] = 'google'; 
                $userData['oauth_uid']         = $gpInfo['id']; 
                $userData['first_name']     = $gpInfo['given_name']; 
                $userData['last_name']         = $gpInfo['family_name']; 
                $userData['email']             = $gpInfo['email']; 
                $userData['gender']         = !empty($gpInfo['gender'])?$gpInfo['gender']:''; 
                $userData['locale']         = !empty($gpInfo['locale'])?$gpInfo['locale']:''; 
                $userData['picture']         = !empty($gpInfo['picture'])?$gpInfo['picture']:''; 
                 
                 /* Insert or update user data to the database  */
                $userdata = $this->common->checkUser($userData); 

                  if(!empty($userdata)){ 
                    // $userdata = 
                     $this->session->set_userdata('uid',$userdata['id']);
                    $this->session->set_userdata('username',$userdata['username']);
                    $this->session->set_userdata('email',$userdata['email']);


                    // $this->session->set_userdata("id",$userdata['id']);
                    // $this->session->set_userdata("username",$userdata['username']);
                    // $this->session->set_userdata("email",$userdata['email']);
                    // $this->session->set_userdata("mobile",$userdata['mobile']);
                    // $this->session->set_userdata("usertype",'user');
                    // $data['userData'] = $userData; 
                    // $user = $this->db->where("id",$userID)->get("users")->row();

                    // $this->ion_auth_model->identity_column = "id";
                    //  $this->ion_auth_model->set_session($user);
                    // $this->ion_auth_model->update_last_login($user->id);



                    // $this->ion_auth_model->clear_login_attempts($user->id);

                    // $this->ion_auth_model->clear_forgotten_password_code($user->id);

                    redirect(base_url().'home', 'refresh');

                    $this->session->set_userdata('userData', $userData);
                    redirect(base_url().'home', 'refresh');
                    die;
                }
                 
                 /* Store the status and user profile info into session */
                // $this->session->set_userdata('loggedIn', true); 
                // $this->session->set_userdata('userData', $userData); 
                 
                 /* Redirect to profile page */
                redirect(base_url().'home', 'refresh'); 
            } 
        } 
         
         /* Google authentication url */
        $data['loginURL'] = $this->google->loginURL(); 
         
         /* Load google login view */
         print_r($data);die;
        $this->load->view('user_authentication/index',$data); 
    } 
     
    public function profile(){ 
        redirect('/oauth/'); die;
         /* Redirect to login page if the user not logged in */
        if(!$this->session->userdata('loggedIn')){ 
            redirect(base_url().'/oauth/'); 
        } 
         
         /* Get user info from session */
        $data['userData'] = $this->session->userdata('userData'); 
        // print_r($data);die;
         
         /* Load user profile view */
        $this->load->view('user_authentication/profile',$data); 
    } 
     
    public function logout(){ 
         /* Reset OAuth access token */
        $this->google->revokeToken(); 
         
         /* Remove token and user data from the session */
        $this->session->unset_userdata('loggedIn'); 
        $this->session->unset_userdata('userData'); 
         
         /* Destroy entire session data */
        $this->session->sess_destroy(); 
         
         /* Redirect to login page */
        redirect(base_url().'/Facebookauth/logout'); 
    } 
     
}