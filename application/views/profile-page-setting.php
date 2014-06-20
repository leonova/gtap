			<div id="content-section">
				<section id="carousel-breadcrumbs-section" class="row">
					<h4 class="breadcrumb"><a href="#">Home</a><a href="#">Communities</a>Toddler Moms</h4>
				</section>
				<div id="main-content" class="row">
					<div id="right-content-section" class="col-xs-8">
						<section id="article-section">
							<div class="article-header user-profile-page">
								<h1>Profile Settings</h1><input type="hidden" name="childcount" id="childcount" value="<?php echo $childrencount; ?>">
								<div class="user-profile-info row">
									<figure class="col-xs-2" id="user-photo">	
										<div id="profile_pic">
											<?php if (!empty($image)){?>
													<img src="<?php echo $image; ?>" style="width:102px" />
											<?php }else{?>
												<img src="/resources/images/tapg-default-user.png" style="width:102px" />
											<?php }?>
											<a id="editphoto">
												<span>Edit Photo</span>
											</a>
										</div>
										<form id="fileupload" name="fileupload" enctype="multipart/form-data" method="post" style="padding-top:10px; display:none;">
										  <fieldset>
											<input type="file" name="imageInput" id="imageInput"></input>
											<input id="uploadbutton" type="button" value="Upload Photo"/>
										  </fieldset>
										</form>
									</figure>
									<div class="col-xs-10">
										<ul>
											<li><input type="checkbox" name="keep_myinfo_private" id="keep_myinfo_private" value="1" <?php if ($keep_myinfo_private=="1"){ echo "checked"; } ?> > Keep my information private ( only your name and picuture will be shown ) </li>
											<li><input type="checkbox" name="keep_childreninfo_private" id="keep_childreninfo_private" value="1" <?php if ($keep_childreninfo_private=="1"){ echo "checked"; } ?>> Keep my children’s information private</li>
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
									  	<form action="#" id="profileform" name="profileform">
										<input type="hidden" id="profile_picture" name="profile_picture" value="<?php echo $image;?>">
										<input type="hidden" name="user-id" id="user-id" value="<?php echo $id;?>">
									  		<p><label for="full-name">Name:<span>*</span></label><input type="text" name="fullname" id="fullname" class="form-control" value="<?php echo $name; ?>"></p>									  		
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
								                    <select name="bmonth" id="bmonth" tabindex="7">
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
									                    <select class="first bday" name="bday" id="bday" tabindex="8">
									                        <option value="">Day</option>	
															<?php echo $bday;?>
									                    </select>
														
									                    <select name="byear" id="byear" class="byear1" tabindex="9">
									                        <option value="">Year</option>									                        
															<?php echo $byearmain;?>
									                    </select>
												</li>
									  		</ul>
									  		<h3>Contact information</h3>
									  		<p><label for="email">Email Address:<span>*</span></label><input type="hidden" name="oldemail" id="oldemail" class="form-control" value="<?php echo $email;?>"> <input type="text" name="email" id="email" onblur="checkEmail();" value="<?php echo $email; ?>" class="form-control"></p>
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
											<?php $interest='interest value:'.$interest;?>
									  		<ul class="your-interest-list" id="interests">
									  			<li><input type="checkbox" id='pregnancy' name="your-interest[]" value="Pregnancy" <?php if (strpos($interest,"Pregnancy")>1){echo "checked";} ?> > Pregnancy</li>
									  			<li><input type="checkbox" id='infancy' name="your-interest[]" value="Infancy" <?php if (strpos($interest,"Infancy")>1){echo "checked";} ?> > Infancy</li>
									  			<li><input type="checkbox" id='toddlerhood' name="your-interest[]" value="Toddlerhood" <?php if (strpos($interest,"Toddlerhood")>1){echo "checked";} ?> > Toddlerhood</li>
									  			<li><input type="checkbox" id='childhood' name="your-interest[]" value="Childhood" <?php if (strpos($interest,"Childhood")>1){echo "checked";} ?> > Childhood</li>
									  			<li><input type="checkbox" id='foodandrecipes' name="your-interest[]" value="Food and recipes" <?php if (strpos($interest,"Food and recipes")>1){echo "checked";} ?> > Food and recipes</li>
									  			<li><input type="checkbox" id='health' name="your-interest[]" value="Health" <?php if (strpos($interest,"Health")>1){echo "checked";} ?> > Health</li>
									  			<li><input type="checkbox" id='education' name="your-interest[]" value="Education" <?php if (strpos($interest,"Education")>1){echo "checked";} ?> > Education</li>
									  			<li><input type="checkbox" id='parenting' name="your-interest[]" value="Parenting" <?php if (strpos($interest,"Parenting")>1){echo "checked";} ?> > Parenting</li>
									  			<li><input type="checkbox" id='familyfinance' name="your-interest[]" value="Family finance" <?php if (strpos($interest,"Family finance")>1){echo "checked";} ?> > Family finance</li>
									  			<li><input type="checkbox" id='activitiesforfamily' name="your-interest[]" value="Activities for family" <?php if (strpos($interest,"Activities for family")>1){echo "checked";} ?> > Activities for family</li>
									  			<li><input type="checkbox" id='vacation' name="your-interest[]" value="Vacation" <?php if (strpos($interest,"Vacation")>1){echo "checked";} ?> > Vacation</li>
									  			<li><input type="checkbox" id='pickyeating' name="your-interest[]" value="Picky eating" <?php if (strpos($interest,"Picky eating")>1){echo "checked";} ?> > Picky eating</li>
									  			<li><input type="checkbox" id='discipline' name="your-interest[]" value="Discipline" <?php if (strpos($interest,"Discipline")>1){echo "checked";} ?> > Discpline</li>
									  			<li><input type="checkbox" id='in-laws' name="your-interest[]" value="In-laws" <?php if (strpos($interest,"In-laws")>1){echo "checked";} ?> > In-laws</li>
									  			<li><input type="checkbox" id='beauty' name="your-interest[]" value="Beauty" <?php if (strpos($interest,"Beauty")>1){echo "checked";} ?> > Beauty</li>
									  			<li><input type="checkbox" id='marriage' name="your-interest[]" value="Marriage" <?php if (strpos($interest,"Marriage")>1){echo "checked";} ?> > Marriage</li>
									  		</ul>
									  		<p><button type="button" id="generalsave" class="btn btn-default" onclick="submitProfile();">Save</button></p>
									  	</form>
									  </div>
									  <div id="child"></div>
									  <div class="tab-pane" id="children-tab">
									  <div class="childcontent">
									  	<?php //echo "<pre>";print_r($childrenvalue);
										$y=0;		
										$dob_day="";
										$dob_yr="";
										for ($x=0;$x<$childrencount;$x++){		
											$cyear=date('Y',strtotime($childrenvalue[0]['child_dob']));
											$cmonth=date('m',strtotime($childrenvalue[0]['child_dob']));
											$cday=date('d',strtotime($childrenvalue[0]['child_dob']));										
											$y++;
										?>
										<form method="post" enctype="multipart/form-data" name="fileupload_<?php echo $y; ?>" id="fileupload_<?php echo $y; ?>">
											
										  	<h2>Child <?php echo $y; ?>:</h2>
										  	<p class="row">
										  		<span class="col-xs-3" id="child_pic_<?php echo $y; ?>">
													<?php
													if ($childrenvalue[$x]['child_pictures']==""){
													?>
													<img class="media-object" src="/resources/images/squre-thumbnail.jpg" alt="..." style="width:102px">
													<?php }else{ ?>
													<img class="media-object" src="<?php echo $childrenvalue[$x]['child_pictures']; ?>" alt="<?php echo $childrenvalue[$x]['child_fname'].' '.$childrenvalue[$x]['child_lname'];?>" style="width:102px">
													<?php } ?>
													
										  		</span>
										  		<span class="col-xs-9">
													<input type="file" name="uploaded_images_<?php echo $y; ?>" id="uploaded_images_<?php echo $y; ?>">
													Image not bigger than 100 by 100 and 2MB in size.<br><input type="button"  id="uploadbutton_<?php echo $y; ?>" name="uploadbutton_<?php echo $y; ?>" value="Upload Picture" onclick="uploadChildPicture('<?php echo $y; ?>');">											
										  		</span>
										  	</p>
										</form>
										<form  method="post" enctype="multipart/form-data" name="update_child_data_<?php echo $y; ?>" id="update_child_data_<?php echo $y; ?>">
											<input type="hidden" id="child_picture_<?php echo $y; ?>" name="child_picture_<?php echo $y; ?>" value="<?php echo $childrenvalue[$x]['child_pictures'];?>">
											<input type="hidden" id="objectId" name="objectId" value="<?php echo $childrenvalue[$x]['objectId'];?>">
										  	<p class="row">
										  		<span class="col-xs-6"><label for="child-first-name">First Name:</label><input type="text" name="child-first-name" id="child-first-name" class="form-control" value="<?php echo $childrenvalue[$x]['child_fname'];?>"></span>
										  		<span class="col-xs-6"><label for="child-last-name">Last Name:</label><input type="text" name="child-last-name" id="child-last-name" class="form-control" value="<?php echo $childrenvalue[$x]['child_lname'];?>"></span>
										  	</p>
										  	<p class="row">		
												<span class="col-xs-2">										
												<label for="gender">Gender:<span>*</span></label>
										  			<select id="child-gender" name="child-gender">
													  <option value="male" <?php if ($childrenvalue[$x]['child_gender']=="male"){ echo "selected"; } ?> >Male</option>
													  <option value="female"  <?php if ($childrenvalue[$x]['child_gender']=="female"){ echo "selected"; } ?> >Female</option>
													</select>
												</span>
												<span class="col-xs-9">
											  			<label>Date of birth:<span>*</span></label>
									                    <select name="child_bmon" id="child_bmon" tabindex="11">
									                       <option value="">Month</option>
									                        <option value="01" <?php if ($cmonth=="01"){ echo "selected"; } ?> >Jan</option>
									                        <option value="02" <?php if ($cmonth=="02"){ echo "selected"; } ?>>Feb</option>
									                        <option value="03" <?php if ($cmonth=="03"){ echo "selected"; } ?>>Mar</option>
									                        <option value="04" <?php if ($cmonth=="04"){ echo "selected"; } ?>>Apr</option>
									                        <option value="05" <?php if ($cmonth=="05"){ echo "selected"; } ?>>May</option>
									                        <option value="06" <?php if ($cmonth=="06"){ echo "selected"; } ?>>Jun</option>
									                        <option value="07" <?php if ($cmonth=="07"){ echo "selected"; } ?>>Jul</option>
									                        <option value="08" <?php if ($cmonth=="08"){ echo "selected"; } ?>>Aug</option>
									                        <option value="09" <?php if ($cmonth=="09"){ echo "selected"; } ?>>Sep</option>
									                        <option value="10" <?php if ($cmonth=="10"){ echo "selected"; } ?>>Oct</option>
									                        <option value="11" <?php if ($cmonth=="11"){ echo "selected"; } ?>>Nov</option>
									                        <option value="12" <?php if ($cmonth=="12"){ echo "selected"; } ?>>Dec</option>
									                    </select>
									                    <select class="cbay" name="child_bday" id="bday" tabindex="12">
									                        <option value="">Day</option>				
															<?php
															for ($day_value=1;$day_value<=31;$day_value++) {
																if ($day_value==$cday){
																	$selected='selected';
																}
																echo	$dob_day.= '<option value="'.$day_value.'" '.$selected.' >'.$day_value.'</option>';
															}
															?>															
									                    </select>
									                    <select name="child_byear" id="byear" class="cyear" tabindex="13">
									                        <option value="">Year</option>	
																<?php
																for ($yr_value = 1920; $yr_value <= date("Y"); $yr_value++) {
																	if ($yr_value==$cyear){				
																		$dob_yr.= '<option value="'.$yr_value.'" selected >'.$yr_value.'</option>';
																	}else{
																		$dob_yr.= '<option value="'.$yr_value.'" >'.$yr_value.'</option>';
																	}
																	echo $dob_yr; 
																}
																?>															
									                    </select>
												</span>	
										  	</p>
										  	<p><label for="child-interest">Interests: ( seperate by commas) </label><input type="text" name="child-interest" class="form-control" value="<?php echo $childrenvalue[$x]['child_interest'];?>"></p>
										  	<p><label for="child-fav-activities">Favourite activities: ( seperate by commas) </label><input type="text" name="child-fav-activities" class="form-control" value="<?php echo $childrenvalue[$x]['child_favorite_activities'];?>"></p>
										  	<p><label for="child-fav-books">Favourite books: ( seperate by commas) </label><input type="text" name="child-fav-books" class="form-control" value="<?php echo $childrenvalue[$x]['child_favorite_books'];?>" ></p>
										  	<p><button type="button" class="btn btn-default" id="uploadbutton_<?php echo $y; ?>" name="uploadbutton_<?php echo $y; ?>" value="<?php echo $y; ?>" onclick="updateChildInfo('<?php echo $y; ?>');">Save</button>											
									  	</form>
										<?php }?>
										<div id="addchild"></div>
									
										<p><button type="button" class="btn btn-default" id="AddChild-btn">Add Child</button></p>
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