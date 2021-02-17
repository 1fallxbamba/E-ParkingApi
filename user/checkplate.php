<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');


// include database connection
include '../config/sqldbconf.php';

// read current data

try {

	$plate=isset($_GET['plate']) ? $_GET['plate'] : die('ERROR: Record ID not found.');

	$plateup = strtoupper($plate);

	// prepare select query 

	$query = "SELECT * from lots WHERE status = '$plateup'";

	$stmt = $con->prepare($query);

	$stmt->bindParam(1, $id);

	//execute the query 

	$stmt->execute();

	// store retrieved row to a variable

	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

	if ($results) 
	{
		echo json_encode("exists");
	}
	else
	{
		echo json_encode("does not exists");
	}

//$json = json_encode($results);

//echo $json;
}

// show error 

catch(PDOException $exception) {
	die('Error: ' . $exception->getMessage());
}


?>