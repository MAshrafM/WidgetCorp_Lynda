<?php include("includes/dbconnect.php"); ?>
<?php require_once("includes/functions.php"); ?>
<html>
	<?php include("includes/head.php"); ?>
	<body class="nav-md">
		<div class="container body">
			<div class="main_container">
				<?php include("includes/sidebar.php"); ?>
				<?php include("includes/topnav.php"); ?>
				
				<div class="right_col">
					<div class="row">
						<?php
							if(isset($sel_subject)){
								echo "<h2 class='text-center'>{$sel_subject["menu_name"]}</h2>";
								echo "<hr />";
								echo "<div class='row'><div class='col-md-4 col-md-offset-1'>";
								echo "<ul class='list-group'>";
								$pages = get_pages_for_subject($sel_subject["id"]);
								while($pg = mysqli_fetch_array($pages)){
									echo "<li class='list-group-item'><a href='content.php?page=". urlencode($pg["id"])."'>{$pg["menu_name"]}</a></li>";
								}
								echo "</ul></div></div>";
								echo "<br />";
								echo "<div class='pull-right'><button class'btn btn-success'><i class='fa fa-plus'></i> Add A Page</button></div>";
							}
							elseif(isset($sel_page)){
								$subject_title = get_subject_by_id($sel_page["subject_id"])["menu_name"];
								echo "<ol class='breadcrumb'>
									  <li><a href='content.php'>Content Area</a></li>
									  <li><a href='content.php?subj={$sel_page["subject_id"]}'>{$subject_title}</a></li>
									  <li class='active'>{$sel_page["menu_name"]}</li>
									</ol>";
								echo "<h2 class='text-center'>{$sel_page["menu_name"]}</h2>";
								echo "<article class='well'><p>{$sel_page["content"]}</p></article>";
							}
							else{
								echo "
								<h2 class='text-center'>Content Area</h2>
								<div class='text-center'>
								<span><a href='new_subject.php' class='btn btn-success'><i class='fa fa-plus'></i> Add A Subject</a></span>
								</div>
								<hr />
								<div class='row'>"
								;
								$subject_set = get_all_subjects();
								while($subject = mysqli_fetch_array($subject_set)){
									echo "<div class='col-md-4 col-xs-12'>
										  <div class='x_panel tile fixed_height_320'>";
									echo "<div class='x_title'>
										  <h2>
										  <a href='content.php?subj=".urlencode($subject["id"])."'>".$subject["menu_name"]."</a>
										  </h2>
										  <ul class='nav navbar-right panel_toolbox'>
										  <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a></li>
										  <li><a href='edit_subject.php?subj=".urlencode($subject["id"])."'><i class='fa fa-wrench'></i></a></li>
										  <li><a href='delete_subject.php?subj=".urlencode($subject["id"])."' onclick=\" return confirm('Are you sure you want to delete this subject');\"><i class='fa fa-close'></i></a></li>
										  </ul>
										  <div class='clearfix'></div></div>";
									$pages_set = get_pages_for_subject($subject["id"]);
									$pages = mysqli_num_rows($pages_set);
									if($pages < 1){
										echo "<div class='x_content'>
										<div class='add-page'>
										<div class='sudo-btn'><a href='new_page.php?subj=".urlencode($subject["id"])."'><i class='fa fa-plus'></i> Page</a></div>
										</div>
										</div>
										</div></div>";
									}
									else{
										echo "<div class='x_content'><ul>";
										while($page = mysqli_fetch_array($pages_set)){
											echo "
											<li>
											<h4><a href='content.php?page=". urlencode($page["id"])."'>{$page["menu_name"]}</a></h4>
											
											<div class='page_toolbox'>
											<ul class='nav navbar-right panel_toolbox'>
											<li><a href='edit_page.php?page=".urlencode($page["id"])."&subj=".urlencode($subject["id"])."'><i class='fa fa-wrench'></i></a></li>
											<li><a href='delete_page.php?page=".urlencode($page["id"])."' onclick=\" return confirm('Are you sure you want to delete this page');\"><i class='fa fa-close'></i></a></li>
											</ul>
											</div>
											</li>
											";
										}
										echo"</ul>
										</div><div class='add_page_btn'><a class='btn btn-success' href='new_page.php?subj=".urlencode($subject["id"])."'><i class='fa fa-plus'></i> Page</a></div>
										</div></div>";
									}
								}
								echo "	
								</div>
								";
							}
						?>
					</div>
				</div>
				
				<?php require("includes/foot.php"); ?>
			</div>
		</div>
		
		<script src="scripts/jquery.min.js"></script>
		<script src="scripts/bootstrap.min.js"></script>
		<script src="scripts/custom.min.js"></script>
		<script src="scripts/script.js"></script>
	</body>
</html>
