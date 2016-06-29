<?php
  // All basic functions
  
  function mysql_prep($value){
	$magic_quotes_active = get_magic_quotes_gpc();
	$new_enough_php = function_exists("mysqli_real_escape_string()");
	if($new_enough_php){
	  if($magic_quotes_active){$value = stripslashes($value);}
	  $value = mysqli_real_escape_string($value);
	}
	else{
	  if(!$magic_quotes_active){$value = addslashes($value);}
	}
	return $value;
  }
  
  function redirect_to($location = NULL){
	if($location != NULL){
	  header("Location: {$location}");
	  exit;
	}
  }
  
  function confirm_query($result_set){
	if(!$result_set){
		die("Database query failed: " . mysqli_error());
	}
  }
  
  function get_all_subjects($public = true){
	global $connection;
	$query = "SELECT * 
              FROM subjects";
	if($public){
		$query .= " WHERE visible = 1";
	}
    $query .= " ORDER BY position ASC";
    $subject_set = mysqli_query($connection, $query);
                            
    confirm_query($subject_set);
	return $subject_set;
  }
  
  function get_pages_for_subject($subject_id, $public = true){
	global $connection;
	$query = "SELECT *
              FROM pages 
              WHERE subject_id = {$subject_id}";
	if($public){
		$query .= " AND visible = 1";
	}
    $query .= " ORDER BY position ASC";
    $pages_set = mysqli_query($connection, $query);
                                
    confirm_query($pages_set);
	return $pages_set;
  }
  
  function get_subject_by_id($subject_id){
	global $connection;
	
	$query = "SELECT * ";
	$query .= "FROM subjects ";
	$query .= "WHERE id=" . $subject_id . " ";
	$query .= "LIMIT 1";
	
	$result_set = mysqli_query($connection, $query);
	confirm_query($result_set);
	
	if($subject = mysqli_fetch_array($result_set)){
	  return $subject;
	}
	else{
	  return NULL;
	}
  }
  
  function get_page_by_id($page_id){
	 global $connection;
	
	$query = "SELECT * ";
	$query .= "FROM pages ";
	$query .= "WHERE id=" . $page_id . " ";
	$query .= "LIMIT 1";
	
	$result_set = mysqli_query($connection, $query);
	confirm_query($result_set);
	
	if($page = mysqli_fetch_array($result_set)){
	  return $page;
	}
	else{
	  return NULL;
	}
  }
  
  function get_default_page($subject_id){
	$page_set = get_pages_for_subject($subject_id, true);
	if($first_page = mysqli_fetch_array($page_set)){
		return $first_page;
	}
	else{
		return NULL;
	}
  }
  
?>