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
					<h2 class="text-center"> Add A Page to <?php echo $sel_subject['menu_name'] ?> </h2>
					<hr />
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<form action="create_page.php" method="post">
							  <div class="form-group">
								<label for="menu_name">Page Name</label>
								<input type="text" class="form-control" name="menu_name" id="menu_name" placeholder="Page Name">
							  </div>
							  <div class="form-group">
								<label for="position">Poistion</label>
								<select class="form-control" name="position">
								<?php
									$page_set = get_pages_for_subject($sel_subject['id']);
									$page_count = mysqli_num_rows($page_set);
									for($count=1; $count<=$subject_count+1; $count++){
										echo "<option value='{$count}'>{$count}</option>";
									}
								?>
									
								</select>
							  </div>
							  <div class="form-group">
								<label for="content">Content</label>
								<textarea class="form-control" name="content" id="content" placeholder="Enter Content" rows="9"></textarea>
							  </div>
							  <div class="form-group">
								<label for="visible">Visible</label>
								<label class="radio-inline"><input type="radio" name="visible" value="0"> No	</label>
								<label class="radio-inline"><input type="radio" name="visible" value="1"> Yes	</label>					
							  </div>
							  <input type="hidden" name="subject_id" value="<?php echo $sel_subject["id"]; ?>">
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