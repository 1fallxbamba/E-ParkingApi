<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');

// include database connection
include '../config/sqldbconf.php';

$hid=isset($_GET['hid']) ? $_GET['hid'] : die('ERROR: Record ID not found.');

	// prepare select query 

	$query = "SELECT * from handlers WHERE uID = '$hid'";

	$stmt = $con->prepare($query);

	$stmt->bindParam(1, $pid);

	//execute the query 

	$stmt->execute();

	// store retrieved row to a variable

	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$json = json_encode($row);

	echo $json;

?>