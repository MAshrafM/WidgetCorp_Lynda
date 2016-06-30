<?php include("includes/dbconnect.php"); ?>
<?php require_once("includes/functions.php"); ?>

<?php
	// Form Validation
	$errors = array();
	$required_fields = array('name', 'password');
	
	foreach($required_fields as $fieldname){
	  if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname] )){
		$errors[] = $fieldname;
	  }
	}
	
	
	if(!empty($errors)){
		redirect_to("new_user.php");
	}
?>

<?php
	$username = mysql_prep($_POST['name']);
	$password = mysql_prep($_POST['password']);
	$hashed_password = sha1($password);
	
	$query = "INSERT INTO users (username, hashed_password) ";
	$query .= "VALUES ('{$username}', '{$hashed_password}' )";
	
	if(mysqli_query($connection, $query)){
		redirect_to("content.php");
	}
	else{
		echo "<p>User creation FAILED</p>";
		echo "<p>" . mysqli_error($connection) . "</p>";
	}
	
?>

<?php mysqli_close($connection); ?>