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
					<li><a><i class="fa fa-edit"></i> Subjects <span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu">
						<?php 
							$subject_set = mysqli_query($connection, "SELECT * FROM subjects");
							
							if(!$subject_set){
								die("Database query failed: " . mysqli_error());
							}
							
							while($subject = mysqli_fetch_array($subject_set)){
								echo "<li><a>".$subject["menu_name"];
								
								$pages_set = mysqli_query($connection, "SELECT * FROM pages WHERE subject_id = {$subject["id"]}");
								
								if(!$pages_set){
									die("Database query failed" . mysqli_error());
								}
								$pages = mysqli_num_rows($pages_set);
								if($pages < 1){
									echo "</a></li>";
								}
								else{
									echo "<span class='fa fa-chevron-down'></span></a>";
									echo "<ul class='nav child_menu'>";
									while($page = mysqli_fetch_array($pages_set)){
										echo "<li><a href=''>{$page["menu_name"]}</a></li>";
									}
									echo "</ul></li>";
								}
								
								
								
								
							}
						?>
					</ul>
					</li>
					<li><a href="content.php"><i class="fa fa-desktop"></i> Content </a></li>
					<li><a href="new_user.php"><i class="fa fa-plus"></i> Add Staff User </a></li>
					<li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout </a></li>
				</ul>
			</div>
		</div>
	</div>
</div>