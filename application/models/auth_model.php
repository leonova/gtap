<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model{
	
	public function __construct() {
		parent::__construct();            	
	}
    
	public function checkSessionToken(){
		$token=$this->session->userdata('sessionToken');
		if (empty($token)){
			redirect('/user/login');
		}else{
			return true;
		}
	}
	
}