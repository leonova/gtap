<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Singapore Parenting Magazine for baby, children, kids and parents</title>
		<meta name="description" content="">

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		
	    <!-- Bootstrap -->
	    <link href="<?php echo base_url(); ?>resources/css/bootstrap.min.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script src="<?php echo base_url(); ?>resources/js/main/bootstrap.min.js"></script>
	</head>

	<body>
	<script src="http://connect.facebook.net/en_US/all.js#xfbml=1&status=0"></script>
		<div id="fb-root"></div>	
		<script>
				
		  window.fbAsyncInit = function() {
			  FB.init({
				appId      : '267478916752443',
				cookie     : true,  // enable cookies to allow the server to access 
									// the session
				xfbml      : true,  // parse social plugins on this page
				version    : 'v2.0' // use version 2.0
			  });
		  };

		  // Load the SDK asynchronously
		  (function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/all.js";
			fjs.parentNode.insertBefore(js, fjs);
		  }(document, 'script', 'facebook-jssdk'));

		function setUser() {
			console.log('Welcome!  Fetching your information.... ');
			FB.api('/me', function(response) {
				var image="https://graph.facebook.com/"+response.id +"/picture?type=large";		
				var fname=response.first_name;
				var lname=response.last_name;
				var name=response.first_name+' '+response.last_name;
				var gender=response.gender;
				var email=response.email;
				var id=response.id;			  
				
				document.getElementById('myModalLogin').style.display='none';										
				$("#user-loggedin").css('padding','0px');								
				document.getElementById('userdata').value=id+'||'+fname+'||'+lname+'||'+''+'||'+email+'||'+image+'||facebook||true';												
				submitData();				
				reload_page();
				
				$("body").removeClass("modal-open");				
				document.getElementById('myModalLogin').style.display='none';				
					
			});
		}
		</script>
		<div id="google_logout"></div>	
		<div class="container">
			<header class="navbar">
				<div>
					<hgroup class="tap-logo navbar-header">
						<h1><a href="#"><img src="/resources/images/tap-logo.png"/></a></h1>
						<h2 class="hide">Singapore's largest activity guide for kids</h2>
					</hgroup>
					<figure class="leaderboard navbar-right">
						<a href="#"><img src="/resources/images/leader-board.png"/></a>
					</figure>
					<nav id="navbar-main-nav" class="navbar-collapse navbar-default collapse" role="navigation">
						<ul class="nav navbar-nav">
							<li class="dropdown"><a href="#" title="BABY" class="dropdown-toggle" data-toggle="dropdown">BABY <b class="caret"></b></a>
							  <div class="dropdown-menu main-menu-dropdown row">
							  	<div class="col-xs-3">
							  		<h3>Topics</h3>
						            <ul>
						            	<li><a href="#">Pre-School</a></li>
						                <li><a href="#">Kindergarten</a></li>
						                <li><a href="#">Primary school</a></li>
						                <li><a href="#">PSLE</a></li>
						                <li><a href="#">Studying Tips</a></li>
						                <li><a href="#" class="all-topics">All health topics ></a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Latest</h3>
						            <ul>
						            	<li><a href="#">Top 5 toastmaster programs for children in Singapore</a></li>
						                <li><a href="#">Miley Cyrus vs Sinead O'Connor part 2 - Lessons for our daughters</a></li>
						                <li><a href="#">5 Common new-mom challenges</a></li>
						                <li><a href="#">Party baloon sculptors in Singapore</a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Popular</h3>
						            <ul>
						            	<li><a href="#">Wong Li Lin's keeping her divorce reasons a secret - 7 reasons why marriages fail</a></li>
						                <li><a href="#">Irresistibly yummy fruit gummies 12 days of Christmas BIG ‘gift-aways</a></li>
						                <li><a href="#">Party baloon sculptors in Singapore</a></li>
						                <li><a href="#">Christmas traditions around the world</a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Latest</h3>
						            <figure>
						            	<a href="#">
						            		<img src="/resources/images/dropdown-featured.png" alt="title" />
						            		<h3>10 bizarre yet natural home remedies!</h3>
						            	</a>
						            </figure>
					            </div>
				              	<h4 class="col-xs-12"><a href="#" class="all-topics">View more featured articles ></a></h4>
				              </div>
							</li>
							<li class="dropdown"><a href="#" title="TODDLER" class="dropdown-toggle" data-toggle="dropdown">TODDLER <b class="caret"></b></a>
							  <div class="dropdown-menu main-menu-dropdown row">
							  	<div class="col-xs-3">
							  		<h3>Topics</h3>
						            <ul>
						            	<li><a href="#">Pre-School</a></li>
						                <li><a href="#">Kindergarten</a></li>
						                <li><a href="#">Primary school</a></li>
						                <li><a href="#">PSLE</a></li>
						                <li><a href="#">Studying Tips</a></li>
						                <li><a href="#" class="all-topics">All health topics ></a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Latest</h3>
						            <ul>
						            	<li><a href="#">Top 5 toastmaster programs for children in Singapore</a></li>
						                <li><a href="#">Miley Cyrus vs Sinead O'Connor part 2 - Lessons for our daughters</a></li>
						                <li><a href="#">5 Common new-mom challenges</a></li>
						                <li><a href="#">Party baloon sculptors in Singapore</a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Popular</h3>
						            <ul>
						            	<li><a href="#">Wong Li Lin's keeping her divorce reasons a secret - 7 reasons why marriages fail</a></li>
						                <li><a href="#">Irresistibly yummy fruit gummies 12 days of Christmas BIG ‘gift-aways</a></li>
						                <li><a href="#">Party baloon sculptors in Singapore</a></li>
						                <li><a href="#">Christmas traditions around the world</a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Latest</h3>
						            <figure>
						            	<a href="#">
						            		<img src="/resources/images/dropdown-featured.png" alt="title" />
						            		<h3>10 bizarre yet natural home remedies!</h3>
						            	</a>
						            </figure>
					            </div>
				              	<h4 class="col-xs-12"><a href="#" class="all-topics">View more featured articles ></a></h4>
				              </div>
							</li>
							<li class="dropdown"><a href="#" title="PRE-SCHOOLER" class="dropdown-toggle" data-toggle="dropdown">PRE-SCHOOLER <b class="caret"></b></a>
							  <div class="dropdown-menu main-menu-dropdown row">
							  	<div class="col-xs-3">
							  		<h3>Topics</h3>
						            <ul>
						            	<li><a href="#">Pre-School</a></li>
						                <li><a href="#">Kindergarten</a></li>
						                <li><a href="#">Primary school</a></li>
						                <li><a href="#">PSLE</a></li>
						                <li><a href="#">Studying Tips</a></li>
						                <li><a href="#" class="all-topics">All health topics ></a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Latest</h3>
						            <ul>
						            	<li><a href="#">Top 5 toastmaster programs for children in Singapore</a></li>
						                <li><a href="#">Miley Cyrus vs Sinead O'Connor part 2 - Lessons for our daughters</a></li>
						                <li><a href="#">5 Common new-mom challenges</a></li>
						                <li><a href="#">Party baloon sculptors in Singapore</a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Popular</h3>
						            <ul>
						            	<li><a href="#">Wong Li Lin's keeping her divorce reasons a secret - 7 reasons why marriages fail</a></li>
						                <li><a href="#">Irresistibly yummy fruit gummies 12 days of Christmas BIG ‘gift-aways</a></li>
						                <li><a href="#">Party baloon sculptors in Singapore</a></li>
						                <li><a href="#">Christmas traditions around the world</a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Latest</h3>
						            <figure>
						            	<a href="#">
						            		<img src="/resources/images/dropdown-featured.png" alt="title" />
						            		<h3>10 bizarre yet natural home remedies!</h3>
						            	</a>
						            </figure>
					            </div>
				              	<h4 class="col-xs-12"><a href="#" class="all-topics">View more featured articles ></a></h4>
				              </div>
							</li>
							<li class="dropdown"><a href="#" title="BIGGER KID" class="dropdown-toggle" data-toggle="dropdown">BIGGER KID <b class="caret"></b></a>
							  <div class="dropdown-menu main-menu-dropdown row">
							  	<div class="col-xs-3">
							  		<h3>Topics</h3>
						            <ul>
						            	<li><a href="#">Pre-School</a></li>
						                <li><a href="#">Kindergarten</a></li>
						                <li><a href="#">Primary school</a></li>
						                <li><a href="#">PSLE</a></li>
						                <li><a href="#">Studying Tips</a></li>
						                <li><a href="#" class="all-topics">All health topics ></a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Latest</h3>
						            <ul>
						            	<li><a href="#">Top 5 toastmaster programs for children in Singapore</a></li>
						                <li><a href="#">Miley Cyrus vs Sinead O'Connor part 2 - Lessons for our daughters</a></li>
						                <li><a href="#">5 Common new-mom challenges</a></li>
						                <li><a href="#">Party baloon sculptors in Singapore</a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Popular</h3>
						            <ul>
						            	<li><a href="#">Wong Li Lin's keeping her divorce reasons a secret - 7 reasons why marriages fail</a></li>
						                <li><a href="#">Irresistibly yummy fruit gummies 12 days of Christmas BIG ‘gift-aways</a></li>
						                <li><a href="#">Party baloon sculptors in Singapore</a></li>
						                <li><a href="#">Christmas traditions around the world</a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Latest</h3>
						            <figure>
						            	<a href="#">
						            		<img src="/resources/images/dropdown-featured.png" alt="title" />
						            		<h3>10 bizarre yet natural home remedies!</h3>
						            	</a>
						            </figure>
					            </div>
				              	<h4 class="col-xs-12"><a href="#" class="all-topics">View more featured articles ></a></h4>
				              </div>
							</li>
							<li class="dropdown"><a href="#" title="EDUCATION" class="dropdown-toggle" data-toggle="dropdown">EDUCATION <b class="caret"></b></a>
							  <div class="dropdown-menu main-menu-dropdown row">
							  	<div class="col-xs-3">
							  		<h3>Topics</h3>
						            <ul>
						            	<li><a href="#">Pre-School</a></li>
						                <li><a href="#">Kindergarten</a></li>
						                <li><a href="#">Primary school</a></li>
						                <li><a href="#">PSLE</a></li>
						                <li><a href="#">Studying Tips</a></li>
						                <li><a href="#" class="all-topics">All health topics ></a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Latest</h3>
						            <ul>
						            	<li><a href="#">Top 5 toastmaster programs for children in Singapore</a></li>
						                <li><a href="#">Miley Cyrus vs Sinead O'Connor part 2 - Lessons for our daughters</a></li>
						                <li><a href="#">5 Common new-mom challenges</a></li>
						                <li><a href="#">Party baloon sculptors in Singapore</a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Popular</h3>
						            <ul>
						            	<li><a href="#">Wong Li Lin's keeping her divorce reasons a secret - 7 reasons why marriages fail</a></li>
						                <li><a href="#">Irresistibly yummy fruit gummies 12 days of Christmas BIG ‘gift-aways</a></li>
						                <li><a href="#">Party baloon sculptors in Singapore</a></li>
						                <li><a href="#">Christmas traditions around the world</a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Latest</h3>
						            <figure>
						            	<a href="#">
						            		<img src="/resources/images/dropdown-featured.png" alt="title" />
						            		<h3>10 bizarre yet natural home remedies!</h3>
						            	</a>
						            </figure>
					            </div>
				              	<h4 class="col-xs-12"><a href="#" class="all-topics">View more featured articles ></a></h4>
				              </div>
							</li>
							<li class="dropdown"><a href="#" title="HEALTH" class="dropdown-toggle" data-toggle="dropdown">HEALTH <b class="caret"></b></a>
							  <div class="dropdown-menu main-menu-dropdown row">
							  	<div class="col-xs-3">
							  		<h3>Topics</h3>
						            <ul>
						            	<li><a href="#">Pre-School</a></li>
						                <li><a href="#">Kindergarten</a></li>
						                <li><a href="#">Primary school</a></li>
						                <li><a href="#">PSLE</a></li>
						                <li><a href="#">Studying Tips</a></li>
						                <li><a href="#" class="all-topics">All health topics ></a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Latest</h3>
						            <ul>
						            	<li><a href="#">Top 5 toastmaster programs for children in Singapore</a></li>
						                <li><a href="#">Miley Cyrus vs Sinead O'Connor part 2 - Lessons for our daughters</a></li>
						                <li><a href="#">5 Common new-mom challenges</a></li>
						                <li><a href="#">Party baloon sculptors in Singapore</a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Popular</h3>
						            <ul>
						            	<li><a href="#">Wong Li Lin's keeping her divorce reasons a secret - 7 reasons why marriages fail</a></li>
						                <li><a href="#">Irresistibly yummy fruit gummies 12 days of Christmas BIG ‘gift-aways</a></li>
						                <li><a href="#">Party baloon sculptors in Singapore</a></li>
						                <li><a href="#">Christmas traditions around the world</a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Latest</h3>
						            <figure>
						            	<a href="#">
						            		<img src="/resources/images/dropdown-featured.png" alt="title" />
						            		<h3>10 bizarre yet natural home remedies!</h3>
						            	</a>
						            </figure>
					            </div>
				              	<h4 class="col-xs-12"><a href="#" class="all-topics">View more featured articles ></a></h4>
				              </div>
							</li>
							<li class="dropdown"><a href="#" title="HOLIDAY" class="dropdown-toggle" data-toggle="dropdown">HOLIDAY <b class="caret"></b></a>
							  <div class="dropdown-menu main-menu-dropdown row">
							  	<div class="col-xs-3">
							  		<h3>Topics</h3>
						            <ul>
						            	<li><a href="#">Pre-School</a></li>
						                <li><a href="#">Kindergarten</a></li>
						                <li><a href="#">Primary school</a></li>
						                <li><a href="#">PSLE</a></li>
						                <li><a href="#">Studying Tips</a></li>
						                <li><a href="#" class="all-topics">All health topics ></a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Latest</h3>
						            <ul>
						            	<li><a href="#">Top 5 toastmaster programs for children in Singapore</a></li>
						                <li><a href="#">Miley Cyrus vs Sinead O'Connor part 2 - Lessons for our daughters</a></li>
						                <li><a href="#">5 Common new-mom challenges</a></li>
						                <li><a href="#">Party baloon sculptors in Singapore</a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Popular</h3>
						            <ul>
						            	<li><a href="#">Wong Li Lin's keeping her divorce reasons a secret - 7 reasons why marriages fail</a></li>
						                <li><a href="#">Irresistibly yummy fruit gummies 12 days of Christmas BIG ‘gift-aways</a></li>
						                <li><a href="#">Party baloon sculptors in Singapore</a></li>
						                <li><a href="#">Christmas traditions around the world</a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Latest</h3>
						            <figure>
						            	<a href="#">
						            		<img src="/resources/images/dropdown-featured.png" alt="title" />
						            		<h3>10 bizarre yet natural home remedies!</h3>
						            	</a>
						            </figure>
					            </div>
				              	<h4 class="col-xs-12"><a href="#" class="all-topics">View more featured articles ></a></h4>
				              </div>
							</li>
						</ul>
						<ul class="login-search navbar-right">
							<li><a href="#" title="SEARCH"><span class="glyphicon glyphicon-search"></span><span class="hidden">SEARCH</span></a></li>
							<?php   if (empty($session_token)){?>
							<li id="login-thumb" class="dropdown">
							<a title="LOGIN" data-toggle="modal" data-target="#myModal" id="user-login" style="cursor:pointer">LOGIN</a>									
							</li>
							<?php } else{?>
								<a href="#" title="<?php echo $name; ?>" id="user-loggedin" data-toggle="dropdown">										
										<?php if (!empty($image)){?>
											<img src="<?php echo $image; ?>" alt="<?php echo $name; ?>" id="user_avatar"  class="photo-dp-s" style="width:40px;height:45px;" />
										<?php }else{?>
											<img src="/resources/images/dp-user.png" id="user_avatar" class="photo-dp-s"/>
										<?php }?>											
									</a>
									<ul class="dropdown-menu user-profile-dropdown" role="menu" aria-labelledby="dropdownMenu1">
										<li class="media">
											<a class="pull-left" href="#">
												<?php if (!empty($image)){?>
													<img src="<?php echo $image; ?>" id="user_image" alt="<?php echo $name; ?>"  class="photo-dp-s"/>
												<?php }else{?>
													<img src="/resources/images/dp-user.png" id="user_image" class="photo-dp-s"/>
												<?php }?>	
											</a>
											<div class="media-body">
												<h4 class="media-heading">Hello, <a href="#"><?php echo $name; ?></a></h4>
												<small><?php echo $email; ?></small>
												<p><a href="/user/profile">Account Settings</a></p>
											</div>
										</li>
										<li role="presentation" class="divider"></li>
										<li role="presentation" class="tap-communities"><a role="menuitem" tabindex="-1" href="<?php  echo base_url(); ?>">theAsianparent Groups</a></li>
										<li role="presentation" class="divider"></li>
										<li role="presentation"><button type="button" class="btn btn-default" onclick='logout();'  id="fb-logout">Log Out</button></li>
									</ul>
							<?php }?>
						</ul>																		
					</nav>
				</div>
			</header>