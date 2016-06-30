<?php require_once("includes/session.php"); ?>
<?php include("includes/dbconnect.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<html>
	<?php include("includes/head.php"); ?>
	<body class="nav-md">
		<div class="container body">
		<div class="main_container">
			<?php include("includes/sidebar.php"); ?>
			<?php include("includes/topnav.php"); ?>
			
			<div class="right_col">
				<div class="row">
					<h2 class="text-center"> Add New User </h2>
					<hr />
					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<form action="create_user.php" method="post">
							  <div class="form-group">
								<label for="name">User Name</label>
								<input type="text" class="form-control" name="name" id="name" placeholder="User Name">
							  </div>
							  <div class="form-group">
								<label for="menu_name">Password</label>
								<input type="password" class="form-control" name="password" id="password" placeholder="Password">
							  </div>
							  
							  <button type="submit" class="btn btn-default">Submit</button>
							</form>
						</div>
					</div>
					
					<a href="content.php" class="btn btn-primary"><i class='fa fa-chevron-left'></i> Back</a>
				</div>
			</div>
			
			<?php include("includes/foot.php"); ?>
		</div>
		</div>
		
		<script src="scripts/jquery.min.js"></script>
		<script src="scripts/bootstrap.min.js"></script>
		<script src="scripts/custom.min.js"></script>
	</body>
</html>