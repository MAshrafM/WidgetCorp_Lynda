<?php include("includes/dbconnect.php"); ?>
<?php require_once("includes/functions.php"); ?>

<?php
	$menu_name = $_POST['menu_name'];
	$position = $_POST['position'];
	$visible = $_POST['visible'];
	
	$query = "INSERT INTO subjects (menu_name, position, visible) ";
	$query .= "VALUES ('{$menu_name}', {$position}, {$visible})";
	
	if(mysqli_query($connection, $query)){
		header("Location: content.php");
		exit;
	}
	else{
		echo "<p>Subject creation FAILED</p>";
		echo "<p>" . mysqli_error() . "</p>";
	}
	
?>

<?php mysqli_close($connection); ?>