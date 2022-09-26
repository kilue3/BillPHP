<?php



$db_charset = "utf8";


	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "bill";

	
	
	try{
		$db_con = new PDO("mysql:host={$db_host};charset={$db_charset};dbname={$db_name}",$db_user,$db_pass);
		$db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		// echo "connect";
	
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
