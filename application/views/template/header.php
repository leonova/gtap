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
						
							<div id="top-navigation"></div>
						<script type="text/javascript">
$(document).ready(function(){
$.getJSON( "http://sg.theasianparent.com/menu/?123", {
    tagmode: "any",
    format: "json"
  }, function( data ) {
  var items = [];
  $.each( data, function( key, val ) {
  
    items.push( "<li class='menu-item' ><a href='" + val.Url + "'>" + key + "<b class='caret'></b>");
	items.push( "</a>");
	
	var dataTopic = [];
	dataTopic = val.Topics;	
	var topicCount = Object.getOwnPropertyNames(dataTopic).length;
	if(topicCount > 1){
	items.push( "<div class='dropdown-menu main-menu-dropdown row'>");	
	
	items.push( "<div class='col-xs-2'>");	
	
	items.push( "<h3>Topics</h3>");
	items.push( "<ul >");	
	$.each(dataTopic , function(key , value){ // First Level
           items.push( "<li><a href='" + value.Url +"'>" + value.Title + "</a></li>");        
            });	
	items.push( "</ul>");
	
	items.push("</div>");
	items.push( "<div class='col-xs-10'>");
	items.push( "<div class='col-xs-4'>");	
	dataLatest = val.Latest;	
	var latestCount = Object.getOwnPropertyNames(dataLatest).length;
	if(latestCount > 1){
	items.push( "<h3>Latest</h3>");	
	$.each(dataLatest , function(key , value){ 
           items.push( "<p><a href='" + value.Url +"'>" + value.Title + "</a></p>");        
            });
    }			
	items.push( "</div>");
	items.push( "<div class='col-xs-4'>");
	dataHighlight = val.Highlights;	
	var highlightCount = Object.getOwnPropertyNames(dataHighlight).length;
	if(highlightCount > 1){
	items.push( "<h3>Highlights</h3>");		
	$.each(dataHighlight , function(key , value){ 
           items.push( "<p><a href='" + value.Url +"'>" + value.Title + "</a></p>");        
            });
    }			
	
	items.push( "</div>");
	items.push( "<div class='col-xs-4'>");	
	dataFeatured = val.Featured;	
	var featuredCount = Object.getOwnPropertyNames(dataFeatured).length;
	if(featuredCount > 1){
	items.push( "<h3>Featured</h3>");		
	$.each(dataFeatured , function(key , value){ 
           items.push( "<p><a href='" + value.Url +"'>");
		   items.push( "<img width='186' height='124' src='" + value.Image + "' />");
		   items.push( "<br />" + value.Title + "</a></p>");        
            });
    }		
	items.push( "</div>");
	items.push( "</div>");
	
	items.push( "</div>");
	}
	items.push( "</li>" );
  });
  $('#top-navigation').replaceWith($( "<ul/>", {
    "class": "nav navbar-nav",
    html: items.join( "" )
  }));
  
})

;
}); 
</script>

						
						<ul class="login-search navbar-right" style="margin-bottom:0px;">
							<li><a href="#" title="SEARCH"><span class="glyphicon glyphicon-search"></span><span class="hidden">SEARCH</span></a></li>
							<?php  if (empty($session_token)){?>
							<li id="login-thumb" class="dropdown">
							<a title="LOGIN" data-toggle="modal" data-target="#myModal" id="user-login" style="cursor:pointer">LOGIN</a>									
							</li>
							<?php } else{?>
								<a href="#" title="<?php echo $name; ?>" id="user-loggedin" data-toggle="dropdown">										
										<?php if (!empty($image)){?>
											<img src="<?php echo $image; ?>" id="user_avatar"  class="photo-dp-s" />
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