<?php
include 'connection/connection.php';
$autototal= $_POST["autototal"];
$teletotal= $_POST["teletotal"];
$chargingstationstatus = $_POST["chargingstationstatus"];
$hangarcheckbox = $_POST["hangarcheckbox"];
$ballcheckbox = $_POST["ballcheckbox"];
$defanscheckbox = $_POST["defanscheckbox"];
$imagerawdata = $_POST["imagerawdata"];
$teamid = $_POST["teamid"];
$notes = $_POST["notes"];
$matchid = $_POST["matchid"];
$penalties = $_POST["penalties"];
$grid = $_POST["GridStatus"];
$objecttotal = $_POST["objecttotal"];


if ($chargingstationstatus==1){
	$totalpoint = 2;
}elseif ($chargingstationstatus==2){
	$totalpoint = 8;
}elseif ($chargingstationstatus==3){
	$totalpoint = 12;
}
$totalpoint = $totalpoint+$autototal+$teletotal;


function getip(){
	$ip = "";
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
	    $ip = $_SERVER['REMOTE_ADDR'];
	}
return $ip;
}


$ip = getip();



$sql = "INSERT INTO `data` (`req_ip`, `teamid`, `autototal`, `teletotal`, `objecttotal`, `chargingstationstatus`, `hangarcheckbox`, `ballcheckbox`, `defanscheckbox`, `imagerawdata`, `matchid`, `notes`, `totalpoint`, `penalties`, `grid`) VALUES ('$ip', '$teamid', '$autototal', '$teletotal', '$objecttotal', '$chargingstationstatus', '$hangarcheckbox', '$ballcheckbox', '$defanscheckbox', '$imagerawdata', '$matchid', '$notes', '$totalpoint', '$penalties', '$grid');";
if($conn->query($sql)){
	header("location:index.html");
}else{
	echo 'An error occurred while saving data';
}

 ?>