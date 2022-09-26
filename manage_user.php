<html>
<?php
session_start();
require("Factor/Controller.php");
// require("Factor/Mo_adduser.php");
require("Factor/BoStCSS121102.php");

if ($_SESSION['fullname'] == null) {
    header('Location: index.php');
}
$row = GetuseradminList();
?>
<script>
    function callAlert() {
        Swal.fire({
            title: 'สำเร็จ',
            text: 'เพิ่มผู้ใช้สำเร็จ',
			timer: 2500,
            icon: 'success',
           
        }).then(function() {
        window.location.href = "manage_user.php";
    });
		

    }
	function callfail() {
        Swal.fire({
            title: 'ล้มเหลว',
            text: 'เพิ่มผู้ใช้ ล้มเหลว',
			timer: 2500,
            icon: 'error',
           
        }).then(function() {
            window.location.href = "manage_user.php";
    });
		

    }
    function callduplicate() {
        Swal.fire({
            title: 'ล้มเหลว',
            text: 'เพิ่มผู้ใช้ ล้มเหลว มีผู้ใช้นี้อยู่แล้ว',
			timer: 2500,
            icon: 'error',
           
        }).then(function() {
            window.location.href = "manage_user.php";
    });
		

    }
	
    function callnotfull() {
        Swal.fire({
            title: 'ล้มเหลว',
            text: 'กรุณากรอกข้อมูลให้ครบ',
			timer: 2500,
            icon: 'error',
           
        }).then(function() {
            window.location.href = "manage_user.php";
    });
		

    }
</script>



<?php
if (isset($_POST['btn-submit'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $status = $_POST['status'];
    if ($fullname != Null & $username != NULL & $status != NULL) {
        $responds = adduser($fullname, $username, $status);

    } else {
        echo ' <script>
        callnotfull()
        </script>';
    }
}
?>




<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มผู้ใช้งาน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">ชื่อ-สกุล:</label>
                        <input type="text" class="form-control" name="fullname" id="recipient-name" require>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">ชื่อผู้ใช้:</label>
                        <input type="text" class="form-control" name="username" id="recipient-name" require>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">สถานะ</label>
                        <select class="form-control" name="status" id="exampleFormControlSelect1" require>
                            <option>admin</option>
                            <option>normal</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="btn-submit" class="btn btn-primary" value="ตกลง">

                </div>
            </form>

        </div>
    </div>
</div>
</div>

<head>
    <link rel="shortcut icon" icon” href="image/icon/th.png" />
    <!--- ไอคอนบนหน้าเว็บ --->
    <title>ผู้ใช้งานในระบบ</title>
   
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
                <!---------------------- ลิงค์ --------------------->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb SpaceStyle" style="background-color: #FFFFFF">
                        <li class="breadcrumb-item"><a href="admin_main_page.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item"><a href="">ผู้ใช้งานในระบบ </a></li>
                    </ol>
                </nav>
                <!---------------------- ข้อมูล --------------------->
                <div class="card CardBGSetting">
                    <!----- Start พื้นหลัง ----->
                    <div class="card-body CardBodyBGSetting BorderRadius">
                        <!----- Start ชิ้นส่วนพื้นหลัง ----->


                        <div class="card CardContentBGSetting">
                            <div class="card-body CardBodyContentBGSetting">
                                <div class="row">
                                    <div class="col lg-3 md-6">
                                        <h3 style="margin: 0"><img src="image/Buttonicon/user.png" style="margin-right:30px;" />ผู้ใช้งานในระบบ</h3>
                                    </div>
                                    <div class="col lg-9 md-6">
                                        <div align="right">
                                            <button type="button" class="btn btn-outline-primary btn-lg " data-toggle="modal" data-target=".bd-example-modal-lg">เพิ่มผู้ใช้งาน</button>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <hr>

                            <br>
                            <h3 align="center">รายชื่อผู้ใช้งาน</h3>
                            <br>

                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">ชื่อ-สกุล</th>
                                        <th scope="col">ชื่อผู้ใช้</th>
                                        <th scope="col">สถานะ</th>
                                        <?php if($_SESSION['status']=="Gm")
                                        {?>
                                        <th scope="col">รายละเอียดผู้ใช้</th>
                                        <?php
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($row as $key => $value) {

                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $value['fullname'] ?></th>
                                            <td><?php echo $value['username'] ?></td>
                                            <td><?php echo $value['status'] ?></td>
                                            <?php if($_SESSION['status']=="Gm")
                                        {?>
                                        
                                           <td> <a href=<?php echo "User_info.php?ID=".$value['username'];?>><button class="btn btn-outline-danger ">ดูรายละเอียด</button></a>
                                        
                                        </td>
                                            <?php
                                        }
                                        ?>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>


                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>

    </div>




</body>

</html>