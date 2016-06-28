<?php include("includes/dbconnect.php"); ?>
<?php require_once("includes/functions.php"); ?>

<?php
  if(intval($_GET['page']) == 0){
	redirect_to("content.php");
  }
  
  $id = mysql_prep($_GET['page']);
  if($subject = get_page_by_id($id)){
	$query = "DELETE FROM pages Where id = {$id} LIMIT 1";
    $result = mysqli_query($connection, $query);
    if(mysqli_affected_rows($connection) == 1){
	  redirect_to("content.php");
    }else{
	  // Failed to delete
	  echo "Deletion failed" . mysqli_error($connection);
    } 
  }else{
	redirect_to("content.php");
  }
  
?>

<?php mysqli_close($connection); ?>