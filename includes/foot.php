<footer>
	<span class="text-center">MAshraf &copy; 2016</span>
	<div class="pull-right">Lynda PHP Essential</div>
	<div class="clearfix"></div>
</footer>
<?php
	if(isset($connection)){
		mysqli_close($connection);
	}
?>