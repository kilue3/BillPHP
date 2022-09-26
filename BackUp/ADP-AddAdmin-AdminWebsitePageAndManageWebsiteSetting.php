<html>
	<head>
		<link rel="shortcut icon" icon” href="image/icon/logo-icon.ico" />
		<!--- ไอคอนบนหน้าเว็บ --->
		<title>ผู้ดูแลระบบ · TZS Online</title>
		<?php
			require("Factor/BoStCSS121102.php");
		?>
	</head>
	
	<?php session_start(); ?>
	<?php
	require("Factor/ConnectDatabase.php");
	$sql = "UPDATE customer Set stat_admin =:stat_admin
		where c_email = :c_email";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':c_email', $_POST['Email']);
	$stmt->bindParam(':stat_admin', $_POST['STAT']);
	$stmt->execute();

	$conn = null;
	?>	

<body class="body-style">
    <?php
    require("Factor/NavBar121102.php");
    ?>
    <div class="container">
        <!---- แบ่งกึ่งกลางหน้า ---->


        <font-content>
            <div class=row>

                <div class="col-lg-12 ColContentSetting">
                    <div class="row">
                        <div class="col-12">
                            <div class="card CardBGSetting">
                                <!----- Start พื้นหลัง ----->
                                <div class="card-body CardBodyBGSetting">
                                    <H2>
                                        Promote </h2>
                                    <form action="" method="POST">
                                        <div class="row">
                                            <div class="col-3">
                                                <input type="text" class="form-control" placeholder="Enter Email" name="Email" class="mt-2">
                                            </div>
                                        </div>
                                        <br>
                                        <select type="text" name="STAT">
                                            <!--											<option selected>1</option>-->
                                            <option value="YES">YES</option>

                                        </select>
                                        <br><br>
                                        <div class="row">
                                            <div class="col-3">
                                                <input class="btn btn-lg btn-success btn-block LoginBT" type="submit" value="Promote">
                                                <a href="adminpage.php">
                                                    <input class="btn btn-lg btn-success btn-block LoginBT" value="adminpage">
                                                </a>
                                            </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!----- End ชิ้นส่วนพื้นหลัง ----->
                </div>
                <!----- End พื้นหลัง ----->
                <!------------------------------------------------------------------------------------->
            </div>
    </div>
    <!------------------------------------------------ End Of Content --------------------------------------------------------->
    </div>

    <!---- End แบ่งกึ่งกลางหน้า ---->

    <?php
    require("Factor/ScrollTop121102.php");
    ?>

    </font-content>
    <?php
    require("Factor/Footer121102.php");
    ?>

</body>

</html>