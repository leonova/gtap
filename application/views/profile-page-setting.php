			<div id="content-section">
				<section id="carousel-breadcrumbs-section" class="row">
					<h4 class="breadcrumb"><a href="#">Home</a><a href="#">Communities</a>Toddler Moms</h4>
				</section>
				<div id="main-content" class="row">
					<div id="right-content-section" class="col-xs-8">
						<section id="article-section">
							<div class="article-header user-profile-page">
								<h1>Profile Settings</h1>
								<div class="user-profile-info row">
									<figure class="col-xs-2" id="user-photo">										
										<div id="profile_pic">	<img src="<?php echo $image; ?>" /></div>
										<form id="fileupload" name="fileupload" enctype="multipart/form-data" method="post">
										  <fieldset>
											<input type="file" name="imageInput" id="imageInput"></input>
											<input id="uploadbutton" type="button" value="Edit Photo"/>
										  </fieldset>
										</form>
									</figure>
									<div class="col-xs-10">
										<ul>
											<li><input type="checkbox" name="keep_myinfo_private" id="keep_myinfo_private" value="1"> Keep my information private ( only your name and picuture will be shown ) </li>
											<li><input type="checkbox" name="keep_childreninfo_private" id="keep_childreninfo_private" value="1"> Keep my children’s information private</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="article-content">
								<div id="group-tab-content"><!-- Nav tabs -->
									<ul class="nav nav-tabs">
									  <li class="active"><a href="#general-profile-tab" class="general-tab" data-toggle="tab">General</a></li>
									  <li><a href="#children-tab" class="children-tab" data-toggle="tab">Children</a></li>
									</ul>
									
									<!-- Tab panes -->
									<div class="tab-content">
									  <div class="tab-pane active" id="general-profile-tab">
									  	<form action="#">
										<input type="hidden" id="profilepic" name="profilepic">
									  		<p><label for="full-name">Name:<span>*</span></label><input type="text" name="full-name" id="full-name" class="form-control" value="<?php echo $name; ?>"></p>									  		
									  		<ul class="row gender-info">
									  			<li class="col-xs-3">
										  			<label for="gender">Gender:<span>*</span></label>
										  			<select name="gender" id="gender">
													  <option value="male" <?php if ($gender=="male"){ echo "selected";} ?> >Male</option>
													  <option value="female" <?php if ($gender=="female"){ echo "selected";} ?> >Female</option>
													</select>
												</li>
									  			<li class="col-xs-3">
										  			<label for="marital-status">Marital Status:<span>*</span></label>
										  			<select name="marital-status" id="marital-status">
													  <option value="single" <?php if ($mstatus=="single"){ echo "selected";} ?>  >Single</option>
													  <option value="married" <?php if ($gender=="married"){ echo "selected";} ?> >Married</option>
													</select>
												</li>
									  			<li class="col-xs-6">
										  			<label>Date of birth:<span>*</span></label>
													<?php 
													if (!empty($bdate)	){
														$birthdate=explode('-',$bdate);
														$year=$birthdate[0];
														$month=$birthdate[1];
														$day=$birthdate[2];
													}else{
														$year='';
														$month='';
														$day='';
													}	
													?>
								                    <select name="bmon" id="bmon" tabindex="7">
									                        <option value="">Month</option>
									                        <option value="01" <?php if ($month=="01"){ echo "selected"; } ?> >Jan</option>
									                        <option value="02" <?php if ($month=="02"){ echo "selected"; } ?>>Feb</option>
									                        <option value="03" <?php if ($month=="03"){ echo "selected"; } ?>>Mar</option>
									                        <option value="04" <?php if ($month=="04"){ echo "selected"; } ?>>Apr</option>
									                        <option value="05" <?php if ($month=="05"){ echo "selected"; } ?>>May</option>
									                        <option value="06" <?php if ($month=="06"){ echo "selected"; } ?>>Jun</option>
									                        <option value="07" <?php if ($month=="07"){ echo "selected"; } ?>>Jul</option>
									                        <option value="08" <?php if ($month=="08"){ echo "selected"; } ?>>Aug</option>
									                        <option value="09" <?php if ($month=="09"){ echo "selected"; } ?>>Sep</option>
									                        <option value="10" <?php if ($month=="10"){ echo "selected"; } ?>>Oct</option>
									                        <option value="11" <?php if ($month=="11"){ echo "selected"; } ?>>Nov</option>
									                        <option value="12" <?php if ($month=="12"){ echo "selected"; } ?>>Dec</option>
									                    </select>
									                    <select class="first bday" name="user_bday" id="user_bday" tabindex="8">
									                        <option value="">Day</option>	
															<?php echo $bday;?>
									                    </select>
														
									                    <select name="user_byear" id="user_byear" class="byear1" tabindex="9">
									                        <option value="">Year</option>									                        
															<?php echo $byearmain;?>
									                    </select>
												</li>
									  		</ul>
									  		<h3>Contact information</h3>
									  		<p><label for="email">Email Address:<span>*</span></label><input type="hidden" name="oldemail" id="oldemail" class="form-control"> <input type="text" name="email" id="email" value="<?php echo $email; ?>" class="form-control"></p>
									  		<p><label for="re-email">Re-enter Email Address:<span>*</span></label><input type="text" name="re-email" id="re-email" disabled="disabled" class="form-control"></p>
									  		<p><label for="phone-number">Phone number:</label><input type="text" name="phone-number" id="phone-number" value="<?php echo $phone; ?>" class="form-control"></p>
									  		<p>
									  			<label for="address">Address:</label>
									  			<textarea name="address" id="address" rows="3" class="form-control" ><?php echo $address; ?></textarea>
									  		</p>
									  		<ul class="row work-info">
									  			<li class="col-xs-3">
										  			<label for="you-are-a">You are a...<span>*</span></label>
										  			<select name="you-are-a" id="you-are-a">
													  <option value="working" <?php if ($occupation=="working"){ echo "selected";} ?> >Working</option>
													</select>
												</li>
									  			<li class="col-xs-3">
										  			<label for="income-range">Income range:<span>*</span></label>
										  			<select name="income-range" id="income-range">
													  <option value="SGD2,000 - SGD2,900" <?php if ($income_range=="SGD2,000 - SGD2,900"){ echo "selected";} ?> >SGD2,000 - SGD2,900</option>
													</select>
												</li>
									  		</ul>
									  		<ul class="row children-info">
									  			<li class="col-xs-3">
										  			<label for="motherhood-status">Motherhood status<span>*</span></label>
										  			<select name="motherhood-status" id="motherhood-status">
													  <option value="mother of" <?php if ($income_range=="mother of"){ echo "selected";} ?> >mother of</option>
													</select>
												</li>
									  			<li class="col-xs-3">
										  			<label for="children">Number of Children</label>
								                    <input type="number" name="num-child" id="num-child" min="0" max="10" value="<?php echo $mhnum; ?>" />
								                </li>
									  		</ul>
									  		<h3>Your interests: (min. 3 interests)<span>*</span></h3>
									  		<ul class="your-interest-list" id="interests">
									  			<li><input type="checkbox" id='pregnancy' name="your-interest[]" value="Pregnancy"> Pregnancy</li>
									  			<li><input type="checkbox" id='infancy' name="your-interest[]" value="Infancy"> Infancy</li>
									  			<li><input type="checkbox" id='toddlerhood' name="your-interest[]" value="Toddlerhood"> Toddlerhood</li>
									  			<li><input type="checkbox" id='childhood' name="your-interest[]" value="Childhood"> Childhood</li>
									  			<li><input type="checkbox" id='foodandrecipes' name="your-interest[]" value="Food and recipes"> Food and recipes</li>
									  			<li><input type="checkbox" id='health' name="your-interest[]" value="Health"> Health</li>
									  			<li><input type="checkbox" id='education' name="your-interest[]" value="Education"> Education</li>
									  			<li><input type="checkbox" id='parenting' name="your-interest[]" value="Parenting"> Parenting</li>
									  			<li><input type="checkbox" id='familyfinance' name="your-interest[]" value="Family finance"> Family finance</li>
									  			<li><input type="checkbox" id='activitiesforfamily' name="your-interest[]" value="Activities for family"> Activities for family</li>
									  			<li><input type="checkbox" id='vacation' name="your-interest[]" value="Vacation"> Vacation</li>
									  			<li><input type="checkbox" id='pickyeating' name="your-interest[]" value="Picky eating"> Picky eating</li>
									  			<li><input type="checkbox" id='discipline' name="your-interest[]" value="Discpline"> Discpline</li>
									  			<li><input type="checkbox" id='in-laws' name="your-interest[]" value="In-laws"> In-laws</li>
									  			<li><input type="checkbox" id='beauty' name="your-interest[]" value="Beauty"> Beauty</li>
									  			<li><input type="checkbox" id='marriage' name="your-interest[]" value="Marriage"> Marriage</li>
									  		</ul>
									  		<p><button type="button" class="btn btn-default">Save</button></p>
									  	</form>
									  </div>
									  <div id="child"></div>
									  <div class="tab-pane" id="children-tab">
									  	<form>
										  	<h2>Child 1:</h2>
										  	<p class="row">
										  		<span class="col-xs-3">
													<img class="media-object" src="/resources/images/squre-thumbnail.jpg" alt="...">
													Image of your child
										  		</span>
										  		<span class="col-xs-9">
													<input type="file" name="uploaded-images">
													Image not bigger than 100 by 100 and 2MB in size.
										  		</span>
										  	</p>
										  	<p class="row">
										  		<span class="col-xs-6"><label for="child-first-name">First Name:</label><input type="text" name="child-first-name" id="child-first-name" class="form-control"></span>
										  		<span class="col-xs-6"><label for="child-last-name">Last Name:</label><input type="text" name="child-last-name" id="child-last-name" class="form-control"></span>
										  	</p>
										  	<p>
											  			<label>Date of birth:<span>*</span></label>
									                    <select name="child_bmon" id="child_bmon" tabindex="11">
									                        <option value="">Month</option>
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
									                    <select class="first bday" name="bday" id="bday" tabindex="12">
									                        <option value="">Day</option>									                        
									                    </select>
									                    <select name="byear" id="byear" class="byear" tabindex="13">
									                        <option value="">Year</option>									                        
									                    </select>
										  	</p>
										  	<p><label for="child-interest">Interests: ( seperate by commas) </label><input type="text" name="child-interest" class="form-control"></p>
										  	<p><label for="child-fav-activities">Favourite activities: ( seperate by commas) </label><input type="text" name="child-fav-activities" class="form-control"></p>
										  	<p><label for="child-fav-books">Favourite books: ( seperate by commas) </label><input type="text" name="child-fav-books" class="form-control"></p>
										  	<p><button type="button" class="btn btn-default">Save</button></p>
									  	</form>
									  </div>
									</div>
								</div>
							</div>
						</section>
					</div>
					
					<?php include('template/side.php'); ?>	
					
				</div>
			</div>
<!-- end of MAIN CONTENT -->
<!-- Reset Password Dialog -->
<!-- Login Dialog -->
		<div class="modal fade" id="DialogResetPw"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<!--<div style="z-index:-1;width: 100%;height: 100%;position:absolute;left:0px;top:0px;"></div>-->
		  <div class="modal-dialog dialog-s" style="width:300px">
		    <div id="dialog-resetpw" class="modal-content ">
		      <div id="dialog-header" class="modal-header" style="margin-top: 0px;">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>				
		        <h4 class="modal-title" id="myModalLabel">Reset Password</h4>
		        <small>Just fill out the fields below</small>
		        </div>
		      <div class="modal-body">
			  <div id='userErrorLog'></div>
		        <form name="ajaxform" id="ajaxform"  method="POST" action="javascript;" accept-charset="utf-8" class="signin-form">
		        	<p><label class="hidden">Current Password</label><input id="currentpw" name="currentpw" type="text" class="form-control" placeholder="Current Password"></p>
		        	<p><label class="hidden">New Password</label><input id="newpw" name="newpw" type="password" class="form-control" placeholder="New Password"></p>
					<p><label class="hidden">Re-enter New Password</label><input id="renewpw" name="renewpw" type="password" class="form-control" placeholder="Re-enter your New Password"></p>
		        	<p><button type="button" class="btn btn-default" id="btn-resetpw-done">Done</button></p>		
		        </form>		  
		      </div>			 		      
		    </div>
		  </div>
		</div>
<script>
		$("#btn-resetpw-form").click(function(){
			$('#DialogResetPw').modal();
		});	

	    
</script>