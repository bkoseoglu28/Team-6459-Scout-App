<?php
include 'connection/connection.php';
$robotphoto = $_POST["robotphoto"];
$pteamid = $_POST["pteamid"];
$drivetrain = $_POST["drivetrain"];


$sql = "INSERT INTO `robotphoto` (`robotphoto`,`pteamid`,`drivetrain`) VALUES ('$robotphoto','$pteamid','$drivetrain');";
if($conn->query($sql)){
	header("location:index.php");
}else{
	echo 'An error occurred while saving data';
}

 ?>

