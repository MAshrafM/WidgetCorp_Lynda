<?php include("includes/dbconnect.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php

  if(intval($_GET['subj']) == 0){
	redirect_to("content.php");
  }
  
  if(isset($_POST['submit'])){
	// Form Validation
	$errors = array();
	$required_fields = array('menu_name', 'position');
	
	foreach($required_fields as $fieldname){
	  if( !isset($_POST[$fieldname]) || empty($_POST[$fieldname])){
		$errors[] = $fieldname;
	  }
	}
	
	
	if(empty($errors)){
	  // UPDATE
	  $id = mysql_prep($_GET['subj']);
	  $menu_name = mysql_prep($_POST['menu_name']);
	  $position = mysql_prep($_POST['position']);
	  $visible = mysql_prep($_POST['visible']);
	  
	  $query = "UPDATE subjects 
			   SET
			   menu_name = '{$menu_name}',
			   position = {$position},
			   visible = {$visible}
			   WHERE id = {$id}";
	  $result = mysqli_query($connection, $query);
	  if(mysqli_affected_rows($connection) == 1){
		$message = "The subject was successfully updated";
		$cond = 1;
	  }
	  else{
		$message = "The subject update failed" . mysqli_error($connection);
		$cond = 0;
	  }  
	}
	else{
		$cond = 0;
		$message = "There were " . count($errors) . " errors in the form. <br />";
		$message .= "Please review: <br />";
		foreach($errors as $error){
			$message .= " - " . $error . "<br />";
		}
	}
  }
?>
<html>
	<?php include("includes/head.php"); ?>
	<body class="nav-md">
		<div class="container body">
		<div class="main_container">
			<?php include("includes/sidebar.php"); ?>
			<?php include("includes/topnav.php"); ?>
			
			<div class="right_col">
				<div class="row">
					<h2 class="text-center"> Edit Subject: <?php echo $sel_subject['menu_name']; ?> </h2>
					<?php 
					  if(!empty($message)){
						if($cond==1){
						  echo "<p class='bg-success'> {$message} </p>";
						}
						else{
						  echo "<p class='bg-danger'> {$message} </p>";
						}
					  }
					?>
					<p class="bg-success"></p>
					<hr />
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<form action="edit_subject.php?subj=<?php echo urlencode($sel_subject['id']); ?>" method="post">
							  <div class="form-group">
								<label for="menu_name">Subject Name</label>
								<input type="text" 
								class="form-control" 
								name="menu_name" 
								id="menu_name" 
								placeholder="Subject Name"
								value="<?php echo $sel_subject['menu_name']; ?>">
							  </div>
							  <div class="form-group">
								<label for="position">Poistion</label>
								<select class="form-control" name="position">
								<?php
									$subject_set = get_all_subjects();
									$subject_count = mysqli_num_rows($subject_set);
									for($count=1; $count<=$subject_count+1; $count++){
										echo "<option value='{$count}'";
										if($sel_subject['position'] == $count){
										  echo "selected";
										}
										echo ">{$count}</option>";
									}
								?>
									
								</select>
							  </div>
							  <div class="form-group">
								<label for="visible">Visible</label>
								<label class="radio-inline">
								<input type="radio" 
								name="visible" 
								value="0" 
								<?php if($sel_subject['visible'] == 0){echo 'checked';} ?>
								> No	</label>
								<label class="radio-inline"><input type="radio" name="visible" value="1" <?php if($sel_subject['visible'] == 1){echo 'checked';} ?>> Yes	</label>					
							  </div>
							  <input type="submit" name="submit" class="btn btn-default pull-right">
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