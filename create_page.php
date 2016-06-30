<?php require_once("includes/session.php"); ?>
<?php include("includes/dbconnect.php"); ?>
<?php require_once("includes/functions.php"); ?>

<?php
	// Form Validation
	$errors = array();
	$required_fields = array('menu_name', 'position', 'content', 'subject_id');
	
	foreach($required_fields as $fieldname){
	  if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname] )){
		$errors[] = $fieldname;
	  }
	}
	
	
	if(!empty($errors)){
		redirect_to("new_page.php");
	}
?>

<?php
	$menu_name = mysql_prep($_POST['menu_name']);
	$position = mysql_prep($_POST['position']);
	$visible = mysql_prep($_POST['visible']);
	$content = mysql_prep($_POST['content']);
	$subject_id = mysql_prep($_POST['subject_id']);
	
	$query = "INSERT INTO pages (menu_name, position, visible, content, subject_id) ";
	$query .= "VALUES ('{$menu_name}', {$position}, {$visible}, '{$content}', {$subject_id} )";
	
	if(mysqli_query($connection, $query)){
		redirect_to("content.php");
	}
	else{
		echo "<p>Page creation FAILED</p>";
		echo "<p>" . mysqli_error() . "</p>";
	}
	
?>

<?php mysqli_close($connection); ?>