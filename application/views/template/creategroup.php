<!-- Create Group -->
<div class="modal fade" id="DialogCreateGrp"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div style="z-index:-1;width: 100%;height: 100%;position:absolute;left:0px;top:0px;"></div>
		  <div class="modal-dialog">
		    <div id="dialog-creategrp" class="modal-content">
		      <div id="dialog-header" class="modal-header" style="margin-top: 0px;">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>				
		        <h4 class="modal-title" id="myModalLabel">Create A Group</h4>
		      </div>
		      <div class="modal-body">
			  <div id='userErrorLog'></div>
		        <form name="createGrpForm" id="createGrpForm"  method="POST" action="javascript;;" accept-charset="utf-8" class="signin-form">
		        	<p style="text-align:left;"><label>Group Name</label><br><input id="group_name" name="group_name" type="text" class="form-control" placeholder="Type a name for your group"></p>
					<p style="text-align:left;"><label>Group Description</label><br><input id="group_description" name="group_description" type="text" class="form-control" placeholder="Give description for your group"></p>
		        	<p style="text-align:left;">
						<label>Group Category</label><br>
							<select id="group_category" name="group_category">
								<option value="">Pick Category</option>
								<option value="General Health">General Health</option>
								<option value="Beauty">Beauty</option>
								<option value="Travel">Travel</option>
							</select>
					</p>
		        	<p style="text-align:right;">
						<strong style="padding-right:10px; color: #f14340; cursor:pointer;" id="cancelModal" class="close close-exempt">Cancel</strong>
						<button type="button" class="btn btn-default" style="text-align: right" id="btn-createGrp" class="createGrp-nxt">Next</button>
					</p>
		        </form>			  
		      </div>
			  <div class="modal-div">
				<div class="modal-body modal-extra">
					<p class="errorMsg">Group already exists. Are you trying to join to this group:</p>
					<div class="singleGrp">
						<a class="pull-left" href="#">
							<img src="resources/images/squre-thumbnail-3.jpg">
						</a>
						<div class="media-body">
							<h4 class="media-heading"><a href="#">Pinay Moms Co.</a></h4>
						</div>
						<button type="button" class="btn btn-default createGrp-join" id="btn-joinGrp">Join</button>
					</div>
				</div>
				<div class="modal-body modal-extra">
					<h4 class="modal-title" >Suggested Groups</h4>
					<ul class="row modalrow">
				  		<li class="col-xs-12">
							<div class="media">
								<a class="pull-left" href="#">
									
									<img src="resources/images/squre-thumbnail-3.jpg">
								</a>
								<div class="media-body">
									<h4 class="media-heading"><a href="#">We are moms</a></h4>
								</div>
								<button type="button" class="btn btn-default btn-row" id="btn-joinGrp">Join</button>
							</div>
				  		</li>
				  		<li class="col-xs-12">
							<div class="media">
								<a class="pull-left" href="#">
									
									<img src="resources/images/squre-thumbnail-3.jpg">
								</a>
								<div class="media-body">
									<h4 class="media-heading"><a href="#">D.I.Y. Nanays</a></h4>
								</div>
								<button type="button" class="btn btn-default btn-row" id="btn-joinGrp">Join</button>
							</div>
				  		</li>
				  		<li class="col-xs-12">
							<div class="media">
								<a class="pull-left" href="#">
									
									<img src="resources/images/squre-thumbnail-3.jpg">
								</a>
								<div class="media-body">
									<h4 class="media-heading"><a href="#">Mummy Always</a></h4>
								</div>
								<button type="button" class="btn btn-default btn-row" id="btn-joinGrp">Join</button>
							</div>
				  		</li>
				  		<li class="col-xs-12">
							<div class="media">
								<a class="pull-left" href="#">
									
									<img src="resources/images/squre-thumbnail-3.jpg">
								</a>
								<div class="media-body">
									<h4 class="media-heading"><a href="#">Beauty and Care Mothers</a></h4>
								</div>
								<button type="button" class="btn btn-default btn-row" id="btn-joinGrp">Join</button>
							</div>
				  		</li>
				  		<li class="col-xs-12">
							<div class="media">
								<a class="pull-left" href="#">
									
									<img src="resources/images/squre-thumbnail-3.jpg">
								</a>
								<div class="media-body">
									<h4 class="media-heading"><a href="#">Law-abiding Mums</a></h4>
								</div>
								<button type="button" class="btn btn-default btn-row" id="btn-joinGrp">Join</button>
							</div>
				  		</li>
				  		<li class="col-xs-12">
							<div class="media">
								<a class="pull-left" href="#">
									
									<img src="resources/images/squre-thumbnail-3.jpg">
								</a>
								<div class="media-body">
									<h4 class="media-heading"><a href="#">Star moms</a></h4>
								</div>
								<button type="button" class="btn btn-default btn-row" id="btn-joinGrp">Join</button>
							</div>
				  		</li>
				  	</ul>
				</div>
			</div>
		    </div>
		  </div>
		</div>
		
<!-- Invite Friends Modal -->
		<div class="modal fade" id="ModalInviteFriends" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title" id="myModalLabel">Add friends to your group!</h4>
		      </div>
		      <div class="modal-body">
		      	<ul class="nav nav-pills">
				  <li class="active"><a href="#gmail-mail" class="gmail-tab" data-toggle="tab">Gmail</a></li>
				  <li><a href="#yahoo-mail" class="yahoo-tab" data-toggle="tab">Yahoo</a></li>
				  <li><a href="#hotmail-mail" class="hotmail-tab" data-toggle="tab">Hotmail</a></li>
				  <li><a href="#facebook-mail" class="facebook-tab" data-toggle="tab">Facebook</a></li>
				  <li><a href="#other-mail" class="others-tab" data-toggle="tab">Others</a></li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
				  <div class="tab-pane active" id="gmail-mail">
				  	<div class="email-account">
				        <form action="#">
				        	<p><label class="hidden">Email Address</label><input type="text" class="form-control" placeholder="Email Address"></p>
				        	<p><label class="hidden">Enter your Password</label><input type="password" class="form-control" placeholder="Enter your Password"></p>
				        	<p><button type="button" class="btn btn-default">Get Contact</button></p>
				        </form>
				  	</div>
				  	<div class="table-responsive">
		              <table id="mytable-gmail" class="table table-bordred table-striped table-setting">
		                    <thead>
			                   <th colspan="3"><input type="checkbox" id="checkall" /> Check All</th>
		                    </thead>
						    <tbody>
							    
						    </tbody>
						</table>
						<div class="clearfix"></div>
		            </div>
				  	<p class="save-button"><button class="btn btn-default cancel-button close"  style="cursor:pointer;" >Cancel</button> <button class="btn btn-default">Send</button></p>	
				  </div>
				  <div class="tab-pane" id="yahoo-mail">
				  	<div class="email-account">
				        <form action="#">
				        	<p><label class="hidden">Email Address</label><input type="text" class="form-control" placeholder="Email Address"></p>
				        	<p><label class="hidden">Enter your Password</label><input type="password" class="form-control" placeholder="Enter your Password"></p>
				        	<p><button type="button" class="btn btn-default">Get Contact</button></p>
				        </form>
				  	</div>
				  	<div class="table-responsive">
		              <table id="mytable-yahoo" class="table table-bordred table-striped table-setting">
		                    <thead>
			                   <th colspan="3"><input type="checkbox" id="checkall" /> Check All</th>
		                    </thead>
						    <tbody>
							    
						    </tbody>
						</table>
						<div class="clearfix"></div>
		            </div>
				  	<p class="save-button"><button class="btn btn-default cancel-button close"  style="cursor:pointer;" >Cancel</button> <button class="btn btn-default">Send</button></p>
				  </div>
				  <div class="tab-pane" id="hotmail-mail">
				  	<div class="email-account">
				        <form action="#">
				        	<p><label class="hidden">Email Address</label><input type="text" class="form-control" placeholder="Email Address"></p>
				        	<p><label class="hidden">Enter your Password</label><input type="password" class="form-control" placeholder="Enter your Password"></p>
				        	<p><button type="button" class="btn btn-default">Get Contact</button></p>
				        </form>
				  	</div>
				  	<div class="table-responsive">
		              <table id="mytable-hotmail" class="table table-bordred table-striped table-setting">
		                    <thead>
			                   <th colspan="3"><input type="checkbox" id="checkall" /> Check All</th>
		                    </thead>
						    <tbody>
							    
						    </tbody>
						</table>
						<div class="clearfix"></div>
		            </div>
				  	<p class="save-button"><button class="btn btn-default cancel-button close"  style="cursor:pointer;" >Cancel</button> <button class="btn btn-default">Send</button></p>
				  </div>
				  <div class="tab-pane" id="facebook-mail">
				  	<div class="email-account">
				        <form action="#">
				        	<p><label class="hidden">Email Address</label><input type="text" class="form-control" placeholder="Email Address"></p>
				        	<p><label class="hidden">Enter your Password</label><input type="password" class="form-control" placeholder="Enter your Password"></p>
				        	<p><button type="button" class="btn btn-default">Accept</button></p>
				        </form>
				  	</div>
				  	<ul class="row">
				  		
				  	</ul>
				  	<p class="save-button"><button class="btn btn-default cancel-button close"  style="cursor:pointer;" >Cancel</button> <button class="btn btn-default">Send</button></p>
				  </div>
				  <div class="tab-pane" id="other-mail">
				  	<div class="email-account">
				        <form action="#">
				        	<p><label class="hidden">Email Address</label><input type="text" class="form-control" placeholder="Email Address"></p>
				        	<p><label class="hidden">Enter your Password</label><input type="password" class="form-control" placeholder="Enter your Password"></p>
				        	<p><button type="button" class="btn btn-default">Get Contact</button></p>
				        </form>
				  	</div>
				  	<div class="table-responsive">
		              <table id="mytable-other" class="table table-bordred table-striped table-setting">
		                    <thead>
			                   <th colspan="3"><input type="checkbox" id="checkall" /> Check All</th>
		                    </thead>
						    <tbody>
							    
						    </tbody>
						</table>
						<div class="clearfix"></div>
		            </div>
				  	<p class="save-button"><button class="btn btn-default cancel-button close close" style="cursor:pointer;">Cancel</button> <button class="btn btn-default">Send</button></p>
				  </div>
				</div>
		      </div>
		    </div>
		  </div>
		</div>


<script>
		$("#pop-createGrp").not(".nonMemfunc").click(function(){
			$('#DialogCreateGrp').modal();
		});	
		$("#btn-createGrp").click(function(){
			if( $('#group_name').val() == "" || $('#group_category').val() == ""  || $('#group_description').val() == ""){
				$("#userErrorLog").html('<strong class="errorMsg" >Please complete the form</strong>');
				//alert('ohno');
			}
			else{
				$('#DialogCreateGrp').modal('hide');
				$('#ModalInviteFriends').modal();
			}

		});	
		
		function clearfields(){
			$("#userErrorLog").html('');
			$('#group_name').val("");
			$('#group_category').val("");
			$('#group_description').val("");
		}
			
		$(".close").click(function(){
			$('#DialogCreateGrp').modal('hide');
			$('#ModalInviteFriends').modal('hide');
			clearfields();
		});
		
		function showgrp(){
			var modaldivH = $(".modal-div").height();
			if(modaldivH > 1){
				$(".modal-div").animate({'height':'0px'},800);
			}
			else{
				$(".modal-div").animate({'height': '555px'},800);
			}
			//$(".modal-div").animate({'height':'0px'},800);
		}
		
</script>