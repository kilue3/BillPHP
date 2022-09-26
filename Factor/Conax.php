<?php
	try{

$host = 'SQLSRV';
$dbname = 'TestDB';
$username = 'aponweb';
$password  = 'PhpApReportSystem@2020';
$conax = new PDO( 'sqlsrv:server='.$host.'; Database = '.$dbname.';', $username, $password );
$conax->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch(PDOException $e){
    echo $e->getMessage();
}

