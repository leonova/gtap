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
		        	<p style="text-align:left;"><label>Group Name</label><br><input id="grpname" name="grpname" type="text" class="form-control" placeholder="Type a name for your group"></p>
		        	<p style="text-align:left;">
						<label>Group Category</label><br>
							<select id="category" name="category">
								<option value="">Pick Category</option>
								<option value="General Health">General Health</option>
								<option value="Beauty">Beauty</option>
								<option value="Travel">Travel</option>
							</select>
					</p>
		        	<p style="text-align:right;"><strong style="padding-right:10px; color: #f14340; cursor:pointer;" id="cancelModal">Cancel</strong><button type="button" class="btn btn-default" style="text-align: right" id="btn-createGrp" class="createGrp-nxt">Next</button></p>
		        </form>			  
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
				  	<p class="save-button"><button class="btn btn-default cancel-button"  style="cursor:pointer;" id="cancelModal">Cancel</button> <button class="btn btn-default">Send</button></p>	
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
				  	<p class="save-button"><button class="btn btn-default cancel-button"  style="cursor:pointer;" id="cancelModal">Cancel</button> <button class="btn btn-default">Send</button></p>
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
				  	<p class="save-button"><button class="btn btn-default cancel-button"  style="cursor:pointer;" id="cancelModal">Cancel</button> <button class="btn btn-default">Send</button></p>
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
				  	<p class="save-button"><button class="btn btn-default cancel-button"  style="cursor:pointer;" id="cancelModal">Cancel</button> <button class="btn btn-default">Send</button></p>
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
				  	<p class="save-button"><button class="btn btn-default cancel-button" style="cursor:pointer;" id="cancelModal">Cancel</button> <button class="btn btn-default">Send</button></p>
				  </div>
				</div>
		      </div>
		    </div>
		  </div>
		</div>


<script>
		$("#pop-createGrp").click(function(){
			$('#DialogCreateGrp').modal();
		});	
		$("#btn-createGrp").click(function(){
			if( $('#grpname').val() == "" || $('#category').val() == "" ){
				$("#userErrorLog").html('<strong class="errorMsg" >Please complete the form</strong>');
				//alert('ohno');
			}
			else{
				$('#DialogCreateGrp').modal('hide');
				$('#ModalInviteFriends').modal();
			}

		});	
			
		$("#cancelModal").click(function(){
			$('#DialogCreateGrp').modal('hide');
			$('#ModalInviteFriends').modal('hide');
		});
</script>