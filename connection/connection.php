<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "appdb2023";


$conn = new mysqli($servername, $username, $password, $dbname, 3306);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");

global $conn;

?>

