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
					<h2 class="text-center"> Add Subject </h2>
					<hr />
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<form action="create_subject.php" method="post">
							  <div class="form-group">
								<label for="menu_name">Subject Name</label>
								<input type="text" class="form-control" name="menu_name" id="menu_name" placeholder="Subject Name">
							  </div>
							  <div class="form-group">
								<label for="position">Poistion</label>
								<select class="form-control" name="position">
								<?php
									$subject_set = get_all_subjects();
									$subject_count = mysqli_num_rows($subject_set);
									for($count=1; $count<=$subject_count+1; $count++){
										echo "<option value='{$count}'>{$count}</option>";
									}
								?>
									
								</select>
							  </div>
							  <div class="form-group">
								<label for="visible">Visible</label>
								<label class="radio-inline"><input type="radio" name="visible" value="0"> No	</label>
								<label class="radio-inline"><input type="radio" name="visible" value="1"> Yes	</label>					
								</div>
							  <button type="submit" class="btn btn-default pull-right">Submit</button>
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