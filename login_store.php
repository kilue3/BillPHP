<html>

<head>
	<link rel="shortcut icon" icon” href="image/icon/th.png" />
	<!--- ไอคอนบนหน้าเว็บ --->
	<title>เข้าสู่ระบบ · TZS Online</title>
	<?php
	require "Factor/BoStCSS121102.php";

	session_start();
	?>
</head>

<body class="body-style">
	<div align="center">

		<div style="margin-top: 50px">
			<img src="image/icon/logos.png" height="auto" alt="TZS Logo" style="margin-bottom: 15px;">
		</div>

		<div class="card" style="max-width: 460px;
						margin-top: 50px;
						border-top-left-radius: 10px;
						border-top-right-radius: 10px;
						border-bottom-left-radius: 0px;
						border-bottom-right-radius: 0px;
						color: #000000;
						margin-left: 10px;
						margin-right: 10px;
			">
			<div class="card-body" style="padding-top: 30px;
							padding-left: 30px;
							padding-right: 30px;
							padding-bottom: 0px;
							border-bottom: 1px solid #DCDCDC;
				">



				<form action="" method="POST">
					<h5>ระบบวางบิล
						Online
						(Admin)</h5>
					<p style="font-size: 18px" align="left">ผู้ใช้
						<input class="form-control" placeholder="ใส่ชื่อผู้ใช้" type="email" name="id" id="input_email" required />
					</p>

					<p style="font-size: 18px" align="left">รหัสผ่าน
						<input class="form-control" placeholder="ใส่รหัสผ่านที่นี่" type="password" name="password" required />
						<!-- <a href="">
							<small>
								ลืมรหัสผ่าน?
							</small>
						</a> -->
					</p>

					<div class="row">


						<!------------------------ ปุ่มเข้าสู่ระบบ ----------------------->
						<div class="col-12" align="right">
							<input type="submit" class="btn btn-block btn-lg btn-success LoginBT" id="login" style="border-radius: 10px" value="เข้าสู่ระบบ" name="submit">
						</div>


					</div>
					
				</form>

			</div>
		</div>
	

		<div class="card" style="max-width: 460px;
						border-top-left-radius: 0px;
						border-top-right-radius: 0px;
						border-bottom-left-radius: 10px;
						border-bottom-right-radius: 10px;
						color: #000000;
						margin-left: 10px;
						margin-right: 10px;
			">
			
			<div class="card-body" style="padding-top: 20px;
							padding-left: 30px;
							padding-right: 30px;
							padding-bottom: 20px;
				">
<div class="row">
						<div class="col-12" align="right">
							<input type="submit" class="btn btn-block btn-lg btn-danger LoginBT" id="login" style="border-radius: 10px" value="เข้าสู่ระบบร้านค้า" name="submit">
						</div>
					</div>
			</div>
		</div>


	</div>
	<div class="row">
		<div class="col-lg-6 md-3">
		<img src="image/icon/mascot.png" height="auto" alt="TZS Logo" style="margin-bottom: 15px;margin-left:50px">

		</div>
		<div class="col-lg-6 md-3">
		<img src="image/icon/mascot.png" height="auto" alt="TZS Logo" style="margin-bottom: 15px;margin-left:500px;  display: flex;
">

		</div>
</body>

</html>