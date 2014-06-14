<!-- Login Dialog -->
		<div class="modal fade" id="myModalLogin"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div style="z-index:-1;width: 100%;height: 100%;position:absolute;left:0px;top:0px;" onclick="logout();" ></div>
		  <div class="modal-dialog">
		    <div id="dialog-login" class="modal-content" style="height: 460px;">
		      <div id="dialog-header" class="modal-header" style="margin-top: 0px;">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="logout();">&times;</button>				
		        <h4 class="modal-title" id="myModalLabel">Welcome back!</h4>
		        <small>Sign in with your Facebook or Google+ Account!</small>
		        <p><button type="button" class="btn fb-signup"  id="fb-login" onclick='checkLoginState();'>Facebook</button>
				<span data-cookiepolicy="single_host_origin" data-scope="https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read" data-clientid="986342482176-mmuncr0raoj4b024rtpqheafui548s6l.apps.googleusercontent.com" data-approvalprompt="force" data-callback="loginFinishedCallback" class="g-signin" id="g_signup">
					<button class="btn g-plus-signin" type="button"> Google+</button>				
				</span>	
				
				</p>
		        <p><span class="separator">or</span>Enter your Email address and password!</p>
		      </div>
		      <div class="modal-body">
			  <div id='userErrorLog'></div>
		        <form name="ajaxform" id="ajaxform"  method="POST" action="javascript;;" accept-charset="utf-8" class="signin-form">
		        	<p><label class="hidden">Email Address</label><input id="email_add" name="user_email" type="text" class="form-control" placeholder="Email Address"></p>
		        	<p><label class="hidden">Enter your Password</label><input id="passwd" name="user_pw" type="password" class="form-control" placeholder="Enter your Password"></p>
		        	<p><button type="button" class="btn btn-default"  onclick="tm_login();" id="btn-signin-form">Login</button></p>
					<div class="modal-footer">
						<p><strong>New here? <a href="/<?php echo add_url; ?>/user/signup" class="toggleDialog" id="toggleSignup">Sign Up here</a></strong></p>
					</div>			
		        </form>
				<form name="addSession" id="addSession" action="javascript;;" method="post" accept-charset="utf-8" style="display:none;">
				    <input type='text' id='userdata' name='userdata'><br>   
				    <input type="submit">
			    </form>
			  
		      </div>			 		      
		    </div>
		  </div>
		</div>	
<script>
	    $(document).ready(function(){
			$('#myModalLogin').modal();
			
		});
</script>