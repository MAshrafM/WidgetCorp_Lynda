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
						<h2 class="text-center"> Welcome To The Staff Area, <?php echo $_SESSION['username']; ?> </h2>
					</div>
				</div>
				
				<?php require("includes/foot.php"); ?>
			</div>
		</div>
		
		<script src="scripts/jquery.min.js"></script>
		<script src="scripts/bootstrap.min.js"></script>
		<script src="scripts/custom.min.js"></script>
		<script src="scripts/script.js"></script>
	</body>
</html>
