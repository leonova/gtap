//General scripts for groups/theAsianparent.com
	var curryear=get_year();
	var root = location.protocol + '//' + location.host;
	
	function get_year(){
		var currentTime = new Date()
		var year = currentTime.getFullYear();
		return year;
	}

	function tm_signup(){
		var msg='';
		var email_address=$('#eadd').val();
		var fullname=$('#fullname').val();
		var passwd=$('#pw').val();
		var repasswd=$('#repw').val();
		var bmonth=$('#bmonth').val();
		var bday=$('#bday').val();
		var byear=$('#byear').val();
						
		if (!alphabet(fullname)){
			msg+='Invalid Name \n';
		}		
		
		if (!email1(email_address)){
			msg+='Invalid Email Address \n';
		}
		
		if (!password(passwd)){
			msg+='Invalid Password must be 8 character| with small letter | with capslock | with number \n';
		}
		
		if (repasswd!=passwd){
			msg+='Password didnt match';
		}
		
		if (bmonth==""){
			msg+="Birthday Month is Required \n";
		}
		
		if (bday==""){
			msg+="Birthday Day is Required \n";
		}
		
		if (byear==""){
			msg+="Birthday Year is Required \n";
		}
		
		if (document.getElementById('terms').checked == false )
		{
			msg+='Please confirm on the terms in condition to continue. \n';			
		}
						
		if (msg==""){
			$("#form-signup").submit(); 
			return false;
		}else{
			finalmsg="All fields are required: \n "+msg;
			alert(msg);
			return false;
		} 
		
	}

	$("#form-signup").submit(function(e)
	{		
			loading('open');
			var postData = $(this).serializeArray();				
			var formURL = '/user/setUp/';
			$.ajax(
			{
				url : formURL,
				type: "POST",
				data : postData,
				async: false,
				success:function(data) 
				{
					//data: return data from server							
					if (data=="Success"){
						fb_logout();
						alert('An email will be sent to verify your account');
						reload_page();
					}else{
						alert('Your Email Already Exist');
					}
					
				},
				error: function(jqXHR, textStatus, errorThrown) 
				{
					//if fails  
					alert('error!');    
				}
			});
			 e.preventDefault(); //STOP default action 		
	});
	
	function optionsBday(){
		var dob_day="";	
		for (var day_value = 1; day_value <= 31; day_value++) {
			dob_day += '<option value="' + day_value + '">' + day_value + '</option>';
		}
		
		return dob_day;
	}
	
	function optionsByear(){
		var dob_yr="";
		for (var yr_value = 1920; yr_value <= curryear; yr_value++) {
			dob_yr += '<option value="' + yr_value + '">' + yr_value + '</option>';
		}
		
		return dob_yr;
	}

	function submitChildInfo(data){
	var error="";
	
		if( !$('#imageInput'+data).val()) //check empty input filed
			{            
				updateChild(data,'');
		}else{
			var fsize = $('#imageInput'+data)[0].files[0].size; //get file size
			var ftype = $('#imageInput'+data)[0].files[0].type; // get file type			
				//Allowed file size is less than 1 MB (1048576)			
				if(fsize>2097152)
					{						
						alert("File Size is too big");
						return false;
					}
					//allow only valid image file types
				
				switch(ftype)
					{
						case 'image/png': case 'image/gif': case 'image/jpeg': case 'image/pjpeg':
							break;
						default:
							alert("Unsupported File Type");
							return false
					}
			updateChild(data,'withimage');					
		}
		
		
	}
	
	function uploadChildPicture(value){		
			objectName='#uploaded_images_'+value;
			
			$(objectName).bind("click", function(e) {
				  var files = e.target.files || e.dataTransfer.files;			  
				  file = files[0];			
			});
			
				  			
			console.log($(objectName)[0].files[0]);
															
				if( !$(objectName).val()) //check empty input filed
					{            
						alert('No Image File Selected');
						return false
				}else{
					
					var fsize = $(objectName)[0].files[0].size; //get file size
					var ftype = $(objectName)[0].files[0].type; // get file type	
					var fname = $(objectName)[0].files[0].name; // get file type				
						//Allowed file size is less than 1 MB (1048576)			
						if(fsize>2097152)
							{						
								alert("File Size is too big");
								return false;
							}
							//allow only valid image file types
						
						switch(ftype)
							{
								case 'image/png': case 'image/gif': case 'image/jpeg': case 'image/pjpeg':
									break;
								default:
									alert("Unsupported File Type");
									return false
							}							
				}
				
			  var serverUrl = 'https://api.parse.com/1/files/' + fname; 
			  $('#child_pic_'+value).html('<img src="/resources/images/ajax-loader.gif" /><br>Uploading...');
			  $.ajax({
				type: "POST",
				beforeSend: function(request) {
				  request.setRequestHeader("X-Parse-Application-Id", '5OZPunpgNbKfWoI1jNLc8WGLjtdIyhGLHMHBasS8');
				  request.setRequestHeader("X-Parse-REST-API-Key", 'LyvPgHupYyUHZMsksfeUcaDfqvJajiodoCv0O1N9');
				  request.setRequestHeader("Content-Type", ftype);
				},
				url: serverUrl,
				data: $(objectName)[0].files[0],
				processData: false,
				contentType: false,
				success: function(data) {			  
				var pic='#child_picture_'+value;		
					$(pic).val(data.url);						  			
					$('#child_pic_'+value).html('<img src="'+data.url+ '" style="width:102px;" />');															
				},
				error: function(data) {
				  var obj = jQuery.parseJSON(data);
				  alert(obj.error);
				}
			  });
		
	}
	
	function updateChildInfo(value){		
		loading('open');
		var postData = $("#update_child_data_"+value).serializeArray();				
		var formURL = '/user/updateChildInfo/'+value;
		$.ajax(
			{
				url : formURL,
				type: "POST",
				data : postData,
				async: false,
				success:function(data) 
			{
				//data: return data from server							
				loading('close');					
			},
			
			error: function(jqXHR, textStatus, errorThrown) 
			{
				//if fails  
				alert('error!');    
			}
		});
				 		
	}
	
		
	$(function() {
		
		var file;
		var error="";
		
		$('#imageInput').bind("change", function(e) {
				  var files = e.target.files || e.dataTransfer.files;			  
				  file = files[0];				  
		});
		
		$('#uploadbutton').click(function() {

			if( !$('#imageInput').val()) //check empty input filed
				{            
					alert('No Image File Selected');
					return false
			}else{
				
				var fsize = $('#imageInput')[0].files[0].size; //get file size
				var ftype = $('#imageInput')[0].files[0].type; // get file type	
				var fname = $('#imageInput')[0].files[0].name; // get file type				
					//Allowed file size is less than 1 MB (1048576)			
					if(fsize>2097152)
						{						
							alert("File Size is too big");
							return false;
						}
						//allow only valid image file types
					
					switch(ftype)
						{
							case 'image/png': case 'image/gif': case 'image/jpeg': case 'image/pjpeg':
								break;
							default:
								alert("Unsupported File Type");
								return false
						}							
			}
			
		  var serverUrl = 'https://api.parse.com/1/files/' + fname; 
		  $('#profile_pic').html('<img src="/resources/images/ajax-loader.gif" /><br>Uploading...');		  
		  $.ajax({
			type: "POST",
			beforeSend: function(request) {
			  request.setRequestHeader("X-Parse-Application-Id", '5OZPunpgNbKfWoI1jNLc8WGLjtdIyhGLHMHBasS8');
			  request.setRequestHeader("X-Parse-REST-API-Key", 'LyvPgHupYyUHZMsksfeUcaDfqvJajiodoCv0O1N9');
			  request.setRequestHeader("Content-Type", ftype);
			},
			url: serverUrl,
			data: file,
			processData: false,
			contentType: false,
			success: function(data) {		
				$('#profile_picture').val(data.url);						  			
				$('#profile_pic').html('<img src="'+data.url+ '" width="102"/>');		  
			},
			error: function(data) {
			  var obj = jQuery.parseJSON(data);
			  alert(obj.error);
			}
		  });
		});
	});
	
	function submitProfile(){	
		var nemail=$('#email').val();
		var oldemail=$('#oldemail').val();
		var reemail=$('#re-email').val();
		var id=$('#user-id').val();
		if (nemail!=oldemail){
			if (!email1(nemail)){
				alert('Invalid Email Format');
			}else{
				if (nemail==reemail){
					
				}else{
					alert('Email dont match');
				}
			}			
		}else{
			var settings=update_settings(id);
			$("#profileform").submit();
		}

	}
	
	function update_settings(id){
		
		var keep_myinfo=0;
		var keep_children_info=0;
		
		if (document.getElementById('keep_childreninfo_private').checked){
			keep_children_info=1;
		}
		
		if (document.getElementById('keep_myinfo_private').checked){
			keep_myinfo=1;
		}
		loading('open');
		var formURL = '/user/update_settings/'+id+'/'+keep_myinfo+'/'+keep_children_info;		
		$.ajax({
				url: formURL, //call url
				type: "GET", //POST OR GET
				cache: true //true or false
				}).done(function(data) {
					loading('close');
				});	
	}
	
	function checkEmail(){
		var emailResult='';
		var nemail=$('#email').val();
		var oldemail=$('#oldemail').val();
		var reemail=$('#re-email').val();	
		if (nemail!=oldemail){
			if (!email1(nemail)){
				alert('Invalid Email Format');
			}else{
				emailResult=emailChecking(nemail);								
			}
		}else{
			$('#re-email').prop('disabled', true);
		}
	}
	
	function emailChecking(email){
		var formURL = '/user/email_checking/'+email;		
		$.ajax({
				url: formURL, //call url
				type: "POST", //POST OR GET
				cache: true //true or false
				}).done(function(data) {										
					if (data!="Failed"){
						$('#re-email').prop('disabled', false);
					}else{
						alert('Email Already Exist');
					}
				});						
	}
		
	
	$("#profileform").submit(function(e)
	{
		var postData = $(this).serializeArray();
		loading('open');
		var formURL = '/user/update_profile/';
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			async: false,
			success:function(data) 
			{			
				$('#user_avatar').attr("src", $('#profile_picture').val());
				$('#user_image').attr("src", $('#profile_picture').val());				
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