<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH . 'libraries/parse/parse.php';
require_once APPPATH . 'libraries/parse/parseQuery.php';
require_once APPPATH . 'libraries/parse/parseUser.php';
class User extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
        
        $this->load->library('session');			
		$this->load->model('auth_model');	
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
		$token=$this->auth_model->checkSessionToken();		
		$id=$this->session->userdata('objectId');
		
		// set session for latest data
		$profile=$this->searchData('objectId', $this->session->userdata('objectId'),'main');
		$this->session->set_userdata($profile[0]);		
			
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
		$keep_myinfo_private=$this->session->userdata('keep_myinfo_private');	
		$keep_childreninfo_private=$this->session->userdata('keep_childreninfo_private');	
			
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
		$children=$this->profile_children($id);		
			
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
				'byearmain'			=>$byearmain,
				'keep_myinfo_private'=>$keep_myinfo_private,
				'keep_childreninfo_private'=>$keep_childreninfo_private,
				'childrencount'		=>count($children),
				'childrenvalue'		=>$children
			);				       
			
			
		$this->load->view('template/header', $data);
		$this->load->view('profile-page-setting', $data);
		$this->load->view('template/footer', $data);
		
	}
	
	public function profile_children($id){	
		$token=$this->auth_model->checkSessionToken();	
		$parseUser = new parseUser;	
		return $children=$this->searchData('user_id', $this->session->userdata('objectId'),'Child');		
		
	}
		
	public function user_profile($id, $class) {	
		$token=$this->auth_model->checkSessionToken();		
		$parseUser = $this->parseUser;
		$this->dataUser = array(
			'objectId' => $id				
		);
		
		$result=$this->queryUsersInd($class);		
		return $result;				
	}
	
	public function queryUsersInd($class){
		$parseUser = $this->parseUser;
		$parseUser->objectId = $this->dataUser['objectId'];		
		$userQuery = new parseQuery($class);		
		$userQuery->where('objectId',$parseUser->objectId);
		$return = $userQuery->find();
	}		
			
	//fblogin
	public function fblogin() {			
				
		if (!empty($_POST)){
			$user=explode('||',$this->input->post('userdata'));
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
			$this->dataUser = array(
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
			
			$this->session->set_userdata($this->dataUser);
			
			$result=$this->signupWithDataObjectIdOther();	
			$res=json_decode($result, TRUE);		
		
			if (!empty($res['objectId'])){
				$return=$res['objectId'];
			}else{
				$return=$this->getObjectId($email, '');
			}
			$user_settings=$this->setUpSettings($return);
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
			$email=strip_tags(trim($this->input->post('eadd')));
			$fullname=strip_tags(trim($this->input->post('fullname')));		
			$gender=strip_tags(trim($this->input->post('gender')));
			$password=strip_tags(trim($this->input->post('passwd')));		
			$birthdate=strip_tags(trim($this->input->post('byear'))).'-'.strip_tags(trim($this->input->post('bmonth'))).'-'.strip_tags(trim($this->input->post('bday')));
			$origin=strip_tags(trim($this->input->post('origin')));
			$account_id=strip_tags(trim($this->input->post('account_id')));
			$profile_picture=strip_tags(trim($this->input->post('profile_picture')));
			if (!empty($_POST['newsletter'])){
				$newsletter=strip_tags(trim($this->input->post('newsletter')));
			}else{
				$newsletter='';
			}
			
			$this->parseUser = new parseUser;
			$this->dataUser = array(
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
		$parseUser->user_fullname = $this->dataUser['user_fullname'];		
		$parseUser->username = $this->dataUser['username'];
		$parseUser->password = $this->dataUser['password'];
		$parseUser->email = $this->dataUser['email'];
		$parseUser->user_gender = $this->dataUser['user_gender'];
		$parseUser->user_mstatus = $this->dataUser['user_mstatus'];
		$parseUser->user_origin = $this->dataUser['user_origin'];		
		$parseUser->user_profile_picture = $this->dataUser['user_profile_picture'];
		$parseUser->user_birthdate = $this->dataUser['user_birthdate'];
		$parseUser->user_phone = $this->dataUser['user_phone'];
		$parseUser->user_address = $this->dataUser['user_address'];
		$parseUser->user_occupation = $this->dataUser['user_occupation'];
		$parseUser->user_income_range = $this->dataUser['user_income_range'];
		$parseUser->user_mhstatus = $this->dataUser['user_mhstatus'];
		$parseUser->user_mhnum = $this->dataUser['user_mhnum'];
		$parseUser->user_interest = $this->dataUser['user_interest'];
		$parseUser->user_newsletter = $this->dataUser['user_newsletter'];		

		$result= $parseUser->signup();
				
		return $result;
											
	}
	
	public function signupWithDataObjectId(){
		$parseUser = $this->parseUser;
		$parseUser->user_fullname = $this->dataUser['user_fullname'];		
		$parseUser->username = $this->dataUser['username'];
		$parseUser->password = $this->dataUser['password'];
		$parseUser->email = $this->dataUser['email'];
		$parseUser->user_gender = $this->dataUser['user_gender'];
		$parseUser->user_mstatus = $this->dataUser['user_mstatus'];
		$parseUser->user_origin = $this->dataUser['user_origin'];		
		$parseUser->user_profile_picture = $this->dataUser['user_profile_picture'];
		$parseUser->user_birthdate = $this->dataUser['user_birthdate'];
		$parseUser->user_phone = $this->dataUser['user_phone'];
		$parseUser->user_address = $this->dataUser['user_address'];
		$parseUser->user_occupation = $this->dataUser['user_occupation'];
		$parseUser->user_income_range = $this->dataUser['user_income_range'];
		$parseUser->user_mhstatus = $this->dataUser['user_mhstatus'];
		$parseUser->user_mhnum = $this->dataUser['user_mhnum'];
		$parseUser->user_interest = $this->dataUser['user_interest'];
		$parseUser->user_newsletter = $this->dataUser['user_newsletter'];		

		$result= $parseUser->signup();
		
		
		$res=json_decode($result, TRUE);		
				
		if (!empty($res['objectId'])){
			$user_settings=$this->setUpSettings($res['objectId']);
			$return="Success";
		}else{
			$return="Failed";
		}				
		
		echo $return;				
	}
	
	public function setUpSettings($objectId){
		$this->parseUser = new parseUser;
		$this->dataUser = array(
			'user_id' => $objectId,
			'keep_myinfo_private' => '0',
			'keep_childreninfo_private' => '0'			
		);
		
		$result=$this->setUpSettingsWithData();	

		return $result;
	}
	
	public function setUpSettingsWithData(){
		$parseUser = $this->parseUser;
		$parseUser->user_id = $this->dataUser['user_id'];
		$parseUser->keep_myinfo_private = $this->dataUser['keep_myinfo_private'];
		$parseUser->keep_childreninfo_private = $this->dataUser['keep_childreninfo_private'];		

		$return = $parseUser->setUpSettings();

		return $return;
		
	}
		
	public function email_checking(){
		$email=$this->uri->segment(3);
		$this->parseUser = new parseUser;
		$res=$this->searchData('email', $email,'users');		
		
		if (empty($res)){
			echo "Success";
		}else{
			echo "Failed";
		}
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
		
	
	public function update_profile(){
		$id=strip_tags(trim($this->input->post('user-id')));
		$email=strip_tags(trim($this->input->post('email')));
		$fullname=strip_tags(trim($this->input->post('fullname')));		
		$gender=strip_tags(trim($this->input->post('gender')));				
		$birthdate=strip_tags(trim($this->input->post('byear'))).'-'.strip_tags(trim($this->input->post('bmonth'))).'-'.strip_tags(trim($this->input->post('bday')));
		$profile_picture=strip_tags(trim($this->input->post('profile_picture')));
		$incomerange=strip_tags(trim($this->input->post('income-range')));
		$mstatus=strip_tags(trim($this->input->post('marital-status')));
		$mhstatus=strip_tags(trim($this->input->post('motherhood-status')));
		$numchild=strip_tags(trim($this->input->post('num-child')));
		$phone=strip_tags(trim($this->input->post('phone-number')));
		$occupation=strip_tags(trim($this->input->post('you-are-a')));
		$interest=$this->input->post('your-interest');
		$address=strip_tags(trim($this->input->post('address')));
		
		if (!empty($_POST['newsletter'])){
			$newsletter=strip_tags(trim($this->input->post('newsletter')));
		}else{
			$newsletter='';
		}
		
		$finterest='';
		$y=0;
		for ($x=0;$x<count($interest);$x++){
			$finterest.=$interest[$x];
			$y++;		
			if ($y<count($interest)){
				$finterest.=',';
			}
		}	
		
		
			$this->parseUser = new parseUser;
			$this->dataUser = array(
				'user_fullname' => $fullname,			
				'username' => $email,				
				'email' => $email,
				'user_gender' => $gender,
				'user_mstatus' => $mstatus,				
				'user_profile_picture'=> $profile_picture,
				'user_birthdate'=> $birthdate,
				'user_phone' => $phone,
				'user_address' => $address,			
				'user_occupation' => $occupation,
				'user_income_range' => $incomerange,
				'user_mhstatus' => $mhstatus,
				'user_mhnum' => $numchild,
				'user_interest' => $finterest,
				'user_newsletter' => $newsletter
			);
			
			$set=$this->session->set_userdata($this->dataUser);			
			
			$result=$this->updateUser($id);	
			return $result;
			
	}
	
	public function updateUser($objectId){			
		$parseUser = $this->parseUser;
		$parseUser->user_fullname = $this->dataUser['user_fullname'];					
		$parseUser->email = $this->dataUser['email'];
		$parseUser->user_gender = $this->dataUser['user_gender'];
		$parseUser->user_mstatus = $this->dataUser['user_mstatus'];		
		$parseUser->user_profile_picture = $this->dataUser['user_profile_picture'];
		$parseUser->user_birthdate = $this->dataUser['user_birthdate'];
		$parseUser->user_phone = $this->dataUser['user_phone'];
		$parseUser->user_address = $this->dataUser['user_address'];
		$parseUser->user_occupation = $this->dataUser['user_occupation'];
		$parseUser->user_income_range = $this->dataUser['user_income_range'];
		$parseUser->user_mhstatus = $this->dataUser['user_mhstatus'];
		$parseUser->user_mhnum = $this->dataUser['user_mhnum'];
		$parseUser->user_interest = $this->dataUser['user_interest'];
		$parseUser->user_newsletter = $this->dataUser['user_newsletter'];		

		$return = $parseUser->update($objectId, 'users', $id=$this->session->userdata('sessionToken'));

		return $return;
		
	}
	
	public function update_settings(){
		$token=$this->auth_model->checkSessionToken();	
		$id=$this->uri->segment(3);
		$keep_myinfo=$this->uri->segment(4);
		$keep_child=$this->uri->segment(5);
		$this->parseUser = new parseUser;
		$objectId=$this->searchData('user_id',$id,'UserSettings');		
		
		$this->parseUser = new parseUser;
		$this->dataUser = array(
			'user_id' => $id,
			'keep_myinfo_private' => $keep_myinfo,
			'keep_childreninfo_private' => $keep_child			
		);
		
		$this->session->set_userdata($this->dataUser);
					
		$result=$this->updateSettingsWithData($objectId);		
		return $result;
		
	}
	
	
	public function searchData($field,$data,$class){					
		$this->dataUser = array(
			$field => $data				
		);
		
		$result=$this->queryDataInd($field,$class);		
		return $result;
	}
	
	public function queryDataInd($field,$func){
		if ($func=="main"){
			$class="users";
		}else{
			$class=$func;
		}
		$data= $this->dataUser[$field];		
		$userQuery = new parseQuery($class);		
		$userQuery->where($field,$data);
		$result = $userQuery->find();			
		$return=json_decode($result, TRUE);
		if ($func=='Child' || $func=='main'){
			$res=$return['results'];
		}else{	
			$res=$return['results'][0]['objectId'];
		}
		return $res;
	}
	
	
	public function updateSettingsWithData($objectId){	
		$token=$this->auth_model->checkSessionToken();	
		$parseUser = $this->parseUser;
		$parseUser->user_id = $this->dataUser['user_id'];
		$parseUser->keep_myinfo_private = $this->dataUser['keep_myinfo_private'];
		$parseUser->keep_childreninfo_private = $this->dataUser['keep_childreninfo_private'];		

		$return = $parseUser->updateNonUser($objectId, 'UserSettings', $id=$this->session->userdata('sessionToken'));		
		return $return;
		
	}
	
	public function updateChildInfo(){
		$token=$this->auth_model->checkSessionToken();	
		$id=$this->uri->segment(3);
		$objectId=$_POST['objectId'];
		$birthdate=strip_tags(trim($this->input->post('child_byear'))).'-'.strip_tags(trim($this->input->post('child_bmon'))).'-'.strip_tags(trim($this->input->post('child_bday')));		
		$this->parseUser = new parseUser;		
		$this->dataUser = array(
			'child_fname' => $this->input->post('child-first-name'),
			'child_lname' => $this->input->post('child-last-name'),
			'child_dob' => $birthdate,			
			'child_gender' => $this->input->post('child-gender'),			
			'child_interest' => $this->input->post('child-interest'),			
			'child_pictures' => $this->input->post('child_picture_'.$id),	
			'child_favorite_books' => $this->input->post('child-fav-books'),			
			'child_favorite_activities' => $this->input->post('child-fav-activities')						
		);
		
		$this->session->set_userdata($this->dataUser);
					
		$result=$this->updateChildInfoWithData($objectId);		
		return $result;;
	}
	
	public function updateChildInfoWithData($objectId){	
		$token=$this->auth_model->checkSessionToken();	
		$parseUser = $this->parseUser;
		$parseUser->child_fname = $this->dataUser['child_fname'];
		$parseUser->child_lname = $this->dataUser['child_lname'];
		$parseUser->child_dob = $this->dataUser['child_dob'];
		$parseUser->child_gender = $this->dataUser['child_gender'];		
		$parseUser->child_interest = $this->dataUser['child_interest'];
		$parseUser->child_pictures = $this->dataUser['child_pictures'];
		$parseUser->child_favorite_books = $this->dataUser['child_favorite_books'];
		$parseUser->child_favorite_activities = $this->dataUser['child_favorite_activities'];

		$return = $parseUser->updateNonUser($objectId, 'Child', $id=$this->session->userdata('sessionToken'));		
		
		return $return;
		
	}
}