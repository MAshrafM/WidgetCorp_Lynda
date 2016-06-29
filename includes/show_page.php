<?php $subject_title = get_subject_by_id($sel_page["subject_id"])["menu_name"]; ?>
<ol class='breadcrumb'>
  <li><a href='content.php'>Content Area</a></li>
  <li><a href='content.php?subj=<?php echo $sel_page["subject_id"]; ?>'><?php echo $subject_title; ?></a></li>
  <li class='active'><?php echo $sel_page["menu_name"]; ?></li>
</ol>
<h2 class='text-center'><?php echo $sel_page["menu_name"]; ?></h2>
<div class="col-md-9 col-md-offset-1">
  <article class='well'><?php echo strip_tags(nl2br($sel_page["content"]), "<b><br><p><a>"); ?></article>
</div>