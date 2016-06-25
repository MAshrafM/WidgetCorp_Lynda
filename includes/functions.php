<?php
  // All basic functions
  
  function confirm_query($result_set){
	if(!$result_set){
		die("Database query failed: " . mysqli_error());
	}
  }
  
  function get_all_subjects(){
	global $connection;
	$query = "SELECT * 
              FROM subjects 
              ORDER BY position ASC";
    $subject_set = mysqli_query($connection, $query);
                            
    confirm_query($subject_set);
	return $subject_set;
  }
  
  function get_pages_for_subject($subject_id){
	global $connection;
	$query = "SELECT *
              FROM pages 
              WHERE subject_id = {$subject_id}
              ORDER BY position ASC";
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
  
?>