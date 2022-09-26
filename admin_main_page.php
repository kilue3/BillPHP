<html>
<?php
session_start();
if ($_SESSION['fullname'] == null) {
	header('Location: index.php');
}
?>

<head>
	<link rel="shortcut icon" icon” href="image/icon/th.png" />
	<!--- ไอคอนบนหน้าเว็บ --->
	<title>วางบิลออนไลน์</title>
	<?php
	require("Factor/BoStCSS121102.php");
	?>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<?php
	require("Factor/NavBar121102.php");
	?>
</head>

<body>

	<Br>
	<div class="container-fluid">
		<div class="row">

		<div class="col-lg-3 md-6 ColContentSetting">
				<?php
				require("Factor/ContentLeft.php");
				?>
			</div>
            <div class="col-lg-9 md-6 ColContentSetting">

				<div class="card">
					<div class="card-body">
						<h1 align="center">ระบบวางบิลออนไลน์</h1>
						<div align="center">
							<img src="image/icon/th.png" alt="logo">

						</div>
					</div>

				</div>
			</div>
		</div>

	</div>




</body>

</html>