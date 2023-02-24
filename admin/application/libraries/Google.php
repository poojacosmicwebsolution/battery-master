<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Google OAuth Library for CodeIgniter 3.x
 *
 * Library for Google+ login. It helps the user to login with their Google account
 * in CodeIgniter application.
 *
 * This library requires the Google API PHP client and it should be placed in third_party folder.
 *
 * It also requires google configuration file and it should be placed in the config directory.
 *
 * @package     CodeIgniter
 * @category    Libraries
 * @author      semicolonworld
 * @license     http://www.semicolonworld.com/license/
 * @link        http://www.semicolonworld.com
 * @version     2.0
 */
class Google{
    
    public function __construct(){
        
        $CI =& get_instance();
        $CI->config->load('google');
        
        require APPPATH .'libraries/google-plus-api-client-master/src/Google_Client.php';
        require APPPATH .'libraries/google-plus-api-client-master/src/contrib/Google_Oauth2Service.php';
        
        $this->client = new Google_Client();
        $this->client->setApplicationName("Login to freshmeattoeat.com");
        $this->client->setClientId($CI->config->item('client_id'));
        $this->client->setClientSecret($CI->config->item('client_secret'));
        $this->client->setRedirectUri($CI->config->item('redirect_uri'));
        $this->client->setDeveloperKey($CI->config->item('api_key'));
        $this->client->setScopes($CI->config->item('scopes'));
        $this->client->setAccessType('online');
        $this->client->setApprovalPrompt('auto');
        $this->oauth2 = new Google_Oauth2Service($this->client);
    }
    
    public function loginURL() {
        return $this->client->createAuthUrl();
    }
    
    public function getAuthenticate() {
        return $this->client->authenticate();
    }
    
    public function getAccessToken() {
        return $this->client->getAccessToken();
    }
    
    public function setAccessToken() {
        return $this->client->setAccessToken();
    }
    
    public function revokeToken() {
        return $this->client->revokeToken();
    }
    
    public function getUserInfo() {
        return $this->oauth2->userinfo->get();
    }
    
}