<html>
<?php
session_start();
if ($_SESSION['fullname'] == null) {
    header('Location: index.php');
}
require("Factor/Controller.php");
require("Factor/BoStCSS121102.php");
?>
<script>
    function callAlert() {
        Swal.fire({
            title: 'สำเร็จ',
            text: 'ระบบได้ลบบัญชีนี้แล้ว',
            timer: 2500,
            icon: 'success',

        }).then(function() {
            window.location.href = "manage_user.php";
        });


    }

    function callfail() {
        Swal.fire({
            title: 'ล้มเหลว',
            text: 'ระบบได้ลบบัญชีนี้ล้มเหลว',
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
</script>
<?php
$ID = $_GET["ID"];

if (isset($_GET["ID"])) {
    $ID = $_GET["ID"];
    $row = Getuserinfo($ID);
    foreach ($row as $key2) {
        $fullname = $key2->fullname;
        $username = $key2->username;
        $status = $key2->status;
        $st_tel = $key2->Tel;
    }
}

if (isset($_POST["btn-submit"])) {
    $msg = Delectuser($ID);
}

?>


<head>
    <link rel="shortcut icon" icon” href="image/icon/th.png" />
    <!--- ไอคอนบนหน้าเว็บ --->
    <title>บัญชีผู้ใช้ : <?php echo   $fullname; ?></title>
    <?php
    require("Factor/BoStCSS121102.php");
    ?>
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">
    <?php
    require("Factor/NavBar121102.php");
    ?>
</head>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">

        <div class="modal-content  bg-warning">
            <div class="modal-header  bg-warning">
                <h5 class="modal-title" id="exampleModalLabel">คำเตือนลบบัญชีผู้ใช้ : <?php echo   $fullname; ?> &nbsp ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body  bg-warning">



                    <h3 for="recipient-name" class="col-form-h3">เมื่อลบบัญชีผู้ใช้นี้แล้วจะไม่สามารถใช้งานได้อีก </h3>



                </div>
                <div class="modal-footer  bg-warning">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <input type="submit" name="btn-submit" class="btn btn-danger" value="ตกลง">

                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="btn-submit" class="btn btn-primary" value="ตกลง">

                </div> -->
            </form>

        </div>
    </div>
</div>


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
                    <?php
                    // foreach ($row as $keys) {  
                    ?>
                    <h5 class="card-header"><?php echo   $fullname; ?></h5>
                    <div class="card-body">
                        <h5 class="card-title">ร้าน : <?php echo   $fullname; ?> </h5>
                        <div class="row">
                            <div class=" col-lg-12 md-6">
                                <p class="card-text">ชื่อผู้ติดต่อ &nbsp : &nbsp<?php if ($fullname == Null) {
                                                                                    echo "-";
                                                                                } else {
                                                                                    echo   $fullname;
                                                                                } ?></p>
                                <p class="card-text">EMAIL &nbsp :&nbsp <?php

                                                                        if ($username == Null) {
                                                                            echo "-";
                                                                        } else {
                                                                            echo $username;
                                                                        } ?>
                                </p>
                                <p class="card-text">ชื่อผู้ใช้ &nbsp :&nbsp<?php
                                                                            if ($status == Null) {
                                                                                echo "-";
                                                                            } else {
                                                                                echo $status;
                                                                            }
                                                                            ?> </p>
                                <p class="card-text">Address &nbsp : &nbsp<?php
                                                                            if ($st_tel == Null) {
                                                                                echo "-";
                                                                            } else {
                                                                                echo $st_tel;
                                                                            }

                                                                            ?></p>

                            </div>

                        </div>
                        <Br>
                        <div align="center">
                            <button type="submit" class="btn btn-danger btn-lg" data-toggle="modal" data-target=".bd-example-modal-lg">ลบบัญชีผู้ใช้</button>

                        </div>

                    </div>
                    <?php
                    // }
                    ?>
                </div>
            </div>
        </div>

    </div>




</body>

</html>