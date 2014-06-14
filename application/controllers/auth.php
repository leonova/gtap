<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . 'libraries/facebook/facebook.php';
require_once APPPATH . 'libraries/parse/parse.php';

class Auth extends CI_Controller {
	
	public $parseUser;
	public $testUser;
	
	public function __construct() {
		parent::__construct();
        
		$this->load->library('session');
	}
	
	//login
	public function login() {	
		if (!empty($_POST)){
			$this->parseUser = new parseUser;
			$this->testUser = $this->testUser = array(
								'username' => strip_tags(trim($_POST['user_email'])),
								'password' => strip_tags(trim($_POST['user_pw']))			
			);		
			
			$result=$this->loginWithDataObjectId();		
			return $result;
		}				
	}
	
	public function loginWithDataObjectId(){
		$parseUser = $this->parseUser;		
		$parseUser->username = $this->testUser['username'];
		$parseUser->password = $this->testUser['password'];
				
		$loginUser = new parseUser;
		$loginUser->username = $this->testUser['username'];
		$loginUser->password = $this->testUser['password'];

		$returnLogin = $loginUser->login();		
		
		//$this->setSession($returnLogin);		
		
		echo $returnLogin;
			
		//
		$res=json_decode($returnLogin, TRUE);		
		if (empty($res['code'])){
			$this->session->set_userdata($res);
		}
			
	}
	
	//logout
	public function logout() {		
		$this->session->sess_destroy();
		redirect('home', 'refresh');
	}
			
	//register
	public function register() {		
      
		$data['data'] = array(
			'pagename'			=> 'register',
			'baseUrl'			=> $this->config->base_url(),
			'title'   			=> 'test',
			'meta'				=> array(
                'title' => '',
				'key_words' => '',
				'description' => ''
			)
		);
        
		$this->load->view('auth', $data);
	}
	
	//fb_login
	public function fb_index() {		
      
		$data = array(
			'login'			=> '<a href="fb_login">Facebook</a> <br />'
			
		);
        
		$this->load->view('auth', $data);
	}
	
	public function checkUser($uid, $oauth_provider, $username) 
	{
        $query = mysql_query("SELECT * FROM `users` WHERE oauth_uid = '$uid' and oauth_provider = '$oauth_provider'") or die(mysql_error());
        $result = mysql_fetch_array($query);
        if (!empty($result)) {
            # User is already present
        } else {
            #user not present. Insert a new Record
            $query = mysql_query("INSERT INTO `users` (oauth_provider, oauth_uid, username) VALUES ('$oauth_provider', $uid, '$username')") or die(mysql_error());
            $query = mysql_query("SELECT * FROM `users` WHERE oauth_uid = '$uid' and oauth_provider = '$oauth_provider'");
            $result = mysql_fetch_array($query);
            return $result;
        }
        return $result;
    }
	
	//fb_login
	public function fb_login() {
		
		$email=mysql_real_escape_string($this->uri->segment(3));
		$first_name=mysql_real_escape_string($this->uri->segment(4));
		$last_name=mysql_real_escape_string($this->uri->segment(5));
		$gender=mysql_real_escape_string($this->uri->segment(6));
		$id=mysql_real_escape_string($this->uri->segment(7));		
		$profile_image=$_GET['url'];						
		$row = $this->auth_model->save_login($email, $first_name, $last_name, $gender,$id, $profile_image, 'facebook');

	}
	
	//google_login
	public function gplus_login() {
		
		$email=mysql_real_escape_string($this->uri->segment(3));
		$first_name=mysql_real_escape_string($this->uri->segment(4));
		$last_name=mysql_real_escape_string($this->uri->segment(5));
		$gender=mysql_real_escape_string($this->uri->segment(6));
		$id=mysql_real_escape_string($this->uri->segment(7));		
		$profile_image=$_GET['url'];	
		$row = $this->auth_model->save_login($email, $first_name, $last_name, $gender, $id, $profile_image, 'google');

	}
	
	//fb_login
	public function gplus_index() {		
      
		$data = array(
			'login'			=> '<a href="gplus_login">Google</a> <br />'
			
		);
        
		$this->load->view('auth', $data);
	}
	
	
	//email_login
	public function email_login() {		
      
		$data['data'] = array(
			'pagename'			=> 'email_login',
			'baseUrl'			=> $this->config->base_url(),
			'title'   			=> 'test',
			'meta'				=> array(
                'title' => '',
				'key_words' => '',
				'description' => ''
			)
		);
        
		$this->load->view('auth', $data);
	}
	
	
	
	
}