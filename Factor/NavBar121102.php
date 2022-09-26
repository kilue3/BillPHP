<html>

<head>
	<?php

	?>
	<style>
		.nav-item {
			margin-right: 15px;
		}
	</style>
</head>

<body>
	<nav class="navbar navbar-expand-lg " id="NavBar1Setting">
		<a class="navbar-brand" href="admin_main_page.php">
			<img src="image/icon/th.png" height="55" alt="TZS Logo">
		</a>

		

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="admin_main_page.php"><h3>วางบิลออนไลน์</h3> <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#"></a>
				</li>
			
				<li class="nav-item">
					<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"></a>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0">
				<h5><?php echo $_SESSION['fullname']?></h5>
				
				</form>
				<form class="form-inline my-2 my-lg-0">
				<form class="form-inline my-2 my-lg-0">
				<h5 style="color:#FFFFFF">_____</h5>
				
				</form>
				</form>
			<form class="form-inline my-2 my-lg-0">
				<a href="logout.php">
					<button type="button" class="btn btn-danger btn-lg btn-block">Logout</button></a>			
				</form>
		</div>
	</nav>

</body>

</html>