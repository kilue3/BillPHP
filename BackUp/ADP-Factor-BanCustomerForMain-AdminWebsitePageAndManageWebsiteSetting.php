<!DOCTYPE html>
<html>
<body>
    <?php
    require("Factor/ConnectDatabase.php");

    $sql = "SELECT * FROM customer where c_email =:c_email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':c_email', $_GET['c_email']);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $sql = "INSERT INTO oldcustomer (c_id,c_Fname,c_Lname,c_Uname,c_email,c_password,c_phone,stat_admin,c_photo,c_coin) 
    VALUES (:c_id,:c_Fname,:c_Lname,:c_Uname,:c_email,:c_password,:c_phone,:stat_admin,:c_photo,:c_coin)";
    $stmt = $conn->prepare($sql);
	$stmt->bindParam(':c_id', $result['c_id']);
    $stmt->bindParam(':c_Fname', $result['c_Fname']);
	$stmt->bindParam(':c_Lname', $result['c_Lname']);
    $stmt->bindParam(':c_Uname', $result['c_Uname']);
    $stmt->bindParam(':c_email', $result['c_email']);
    $stmt->bindParam(':c_password', $result['c_password']);
	$stmt->bindParam(':c_phone', $result['c_phone']);
    $stmt->bindParam(':stat_admin', $result['stat_admin']);
	$stmt->bindParam(':c_photo', $result['c_photo']);
	$stmt->bindParam(':c_coin', $result['c_coin']);
    $stmt->execute();


    $sqls = "DELETE FROM customer WHERE c_email = :c_email";
    $stmt = $conn->prepare($sqls);
    $stmt->bindParam(':c_email', $_GET['c_email']);

    if ($stmt->execute()) :
        $message = 'ระงับงานผู้ใช้สำเร็จ' . $_GET['c_email'];
    else :
        $message = 'เกิดข้อผิดพลาดในการระงับการใช้งาน';
    endif;
    echo "<br>" . $message;

    $conn = null;

    ?>
    <?php

    header('location:ADP-Main-AdminWebsitePageAndManageWebsiteSetting.php');
    ?>
</body>
</html>