<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model{
	
	public function __construct() {
		parent::__construct();            	
	}
    
	public function login_validate($email, $password) {
	
		$this -> db -> select('*');	
		$this -> db -> from('tbl_user');
		$this -> db -> where('user_email', $email);
		$this -> db -> where('user_pw', MD5($password));
		$this -> db -> limit(1);
		$query = $this -> db -> get();
		
	   if($query -> num_rows() == 1)
	   {
		 return $query->result();
	   }
	   else
	   {
		 return false;
	   }
	}
	
	
	function save_login($email,$first_name,$last_name,$gender,$id,$profile_picture,$from){
		$this -> db -> select('user_email');	
		$this -> db -> from('tbl_user');
		$this -> db -> where('user_email', $email);		
		$this -> db -> limit(1);
		$query = $this -> db -> get();
		$data = array(
			'user_fname'=>$first_name,
			'user_lname'=>$last_name,
			'user_email'=>$email,
			'user_gender'=>$gender,
			'user_origin'=>$from,
			'account_id'=>$id,
			'profile_picture'=>$profile_picture,
			'user_created_date'=>date('Y/m/d h:i:s')
			);
	   if($query -> num_rows() == 1)
	   {
			echo "Existing";
	   }else{						
			$this->db->insert('tbl_user',$data);
			echo "Success";			
		}
		
		session_start();
		$_SESSION['userdata'] = $data;
			
				   	   	   
	}
	
}