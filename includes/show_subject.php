<h2 class='text-center'><?php echo $sel_subject["menu_name"]; ?></h2>
<hr />
<div class='row'>
  <div class='col-md-6 col-md-offset-3'>
	<div class='x_panel tile'>
	  <div class='x_title'>
		<h2>
		  <a href='#'><?php echo $sel_subject["menu_name"]; ?></a>
		</h2>
		<ul class='nav navbar-right panel_toolbox'>
		  <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a></li>
		  <li><a href='edit_subject.php?subj="<?php echo urlencode($sel_subject["id"]) ?>"'><i class='fa fa-wrench'></i></a></li>
		  <li><a href='delete_subject.php?subj="<?php echo urlencode($sel_subject["id"]) ?>"' onclick=" return confirm('Are you sure you want to delete this subject');"><i class='fa fa-close'></i></a></li>
		</ul>
		<div class='clearfix'>
	  </div>
	</div>
<?php 
  $pages_set = get_pages_for_subject($sel_subject["id"]);
  $pages = mysqli_num_rows($pages_set);

  if($pages < 1){
echo "
      <div class='x_content'>
	    <div class='add-page'>
		  <div class='sudo-btn'><a href='new_page.php?subj=".urlencode($subject["id"])."'><i class='fa fa-plus'></i> Page</a></div>
		</div>
	  </div>
  </div>
</div>";
}
else{
echo "
	  <div class='x_content'>
	    <ul>
	";
	while($page = mysqli_fetch_array($pages_set)){
echo "
		<li>
		  <h4><a href='content.php?page=". urlencode($page["id"])."'>{$page["menu_name"]}</a></h4>
			<div class='page_toolbox'>
			  <ul class='nav navbar-right panel_toolbox'>
				<li><a href='edit_page.php?page=".urlencode($page["id"])."&subj=".urlencode($sel_subject["id"])."'><i class='fa fa-wrench'></i></a></li>
				<li><a href='delete_page.php?page=".urlencode($page["id"])."' onclick=\" return confirm('Are you sure you want to delete this page');\"><i class='fa fa-close'></i></a></li>
			  </ul>
			</div>
		</li>
		";
	}
	echo"
	  </ul>
	</div>
	<div class='add_page_btn'><a class='btn btn-success' href='new_page.php?subj=".urlencode($sel_subject["id"])."'><i class='fa fa-plus'></i> Page</a>
	</div>
	</div>
</div>";
}
?>
</div>
<div class="pull-left">
<a href="content.php"> <i class="fa fa-chevron-left fa-3x"></i></a>
</div>