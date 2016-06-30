<?php 
	if(logged_in()){
		redirect_to("content.php");
	}
?>
<form action="login_user.php" method="post" class="form-horizontal">
  <div class="form-group">
	<label class="col-xs-3 control-label">Name</label>
	<div class="col-xs-8">
		<input type="text" class="form-control" name="name" id="name" placeholder="User Name">
	</div>
  </div>
  <div class="form-group">
	<label class="col-xs-3 control-label">Password</label>
	<div class="col-xs-8">
		<input type="password" class="form-control" name="password" id="password" placeholder="Password">
	</div>
  </div>
  
  <div class="form-group">
	<div class="col-xs-3 col-xs-offset-3"><button type="submit" class="btn btn-primary btn-block">Login</button></div>
	<div class="col-xs-3 col-xs-offset-2"><button type="button" class="btn btn-default btn-block" data-dismiss="modal">Cancel</button></div>
  </div>
  
</form>