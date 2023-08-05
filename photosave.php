<?php
include 'connection/connection.php';
$robotphoto = $_POST["robotphoto"];
$pteamid = $_POST["pteamid"];


$sql = "INSERT INTO `robotphoto` (`robotphoto`,`pteamid`) VALUES ('$robotphoto','$pteamid');";
if($conn->query($sql)){
	header("location:index.php");
}else{
	echo 'An error occurred while saving data';
}

 ?>

