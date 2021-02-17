<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');


// include database connection
include '../config/sqldbconf.php';


$stat = "Libre";
$dnum = "";
$ptype = "";


try {

	$plate=isset($_GET['plate']) ? $_GET['plate'] : die('ERROR: Record ID not found.');

	// prepare select query 

	$query = "UPDATE lots SET status = '$stat', driverNumber = '$dnum', paymentType = '$ptype' WHERE status = '$plate'" ;

	$stmt = $con->prepare($query);

 	$stmt->execute();


}

// show error 

catch(PDOException $exception) {
	die('Error: ' . $exception->getMessage());
}


?>