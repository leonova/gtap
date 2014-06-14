			<footer id="footer-section">
				<div class="row">
					<div class="col-xs-7">
						<h4>Categories</h4>
						<ul>
							<li><a href="#">Background</a></li>
							<li><a href="#">Contact us</a></li>
							<li><a href="#">Advertise</a></li>
							<li><a href="#">Privacy Policy</a></li>
							<li><a href="#">Term &amp; Conditions</a></li>
							<li><a href="#">Home</a></li>
							<li><a href="#">Articles</a></li>
							<li><a href="#">Contests</a></li>
							<li><a href="#">Deals</a></li>
							<li><a href="#">Directory</a></li>
							<li><a href="#">Forum</a></li>
							<li><a href="#">Galleries</a></li>
							<li><a href="#">Kidlander</a></li>
							<li><a href="#">Money Matters</a></li>
							<li><a href="#">Baby</a></li>
							<li><a href="#">Breastfeeding</a></li>
							<li><a href="#">Toddler</a></li>
							<li><a href="#">PreSchooler</a></li>
							<li><a href="#">Primary School</a></li>
							<li><a href="#">PSLE</a></li>
							<li><a href="#">Weekend Guide</a></li>
							<li><a href="#">Shopping</a></li>
						</ul>
					</div>
					<div class="col-xs-3">
						<h4>Our Network</h4>
						<ul>
							<li><a href="#">Malaysia</a></li>
							<li><a href="#">Indonesia</a></li>
							<li><a href="#">Thailand</a></li>
							<li><a href="#">Philippines</a></li>
							<li><a href="#">Kidlander.com</a></li>
							<li><a href="#">Pregnant.sg</a></li>
						</ul>
					</div>
					<div class="col-xs-3">
						<h4>Connect with us</h4>
						<p class="social-network-icon-list"><a href="#" class="facebook"><span class="hidden">Facebook</span></a><a href="#" class="twitter"><span class="hidden">Twitter</span></a><a href="#" class="google-plus"><span class="hidden">Google+</span></a><a href="#" class="pinterest"><span class="hidden">Pinterest</span></a></p>
					</div>
				</div>
					<div class="clearfix footer-menu-copy-right">
						<ul class="nav navbar-nav">
							<li><a href="#">Home</a></li>
							<li><a href="#">FAQ</a></li>
							<li><a href="#">Terms of use</a></li>
							<li><a href="#">Privacy policy</a></li>
							<li><a href="#">Contact us</a></li>
						</ul>
						<p class="nav navbar-nav navbar-right">theAsianParent.com 2013 Tickled Media Pte Ltd. All rights reserved</p>
					</div>
			</footer>
		</div>
		<?php			
		//echo $_SERVER['REQUEST_URI'];
		if ($_SERVER['REQUEST_URI']!="/index.php/user/signup" && $_SERVER['REQUEST_URI']!="/index.php/user/login"){
		?>
		
		<!-- Login Dialog --> 
		<div class="modal fade" id="myModalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content" id="dialog-login">
				  <div class="modal-header" id="dialog-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Welcome back!</h4>
					<small>Sign in with your Facebook or Google+ Account!</small>
					<p><button type="button" class="btn fb-signup"  id="fb-login" onclick='checkLoginState();'>Facebook</button>
					<span id="g_login" class="g-signin"
						data-callback="loginFinishedCallback"
						data-approvalprompt="force"
						data-clientid="986342482176-mmuncr0raoj4b024rtpqheafui548s6l.apps.googleusercontent.com"
						data-scope="https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read"
						data-cookiepolicy="single_host_origin"
					>
						<button type="button" class="btn g-plus-signup"> Google+</button>				
					</span>						
					</p>
					<p><span class="separator">or</span>Enter your Email address and password!</p>
				  </div>
				  <div class="modal-body">
				  <div id='userErrorLog'></div>
					<form name="loginForm" id="loginForm"  method="POST" action="javascript;;" accept-charset="utf-8" class="signin-form">
						<p><label class="hidden">Email Address</label><input id="email_add" name="user_email" type="text" class="form-control" placeholder="Email Address"></p>
						<p><label class="hidden">Enter your Password</label><input id="passwd" name="user_pw" type="password" class="form-control" placeholder="Enter your Password"></p>
						<p><button type="button" class="btn btn-default"  onclick="tm_login();" id="btn-signin-form">Login</button></p>
						<div class="modal-footer">
							<p><strong>New here? <a href="/<?php echo add_url; ?>/user/signup" class="toggleDialog" id="toggleSignup">Sign Up here</a></strong></p>
						</div>			
					</form>
					<form name="addSession" id="addSession" action="javascript;;" method="post" accept-charset="utf-8" style="display:none;">
						<input type='text' id='userdata' name='userdata'><br>
						<input type='text' id='otherdata' name='otherdata'><br>		
						<input type='text' id='childdata' name='childdata'><br>								
						<input type="submit">
					</form>
				  
				  </div>
				  
				</div>
			  </div>
		</div>
		
		<?php }?>
		<?php 
		
		if (!empty($_GET)){
			if ($_GET['mod']=="signup" && empty($this->session->userdata)){
				include('signup.php');
			}
			
			if ($_GET['mod']=="login"  && empty($this->session->userdata)){
				include('login.php');
			}
		}
		?>
		
		
		<script src="https://apis.google.com/js/client:plusone.js" type="text/javascript"></script> 
		<script src="https://apis.google.com/js/client.js?onload=handleClientLoad"></script>
			 
	    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	    
		<script src="<?php echo base_url(); ?>resources/js/scripts_tap.js"></script>				
		<script src="<?php echo base_url(); ?>resources/js/gtap.js"></script>
		<script src="<?php echo base_url(); ?>resources/js/auth.js"></script>
		<script src="<?php echo base_url(); ?>resources/js/validation.js"></script>
		<!-- preloader gif -->
		<div id="preload-div" class="preload"></div>
				
	</body>
</html>