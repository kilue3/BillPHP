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
            text: 'ระบบได้ลบร้านค้านี้แล้ว',
            timer: 2500,
            icon: 'success',

        }).then(function() {
            window.location.href = "manage_store.php";
        });


    }

    function callfail() {
        Swal.fire({
            title: 'ล้มเหลว',
            text: 'ระบบได้ลบร้านค้านี้ล้มเหลว',
            timer: 2500,
            icon: 'error',

        }).then(function() {
            window.location.href = "manage_store.php";
        });


    }

    function callduplicate() {
        Swal.fire({
            title: 'ล้มเหลว',
            text: 'เพิ่มผู้ใช้ ล้มเหลว มีผู้ใช้นี้อยู่แล้ว',
            timer: 2500,
            icon: 'error',

        }).then(function() {
            window.location.href = "manage_store.php";
        });


    }
</script>
<?php
$ID = $_GET["ID"];

if (isset($_GET["ID"])) {
    $ID = $_GET["ID"];
    // $row = Getstordb($ID);
    // foreach ($row as $key2) {
    //     $st_name = $key2->Store_name;
    //     $st_email = $key2->Store_email;
    //     $st_con = $key2->Contact_name;
    //     $st_tel = $key2->Tel;
    //     $st_username = $key2->Store_username;
    //     $st_password = $key2->Store_password;
    //     $st_status = $key2->Store_status;
    //     $st_taxg =  $key2->bill_TaxGroup;
    //     $st_bpc =  $key2->bill_BPC_WHTid;
    //     $st_branchno =  $key2->bill_BPC_BranchNo;
    //     $st_vengroup =  $key2->VendGroup;
    //     $st_address =  $key2->Address;
    // }
}

if (isset($_POST["btn-submit"])) {
    // $msg = DelectStore($ID);
}

?>


<head>
    <link rel="shortcut icon" icon” href="image/icon/th.png" />
    <!--- ไอคอนบนหน้าเว็บ --->
    <title>บิลหมายเลข : <?php echo   $ID; ?></title>
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
                <h5 class="modal-title" id="exampleModalLabel">คำเตือนลบบัญชีผู้ใช้ ร้านค้า: <?php echo   $st_name; ?>?</h5>
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
                    <h5 class="card-header">รายละเอียด บิลหมายเลข : <?php echo   $ID; ?></h5>
                    <div class="card-body">
                        <h5 class="card-title">รายละเอียด บิลหมายเลข : <?php echo   $ID; ?> </h5>
                        <div class="row">
                            <div class=" col-lg-12 md-6">
                              

                            </div>

                        </div>
                        <Br>
                        <div align="center">
                            <button type="submit" class="btn btn-danger btn-lg" data-toggle="modal" data-target=".bd-example-modal-lg">ลบ</button>

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