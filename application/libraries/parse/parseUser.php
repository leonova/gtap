<?php

class parseUser extends parseRestClient{

	public $authData;

	public function __set($name,$value){
		$this->data[$name] = $value;
	}

	public function signup($username='',$password=''){
		if($username != ''){
			$this->username = $username;
			$this->password = $password;
		}

		if($this->data['username'] != ''){
			$request = $this->request(array(
				'method' => 'POST',
	    		'requestUrl' => 'users',
				'data' => $this->data
			));
			
	    	return $request;
			
		}
		else{
			$this->throwError('username and password fields are required for the signup method');
		}
		
	}

	public function login(){	
		if(!empty($this->data['username']) || !empty($this->data['password'])	){
			$request = $this->request(array(
				'method' => 'GET',
	    		'requestUrl' => 'login',
				'action' => 'login',
		    	'data' => array(
		    		'username' => $this->data['username'],
					'password' => $this->data['password']		    	
		    	)
			));
			
	    	return $request;			
	
		}
		else{
			$this->throwError('username and password field are required for the login method');
		}
	
	}
	
	public function setUpAdd($class){
	
			$request = $this->request(array(
				'method' => 'POST',
	    		'requestUrl' => $class,
				'data' => $this->data,
				'action'=>'add'
			));
			
	    	return $request;			
	}
	
	public function uploadPic(){	
		if(!empty($this->data)	){
			$request = $this->request(array(
				'method' => 'GET',
	    		'requestUrl' => 'files/',
		    	'data' => array(
		    		'pic' => $this->data					
		    	)
			));
			echo $request;
	    	return $request;			
	
		}
		else{
			$this->throwError('username and password field are required for the login method');
		}
	
	}
	
public function socialLogin(){
	if(!empty($this->authData)){
		$request = $this->request( array(
			'method' => 'POST',
			'requestUrl' => 'users',
			'data' => array(
				'authData' => $this->authData
			)
		));
		return $request;
	}
	else{
		$this->throwError('authArray must be set use addAuthData method');
	}
}

	public function get($objectId){
		if($objectId != ''){
			$request = $this->request(array(
				'method' => 'GET',
	    		'requestUrl' => 'users/'.$objectId,
			));
			
	    	return $request;			
			
		}
		else{
			$this->throwError('objectId is required for the get method');
		}
		
	}
	//TODO: should make the parseUser contruct accept the objectId and update and delete would only require the sessionToken
	public function updateNonUser($objectId, $class, $sessionToken){	
			if(!empty($objectId)){
				$request = $this->request(array(
					'method' => 'PUT',
					'requestUrl' => $class.'/'.$objectId,					
					'data' => $this->data,
					'sessionToken' => $sessionToken,
					'action'=>'update'
				));
				
				return $request;			
			}
			else{
				$this->throwError('objectId and sessionToken are required for the update method');
			}
			
		}
		
	public function update($objectId, $class, $sessionToken){	
			if(!empty($objectId)){
				$request = $this->request(array(
					'method' => 'PUT',
					'requestUrl' => $class.'/'.$objectId,					
					'data' => $this->data,
					'sessionToken' => $sessionToken,
					'action'=>'updateuser'
				));
				
				return $request;			
			}
			else{
				$this->throwError('objectId and sessionToken are required for the update method');
			}
			
		}

	public function delete($objectId,$sessionToken){
		if(!empty($objectId) || !empty($sessionToken)){
			$request = $this->request(array(
				'method' => 'DELETE',
				'requestUrl' => 'users/'.$objectId,
	    		'sessionToken' => $sessionToken
			));
			
	    	return $request;			
		}
		else{
			$this->throwError('objectId and sessionToken are required for the delete method');
		}
		
	}
	
	public function addAuthData($authArray){
		if(is_array($authArray)){			
			$this->authData[$authArray['type']] = $authArray['authData'];
		}
		else{
			$this->throwError('authArray must be an array containing a type key and a authData key in the addAuthData method');
		}
	}

	public function linkAccounts($objectId,$sessionToken){
		if(!empty($objectId) || !empty($sessionToken)){
			$request = $this->request( array(
				'method' => 'PUT',
				'requestUrl' => 'users/'.$objectId,
				'sessionToken' => $sessionToken,
				'data' => array(
					'authData' => $this->authData
				)
			));

			return $request;
		}
		else{
			$this->throwError('objectId and sessionToken are required for the linkAccounts method');
		}		
	}

	public function unlinkAccount($objectId,$sessionToken,$type){
		$linkedAccount[$type] = null;

		if(!empty($objectId) || !empty($sessionToken)){
			$request = $this->request( array(
				'method' => 'PUT',
				'requestUrl' => 'users/'.$objectId,
				'sessionToken' => $sessionToken,
				'data' => array(
					'authData' => $linkedAccount
				)
			));

			return $request;
		}
		else{
			$this->throwError('objectId and sessionToken are required for the linkAccounts method');
		}		

	}

	public function requestPasswordReset($email){
		if(!empty($email)){
			$this->email - $email;
			$request = $this->request(array(
			'method' => 'POST',
			'requestUrl' => 'requestPasswordReset',
			'email' => $email,
			'data' => $this->data
			));

			return $request;
		}
		else{
			$this->throwError('email is required for the requestPasswordReset method');
		}

}

	
}

?>