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
		
		/*if (document.getElementById('terms').checked == false )
		{
			msg+='Please confirm on the terms in condition to continue. \n';			
		}*/
						
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
	
	function addChild(value){		
		loading('open');
		var postData = $("#update_child_data_"+value).serializeArray();				
		var formURL = '/user/addChild/'+value;
		$.ajax(
			{
				url : formURL,
				type: "POST",
				data : postData,
				async: false,
				success:function(data) 
			{
				//data: return data from server						
				$('#addchild_'+value).attr('disabled',true);	
				loading('close');					
			},
			
			error: function(jqXHR, textStatus, errorThrown) 
			{
				//if fails  
				alert('error!');    
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
						$('#generalsave').attr("disabled", false);
					}else{
						alert('Email Already Exist');
						$('#generalsave').attr("disabled", true);
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
				$('#user_avatar').addClass('photo-dp-s');
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
	
	
	//append New Child form
	var childcount = $('.childform').length;
	if(childcount == 0){
		 var cnum1 = 0;
	}
	else{
		var cnum1 = childcount;
	}

	var childform ="";

	$('#AddChild-btn').click(function(){
		var bday=optionsBday();
		var byear=optionsByear();
		cnum1++;	
		var childcount= $('#childcount').val();
		var cnum=parseInt(childcount)+parseInt(cnum1);
		
		childform ="";
		childform = '<div class="childcontent"><form method="post" enctype="multipart/form-data" name="fileupload_'+ cnum +'" id="fileupload_'+ cnum +'">' +	
												'<h2>Child '+ cnum +':</h2>'+
												'<p class="row">'+
													'<span class="col-xs-3" id="child_pic_'+ cnum +'">'+
														'<img class="media-object" src="/resources/images/dp-child.png" alt="..." class="photo-dp-m">'+
													'</span>'+
													'<span class="col-xs-9">'+
														'<input type="file" name="uploaded_images_'+ cnum +'" id="uploaded_images_'+ cnum +'">'+
														'Image not bigger than 100 by 100 and 2MB in size.<br>'+
														'<input type="button"  id="uploadbutton_'+ cnum +'" name="uploadbutton_'+ cnum +'" value="Upload Picture" onclick="uploadChildPicture('+cnum+');">'+											
													'</span>'+
												'</p>'+
											'</form>'+
											'<form  method="post" enctype="multipart/form-data" name="update_child_data_' + cnum + '" id="update_child_data_'+ cnum +'">'+
												'<input type="hidden" id="child_picture_'+ cnum +'" name="child_picture_'+ cnum +'" value="">'+
												'<input type="hidden" id="objectId" name="objectId" value="">'+
												'<p class="row">'+
													'<span class="col-xs-6"><label for="child-first-name">First Name:</label>'+
														'<input type="text" name="child-first-name" id="child-first-name" class="form-control" value="">'+
													'</span>'+
													'<span class="col-xs-6"><label for="child-last-name">Last Name:</label>'+
														'<input type="text" name="child-last-name" id="child-last-name" class="form-control" value="">'+
													'</span>'+
												'</p>'+
												'<p class="row"><span class="col-xs-2">'+
															'<label for="gender">Gender:<span>*</span></label>'+
																'<select id="child-gender" name="child-gender">'+
																  '<option value="male">Male</option>'+
																  '<option value="female">Female</option>'+
																'</select>'+
															'</span>'+
															'<span class="col-xs-9">'+												
															'<label>Date of birth:<span>*</span></label>'+
															'<select name="child_bmon" id="child_bmon" tabindex="11">'+
															  ' <option value="">Month</option>'+
																'<option value="01">Jan</option>'+
															   ' <option value="02">Feb</option>'+
																'<option value="03" >Mar</option>'+
																'<option value="04" >Apr</option>'+
															   ' <option value="05">May</option>'+
															   ' <option value="06" >Jun</option>'+
															  '  <option value="07" >Jul</option>'+
															 '   <option value="08" >Aug</option>'+
															   ' <option value="09" >Sep</option>'+
															  '  <option value="10" >Oct</option>'+
															   ' <option value="11" >Nov</option>'+
															   ' <option value="12" >Dec</option>'+
														   ' </select>'+
														  '  <select class="cbay" name="child_bday" id="bday" tabindex="12">'+
														   '     <option value="">Day</option>		'+bday+																	
															'</select>'+
															'<select name="child_byear" id="byear" class="cyear" tabindex="13">'+
															   ' <option value="">Year</option>	'+byear+														
														   ' </select>'+
												'</span></p>'+
												'<p><label for="child-interest">Interests: ( seperate by commas) </label>'+
												'	<input type="text" name="child-interest" class="form-control" value="">'+
												'</p>'+
												'<p><label for="child-fav-activities">Favourite activities: ( seperate by commas) </label>'+
												'	<input type="text" name="child-fav-activities" class="form-control" value="">'+
												'</p>'+
												'<p><label for="child-fav-books">Favourite books: ( seperate by commas) </label>'+
												'	<input type="text" name="child-fav-books" class="form-control" value="" >'+
												'</p>'+
												'<p>'+
												'	<button type="button" class="btn btn-default" id="addchild_'+ cnum +'" name="addchild_'+ cnum +'" value="'+ cnum +'" onclick="addChild('+ cnum +');">Save</button>'+
												'</p></form></div>'
			$('#addchild').append(childform);			  	
	});

	function optionsBday(){
		dob_day=""	
		for (var day_value = 1; day_value <= 31; day_value++) {
			dob_day += '<option value="' + day_value + '">' + day_value + '</option>'
		}
		
		return dob_day;
	}
	
	function optionsByear(){
		dob_yr="";
		for (var yr_value = 1920; yr_value <= curryear; yr_value++) {
			dob_yr += '<option value="' + yr_value + '">' + yr_value + '</option>'
		}
		
		return dob_yr;
	}
	

	