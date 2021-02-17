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


$query = "UPDATE handlers SET uID=:h_id, password=:h_pass WHERE uID = '$handler_id' ";
// prepare query for execution
$stmt = $con->prepare($query);

// @$handler_id = $request->handlerId;

@$handler_password = $request->newPass;

// bind the parameters
$stmt->bindParam(':h_id', $handler_id);
$stmt->bindParam(':h_pass', $handler_password);


// Execute the query
if($stmt->execute()){
echo json_encode(array('result'=>'success'));
}else{
echo json_encode(array('result'=>'fail'));
}
}
// show error
catch(PDOException $exception){
die('ERROR: ' . $exception->getMessage());
}


?>