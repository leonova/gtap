	var root = location.protocol + '//' + location.host;	
	var profile, email;	
	
	function tm_login(){		
		var msg='';
		var email_address=$('#email_add').val();
		var passwd=$('#passwd').val();
		if (!email1(email_address)){
			msg+='Invalid Email Address \n';
		}
		
		if (msg==""){
			$("#loginForm").submit(); 
			return false;
		}else{
			//alert(msg);
			$('#userErrorLog').html('<strong class="errorMsg" >Invalid Email format</strong>');
			$('#dialog-login').animate({'height':'460px'},500);
		}
		
	}
	
	
	$("#loginForm").submit(function(e)
	{
		loading('open');
		var postData = $(this).serializeArray();		
		var formURL = '/auth/login/';
		e.preventDefault();
		$('#userErrorLog').html('<img src="/resources/images/ajax-loader.gif" /> <strong class="errorMsg"> Checking...</span>');
		$('#dialog-login').animate({'height':'480px'},500);
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			async: false,
			success:function(data) 
			{			
				var result=JSON.parse(data);				
				if (result.code!='101'){				
					alert('login successful');
					reload_page('root');					
				}else{
					$('#userErrorLog').html('<strong class="errorMsg" >Invalid Login </strong>');
					$('#dialog-login').animate({'height':'460px'},500);
				}
				
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				//if fails      
			}
		});
		 e.preventDefault(); //STOP default action 
		 return false;
	});
	
	function submitData(){
		$("#addSession").submit(); //Submit  the FORM
	}
	
	function loading($event){
		if ($event=="open"){
			$('.preload').css('display','block');
		}
		
		if ($event=="close"){
			$('.preload').css('display','none');
		}
	}
	
	
	$("#addSession").submit(function(e)
	{
		var postData = $(this).serializeArray();
		loading('open');
		var formURL = '/user/fblogin/';
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			async: false,
			success:function(data) 
			{				
				loading('close');
				//successful session					
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				//if fails      
			}
		});
		 e.preventDefault(); //STOP default action 
	});
		
	function reload_page(url){
		var red_url="";
		if (url==""){
			redurl=window.location.pathname;			
		}else{
			redurl=root;			
		}
		
		window.location = redurl;
		
	}
	
	function logout(){				
		main_logout();
		setInterval(function(){reload_page('root')},1000);		
	}	

	function main_logout(){
		$.ajax({
		url: '/auth/logout', //call url
		type: "POST", //POST OR GET
		cache: true //true or false
		}).done(function(data) {		
			//window.location = window.location.pathname;
			return false;
		});		
	}
  
	function loginFinishedCallback(authResult) {
		if (authResult) {
		  if (authResult['error'] == undefined){			
			loading('open');
			document.getElementById('myModalLogin').style.display='none';
			document.getElementById('mainmodal').style.display='none';
			gapi.client.load('plus','v1', loadProfile);  // Trigger request to get the email address.
		  } else {
			console.log('An error occurred');
		  }
		} else {
		  console.log('Empty authResult');  // Something went wrong
		}
	}

	
	function loadProfile(){
		var request = gapi.client.plus.people.get( {'userId' : 'me'} );
		request.execute(loadProfileCallback);
	}


	function loadProfileCallback(obj) {
		profile = obj;

		email = obj['emails'].filter(function(v) {
			return v.type === 'account'; // Filter out the primary email
		})[0].value; 
		displayProfile(profile);
	}


	function displayProfile(profile){    
		var image=profile['image']['url'];		
		var fname=profile['name']['givenName'];
		var lname=profile['name']['familyName'];
		var gender=profile['gender'];
		var id=profile['id'];
		$('#userdata').val(id+'||'+fname+'||'+lname+'||'+''+'||'+email+'||'+image+'||google||true');						
		submitData();
		
		$("body").removeClass("modal-open");				
		document.getElementById('myModalLogin').style.display='none';
		document.getElementById('mainmodal').style.display='none';	
		reload_page();	
	}
	
	
	function signupFinishedCallback(authResult) {
		
		if (authResult) {
		  if (authResult['error'] == undefined){						
			gapi.client.load('plus','v1', loadProfileSignup);  // Trigger request to get the email address.
		  } else {
			console.log('An error occurred');
		  }
		} else {
		  console.log('Empty authResult');  // Something went wrong
		}
		
	}
	
	function loadProfileSignup(){
		var request = gapi.client.plus.people.get( {'userId' : 'me'} );
		request.execute(loadProfileCallbackSignup);
	}


	function loadProfileCallbackSignup(obj) {
		profile = obj;

		email = obj['emails'].filter(function(v) {
			return v.type === 'account'; // Filter out the primary email
		})[0].value; 
		displayProfileSignup(profile);
	}


	function displayProfileSignup(profile){    
		var image=profile['image']['url'];	
		var fname=profile['name']['givenName'];
		var lname=profile['name']['familyName'];
		var name=fname+' '+lname;
		var gender=profile['gender'];
		var id=profile['id'];
					
		$('#fullname').val(name);			
		$('#gender').val(gender);
		$('#eadd').val(email);
		$('#origin').val('google');
		$('#account_id').val(id);
		$('#profile_picture').val(image);						
	}
	
	function fbLoginChecking() {
			FB.getLoginStatus(function(response) {	
				if (response.status=="connected"){
					fb_logout();			  
				}
			});
	}
		
	function fbSignUp() {	
			FB.getLoginStatus(function(response) {			
			  statusChangeCallbackSignUp(response);
			});
		}
		  		  
	function statusChangeCallbackSignUp(response) {			
		if (response.status === 'connected') {			
		  //setUser();
		  fb_signup();
		} else if (response.status === 'not_authorized') {			  
		  
		} else {
			fb_signup();
			alert('close');
		}
		
		return response.status;
	}
		  
	function fb_signup(){
	    FB.login(function(response) {
			console.log(response);
			if (response.status=='connected'){
				alert('open');
				setUserFB();
			}
		});		  
	}
		
	function setUserFB() {
		console.log('Welcome!  Fetching your information.... ');
		FB.api('/me', function(response) {
			var image="https://graph.facebook.com/"+response.id +"/picture";		
			var fname=response.first_name;
			var lname=response.last_name;
			var name=response.first_name+' '+response.last_name;
			var gender=response.gender;
			var email=response.email;
			var id=response.id;		
			$('#fullname').val(name);			
			$('#gender').val(gender);
			$('#eadd').val(email);
			$('#origin').val('facebook');
			$('#account_id').val(id);
			$('#profile_picture').val(image);							
		});
	}
		
	function statusChangeCallback(response) {		
		if (response.status === 'connected') {			
			setUser();
		} else if (response.status === 'not_authorized') {
			// The person is logged into Facebook, but not your app.
		} else {
			alert('open');
			fb_login();			
			}
		}
	
	function checkLoginState() {
		FB.getLoginStatus(function(response) {
		    statusChangeCallback(response);
		});
	}
			
	function fb_logout(){	    
		FB.logout(function(response) {
			// Person is now logged out				
		});
	}
		  
	function fb_login(){
	    FB.login(function(response) {
			console.log(response);
			if (response.status=='connected'){
				setUser();
				alert('close');
			}
	    });
		  
	}		