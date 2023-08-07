<?php
include 'connection/connection.php';
$otohighkoni= $_POST["otohighkoni"];
$otomidkoni= $_POST["otomidkoni"];
$otolowkoni= $_POST["otolowkoni"];
$lowkoni= $_POST["lowkoni"];
$highkoni= $_POST["highkoni"];
$midkoni= $_POST["midkoni"];
$otohighkupumsu= $_POST["otohighkupumsu"];
$otomidkupumsu= $_POST["otomidkupumsu"];
$otolowkupumsu= $_POST["otolowkupumsu"];
$lowkupumsu= $_POST["lowkupumsu"];
$highkupumsu= $_POST["highkupumsu"];
$midkupumsu= $_POST["midkupumsu"];
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


if ($chargingstationstatus==1){
	$totalpoint = 2;
}elseif ($chargingstationstatus==2){
	$totalpoint = 6;
}elseif ($chargingstationstatus==3){
	$totalpoint = 10;
}



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



$sql = "INSERT INTO `data` (`req_ip`, `teamid`,`highkoni`, `otohighkoni`, `midkoni`, `otomidkoni`, `lowkoni`, `otolowkoni`, `highkupumsu`, `otohighkupumsu`, `midkupumsu`, `otomidkupumsu`, `lowkupumsu`, `otolowkupumsu`, `chargingstationstatus`, `hangarcheckbox`, `ballcheckbox`, `defanscheckbox`, `imagerawdata`, `matchid`, `notes`, `totalpoint`, `penalties`, `grid`) VALUES ('$ip', '$teamid','$highkoni', '$otohighkoni', '$midkoni', '$otomidkoni', '$lowkoni', '$otolowkoni', '$highkupumsu', '$otohighkupumsu', '$midkupumsu', '$otomidkupumsu', '$lowkupumsu', '$otolowkupumsu', '$chargingstationstatus', '$hangarcheckbox', '$ballcheckbox', '$defanscheckbox', '$imagerawdata', '$matchid', '$notes', '$totalpoint', '$penalties', '$grid');";
if($conn->query($sql)){
	header("location:index.html");
}else{
	echo 'An error occurred while saving data';
}

 ?>