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
            text: 'เพิ่มผู้ใช้สำเร็จ',
			timer: 2500,
            icon: 'success',
           
        }).then(function() {
        window.location.href = "manage_store.php";
    });
		

    }
	function callfail() {
        Swal.fire({
            title: 'ล้มเหลว',
            text: 'เพิ่มผู้ใช้ ล้มเหลว',
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

if (isset($_GET["ID"])) {
    $ID = $_GET["ID"];
    $row = GetstoreinfoAX($ID);
    foreach ($row as $key2) { 
        $st_name = $key2->Name;
       $st_email = $key2->Email;
       $st_con = $key2->Name;
       $st_tel =$key2->Phone;
       $st_username = $key2->AccountNum;
       $st_password = $key2->AccountNum;
        $st_status = "enable";
        $st_taxg =  $key2->TaxGroup;
        $st_bpc =  $key2->BPC_WHTid;
        $st_branchno =  $key2->BPC_BranchNo;
        $st_vengroup =  $key2->VendGroup;
        $st_address =  $key2->Address; 
        
    }
}


if(isset($_POST["btn-submit"])){
   
$row = addstore( $st_name, $st_email,$st_con,$st_tel,$st_username,$st_password,$st_status,$st_taxg,$st_bpc,$st_branchno,$st_vengroup,$st_address);

}
?>


<head>
    <link rel="shortcut icon" icon” href="image/icon/th.png"/>
    <!--- ไอคอนบนหน้าเว็บ --->
    <title>เพิ่มร้านค้า</title>
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
                    <?php 
                    // foreach ($row as $keys) {  
                         ?>
                        <h5 class="card-header"><?php echo   $st_name; ?></h5>
                        <div class="card-body">
                            <h5 class="card-title">ร้าน : <?php echo   $st_name; ?> </h5>
                            <div class="row">
                                <div class=" col-lg-12 md-6">
                                    <p class="card-text">ชื่อผู้ติดต่อ &nbsp : &nbsp<?php if (  $st_name == Null) {
                                                                                        echo "-";
                                                                                    } else {
                                                                                        echo   $st_name;
                                                                                    } ?></p>
                                    <p class="card-text">EMAIL &nbsp :&nbsp <?php

                                                                            if ($st_email == Null) {
                                                                                echo "-";
                                                                            } else {
                                                                                echo $st_email;
                                                                            } ?>
                                    </p>
                                    <p class="card-text">ชื่อผู้ใช้ &nbsp :&nbsp<?php
                                                                                if ($st_username == Null) {
                                                                                    echo "-";
                                                                                } else {
                                                                                    echo $st_username;
                                                                                }
                                                                                ?> </p>
                                    <p class="card-text">Address &nbsp : &nbsp<?php
                                                                                if ($st_address == Null) {
                                                                                    echo "-";
                                                                                } else {
                                                                                    echo $st_address;
                                                                                }

                                                                                ?></p>
                                    <p class="card-text">เบอร์โทรศัพท์ &nbsp :&nbsp <?php
                                                                                    if ($st_tel == Null) {
                                                                                        echo "-";
                                                                                    } else {
                                                                                        echo $st_tel;
                                                                                    }
                                                                                    ?></p>
                                    <p class="card-text">VendGroup &nbsp :&nbsp <?php
                                                                                if ($st_vengroup == Null) {
                                                                                    echo "-";
                                                                                } else {
                                                                                    echo $st_vengroup;
                                                                                }
                                                                                ?></p>
                                    <p class="card-text">TaxGroup &nbsp :&nbsp <?php
                                                                                if ($st_taxg == Null) {
                                                                                    echo "-";
                                                                                } else {
                                                                                    echo $st_taxg;
                                                                                }
                                                                                ?></p>
                                    <p class="card-text">WHT Registration ID &nbsp :&nbsp <?php
                                                                                            if ($st_bpc == Null) {
                                                                                                echo "-";
                                                                                            } else {
                                                                                                echo $st_bpc;
                                                                                            }
                                                                                            ?></p>
                                    <p class="card-text">BranchNo &nbsp : &nbsp<?php
                                                                                if ($st_branchno == Null) {
                                                                                    echo "-";
                                                                                } else {
                                                                                    echo $st_branchno;
                                                                                }
                                                                                ?></p>

                                </div>

                            </div>
                            <Br>
                            <div align="center">
                                <form action="" method="POST">
                                    <button type="submit" name="btn-submit" class="btn btn-danger">เพิ่มร้านค้า</button>
                                </form>


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