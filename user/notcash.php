<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');


// include database connection
include '../config/sqldbconf.php';

$pid=isset($_GET['pid']) ? $_GET['pid'] : die('ERROR: Record ID not found.');

$notcash = "PayExpresse";

try{

// update query
	$query = "UPDATE lots SET paymentType = '$notcash' WHERE id = $pid";
	// prepare query for execution
	$stmt = $con->prepare($query);

	// Execute the query
	if($stmt->execute()){

	echo json_encode('cash');

	} else {

	echo json_encode('error');

	}

}
// show error
catch(PDOException $exception){
	die('ERROR: ' . $exception->getMessage());
}


?>