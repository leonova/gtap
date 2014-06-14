<?php
class parseMainUser {
	
	public $parseUser;
	public $testUser;
	
	public function setUp(){
	
		$pic=$this->uploadPic();
		
		$this->parseUser = new parseUser;
		$this->testUser = array(
			'user_firstname' => 'leo',
			'user_lastname' => 'villanueva',
			'username' => 'test23@parse.com',
			'password' => 'testPass',
			'email' => 'test23@parse.com',
			'user_gender' => 'male',
			'user_mstatus' => 'single',
			'user_origin'=> '',
			'user_profile_picture'=> $pic->url,
			'user_birthdate'=> '2014-05-13',
			'user_phone' => '1234567',
			'user_address' => 'Makati City',			
			'user_occupation' => '1234567',
			'user_income_range' => '2324234',
			'user_mhstatus' => 'none',
			'user_mhnum' => '1',
			'user_interest' => 'playing, dancing',
			'user_newsletter' => '1'
		);
		
		$result=$this->signupWithDataObjectId();		
		return $result;
	}

	public function signupWithDataObjectId(){
		$parseUser = $this->parseUser;
		$parseUser->user_firstname = $this->testUser['user_firstname'];
		$parseUser->user_lastname = $this->testUser['user_lastname'];
		$parseUser->username = $this->testUser['username'];
		$parseUser->password = $this->testUser['password'];
		$parseUser->email = $this->testUser['email'];
		$parseUser->user_gender = $this->testUser['user_gender'];
		$parseUser->user_mstatus = $this->testUser['user_mstatus'];
		$parseUser->user_phone = $this->testUser['user_origin'];
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

		$return = $parseUser->signup();
		$_SESSION['userdata']=$parseUser;
		$_SESSION['objectid']=$return->objectId;
		
		return $return;
		
	}

	public function login(){		
		$parseUser = $this->parseUser;
		$this->testUser = array(
			'username' => 'test1@parse.com',
			'password' => 'testPass'			
		);
		
		$result=$this->loginWithDataObjectId();		
		return $result;
	}
	
	public function loginWithDataObjectId(){
		$parseUser = $this->parseUser;		
		$parseUser->username = $this->testUser['username'];
		$parseUser->password = $this->testUser['password'];
				
		$loginUser = new parseUser;
		$loginUser->username = $this->testUser['username'];
		$loginUser->password = $this->testUser['password'];

		$returnLogin = $loginUser->login();
				
		return $returnLogin;
	
	}

	public function queryUsersWithQueryExpectResultsKey(){
		$parseUser = $this->parseUser;
		$userQuery = new parseQuery('users');
		$userQuery->whereExists('email');
		$return = $userQuery->find();
		echo "<pre>";
		print_r($return);

	}
	
	
	public function searchUser(){		
		$parseUser = $this->parseUser;
		$this->testUser = array(
			'objectId' => '6zNrYUFzbi'				
		);
		
		$result=$this->queryUsersInd();		
		return $result;
	}
	
	public function queryUsersInd(){
		$parseUser = $this->parseUser;
		$parseUser->objectId = $this->testUser['objectId'];		
		$userQuery = new parseQuery('users');		
		$userQuery->where('objectId',$parseUser->objectId);
		$return = $userQuery->find();
						
		echo "<pre>";
		print_r($return);

	}
	
	public function uploadPic(){
		$uploadPic = new parseUser;
		$uploadPic->data = file_get_contents('square.jpg');
		$save = $uploadPic->uploadPic();
				
		return $save;		
	}

	public function deleteWithObjectIdExpectTrue(){
		$testUser = new parseUser;
		$testUser->username = $this->testUser['username'];
		$testUser->password = $this->testUser['password'];
		
		$user = $testUser->signup();
		
		$parseUser = $this->parseUser;
		$return = $parseUser->delete($user->objectId,$user->sessionToken);
		
		\Enhance\Assert::isTrue( $return );
	}
/*
	THESE TESTS RETURN ERROR EVERYTIME FROM PARSE BECAUSE OF AN INVALID FACEBOOK ID

	public function linkAccountsWithAddAuthDataExpectTrue(){
		$testUser = new parseUser;
		$testUser->username = $this->testUser['username'];
		$testUser->password = $this->testUser['password'];
		
		$user = $testUser->signup();
		
		$parseUser = new parseUser;

		//These technically don't have to be REAL, unless you want them to actually work :)
		$parseUser->addAuthData(array(
			'type' => 'facebook',
			'authData' => array(
				'id' => 'FACEBOOK_ID_HERE',
				'access_token' => 'FACEBOOK_ACCESS_TOKEN',
				'expiration_date' => "2012-12-28T23:49:36.353Z"
			)
		));

		$parseUser->addAuthData(array(
			'type' => 'twitter',
			'authData' => array(
				'id' => 'TWITTER_ID',
				'screen_name' => 'TWITTER_SCREEN_NAME',
				'consumer_key' => 'CONSUMER_KEY',
				'consumer_secret' => 'CONSUMER_SECRET',
				'auth_token' => 'AUTH_TOKEN',
				'auth_token_secret' => 'AUTH_TOKEN_SECRET',
			)
		));
		
		$return = $parseUser->linkAccounts($user->objectId,$user->sessionToken);

		\Enhance\Assert::isTrue( $return );
	}

	
	public function unlinkAccountWith(){
		
	}
*/

}

?>