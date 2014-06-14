//General scripts for groups/theAsianparent.com
	var curryear=get_year();
	var root = location.protocol + '//' + location.host;
	var add_url='index.php';
	
	function get_year(){
		var currentTime = new Date()
		var year = currentTime.getFullYear();
		return year;
	}

	function tm_signup(){
		var msg='';
		var email_address=document.getElementById('eadd').value;
		var fullname=document.getElementById('fullname').value;		
		var passwd=document.getElementById('pw').value;
		var repasswd=document.getElementById('repw').value;
		var bmonth=document.getElementById('bmonth').value;
		var bday=document.getElementById('bday').value;
		var byear=document.getElementById('byear').value;
						
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
			var postData = $(this).serializeArray();				
			var formURL = '/'+add_url+'/user/setUp/';
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
		  document.getElementById('profile_pic').innerHTML='<img src="/resources/images/ajax-loader.gif" /><br>Uploading...';
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
			  document.getElementById('profilepic').value=data.url;
			  document.getElementById('profile_pic').innerHTML='<img src="'+data.url+ '" width="102"/>';		  
			},
			error: function(data) {
			  var obj = jQuery.parseJSON(data);
			  alert(obj.error);
			}
		  });
		});
	});