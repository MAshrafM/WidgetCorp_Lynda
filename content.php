<?php include("includes/dbconnect.php"); ?>
<?php require_once("includes/functions.php"); ?>
<html>
	<?php include("includes/head.php"); ?>
	<body class="nav-md">
		<div class="container body">
			<div class="main_container">
				<?php include("includes/sidebar.php"); ?>
				<?php include("includes/topnav.php"); ?>
				
				<div class="right_col">
					<div class="row">
						<?php
							if(isset($sel_subject)){
								include("includes/show_subject.php");
							}
							elseif(isset($sel_page)){
								include("includes/show_page.php");
							}
							else{
								include("includes/show_contentarea.php");
							}
						?>
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
