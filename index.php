<html>
<?php
session_start(); ?>
<script>
	function callAlert() {
		Swal.fire({
			title: 'ยินดีต้อนรับ',
			text: 'เข้าสู่เว็บไซต์ วางบิล Online',
			timer: 2500,
			icon: 'success',

		}).then(function() {
			window.location.href = "admin_main_page.php";
		});


	}

	function callfail() {
		Swal.fire({
			title: 'เข้าสู่ระบบล้มเหลว',
			text: 'ชื่อผู้ใช้หรือรหัสผ่านผิด โปรดลองใหม่อีกครั้ง ',
			timer: 2500,
			icon: 'error',

		}).then(function() {
			window.location.href = "index.php";
		});


	}

	function callfaillock() {
		Swal.fire({
			title: 'เข้าสู่ระบบล้มเหลว',
			text: 'รหัสผ่านผิดมากเกินไป ID นี้โดนล็อค',
			timer: 2500,
			icon: 'error',

		}).then(function() {
			window.location.href = "index.php";
		});


	}
</script>


<head>
	<link rel="shortcut icon" icon” href="image/icon/th.png" />
	<!--- ไอคอนบนหน้าเว็บ --->
	<title>เข้าสู่ระบบ · ระบบวางบิล Online</title>
	<?php
	require "Factor/BoStCSS121102.php";
	require "Factor/Condb.php";

	$a = "";
	if (isset($_POST['btn-login'])) {
		$usr_id = $_POST['user_id'];
		$user_password = $_POST['password'];
		if ($usr_id != null and $user_password != null) {
			$server = "192.168.3.3"; //dc1-nu
			$user = $usr_id . "@thaicoconut.com";
			// connect to active directory
			$ad = ldap_connect($server);
			if (!$ad) {
				die("Connect not connect to " . $server);
				// include("chk_login_db.php");
				echo "ไม่สามารถติดต่อ server มหาลัยเพื่อตรวจสอบรหัสผ่านได้";
				exit();
			} else {
				$b = @ldap_bind($ad, $user, $user_password);
				if ($b) {
					$a = "true";
					try {
						$stmt = $db_con->prepare("SELECT * FROM users WHERE username=:username ");
						$stmt->execute(array(":username" => $usr_id));
						$row = $stmt->fetch(PDO::FETCH_ASSOC);
						$count = $stmt->rowCount();
						if ($a == "true") {
							// echo "ok";
							$_SESSION['fullname'] = $row['fullname'];
							$_SESSION['username'] = $row['username'];
							$_SESSION['status'] = $row['status'];
							$_SESSION['Tel'] = $row['Tel'];
							//Check Admin
							$data = $row['fullname'];

							// $_SESSION['Loginfail']=0;
							// echo $_SESSION['fullname'].'<br>';
							// echo $_SESSION['username'].'<br>';
							// echo $_SESSION['status'].'<br>';


							echo '<script>
                callAlert()
                </script>';;
						} else {
							echo '<script>
                callfail()
                </script>';
						}
					} catch (PDOException $e) {
						echo $e->getMessage();
					}
				} else {
					$a = "false";
					// $_SESSION['Loginfail']++;
					echo '<script>
			callfail()
			</script>';
					// if ( $_SESSION['Loginfail'] == 5 ) {

					// 	echo '<script>
					//     callfaillock()
					//     </script>';
					// 			$_SESSION['Loginfail']=0;

					// }


				}


				exit();
			}
		} else {
			echo 'Pls input username and  password. ';
		}
	}

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
						<input class="form-control" placeholder="ใส่ชื่อผู้ใช้" type="text" name="user_id" id="input_email" required />
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
							<input type="submit" class="btn btn-block btn-lg btn-success LoginBT" id="login" style="border-radius: 10px" value="เข้าสู่ระบบ" name="btn-login">
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
						<a href="login_store.php">

							<input type="submit" class="btn btn-block btn-lg btn-danger LoginBT" id="login" style="border-radius: 10px" value="เข้าสู่ระบบร้านค้า" name="submit">
						</a>
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
			<img src="image/icon/mascot.png" height="auto" alt="TZS Logo" style="margin-bottom: 15px;margin-left:500px;
">

		</div>
	</div>
</body>

</html>