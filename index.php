<?php include("includes/dbconnect.php"); ?>
<?php require_once("includes/functions.php"); ?>
<html>
	<?php include("includes/head.php"); ?>
	<body>
		<nav class="navbar">
		  <div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="#">Widget Corp</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			  <ul class="nav navbar-nav">
				<li class="active"><a href="#">About <span class="sr-only">(current)</span></a></li>
				<li><a href="#">Articles</a></li>
			  </ul>
			  
			  <ul class="nav navbar-nav navbar-right">
				<li><a href="#">Login</a></li>
			  </ul>
			</div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		<main class="container">
			<div class="row">
				<div class="jumbotron">
					<h1>Welcome to our Website</h2>
				</div>
			</div>
			
			<div class="row">
				<h2 class="text-center">Latest Articles</h2>
				<div class="col-md-4"></div>
				<div class="col-md-4"></div>
				<div class="col-md-4"></div>
			</div>
			<div class="row">
				<h2 class="text-center">Social Activity</div>
				<div class="col-md-4"></div>
				<div class="col-md-4"></div>
			</div>
			<div class="row">
				<h2 class="text-center">Contact Us</div>
				<div class="col-md-6"></div>
			</div>
		</main>
		
		
		<?php include("includes/foot.php"); ?>
		
		
		<script src="scripts/jquery.min.js"></script>
		<script src="scripts/bootstrap.min.js"></script>
		<script src="scripts/custom.min.js"></script>
	</body>
</html>