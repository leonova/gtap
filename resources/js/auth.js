	var root = location.protocol + '//' + location.host;
	var add_url='index.php';
	var profile, email;
	
	function gplus_logout(){
		document.getElementById("google_logout").innerHTML ='<iframe id="logoutframe" src="https://accounts.google.com/logout" style="display: none"></iframe>';		
	}
	
	function tm_login(){		
		var msg='';
		var email_address=document.getElementById('email_add').value;
		var passwd=document.getElementById('passwd').value;
		if (!email1(email_address)){
			msg+='Invalid Email Address \n';
		}
		
		if (msg==""){
			$("#loginForm").submit(); 
			return false;
		}else{
			alert(msg);
		}
		
	}
	
	
	$("#loginForm").submit(function(e)
	{
		var postData = $(this).serializeArray();		
		var formURL = '/'+add_url+'/auth/login/';
		e.preventDefault();
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
					reload_page('');					
				}else{
					document.getElementById("userErrorLog").innerHTML = '<strong style="color:red">Invalid Login </strong>';
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

	$("#addSession").submit(function(e)
	{
		var postData = $(this).serializeArray();
		
		var formURL = '/'+add_url+'/user/fblogin/';
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			async: false,
			success:function(data) 
			{				
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
		//fbLoginChecking();		
		gplus_logout();
		main_logout();
		setInterval(function(){reload_page('root')},1000);
		//reload_page();
		//return false;
	}	

	function main_logout(){
		$.ajax({
		url: '/'+add_url+'/auth/logout', //call url
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
		document.getElementById('userdata').value=id+'||'+fname+'||'+lname+'||'+''+'||'+email+'||'+image+'||google||true';						
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
		
			
		document.getElementById('fullname').value=name;			
		document.getElementById('gender').value=gender;
		document.getElementById('eadd').value=email;
		document.getElementById('origin').value='google';
		document.getElementById('account_id').value=id;
		document.getElementById('profile_picture').value=image;				
		
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
		}
		
		return response.status;
	}
		  
	function fb_signup(){
	    FB.login(function(response) {
			console.log(response);
			if (response.status=='connected'){
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
			document.getElementById('fullname').value=name;			
			document.getElementById('gender').value=gender;
			document.getElementById('eadd').value=email;
			document.getElementById('origin').value='facebook';
			document.getElementById('account_id').value=id;
			document.getElementById('profile_picture').value=image;				
				
		});
	}
		
	function statusChangeCallback(response) {		
		if (response.status === 'connected') {			
			setUser();
		} else if (response.status === 'not_authorized') {
			// The person is logged into Facebook, but not your app.
		} else {
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
			}
	    });
		  
	}
	
	function get_userdata(id){	
	var formURL = root + '/user/user_data/'+id;
	var winh = $(window).height();
	//$('body').css('height',winh);
	//$('body').css('overflow','hidden');
	$('.preload').css('display','block');
			$.ajax({
			url: formURL, //call url
			type: "POST", //POST OR GET
			cache: true //true or false
			}).done(function(data) {	
				$.each(data.user_settings, function() {	
					if (this.keep_myinfo_private==1){
						document.getElementById('keep_myinfo_private').checked=true;
					}
					
					if (this.keep_childreninfo_private==1){
						document.getElementById('keep_childreninfo_private').checked=true;
					}
										
				});
				
				$.each(data.personal_info, function() {	
					
					var interest=this.user_interest;
					var interest = interest.split(",");
					
					for (var x=0;x<interest.length;x++){
						var intValue=removespace(interest[x]);												
						document.getElementById(intValue).checked = true;;
						
					}
					
					$('#user-photo').html('<a href="#"><img src="' + this.profile_picture +'"/><span>Edit Photo</span></a>');
					$('#first-name').val(this.user_fname);
					$('#last-name').val(this.user_lname);
					$('#gender').val(this.user_gender);
					$('#marital-status').val(this.user_mstatus);
					var bdate=this.user_birthdate;
					var birthdate = bdate.split("-");
					$('#bmon').val(birthdate[1]);
					$('#bday').val(birthdate[2]);
					$('#byear').val(birthdate[0]);
					$('#email').val(this.user_email);
					$('#oldemail').val(this.user_email);
					$('#phone-number').val(this.user_phone);
					$('#address').val(this.user_address);
					$('#you-are-a').val(this.user_occupation);
					$('#income-range').val(this.user_incomerange);
					$('#motherhood-status').val(this.user_mhstatus);
					$('#num-child').val(this.user_mhnum);
					
				});
				
				var childinfo='';
				var countChild=0;
				var countChild1=0;
				$.each(data.child_info, function() {	
					countChild++;					 
					childinfo+='<form name="child'+countChild+'" method="POST" enctype="multipart/form-data"><input type="hidden"  id="child-id-'+countChild+'" name="childid" value="'+this.child_id+'" >'+
												'<h2>Child '+countChild+':</h2>'+
												'<p class="row">'+
												'	<span class="col-xs-3">'+
												'		<img class="media-object" src="/resources/images/squre-thumbnail.jpg" alt="...">'+
												'		Image of your child'+
												'	</span>'+
												'	<span class="col-xs-9">'+
												'		<input type="file" name="uploaded-images">'+
												'		Image not bigger than 100 by 100 and 2MB in size.'+
												'	</span>'+
												'</p>'+
												'<p class="row">'+
												'	<span class="col-xs-6"><label for="child-first-name">First Name:</label><input type="text" name="child-first-name" id="child-first-name'+countChild+'" value="'+this.child_fname+'" class="form-control"></span>'+
												'	<span class="col-xs-6"><label for="child-last-name">Last Name:</label><input type="text" name="child-last-name" id="child-last-name'+countChild+'" value="'+this.child_lname+'"class="form-control"></span>'+
												'</p>'+
												'<p>'+
												'  			<label>Date of birth:<span>*</span></label>'+
												'            <select name="child_bmon[]" id="child_bmon'+countChild+'" tabindex="8">'+
												'                <option value="">Month</option>'+
												'                <option value="01">Jan</option>'+
												'                <option value="02">Feb</option>'+
												'               <option value="03">Mar</option>'+
												'                <option value="04">Apr</option>'+
												'                <option value="05">May</option>'+
												'                <option value="06">Jun</option>'+
												'                <option value="07">Jul</option>'+
												'                <option value="08">Aug</option>'+
												'                <option value="09">Sep</option>'+
												'                <option value="10">Oct</option>'+
												'                <option value="11">Nov</option>'+
												'                <option value="12">Dec</option>'+
												'            </select>'+
												'            <select class="first bday" name="child_bday[]" id="child_bday'+countChild+'" tabindex="7">'+
												'               <option value="">Day</option>'+						
																'<option value="1">1</option>'+
																'<option value="2">2</option>'+
																'<option value="3">3</option>'+
																'<option value="4">4</option>'+
																'<option value="5">5</option>'+
																'<option value="6">6</option>'+
																'<option value="7">7</option>'+
																'<option value="8">8</option>'+
																'<option value="9">9</option>'+
																'<option value="10">10</option>'+
																'<option value="11">11</option>'+
																'<option value="12">12</option>'+
																'<option value="13">13</option>'+
																'<option value="14">14</option>'+
																'<option value="15">15</option>'+
																'<option value="16">16</option>'+
																'<option value="17">17</option>'+
																'<option value="18">18</option>'+
																'<option value="19">19</option>'+
																'<option value="20">20</option>'+
																'<option value="21">21</option>'+
																'<option value="22">22</option>'+
																'<option value="23">23</option>'+
																'<option value="24">24</option>'+
																'<option value="25">25</option>'+
																'<option value="26">26</option>'+
																'<option value="27">27</option>'+
																'<option value="28">28</option>'+
																'<option value="29">29</option>'+
																'<option value="30">30</option>'+
																'<option value="31">31</option>'+
												'            </select>'+
												'            <select class="byear" name="child_byear[]" id="child_byear'+countChild+'" tabindex="9">'+
												'                <option value="">Year</option>'+			
																 '<option value="1920">1920</option>'+
																'<option value="1921">1921</option>'+
																'<option value="1922">1922</option>'+
																'<option value="1923">1923</option>'+
																'<option value="1924">1924</option>'+
																'<option value="1925">1925</option>'+
																'<option value="1926">1926</option>'+
																'<option value="1927">1927</option>'+
																'<option value="1928">1928</option>'+
																'<option value="1929">1929</option>'+
																'<option value="1930">1930</option>'+
																'<option value="1931">1931</option>'+
																'<option value="1932">1932</option>'+
																'<option value="1933">1933</option>'+
																'<option value="1934">1934</option>'+
																'<option value="1935">1935</option>'+
																'<option value="1936">1936</option>'+
																'<option value="1937">1937</option>'+
																'<option value="1938">1938</option>'+
																'<option value="1939">1939</option>'+
																'<option value="1940">1940</option>'+
																'<option value="1941">1941</option>'+
																'<option value="1942">1942</option>'+
																'<option value="1943">1943</option>'+
																'<option value="1944">1944</option>'+
																'<option value="1945">1945</option>'+
																'<option value="1946">1946</option>'+
																'<option value="1947">1947</option>'+
																'<option value="1948">1948</option>'+
																'<option value="1949">1949</option>'+
																'<option value="1950">1950</option>'+
																'<option value="1951">1951</option>'+
																'<option value="1952">1952</option>'+
																'<option value="1953">1953</option>'+
																'<option value="1954">1954</option>'+
																'<option value="1955">1955</option>'+
																'<option value="1956">1956</option>'+
																'<option value="1957">1957</option>'+
																'<option value="1958">1958</option>'+
																'<option value="1959">1959</option>'+
																'<option value="1960">1960</option>'+
																'<option value="1961">1961</option>'+
																'<option value="1962">1962</option>'+
																'<option value="1963">1963</option>'+
																'<option value="1964">1964</option>'+
																'<option value="1965">1965</option>'+
																'<option value="1966">1966</option>'+
																'<option value="1967">1967</option>'+
																'<option value="1968">1968</option>'+
																'<option value="1969">1969</option>'+
																'<option value="1970">1970</option>'+
																'<option value="1971">1971</option>'+
																'<option value="1972">1972</option>'+
																'<option value="1973">1973</option>'+
																'<option value="1974">1974</option>'+
																'<option value="1975">1975</option>'+
																'<option value="1976">1976</option>'+
																'<option value="1977">1977</option>'+
																'<option value="1978">1978</option>'+
																'<option value="1979">1979</option>'+
																'<option value="1980">1980</option>'+
																'<option value="1981">1981</option>'+
																'<option value="1982">1982</option>'+
																'<option value="1983">1983</option>'+
																'<option value="1984">1984</option>'+
																'<option value="1985">1985</option>'+
																'<option value="1986">1986</option>'+
																'<option value="1987">1987</option>'+
																'<option value="1988">1988</option>'+
																'<option value="1989">1989</option>'+
																'<option value="1990">1990</option>'+
																'<option value="1991">1991</option>'+
																'<option value="1992">1992</option>'+
																'<option value="1993">1993</option>'+
																'<option value="1994">1994</option>'+
																'<option value="1995">1995</option>'+
																'<option value="1996">1996</option>'+
																'<option value="1997">1997</option>'+
																'<option value="1998">1998</option>'+
																'<option value="1999">1999</option>'+
																'<option value="2000">2000</option>'+
																'<option value="2001">2001</option>'+
																'<option value="2002">2002</option>'+
																'<option value="2003">2003</option>'+
																'<option value="2004">2004</option>'+
																'<option value="2005">2005</option>'+
																'<option value="2006">2006</option>'+
																'<option value="2007">2007</option>'+
																'<option value="2008">2008</option>'+
																'<option value="2009">2009</option>'+
																'<option value="2010">2010</option>'+
																'<option value="2011">2011</option>'+
																'<option value="2012">2012</option>'+
																'<option value="2013">2013</option>'+
																'<option value="2014">2014</option>'+
																
												'            </select>'+
												'</p>'+
												'<p><label for="child-interest">Interests: ( seperate by commas) </label><input type="text" name="child-interest[]" id="child-interest-'+countChild+'" value="'+this.child_interest+'" class="form-control"></p>'+
												'<p><label for="child-fav-activities">Favourite activities: ( seperate by commas) </label><input type="text" name="child-fav-activities[]" name="child-fav-activities-'+countChild+'" value="'+this.child_fave_activities+'" class="form-control"></p>'+
												'<p><label for="child-fav-books">Favourite books: ( seperate by commas) </label><input type="text" name="child-fav-books[]" id="child-fav-books-'+countChild+'" class="form-control" value="'+this.child_fave_books+'"></p>'+
												'<p><button type="button" class="btn btn-default" onclick="submitChildInfo();" style="cursor:pointer">Save</button></p>'+
											'</form>';									
				});
				document.getElementById('children-tab').innerHTML=childinfo;
				$('.preload').css('display','none');
				$.each(data.child_info, function() {	
					countChild1++;		
					var bdate=this.child_dob;
					var birthdate = bdate.split("-");
					$('#child_bmon'+countChild1).val(birthdate[1]);
					$('#child_bday'+countChild1).val(birthdate[2]);
					$('#child_byear'+countChild1).val(birthdate[0]);
				});
				//window.location = window.location.pathname;
				return false;
				
		});	
	
	}
	
	//values appened on Sign Up DOB fields

	/*dob_day=""
	dob_yr=""
	var curryear=get_year();
	for (var day_value = 1; day_value <= 31; day_value++) {
		dob_day += ''<option value="' + day_value + '">' + day_value + '</option>'+'
	}
	for (var yr_value = 1920; yr_value <= curryear; yr_value++) {
		dob_yr += ''<option value="' + yr_value + '">' + yr_value + '</option>'+'
	}

	$(".bday").append(dob_day);
	$(".byear").append(dob_yr);*/
	
	function submitChildInfo(){
	alert('data');
	}