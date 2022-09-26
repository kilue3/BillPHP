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
    
    function callnotfull() {
        Swal.fire({
            title: 'ล้มเหลว',
            text: 'กรุณากรอกข้อมูลให้ครบ',
            timer: 2500,
            icon: 'error',

        }).then(function() {
            window.location.href = "manage_store.php";
        });


    }
</script>
<?php
if (isset($_POST['ID'])) {
    $ID = $_POST['ID'];
    if ($ID!= Null ) {
        $row = GetstorenameAX($ID);

    } else {
        echo ' <script>
        callnotfull()
        </script>';
    }
}



?>

<head>
    <link rel="shortcut icon" icon” href="image/icon/th.png" />
    <!--- ไอคอนบนหน้าเว็บ --->
    <title>ค้นหารายชื่อร้านค้า</title>

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
                        <h1 align="center">รายชื่อร้านค้า</h1>
                        <div align="center">
                            <?php
                            if ($row == Null) { ?>
                                <div align="center">
                                    <h4>ไม่พบข้อมูล</h4>
                                </div>

                            <?php  } else {
                            ?>
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">ชื่อร้านค้า</th>
                                            <?php if ($_SESSION['status'] == "Gm") { ?>
                                                <th scope="col">เพิ่มร้านค้า</th>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($row as $key) {

                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $key->Name ?></th>
                                                <?php if ($_SESSION['status'] == "Gm") { ?>
                                                    <td> <a href=<?php echo "Store_Add.php?ID=".$key->AccountNum;?>
                                                    <button class="btn btn-outline-danger ">ดูรายละเอียด</button></a>

                                                    </td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>




</body>

</html>