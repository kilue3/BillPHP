<html>
<?php
session_start();
require("Factor/Controller.php");
// require("Factor/Mo_adduser.php");
require("Factor/BoStCSS121102.php");

if ($_SESSION['fullname'] == null) {
    header('Location: index.php');
}
$row = Getstorelist();
?>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มร้านค้า</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="liststoreax.php" method="POST">
                <div class="modal-body">


                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">ชื่อร้านค้า:</label>
                        <input type="text" class="form-control" name="ID" id="recipient-name" require>
                    </div>
                                       
                    <div align="center">
                        <input type="submit" name="btn-submit" class="btn btn-primary" value="ค้นหา">

                    </div>

                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="btn-submit" class="btn btn-primary" value="ตกลง">

                </div> -->
            </form>

        </div>
    </div>
</div>
</div>

<head>
    <link rel="shortcut icon" icon” href="image/icon/th.png" />
    <!--- ไอคอนบนหน้าเว็บ --->
    <title>ร้านค้าระบบ</title>

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
                        <li class="breadcrumb-item"><a href="">ร้านค้านระบบ </a></li>
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
                                        <h3 style="margin: 0"><img src="image/Buttonicon/store.png" style="margin-right:30px;" />ร้านค้าในระบบ</h3>
                                    </div>
                                    <div class="col lg-9 md-6">
                                        <div align="right">
                                            <button type="button" class="btn btn-outline-primary btn-lg " data-toggle="modal" data-target=".bd-example-modal-lg">เพิ่มเพิ่มร้านค้า</button>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <hr>

                            <br>
                            <h3 align="center">รายชื่อร้านค้า</h3>
                            <br>

                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">ชื่อ-สกุล</th>
                                        <th scope="col">ชื่อผู้ใช้</th>
                                        <?php if ($_SESSION['status'] == "Gm") { ?>
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
                                            <th scope="row"><?php echo $value['Store_name'] ?></th>
                                            <td><?php echo $value['Store_username'] ?></td>
                                            <?php if ($_SESSION['status'] == "Gm") { ?>
                                                <td> <a href=<?php echo "Store_info.php?ID=".$value['Store_username'];?>
                                                 ><button class="btn btn-outline-danger ">ดูรายละเอียด</button></a>

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