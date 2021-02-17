<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');


// include database connection
include '../config/sqldbconf.php';

$plate=isset($_GET['plate']) ? $_GET['plate'] : die('ERROR: Record ID not found.');
$lot=isset($_GET['lot']) ? $_GET['lot'] : die('ERROR: Record ID not found.');
$dnum=isset($_GET['dnum']) ? $_GET['dnum'] : die('ERROR: Record ID not found.');

$plateup = strtoupper($plate);

try{

// update query
	$query = "UPDATE lots SET status = '$plateup', driverNumber = '$dnum' WHERE id = $lot";
	// prepare query for execution
	$stmt = $con->prepare($query);

	// Execute the query
	if($stmt->execute()){

	echo json_encode('parked');

	} else {

	echo json_encode('error');

	}

}
// show error
catch(PDOException $exception){
	die('ERROR: ' . $exception->getMessage());
}


?>