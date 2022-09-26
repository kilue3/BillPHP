<html>
<?php
session_start();
require("Factor/Controller.php");
// require("Factor/Mo_adduser.php");
require("Factor/BoStCSS121102.php");

if ($_SESSION['fullname'] == null) {
    header('Location: index.php');
}
$row = Getlistbill();
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
    <title>รายการบิล</title>

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
                        <li class="breadcrumb-item"><a href="">รายการบิล </a></li>
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
                                        <h3 style="margin: 0"><img src="image/Buttonicon/assignment.png" style="margin-right:30px;" />รายการบิลในระบบ</h3>
                                    </div>
                                    <div class="col lg-9 md-6">

                                    </div>
                                </div>
                            </div>
                            <hr>

                            <br>
                            <h3>รายการบิลในระบบ</h3>
                            <br>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">วัน-เวลา</th>
                                        <th scope="col">ชื่อร้านค้า </th>
                                        <th scope="col">เลขที่บิล </th>
                                        <th scope="col">จำนวนเงิน </th>
                                        <th scope="col">สถานะ </th>
                                        <th scope="col">ดูรายละเอียด</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($row as $key => $value) {

                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $value['bill_op_time'] ?></th>
                                            <td><?php echo $value['Store_name'] ?></td>
                                            <td><?php echo $value['bill_id'] ?></td>
                                            <td><?php echo $value['bill_amount'] ?></td>
                                            <td <?php if ($value['bill_status'] == "wait") {
                                                    echo 'style="color:red;"';
                                                } else {
                                                    echo 'style="color:green;"';
                                                } ?>>
                                                <?php if ($value['bill_status'] == "wait") {
                                                    echo 'สร้างใหม่';
                                                } else {
                                                    echo $value['bill_status'];
                                                } ?></td>
                                            <td> <a href=<?php $bid = $value['bill_id'];echo "bill_info.php?ID=" . urlencode($bid); ?>><button class="btn btn-outline-primary ">ดูรายละเอียด</button></a>

                                            </td>
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

</body>

</html>