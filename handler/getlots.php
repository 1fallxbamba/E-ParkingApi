<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');

// include database connection
include '../config/sqldbconf.php';

$h_number=isset($_GET['hnum']) ? $_GET['hnum'] : die('ERROR: Record ID not found.');

// select all data
 $query = "SELECT * FROM lots WHERE handler = '$h_number' ";
 
$stmt = $con->prepare($query);

$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$json = json_encode($results);

echo $json;
?>