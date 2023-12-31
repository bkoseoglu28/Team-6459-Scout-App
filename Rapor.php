<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Team</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="./img/svg/logo.svg" type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href="./css/style.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style type="text/css">
    .swal2-container.swal2-center>.swal2-popup {
 background:black;
 width: 100%;
}


  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<style type="text/css">.swal2-title {
    position: relative;
    max-width: 100%;
    margin: 0;
    padding: 0.8em 1em 0;
    color: white;
    font-size: 1.875em;
    font-weight: 600;
    text-align: center;
    text-transform: none;
    word-wrap: break-word;
}
.grid-object{
  max-width: 10%;
  height: auto;
  background-size: cover;
}


</style>
  <div class="layer"></div>
<main class="page-center">
  <article class="sign-up">
    <h1 class="sign-up__title">Scout Raporu</h1>
    <p class="sign-up__subtitle">Aşağıya Girebilirsiniz</p>
    <form class="sign-up-form form" id="mainform" action="" method="POST">
    <input type="hidden" name="autototal" id="autototal" value="0">
    <input type="hidden" name="teletotal" id="teletotal" value="0">
    <input type="hidden" name="objecttotal" id="objecttotal" value="0">
      <input type="hidden" name="chargingstationstatus" id="chargingstationstatus" value="0">
      <input type="hidden" name="hangarcheckbox" id="hangarcheckbox" value="0">
      <input type="hidden" name="ballcheckbox" id="ballcheckbox" value="0">
      <input type="hidden" name="defanscheckbox" id="defanscheckbox" value="0">
      <input type="hidden" name="GridStatus" id="GridStatus" value="0">
      <input type="hidden" name="imagerawdata" id="imagerawdata" value="">
      <label class="form-label-wrapper">
        <p class="form-label">Takım Numarası ve Maç Numarası</p>
        <input class="form-input" type="number" name="teamid" id="teamid" placeholder="Takım Numarasını Girin" required>
        <input class="form-input" type="text" name="matchid" id="matchid" placeholder="Maç Numarasını Girin" required>
        <input class="form-input" type="number" name="penalties" id="penalties" placeholder="Penaltı Sayısını Girin" required>
      </label>
      <label class="form-label-wrapper">
        <p class="form-label">Notlar</p>
        <input class="form-input" type="text" name="notes" id="notes" placeholder="Aldığınız Notları Girin" required>
      </label>
      <a class="link-info forget-link" onclick="AutoDraw()">Otonomu Çizmek İçin Tıkla</a>
      <p class="form-label">Robot Türü</p><i class="fa-solid fa-ball-pile"></i>
      <label class="form-checkbox-wrapper">
        <input class="form-checkbox" value="top" <?php if($_POST){ if($_POST["ballcheckbox"]==1){echo 'checked';}} ?> onclick="CheckBoxEventBall()" type="checkbox">
        <span class="form-checkbox-label" id="Ball">Obje yerleştirme</span>
        

         <?php if($_POST){ if($_POST["ballcheckbox"]==1){echo '<script type="text/javascript">document.getElementById("ballcheckbox").value = 1;</script>';}} ?>
         <?php if($_POST){ if($_POST["hangarcheckbox"]==1){echo '<script type="text/javascript">document.getElementById("hangarcheckbox").value = 1;</script>';}} ?>
         <?php if($_POST){ if($_POST["defanscheckbox"]==1){echo '<script type="text/javascript">document.getElementById("defanscheckbox").value = 1;</script>';}} ?>


      </label>
      <label class="form-checkbox-wrapper">
        <input class="form-checkbox" onclick="defanscheck()" value="defans" <?php if($_POST){ if($_POST["defanscheckbox"]==1){echo 'checked';}} ?> type="checkbox">
        <span class="form-checkbox-label">Defans</span>
      </label>
      <label class="form-checkbox-wrapper">
        <input class="form-checkbox" value="climb" <?php if($_POST){ if($_POST["hangarcheckbox"]==1){echo 'checked';}} ?> onclick="CheckBoxEventHangar()" type="checkbox">
        <span class="form-checkbox-label">Charging Station</span>
      </label>
      <input type="submit" name="" onclick="SendForm()" class="form-btn primary-default-btn transparent-btn" value="Kaydet">
      <br>
      <input type="button" name="" onclick="history.back()" style="background-color: red" class="form-btn primary-default-btn transparent-btn" value="Geri Dön">
    </form>
  </article>
</main>
<!-- Chart library -->
<script src="./plugins/chart.min.js"></script>
<!-- Icons library -->
<script src="plugins/feather.min.js"></script>
<!-- Custom scripts -->
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
var AutoTotal = 0;
var TeleTotal = 0;
var objecttotal = 0;
var TeleTotalisAlreadySaved = 0;
var AutoTotalisAlreadySaved = 0;
var ObjectTotalisAlreadySaved = 0;
var IsGridAlreadySaved = 0;
var IsStationSaved = 0;
var ChargingStationStatus = 0;
var IsTriggered = 0;
var IsStationTriggered = 0;
var IsDefansTriggerd = 0;
grid = [
    [0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0]
];
var AutoMode = 0;
<?php 

if($_POST){
  echo 'AutoTotal = '. $_POST["autototal"].';
  ';
  echo 'TeleTotal = '. $_POST["teletotal"].';
  ';
  echo 'chargingstationstatus = '. $_POST["chargingstationstatus"].';
  ';
  echo 'AutoTotalisAlreadySaved = 1;
  ';
  echo 'TeleTotalisAlreadySaved = 1;
  ';
  echo 'ObjectTotalisAlreadySaved = 1;
  ';
  echo 'IsStationSaved = '.$_POST["hangarcheckbox"].';
  ';
  echo 'IsStationTriggered = '.$_POST["hangarcheckbox"].';
  ';
  echo 'IsDefansTriggerd = '.$_POST["defanscheckbox"].';
  ';
  echo 'IsTriggered = '.$_POST["ballcheckbox"].';
  ';

  echo 'document.getElementById("notes").value = "'.$_POST["notes"].'";
  ';
  if($_POST["teamid"] == ""){
    echo 'document.getElementById("teamid").value = 0;
    ';
  }else{
    echo 'document.getElementById("teamid").value = '.$_POST["teamid"].';
  ';
  }
  echo 'document.getElementById("matchid").value = "'.$_POST["matchid"].'";
  ';
  echo 'document.getElementById("penalties").value = "'.$_POST["penalties"].'";
  ';
  echo 'document.getElementById("imagerawdata").value = "'.$_POST["imagerawdata"].'";
  ';
}

 ?>
function AutoModeSetter() {
  var button = document.getElementById('AutoModeButton');
  if (button.alt==0){
    AutoMode = 1;
    button.alt = 1;
    button.src = 'img/automode_opened.jpg';
    console.log("AutoMode Opened");
  }else if (button.alt==1){
    AutoMode = 0;
    button.alt = 0;
    button.src = 'img/automode_closed.jpg'; 
    console.log("AutoMode Closed");
  }else{
    console.log("Unexpected AutoMode");
  }
}

function SaveGrid(image) {
var Image = document.getElementById(image);
konumlar = Image.id.match(/([a-zA-Z]+)(\d+)/);
if (AutoMode == 1){
if (Image.alt==0){Image.style.backgroundImage = `url(${Image.src})`;
  Image.src = "img/oto-placed.png";
  Image.alt=2;
  if (konumlar[1]==`High`){
    grid[0][konumlar[2]-1] = 2;
    console.log(`${grid}`);
    AutoTotal = AutoTotal+6
    objecttotal = objecttotal+1
  }
  else if (konumlar[1]==`Mid`){
    grid[1][konumlar[2]-1] = 2;
    console.log(`${grid}`);
    AutoTotal = AutoTotal+4
    objecttotal = objecttotal+1
  }else if (konumlar[1]==`Low`){
    grid[2][konumlar[2]-1] = 2;
    console.log(`${grid}`);
    AutoTotal = AutoTotal+3
    objecttotal = objecttotal+1
  }else{
    console.log(`Unexpected Position column:${konumlar[1]} row:${konumlar[2]}`);
  }
}else{
    console.log("Already Configured")
}
}else{
  if (Image.alt==0){Image.style.backgroundImage = `url(${Image.src})`;
  Image.src = "img/placed.png";
  Image.alt=1;
  if (konumlar[1]==`High`){
    grid[0][konumlar[2]-1] = 1;
    console.log(`${grid}`);
    TeleTotal=TeleTotal+5
    objecttotal = objecttotal+1
  }
  else if (konumlar[1]==`Mid`){
    grid[1][konumlar[2]-1] = 1;
    console.log(`${grid}`);
    TeleTotal=TeleTotal+3
    objecttotal = objecttotal+1
  }else if (konumlar[1]==`Low`){
    grid[2][konumlar[2]-1] = 1;
    console.log(`${grid}`);
    TeleTotal=TeleTotal+2
    objecttotal = objecttotal+1
  }else{
    console.log(`Unexpected Position column:${konumlar[1]} row:${konumlar[2]}`);
  }
}else{
    console.log("Already Configured")
}
}
}

function GridCountUI(){
  if (IsGridAlreadySaved == 1) {
    console.log("Its already saved");
    console.log(grid);
    Swal.fire(
  'Aktif Şebeke <i class="fa-solid fa-tennis-ball"></i>',
  `<div id="grid-col-1"><img id="High1" class="grid-object" src="img/frc2023cone.jpg" alt="0" onclick="SaveGrid('High1');"><img id="High2" class="grid-object" src="img/frc2023cube.jpg" alt="0" onclick="SaveGrid('High2');"><img id="High3" class="grid-object" src="img/frc2023cone.jpg" alt="0" onclick="SaveGrid('High3');"><img id="High4" class="grid-object" src="img/frc2023cone.jpg" alt="0" onclick="SaveGrid('High4');"><img id="High5" class="grid-object" src="img/frc2023cube.jpg" alt="0" onclick="SaveGrid('High5');"><img id="High6" class="grid-object" src="img/frc2023cone.jpg" alt="0" onclick="SaveGrid('High6');"><img id="High7" class="grid-object" src="img/frc2023cone.jpg" alt="0" onclick="SaveGrid('High7');"><img id="High8" class="grid-object" src="img/frc2023cube.jpg" alt="0" onclick="SaveGrid('High8');"><img id="High9" class="grid-object" src="img/frc2023cone.jpg" alt="0" onclick="SaveGrid('High9');"></div><div id="grid-col-2">  <img id="Mid1" class="grid-object" src="img/frc2023cone.jpg" alt="0" onclick="SaveGrid('Mid1');"> <img id="Mid2" class="grid-object" src="img/frc2023cube.jpg" alt="0" onclick="SaveGrid('Mid2');"><img id="Mid3" class="grid-object" src="img/frc2023cone.jpg" alt="0" onclick="SaveGrid('Mid3');"><img id="Mid4" class="grid-object" src="img/frc2023cone.jpg" alt="0" onclick="SaveGrid('Mid4');"><img id="Mid5" class="grid-object" src="img/frc2023cube.jpg" alt="0" onclick="SaveGrid('Mid5');"><img id="Mid6" class="grid-object" src="img/frc2023cone.jpg" alt="0" onclick="SaveGrid('Mid6');"><img id="Mid7" class="grid-object" src="img/frc2023cone.jpg" alt="0" onclick="SaveGrid('Mid7');"><img id="Mid8" class="grid-object" src="img/frc2023cube.jpg" alt="0" onclick="SaveGrid('Mid8');"><img id="Mid9" class="grid-object" src="img/frc2023cone.jpg" alt="0" onclick="SaveGrid('Mid9');"></div><div id="grid-col-3"><img id="Low1" class="grid-object" src="img/anythinglogo.jpg" alt="0" onclick="SaveGrid('Low1');"><img id="Low2" class="grid-object" src="img/anythinglogo.jpg" alt="0" onclick="SaveGrid('Low2');"><img id="Low3" class="grid-object" src="img/anythinglogo.jpg" alt="0" onclick="SaveGrid('Low3');"><img id="Low4" class="grid-object" src="img/anythinglogo.jpg" alt="0" onclick="SaveGrid('Low4');"><img id="Low5" class="grid-object" src="img/anythinglogo.jpg" alt="0" onclick="SaveGrid('Low5');"><img id="Low6" class="grid-object" src="img/anythinglogo.jpg" alt="0" onclick="SaveGrid('Low6');"><img id="Low7" class="grid-object" src="img/anythinglogo.jpg" alt="0" onclick="SaveGrid('Low7');"><img id="Low8" class="grid-object" src="img/anythinglogo.jpg" alt="0" onclick="SaveGrid('Low8');"><img id="Low9" class="grid-object" src="img/anythinglogo.jpg" alt="0" onclick="SaveGrid('Low9');"></div><img id="AutoModeButton" style="width: 80px;height: auto;border-radius: 20px;" src="img/automode_closed.jpg" alt="0" onclick="AutoModeSetter();">`,
  'info'
)
  }else{
    Swal.fire(
  'Aktif Şebeke <i class="fa-solid fa-tennis-ball"></i>',
  `<div id="grid-col-1"><img id="High1" class="grid-object" src="img/frc2023cone.jpg" alt="0" onclick="SaveGrid('High1');"><img id="High2" class="grid-object" src="img/frc2023cube.jpg" alt="0" onclick="SaveGrid('High2');"><img id="High3" class="grid-object" src="img/frc2023cone.jpg" alt="0" onclick="SaveGrid('High3');"><img id="High4" class="grid-object" src="img/frc2023cone.jpg" alt="0" onclick="SaveGrid('High4');"><img id="High5" class="grid-object" src="img/frc2023cube.jpg" alt="0" onclick="SaveGrid('High5');"><img id="High6" class="grid-object" src="img/frc2023cone.jpg" alt="0" onclick="SaveGrid('High6');"><img id="High7" class="grid-object" src="img/frc2023cone.jpg" alt="0" onclick="SaveGrid('High7');"><img id="High8" class="grid-object" src="img/frc2023cube.jpg" alt="0" onclick="SaveGrid('High8');"><img id="High9" class="grid-object" src="img/frc2023cone.jpg" alt="0" onclick="SaveGrid('High9');"></div><div id="grid-col-2">  <img id="Mid1" class="grid-object" src="img/frc2023cone.jpg" alt="0" onclick="SaveGrid('Mid1');"> <img id="Mid2" class="grid-object" src="img/frc2023cube.jpg" alt="0" onclick="SaveGrid('Mid2');"><img id="Mid3" class="grid-object" src="img/frc2023cone.jpg" alt="0" onclick="SaveGrid('Mid3');"><img id="Mid4" class="grid-object" src="img/frc2023cone.jpg" alt="0" onclick="SaveGrid('Mid4');"><img id="Mid5" class="grid-object" src="img/frc2023cube.jpg" alt="0" onclick="SaveGrid('Mid5');"><img id="Mid6" class="grid-object" src="img/frc2023cone.jpg" alt="0" onclick="SaveGrid('Mid6');"><img id="Mid7" class="grid-object" src="img/frc2023cone.jpg" alt="0" onclick="SaveGrid('Mid7');"><img id="Mid8" class="grid-object" src="img/frc2023cube.jpg" alt="0" onclick="SaveGrid('Mid8');"><img id="Mid9" class="grid-object" src="img/frc2023cone.jpg" alt="0" onclick="SaveGrid('Mid9');"></div><div id="grid-col-3"><img id="Low1" class="grid-object" src="img/anythinglogo.jpg" alt="0" onclick="SaveGrid('Low1');"><img id="Low2" class="grid-object" src="img/anythinglogo.jpg" alt="0" onclick="SaveGrid('Low2');"><img id="Low3" class="grid-object" src="img/anythinglogo.jpg" alt="0" onclick="SaveGrid('Low3');"><img id="Low4" class="grid-object" src="img/anythinglogo.jpg" alt="0" onclick="SaveGrid('Low4');"><img id="Low5" class="grid-object" src="img/anythinglogo.jpg" alt="0" onclick="SaveGrid('Low5');"><img id="Low6" class="grid-object" src="img/anythinglogo.jpg" alt="0" onclick="SaveGrid('Low6');"><img id="Low7" class="grid-object" src="img/anythinglogo.jpg" alt="0" onclick="SaveGrid('Low7');"><img id="Low8" class="grid-object" src="img/anythinglogo.jpg" alt="0" onclick="SaveGrid('Low8');"><img id="Low9" class="grid-object" src="img/anythinglogo.jpg" alt="0" onclick="SaveGrid('Low9');"></div><img id="AutoModeButton" style="width: 80px;height: auto;border-radius: 20px;" src="img/automode_closed.jpg" alt="0" onclick="AutoModeSetter();">`,
  'info'

)
  }
}

function CheckBoxEventBall(){
 if(IsTriggered == 0){
  document.getElementById("ballcheckbox").value = 1;
  GridCountUI();
  IsTriggered = 1;
 }else{
  document.getElementById("ballcheckbox").value = 0;
  IsTriggered = 0;
 }
}


function CheckBoxEventHangar(){
if(IsStationTriggered == 0){
document.getElementById("hangarcheckbox").value = 1;
ChargingStationUI();
  IsStationTriggered = 1;
 }else{
  document.getElementById("hangarcheckbox").value = 0;
  IsStationTriggered = 0;
 }

}

function defanscheck(){
if(IsDefansTriggerd ==0){
  IsDefansTriggerd = 1;
  document.getElementById("defanscheckbox").value = 1;
}else{
  IsDefansTriggerd = 0;
  document.getElementById("defanscheckbox").value = 0;
}
}


function ChargingStationUI(){
var nullstring = "";
var localHtype = "";
if (IsStationSaved == 1) {
    console.log("Its already saved");
    if(ChargingStationStatus==0){
      localHtype = "Çıkmadı";
    }
    if(ChargingStationStatus==1){
      localHtype = "Taxi";
    }
    if(ChargingStationStatus==2){
      localHtype = "Çıktı fakat dengesiz";
    }
    if(ChargingStationStatus==3){
      localHtype = "Çıktı Ve Dengeli";
    }
    Swal.fire(
      nullstring.concat('Tırmanma (', localHtype, ')'),
      '<button onclick="SaveStation(0)" class="form-btn primary-default-btn transparent-btn">Çıkmadı</button><br><button onclick="SaveStation(1 )" class="form-btn primary-default-btn transparent-btn">Taxi</button><br><button onclick="SaveStation(2)" class="form-btn primary-default-btn transparent-btn">Çıktı fakat dengesiz</button><br><button onclick="SaveStation(3)" class="form-btn primary-default-btn transparent-btn">Çıktı Ve Dengeli</button>',
  'info',
)
console.log(ChargingStationStatus)
  }else{
    Swal.fire(
  'Tırmanma',
  '<button onclick="SaveStation(0)" class="form-btn primary-default-btn transparent-btn">Çıkmadı</button><br><button onclick="SaveStation(1)" class="form-btn primary-default-btn transparent-btn">Taxi</button><br><button onclick="SaveStation(2)" class="form-btn primary-default-btn transparent-btn">Çıktı fakat dengesiz</button><br><button onclick="SaveStation(3)" class="form-btn primary-default-btn transparent-btn">Çıktı Ve Dengeli</button>',
  'info',
)
  }
}


function SaveStation(givenStationStatus){
  IsStationSaved = 1;
  ChargingStationStatus = givenStationStatus;
  document.getElementById('successalertlabel').innerHTML = 'Başarıyla kaydedildi';
}



function AutoDraw(){
  document.getElementById("autototal").value = AutoTotal;
  document.getElementById("teletotal").value = TeleTotal;
  document.getElementById("objecttotal").value = objecttotal;
  document.getElementById("chargingstationstatus").value = ChargingStationStatus;
  document.getElementById("GridStatus").value = grid;
  document.getElementById("mainform").action = "form.php";
  document.getElementById("mainform").submit();
}


function SendForm(){
  document.getElementById("autototal").value = AutoTotal;
  document.getElementById("teletotal").value = TeleTotal;
  document.getElementById("objecttotal").value = objecttotal;
  document.getElementById("chargingstationstatus").value = ChargingStationStatus;
  document.getElementById("GridStatus").value = grid;
  document.getElementById("mainform").action = "save.php";
  document.getElementById("mainform").submit();
}

</script>
</body>

</html>