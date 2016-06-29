<?php
	if(isset($_GET['subj']) && isset($_GET['page'])){
		$sel_page = get_page_by_id($_GET['page']);
		$sel_subject = get_subject_by_id($_GET['subj']);
	}
	elseif(isset($_GET['subj'])){
		$sel_page = NULL;
		$sel_subject = get_subject_by_id($_GET['subj']);
	}
	elseif(isset($_GET['page'])){
		$sel_subject = NULL;
		$sel_page = get_page_by_id($_GET['page']);
	}
	else{
		$sel_subject = NULL;
		$sel_page = NULL;
	}
?>
<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
      <div class="navbar nav_title">
          <a href="index.php" class="site_title">
              <span>Widget Corp</span>
          </a>
      </div>
      <div class="clearfix"></div>
      <div id="sidebar-menu" class="menu_menu_side main_menu">
          <div class="menu_section">
              <ul class="nav side-menu">
                  <li><a href="dashboard.php"><i class="fa fa-home"></i> Dashboard </a></li>
				  <li><a href="content.php"><i class="fa fa-desktop"></i> Content Area </a></li>
                  <li><a><i class="fa fa-edit"></i> Subjects <span class="fa fa-chevron-down"></span></a>				    
                  <ul class="nav child_menu">
					
                      <?php 
                          $subject_set = get_all_subjects(false);
                            
                          while($subject = mysqli_fetch_array($subject_set)){
                              echo "<li";
							  if($sel_subject["id"] == $subject["id"]){ echo " class='current-page'";}
							  echo "><a href='content.php?subj=".urlencode($subject["id"])."'>".$subject["menu_name"];
                 
							  $pages_set = get_pages_for_subject($subject["id"], false);
                              $pages = mysqli_num_rows($pages_set);
                              if($pages < 1){
                                  echo "</a></li>";
                              }
                              else{
                                  echo "</a><a class='subarrow'><span><i class='fa fa-chevron-down'></i></span></a>";
                                  echo "<ul class='nav child_menu'>";
                                  while($page = mysqli_fetch_array($pages_set)){
                                      echo "<li><a href='content.php?page=". urlencode($page["id"])."'>{$page["menu_name"]}</a></li>";
                                  }
                                  echo "</ul></li>";
                              }  
                          }
                      ?>
                  </ul>
                  </li>
                  
                  <li><a href="new_user.php"><i class="fa fa-plus"></i> Add Staff User </a></li>
                  <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout </a></li>
              </ul>
          </div>
      </div>
  </div>
</div>