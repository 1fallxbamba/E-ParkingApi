<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');


// include database connection
include '../config/sqldbconf.php';

$postdata = file_get_contents("php://input");

try{


	$request = json_decode($postdata);

	@$handler_id = $request->handlerId;
	@$handler_password = $request->passWord;


	$query = "SELECT id FROM handlers WHERE uID = '$handler_id' and password = '$handler_password'";

	$stmt = $con->prepare($query);

	$stmt->execute();

	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	if ($row) {

		echo "okay";

	}

	else {
		echo "not okay";
	}


}
// show error
catch(PDOException $exception){
	die('ERROR: ' . $exception->getMessage());
}


?>