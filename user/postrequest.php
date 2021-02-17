<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');


// include database connection
include '../config/sqldbconf.php';

$postdata = file_get_contents("php://input");

try{

// insert query
$query = "INSERT INTO requests SET lot=:l_name, lotHandler=:l_handler, car=:c_plate, driverPhone=:d_num";
// prepare query for execution
$stmt = $con->prepare($query);
// posted values

$request = json_decode($postdata);

@$handler_id = $request->handlerId;
@$lot_name = $request->pLot;
@$car_plate = $request->plate;
@$driver_number = $request->phone;

$car_plateup = strtoupper($car_plate);

// bind the parameters
$stmt->bindParam(':l_name', $lot_name);
$stmt->bindParam(':l_handler', $handler_id);
$stmt->bindParam(':c_plate', $car_plateup);
$stmt->bindParam(':d_num', $driver_number);

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