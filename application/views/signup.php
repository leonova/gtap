<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1"  id="myModalLogin" class="modal fade" >
		  <div style="z-index:-1;width: 100%;height: 100%;position:absolute;left:0px;top:0px;" onclick="logout();" ></div>
		  <div class="modal-dialog">
		    <div id="dialog-login" class="modal-content" style="height: 700px;" >
		      <div id="dialog-header" class="modal-header" style="margin-top: 0px;">		      		      		      
			  <!-- Sign Up Dialog -->
			   <div class="modal-header">
		        <button aria-hidden="true" data-dismiss="modal" class="close" type="button" onclick="logout();">×</button>
		        <h4 id="myModalLabel" class="modal-title">Sign Up to theAsianparent</h4>				
				<p><button id="fb-login" class="btn fb-signin" type="button" onclick='checkLoginState();'>Facebook</button>
				<span data-cookiepolicy="single_host_origin" data-scope="https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read" data-clientid="986342482176-mmuncr0raoj4b024rtpqheafui548s6l.apps.googleusercontent.com" data-approvalprompt="force" data-callback="loginFinishedCallback" class="g-signin" id="g_signup">
					<button class="btn g-plus-signin" type="button"> Google+</button>				
				</span>	
				</p>
		        <p><span class="separator">or</span></p>
		      </div>
		      <div class="modal-body">
		        <form accept-charset="utf-8" method="POST" name="signup-form" id="form-signup" action="#">
					<p><input type="hidden" name="origin" id="origin">
					<input type="hidden" name="account_id" id="account_id">
					<input type="hidden" name="profile_picture" id="profile_picture">
					</p>
					<p>
						</p><div class="form-msg">
							 <button id="form-msg-close" class="close" type="button">×</button>
							 <label>Sign Up Failed!</label><br>
							 <span>Hellow!<span>
						</span></span></div>
					<p></p>
					<p><label class="hidden form-field">Name</label><input type="text" required="required" placeholder="Your Name (required)" class="form-control" name="fullname" id="fullname"></p>
					<p><label class="hidden form-field">Email Address</label><input type="email" required="required" placeholder="Email Address (required)" class="form-control" name="eadd" id="eadd"></p>
					<p><label class="hidden form-field">Enter Password</label><input type="password" required="required" placeholder="Enter your Password (required)" class="form-control" name="pw" id="pw"></p>
					<p><label class="hidden form-field">Re-enter Password</label><input type="password" required="required" placeholder="Re-enter your Password (required)" class="form-control" name="passwd" id="repw"></p>
					<p style="text-align:left; padding-left:55px">
						<!--<label class="hidden form-field">Marital Status</label>
							<select name="maritalstat" id="signup-dob-mon" name="signup-dob-maritalstat">
								<option value="single">Single</option>
								<option value="married">Married</option>
								<option value="widowed">Widowed</option>
								<option value="divorced">Divorced</option>
								<option value="seperated">Seperated</option>
							</select>-->
						<label>Birthdate</label>
							<select id="bmonth" name="bmonth">
								<option default="" value="">Month</option>
								<option value="1">Jan</option>
								<option value="2">Feb</option>
								<option value="3">Mar</option>
								<option value="4">Apr</option>
								<option value="5">May</option>
								<option value="6">Jun</option>
								<option value="7">Jul</option>
								<option value="8">Aug</option>
								<option value="9">Sep</option>
								<option value="10">Oct</option>
								<option value="11">Nov</option>
								<option value="12">Dec</option>
							</select>
							<select id="bday" name="bday">
								<option default="" value="">Day</option>
								<?php echo $bday; ?>
							</select>
							<select id="byear" name="byear">
								<option default="" value="">Year</option>
									<?php echo $byear; ?>									
							</select>
					</p>
					<p style="text-align:left; padding-left:55px">
						<label>Gender</label>
							<select id="gender" name="gender">
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
					</p>
					<p style="margin-top: -15px; text-align:left; padding-left:55px">
						<input type="checkbox" value="1" id="newsletter" name="newsletter">
						<label style="font-weight:500">Sign Up our Newsletter?</label>
					</p>
					<p style="margin-bottom: 15px; text-align:left; padding-left:55px">
						<small style="font-size:85%;">
							By clicking Sign Up, you agree to our <a href="#" class="inline-text">Terms</a> and that you have read our <a href="#" class="inline-text">Data Use Policy</a> , including our <a href="#" class="inline-text">Cookie Use</a> .
						</small>
					</p>
		        	<p>
						<button onclick="tm_signup();" id="signup-btn" class="btn btn-default" type="button">Sign Up</button>
					</p>
		        </form>
				<form name="addSession" id="addSession" action="javascript;;" method="post" accept-charset="utf-8" style="display:none;">
				    <input type='text' id='userdata' name='userdata'><br>   
				    <input type="submit">
			    </form>
		      </div>
		      <div class="modal-footer">
		      	<p><strong>Already a member? <a id="toggleLogin" class="toggleDialog" href="/user/login">Sign In here</a></strong></p>
		      	<!--<small>By registering to theAsianParent, you agree to our <a href="#">Terms and Privacy Policy</a></small>-->
		      </div>
		    </div>
		  </div>
</div>
</div>
<script>
	    $(document).ready(function(){
			$('#myModalLogin').modal();
		});
</script>
