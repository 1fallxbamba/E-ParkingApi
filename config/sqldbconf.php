<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');


// local database

$host = "localhost";
$db_name = "parking";
$username = "root";
$password = ""; 

try {
$con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);

$con2 = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}

// show error
catch(PDOException $exception){
echo "Connection error: " . $exception->getMessage();
}
?>