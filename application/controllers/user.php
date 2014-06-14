<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH . 'libraries/parse/parse.php';
require_once APPPATH . 'libraries/parse/parseQuery.php';
class User extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
        
        $this->load->library('session');			
		
	}
	
	// homepage
	public function index() {		
	
		$data['data'] = array(
			'pagename'			=> 'user',
			'baseUrl'			=> $this->config->base_url(),
			'title'   			=> 'test',
			'meta'				=> array(
                'title' => '',
				'key_words' => '',
				'description' => ''
			)
		);
        
		$this->load->view('user', $data);
	}
	
	public function optionsBday($value){
		$dob_day="";
		$selected="";
		for ($day_value=1;$day_value<=31;$day_value++) {
			if ($day_value==$value){
				$selected='selected';
			}
			$dob_day.= '<option value="'.$day_value.'" '.$selected.' >'.$day_value.'</option>';
		}
		
		return $dob_day;
	}
	
	public function optionsByear($value){	
		$dob_yr="";
		
		for ($yr_value = 1920; $yr_value <= date("Y"); $yr_value++) {
			if ($yr_value==$value){				
				$dob_yr.= '<option value="'.$yr_value.'" selected >'.$yr_value.'</option>';
			}else{
				$dob_yr.= '<option value="'.$yr_value.'" >'.$yr_value.'</option>';
			}
		}
		
		return $dob_yr;
	}
	
	
	public function signup(){
		$bday=$this->optionsBday('');
		$byear=$this->optionsByear('');
		$data = array(
                    'page' => 'signup',
					'byear' => $byear,
					'bday' => $bday
                    );
		
		$this->load->view('template/header', $data);
		$this->load->view('signup', $data);
		$this->load->view('template/footer', $data);
	}
	
	public function login(){
		$data = array(
                    'page' => 'login'
                    );
		
		$this->load->view('template/header', $data);
		$this->load->view('login', $data);
		$this->load->view('template/footer', $data);
	}
	
	// profile
	public function profile() {		
		$id=$this->session->userdata('objectId');		
		$email=$this->session->userdata('email');				
		$name=$this->session->userdata('user_fullname');
		$image=$this->session->userdata('user_profile_picture');
		$gender=$this->session->userdata('user_gender');
		$address=$this->session->userdata('user_address');
		$bdate=$this->session->userdata('user_birthdate');
		$income_range=$this->session->userdata('user_income_range');
		$interest=$this->session->userdata('user_interest');
		$mhnum=$this->session->userdata('user_mhnum');
		$mhstatus=$this->session->userdata('user_mhstatus');
		$mstatus=$this->session->userdata('user_mstatus');
		$occupation=$this->session->userdata('user_occupation');		
		$phone=$this->session->userdata('user_phone');	

		if (!empty($bdate)	){
			$birthdate=explode('-',$bdate);
			$year=$birthdate[0];
			$month=$birthdate[1];
			$day=$birthdate[2];
		}else{
			$year='';
			$month='';
			$day='';
		}		
		$bday=$this->optionsBday($day);
		$byearmain=$this->optionsByear($year);
		//$row=$this->user_profile($id,'user_setting');	
		//$children=$this->profile_children($id);
		
		$data = array(
			'user_info'			=> $this->session->userdata,
			'children'			=> '',	
			'id'				=>$id,
			'email'				=>$email,
			'name'				=>$name,
			'image'				=>$image,
			'gender'			=>$gender,
			'address'			=>$address,
			'bdate'				=>$bdate,
			'income_range'		=>$income_range,
			'interest'			=>$interest,
			'mhnum'				=>$mhnum,
			'mhstatus'			=>$mhstatus,
			'mstatus'			=>$mstatus,
			'occupation'		=>$occupation,	
			'phone'				=>$phone,
			'bday'				=>$bday,
			'byearmain'			=>$byearmain
		);				       
		
		
		$this->load->view('template/header', $data);
		$this->load->view('profile-page-setting', $data);
		$this->load->view('template/footer', $data);
	}
	
	public function profile_children($id){	
		return $children=$this->user_model->user_children($id);	
		
	}
	
	public function user_profile($id, $class) {				
		$parseUser = $this->parseUser;
		$this->testUser = array(
			'objectId' => $id				
		);
		
		$result=$this->queryUsersInd($class);		
		return $result;				
	}
	
	public function queryUsersInd($class){
		$parseUser = $this->parseUser;
		$parseUser->objectId = $this->testUser['objectId'];		
		$userQuery = new parseQuery($class);		
		$userQuery->where('objectId',$parseUser->objectId);
		$return = $userQuery->find();
						
		echo "<pre>";
		print_r($return);

	}
	
	// profile_update
	public function profile_update() {		
      
		$data['data'] = array(
			'pagename'			=> 'profile_update',
			'baseUrl'			=> $this->config->base_url(),
			'title'   			=> 'test',
			'meta'				=> array(
                'title' => '',
				'key_words' => '',
				'description' => ''
			)
		);
        
		$this->load->view('user', $data);
	}
			
	//fblogin
	public function fblogin() {			
				
		if (!empty($_POST)){
			$user=explode('||',$_POST['userdata']);
			$id=$user[0];
			$name=$user[1].' '.$user[2];
			$email=$user[4];
			$image=$user[5];
			
			$email=strip_tags(trim($email));
			$fullname=strip_tags(trim($name));		
			$gender='female';
			$password='';		
			$birthdate='';
			$origin='facebook';
			$account_id=strip_tags(trim($id));
			$profile_picture=strip_tags(trim($image));			
						
			$this->parseUser = new parseUser;
			$this->testUser = array(
				'user_fullname' => $fullname,			
				'username' => $email,
				'password' => '',
				'email' => $email,
				'user_gender' => $gender,
				'user_mstatus' => '',
				'user_origin'=> $origin,
				'user_profile_picture'=> $profile_picture,
				'user_birthdate'=> $birthdate,
				'user_phone' => '',
				'user_address' => '',			
				'user_occupation' => '',
				'user_income_range' => '',
				'user_mhstatus' => '',
				'user_mhnum' => '1',
				'user_interest' => '',
				'user_newsletter' => ''
			);					
			
			$this->session->set_userdata($this->testUser);
			
			$result=$this->signupWithDataObjectIdOther();	
			$res=json_decode($result, TRUE);		
		
			if (!empty($res['objectId'])){
				$return=$res['objectId'];
			}else{
				$return=$this->getObjectId($email, '');
			}
			
			$this->session->set_userdata('objectId',$return);
			return $return;
		}
				
	}
	
	public function getObjectId($username, $passwd=''){
		$parseUser = $this->parseUser;		
		$parseUser->username = $username;
		$parseUser->password = $passwd;
				
		$loginUser = new parseUser;
		$loginUser->username = $username;
		$loginUser->password = $passwd;

		$returnLogin = $loginUser->login();		
		
		$res=json_decode($returnLogin, TRUE);		
		if (empty($res['code'])){
			$return=$res['objectId'];
		}
		return 	$return;
	}		
	
	public function setUp(){
		if (!empty($_POST)){
			$email=strip_tags(trim($_POST['eadd']));
			$fullname=strip_tags(trim($_POST['fullname']));		
			$gender=strip_tags(trim($_POST['gender']));
			$password=strip_tags(trim($_POST['passwd']));		
			$birthdate=strip_tags(trim($_POST['byear'])).'-'.strip_tags(trim($_POST['bmonth'])).'-'.strip_tags(trim($_POST['bday']));
			$origin=strip_tags(trim($_POST['origin']));
			$account_id=strip_tags(trim($_POST['account_id']));
			$profile_picture=strip_tags(trim($_POST['profile_picture']));
			if (!empty($_POST['newsletter'])){
				$newsletter=strip_tags(trim($_POST['newsletter']));
			}else{
				$newsletter='';
			}
			
			$this->parseUser = new parseUser;
			$this->testUser = array(
				'user_fullname' => $fullname,			
				'username' => $email,
				'password' => $password,
				'email' => $email,
				'user_gender' => $gender,
				'user_mstatus' => '',
				'user_origin'=> $origin,
				'user_profile_picture'=> $profile_picture,
				'user_birthdate'=> $birthdate,
				'user_phone' => '',
				'user_address' => '',			
				'user_occupation' => '',
				'user_income_range' => '',
				'user_mhstatus' => '',
				'user_mhnum' => '1',
				'user_interest' => '',
				'user_newsletter' => $newsletter
			);
			
			$result=$this->signupWithDataObjectId();		
			return $result;
		}
	}

	public function signupWithDataObjectIdOther(){
		$parseUser = $this->parseUser;
		$parseUser->user_fullname = $this->testUser['user_fullname'];		
		$parseUser->username = $this->testUser['username'];
		$parseUser->password = $this->testUser['password'];
		$parseUser->email = $this->testUser['email'];
		$parseUser->user_gender = $this->testUser['user_gender'];
		$parseUser->user_mstatus = $this->testUser['user_mstatus'];
		$parseUser->user_origin = $this->testUser['user_origin'];		
		$parseUser->user_profile_picture = $this->testUser['user_profile_picture'];
		$parseUser->user_birthdate = $this->testUser['user_birthdate'];
		$parseUser->user_phone = $this->testUser['user_phone'];
		$parseUser->user_address = $this->testUser['user_address'];
		$parseUser->user_occupation = $this->testUser['user_occupation'];
		$parseUser->user_income_range = $this->testUser['user_income_range'];
		$parseUser->user_mhstatus = $this->testUser['user_mhstatus'];
		$parseUser->user_mhnum = $this->testUser['user_mhnum'];
		$parseUser->user_interest = $this->testUser['user_interest'];
		$parseUser->user_newsletter = $this->testUser['user_newsletter'];		

		$result= $parseUser->signup();
				
		return $result;
											
	}
	
	public function signupWithDataObjectId(){
		$parseUser = $this->parseUser;
		$parseUser->user_fullname = $this->testUser['user_fullname'];		
		$parseUser->username = $this->testUser['username'];
		$parseUser->password = $this->testUser['password'];
		$parseUser->email = $this->testUser['email'];
		$parseUser->user_gender = $this->testUser['user_gender'];
		$parseUser->user_mstatus = $this->testUser['user_mstatus'];
		$parseUser->user_origin = $this->testUser['user_origin'];		
		$parseUser->user_profile_picture = $this->testUser['user_profile_picture'];
		$parseUser->user_birthdate = $this->testUser['user_birthdate'];
		$parseUser->user_phone = $this->testUser['user_phone'];
		$parseUser->user_address = $this->testUser['user_address'];
		$parseUser->user_occupation = $this->testUser['user_occupation'];
		$parseUser->user_income_range = $this->testUser['user_income_range'];
		$parseUser->user_mhstatus = $this->testUser['user_mhstatus'];
		$parseUser->user_mhnum = $this->testUser['user_mhnum'];
		$parseUser->user_interest = $this->testUser['user_interest'];
		$parseUser->user_newsletter = $this->testUser['user_newsletter'];		

		$result= $parseUser->signup();
		
		$res=json_decode($result, TRUE);		
		
		if (!empty($res['objectId'])){
			$return="Success";
		}else{
			$return="Failed";
		}		
		
		echo $return;				
	}
	
	
	
	public function email_checking(){
		$email=$this->uri->segment(3);
		$checking=$this->emailchecking($email);
		
		$data = array(
			'result' => $checking
		);	
			
		$this->load->view('user', $data);
	}
	
	
	
	public function emailchecking($email) {				
		$row = $this->user_model->emailchecking($email);		
		return $row;
	}
	
	public function user_data() {	
		$id=$this->uri->segment(3);
		$row = $this->user_model->user_data($id);		
		
		$data = array(
                    'json' => json_encode($row)
                    );
		$this->load->view('auth', $data);
	}
	
	public function update_child() {	
		$image=$this->uri->segment(3);
		$childid=$this->uri->segment(4);
		$row = $this->user_model->update_child($image,$childid);		
		
		$data = array(
                    'json' => json_encode($row)
                    );
		$this->load->view('auth', $data);
	}
	
	public function update_child_info() {	
		$fname=$this->uri->segment(3);
		$lname=$this->uri->segment(4);
		$bdate=$this->uri->segment(5);
		$interest=$this->uri->segment(6);
		$fave_act=$this->uri->segment(7);
		$fave_books=$this->uri->segment(8);		
		$childid=$this->uri->segment(9);		
		
		$row = $this->user_model->update_child_info($fname, $lname, $bdate, $interest, $fave_act, $fave_books, $childid);		
		
		$data = array(
                    'json' => json_encode($row)
                    );
		$this->load->view('auth', $data);
	}
	
	public function update_profile(){
		$row = $this->user_model->update_profile($_POST);
		
		$data = array(
                    'json' => json_encode($row)
                    );
		$this->load->view('auth', $data);
	}
	
	public function emailcheckingJS($email) {				
		$row = $this->user_model->emailchecking($email);	
		$data = array(
                    'json' => json_encode($row)
                    );
		$this->load->view('auth', $data);
	}
	
	public function update_settings() {				
		$id=$this->uri->segment(3);
		$keep_myinfo=$this->uri->segment(4);
		$keep_child=$this->uri->segment(5);
		
		$row = $this->user_model->update_settings($id, $keep_myinfo, $keep_child);
		
		$data = array(
                    'json' => json_encode($row)
                    );
		$this->load->view('auth', $data);
	}
}