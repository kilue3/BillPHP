<?php
require("Condb.php");
require("Conax.php");


function GetuseradminList()
{
    extract($GLOBALS);
    $stmt = $db_con->prepare("SELECT * FROM users ");
    $stmt->execute();
    //$row=$stmt->fetch(PDO::FETCH_ASSOC);
    $row = $stmt->fetchAll();
    return $row;
}

function Getlistbill()
{
    extract($GLOBALS);
    $stmt = $db_con->prepare("SELECT * FROM opbill  
    LEFT JOIN store 
    ON store.Store_id = opbill.id_store WHERE bill_status ='wait' OR bill_status = 'รออนุมัติ' " );
    $stmt->execute();
    //$row=$stmt->fetch(PDO::FETCH_ASSOC);
    $row = $stmt->fetchAll();
    return $row;
}



function Getuserinfo($id)
{
    extract($GLOBALS);
    $stmt = $db_con->prepare("SELECT * FROM users WHERE username = '".$id."' ");
    $stmt->execute();
    //$row=$stmt->fetch(PDO::FETCH_ASSOC);
    $row = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $row;
}

function Delectuser($ID)
{
    extract($GLOBALS);
    $stmt=$db_con->prepare("DELETE FROM users WHERE username='".$ID."'");
    // $stmt->bindParam(':Names', $id );
    if ($stmt->execute()) {
        echo '<script>
        callAlert()
        </script>';
    } else {
        echo '<script>
    callfail()
    </script>';
    }
    
}


function Getstorelist()
{
    extract($GLOBALS);
    $stmt = $db_con->prepare("SELECT * FROM store");
    $stmt->execute();
    //$row=$stmt->fetch(PDO::FETCH_ASSOC);
    $row = $stmt->fetchAll();
    return $row;
}

function GetstorenameAX($id)
{
    extract($GLOBALS);
    $stmt = $conax->prepare("SELECT AccountNum , Name FROM VendTable WHERE Name like'%" . $id . "%' AND Dataareaid = 'tcn'");
    // $stmt->bindParam(':Names', $id );
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $row;
}
function GetstoreinfoAX($ID)
{
    extract($GLOBALS);
    $stmt = $conax->prepare("SELECT AccountNum , Name,Email,Phone,TaxGroup,VendGroup ,BPC_WHTid,BPC_BranchNo ,Address FROM VendTable WHERE AccountNum = '" . $ID . "' AND Dataareaid = 'tcn'");
    // $stmt->bindParam(':Names', $id );
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $row;
}

function Getstordb($ID)
{
    extract($GLOBALS);
    $stmt = $db_con->prepare("SELECT * FROM store WHERE Store_username = '" . $ID . "'");
    // $stmt->bindParam(':Names', $id );
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $row;
}

function DelectStore($ID)
{
    extract($GLOBALS);
    $stmt=$db_con->prepare("DELETE FROM store WHERE Store_username='".$ID."'");
    // $stmt->bindParam(':Names', $id );
    if ($stmt->execute()) {
        echo '<script>
        callAlert()
        </script>';
    } else {
        echo '<script>
    callfail()
    </script>';
    }
    
}




function addstore($st_name, $st_email, $st_con, $st_tel, $st_username, $st_password, $st_status, $st_taxg, $st_bpc, $st_branchno, $st_vengroup, $st_address)
{

    extract($GLOBALS);
    $stmt = $db_con->prepare("SELECT * FROM store WHERE Store_username=:Store_username");
    $stmt->bindParam(':Store_username', $st_username);
    $stmt->execute();
    //$row=$stmt->fetch(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    if ($count == 0) {
        $stmt2 = $db_con->prepare("INSERT INTO store(`Store_name`, `Store_email`, `Contact_name`, `Tel`, `Store_username`, `Store_password`, `Store_status`, `bill_TaxGroup`, `bill_BPC_WHTid`, `bill_BPC_BranchNo`, `VendGroup`, `Address`)  VALUES(
           :Store_name, :Store_email, :Contact_name, :Tel, :Store_username, :Store_password, :Store_status, :bill_TaxGroup, :bill_BPC_WHTid, :bill_BPC_BranchNo, :VendGroup, :Address)");
        $stmt2->bindParam(':Store_name', $st_name);
        $stmt2->bindParam(':Store_email', $st_email);
        $stmt2->bindParam(':Contact_name', $st_con);
        $stmt2->bindParam(':Tel', $st_tel);
        $stmt2->bindParam(':Store_username', $st_username);
        $stmt2->bindParam(':Store_password', md5($st_password));
        $stmt2->bindParam(':Store_status', $st_status);
        $stmt2->bindParam(':bill_TaxGroup', $st_taxg);
        $stmt2->bindParam(':bill_BPC_WHTid', $st_bpc);
        $stmt2->bindParam(':bill_BPC_BranchNo', $st_branchno);
        $stmt2->bindParam(':VendGroup', $st_vengroup);
        $stmt2->bindParam(':Address', $st_address);

        
        if ($stmt2->execute()) {
            echo '<script>
            callAlert()
            </script>';
        } else {
            echo '<script>
        callfail()
        </script>';
        }
    } else {
        echo '<script>
        callduplicate()
        </script>';
    }
}



function adduser($fn, $user, $status)
{

    extract($GLOBALS);
    $stmt = $db_con->prepare("SELECT * FROM users WHERE username=:username");
    $stmt->bindParam(':username', $user);
    $stmt->execute();
    //$row=$stmt->fetch(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    if ($count == 0) {
        $stmt2 = $db_con->prepare("INSERT INTO users(
            fullname,
            username,
            status
         ) VALUES(
            :fullname,
            :username,
            :status
            )");
        $stmt2->bindParam(':fullname', $fn);
        $stmt2->bindParam(':username', $user);
        $stmt2->bindParam(':status', $status);
        if ($stmt2->execute()) {
            echo '<script>
            callAlert()
            </script>';
        } else {
            echo '<script>
        callfail()
        </script>';
        }
    } else {
        echo '<script>
        callduplicate()
        </script>';
    }
}
