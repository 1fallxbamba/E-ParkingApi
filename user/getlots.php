<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');

// include database connection
include '../config/sqldbconf.php';

// delete message prompt will be here

// select all data
  $query = "SELECT * FROM lots WHERE status = 'Libre' ";
 
$stmt = $con->prepare($query);

$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$json = json_encode($results);

echo $json;
?>