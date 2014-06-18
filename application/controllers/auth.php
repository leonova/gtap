<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . 'libraries/facebook/facebook.php';
require_once APPPATH . 'libraries/parse/parse.php';
require_once APPPATH . 'libraries/parse/parseQuery.php';
require_once APPPATH . 'libraries/parse/parseUser.php';

class Auth extends CI_Controller {
	
	public $parseUser;
	public $dataUser;
	
	public function __construct() {
		parent::__construct();
        
		$this->load->library('session');
	}
	
	//login
	public function login() {	
		if (!empty($_POST)){
			$this->parseUser = new parseUser;
			$this->dataUser = $this->dataUser = array(
								'username' => strip_tags(trim($_POST['user_email'])),
								'password' => strip_tags(trim($_POST['user_pw']))			
			);		
			
			$result=$this->loginWithDataObjectId();		
			return $result;
		}				
	}
	
	public function loginWithDataObjectId(){
		$parseUser = $this->parseUser;		
		$parseUser->username = $this->dataUser['username'];
		$parseUser->password = $this->dataUser['password'];
				
		$loginUser = new parseUser;
		$loginUser->username = $this->dataUser['username'];
		$loginUser->password = $this->dataUser['password'];

		$returnLogin = $loginUser->login();		
								
		echo $returnLogin;
			
		//
		$res=json_decode($returnLogin, TRUE);		
		if (empty($res['code'])){			
			$resultSearch=$this->searchUser($res['objectId'],'UserSettings');
			$rs=json_decode($resultSearch, TRUE);							
			$this->session->set_userdata($rs['results']['0']);
			$this->session->set_userdata($res);
		}
			
	}
	
	public function searchUser($objectId,$class){
		$parseUser = $this->parseUser;
		$this->dataUser = array(
			'user_id' => $objectId				
		);
		
		$result=$this->queryUsersInd($class);		
		return $result;
	}
	
	public function queryUsersInd($class){	
		$data= $this->dataUser['user_id'];
		$userQuery = new parseQuery($class);		
		$userQuery->where('user_id',$data);
		$return = $userQuery->find();		
		return $return;
	}
	
	//logout
	public function logout() {		
		$this->session->sess_destroy();
		redirect('home', 'refresh');
	}	
}