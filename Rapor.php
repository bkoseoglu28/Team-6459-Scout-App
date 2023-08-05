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



</style>
  <div class="layer"></div>
<main class="page-center">
  <article class="sign-up">
    <h1 class="sign-up__title">Scout Raporu</h1>
    <p class="sign-up__subtitle">Aşağıya Girebilirsiniz</p>
    <form class="sign-up-form form" id="mainform" action="" method="POST">
    <input type="hidden" name="otohighkoni" id="otohighkoni" value="0">
    <input type="hidden" name="otomidkoni" id="otomidkoni" value="0">
      <input type="hidden" name="otolowkoni" id="otolowkoni" value="0">
      <input type="hidden" name="lowkoni" id="lowkoni" value="0">
      <input type="hidden" name="highkoni" id="highkoni" value="0">
      <input type="hidden" name="midkoni" id="midkoni" value="0">
      <input type="hidden" name="otohighkupumsu" id="otohighkupumsu" value="0">
      <input type="hidden" name="otomidkupumsu" id="otomidkupumsu" value="0">
      <input type="hidden" name="otolowkupumsu" id="otolowkupumsu" value="0">
      <input type="hidden" name="lowkupumsu" id="lowkupumsu" value="0">
      <input type="hidden" name="highkupumsu" id="highkupumsu" value="0">
      <input type="hidden" name="midkupumsu" id="midkupumsu" value="0">
      <input type="hidden" name="chargingstationstatus" id="chargingstationstatus" value="0">
      <input type="hidden" name="hangarcheckbox" id="hangarcheckbox" value="0">
      <input type="hidden" name="ballcheckbox" id="ballcheckbox" value="0">
      <input type="hidden" name="defanscheckbox" id="defanscheckbox" value="0">
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
         <?php if($_POST){ if($_POST["otostationcheckbox"]==1){echo '<script type="text/javascript">document.getElementById("otostationcheckbox").value = 1;</script>';}} ?>


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
var highkoni = 0;
var highkupumsu = 0;
var midkoni = 0;
var midkupumsu = 0;
var lowkoni = 0;
var lowkupumsu = 0;
var otohighkupumsu = 0;
var otohighkoni = 0;
var otomidkupumsu = 0;
var otomidkoni = 0;
var otolowkupumsu = 0;
var otolowkoni = 0;
var IshighkoniAlreadySaved = 0;
var IshighkupumsuAlreadySaved = 0;
var IsmidkoniAlreadySaved = 0;
var IsmidkupumsuAlreadySaved = 0;
var IslowkoniAlreadySaved = 0;
var IsotohighkoniAlreadySaved = 0;
var IsotomidkoniAlreadySaved = 0;
var IsotolowkoniAlreadySaved = 0;
var IslowkupumsuAlreadySaved = 0;
var IsotohighkupumsuAlreadySaved = 0;
var IsotomidkupumsuAlreadySaved = 0;
var IsotolowkupumsuAlreadySaved = 0;

var IsStationSaved = 0;
var IsotoStationSaved = 0;
var ChargingStationStatus = 0;
var IsTriggered = 0;
var IsStationTriggered = 0;
var IsotoStationTriggered = 0;
var IsDefansTriggerd = 0;

<?php 

if($_POST){
  echo 'otohighkoni = '. $_POST["otohighkoni"].';
  ';
  echo 'otomidkoni = '. $_POST["otomidkoni"].';
  ';
  echo 'otolowkoni = '. $_POST["otolowkoni"].';
  ';
  echo 'lowkoni = '. $_POST["lowkoni"].';
  ';
  echo 'highkoni = '. $_POST["highkoni"].';
  ';
  echo 'midkoni = '. $_POST["midkoni"].';
  ';
  echo 'otohighkupumsu = '. $_POST["otohighkupumsu"].';
  ';
  echo 'otomidkupumsu = '. $_POST["otomidkupumsu"].';
  ';
  echo 'otolowkupumsu = '. $_POST["otolowkupumsu"].';
  ';
  echo 'lowkupumsu = '. $_POST["lowkupumsu"].';
  ';
  echo 'highkupumsu = '. $_POST["highkupumsu"].';
  ';
  echo 'midkupumsu = '. $_POST["midkupumsu"].';
  ';
  echo 'chargingstationstatus = '. $_POST["chargingstationstatus"].';
  ';
  

  echo 'IotohighkonisAlreadySaved = 1;
  ';
  echo 'IotomidkonisAlreadySaved = 1;
  ';
  echo 'IotolowkonisAlreadySaved = 1;
  ';
  echo 'IlowkonisAlreadySaved = 1;
  ';
  echo 'IhighkonisAlreadySaved = 1;
  ';
  echo 'ImidkonisAlreadySaved = 1;
  ';
  echo 'IotohighkupumsusAlreadySaved = 1;
  ';
  echo 'IotomidkupumsusAlreadySaved = 1;
  ';
  echo 'IotolowkupumsusAlreadySaved = 1;
  ';
  echo 'IlowkupumsusAlreadySaved = 1;
  ';
  echo 'IhighkupumsusAlreadySaved = 1;
  ';
  echo 'ImidkupumsusAlreadySaved = 1;
  ';
  echo 'IotohighkonisAlreadySaved = 1;
  ';
  echo 'IotomidkonisAlreadySaved = 1;
  ';
  echo 'IotolowkonisAlreadySaved = 1;
  ';
  echo 'IotolowkonisAlreadySaved = 1;
  ';
  echo 'IotohighkonisAlreadySaved = 1;
  ';
  echo 'IotomidkonisAlreadySaved = 1;
  ';
  echo 'IotohighkupumsusAlreadySaved = 1;
  ';
  echo 'IotomidkupumsusAlreadySaved = 1;
  ';
  echo 'IotolowkupumsusAlreadySaved = 1;
  ';
  echo 'IotolowkupumsusAlreadySaved = 1;
  ';
  echo 'IotohighkupumsusAlreadySaved = 1;
  ';
  echo 'IotomidkupumsusAlreadySaved = 1;
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



function highkoniCountUI(){
  if (IshighkoniAlreadySaved == 1) {
    console.log("Its already saved");
    console.log(highkoni);
    Swal.fire(
  'En üste yerleştirilen Koni (HIGH Koni) <i class="fa-solid fa-tennis-ball"></i>',
  '<input class="form-input" type="number" onchange="SaveAsVariable()" placeholder="En üste yerleştirilen Koni sayısı (HIGH Koni)" value="0" required id="highkonicount"><br><button onclick="highkoniAdd()" class="form-btn primary-default-btn transparent-btn">+</button><br><button onclick="highkoniReduce()" class="form-btn primary-default-btn transparent-btn">-</button><br><button onclick="highkupumsuCountUI()" class="form-btn primary-default-btn transparent-btn">High Küpümsü</button><br><button onclick="midkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Mid</button><br><button onclick="lowkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Low</button><br><button onclick="otohighkoniCountUI()" class="form-btn primary-default-btn transparent-btn">High Koni Otonom</button>',
  'info',
)
document.getElementById("highkonicount").value = highkoni;
  }else{
    Swal.fire(
  'En üste yerleştirilen Koni (HIGH Koni) <i class="fa-solid fa-tennis-ball"></i>',
  '<input class="form-input" type="number" onchange="SaveAsVariable()" placeholder="En üste yerleştirilen Koni sayısı (HIGH Koni)" value="0" required id="highkonicount"><br><button onclick="highkoniAdd()" class="form-btn primary-default-btn transparent-btn">+</button><br><button onclick="highkoniReduce()" class="form-btn primary-default-btn transparent-btn">-</button><br><button onclick="highkupumsuCountUI()" class="form-btn primary-default-btn transparent-btn">High Küpümsü</button><br><button onclick="midkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Mid</button><br><button onclick="lowkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Low</button><br><button onclick="otohighkoniCountUI()" class="form-btn primary-default-btn transparent-btn">High Koni Otonom</button>',
  'info',

)
  }
  
}
function highkupumsuCountUI(){
  if (IshighkupumsuAlreadySaved == 1) {
    console.log("Its already saved");
    console.log(highkupumsu);
    Swal.fire(
  'En üste yerleştirilen Küpümsü (HIGH Küpümsü) <i class="fa-solid fa-tennis-ball"></i>',
  '<input class="form-input" type="number" onchange="SaveAsVariable()" placeholder="En üste yerleştirilen Küpümsü sayısı (HIGH Küpümsü)" value="0" required id="highkupumsucount"><br><button onclick="highkupumsuAdd()" class="form-btn primary-default-btn transparent-btn">+</button><br><button onclick="highkupumsuReduce()" class="form-btn primary-default-btn transparent-btn">-</button><br><button onclick="highkoniCountUI()" class="form-btn primary-default-btn transparent-btn">High Koni</button><br><button onclick="midkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Mid</button><br><button onclick="ChangeUIAsLow()" class="form-btn primary-default-btn transparent-btn">Low</button><br><button onclick="otohighkoniCountUI()" class="form-btn primary-default-btn transparent-btn">High Küpümsü Otonom</button>',
  'info',
)
document.getElementById("highkupumsucount").value = highkupumsu;
  }else{
    Swal.fire(
  'En üste yerleştirilen Küpümsü (HIGH Küpümsü) <i class="fa-solid fa-tennis-ball"></i>',
  '<input class="form-input" type="number" onchange="SaveAsVariable()" placeholder="En üste yerleştirilen Küpümsü sayısı (HIGH Küpümsü)" value="0" required id="highkupumsucount"><br><button onclick="highkupumsuAdd()" class="form-btn primary-default-btn transparent-btn">+</button><br><button onclick="highkupumsuReduce()" class="form-btn primary-default-btn transparent-btn">-</button><br><button onclick="highkoniCountUI()" class="form-btn primary-default-btn transparent-btn">High Koni</button><br><button onclick="midkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Mid</button><br><button onclick="ChangeUIAsLow()" class="form-btn primary-default-btn transparent-btn">Low</button><br><button onclick="otohighkupumsuCountUI()" class="form-btn primary-default-btn transparent-btn">High Küpümsü Otonom</button>',
  'info',

)
  }
  
}
function midkoniCountUI(){
  if (IsmidkoniAlreadySaved == 1) {
    console.log("Its already saved");
    console.log(midkoni);
    Swal.fire(
  'En üste yerleştirilen Koni (Mid Koni) <i class="fa-solid fa-tennis-ball"></i>',
  '<input class="form-input" type="number" onchange="SaveAsVariable()" placeholder="Orta kisma yerleştirilen Koni sayısı (Mid Koni)" value="0" required id="midkonicount"><br><button onclick="midkoniAdd()" class="form-btn primary-default-btn transparent-btn">+</button><br><button onclick="midkoniReduce()" class="form-btn primary-default-btn transparent-btn">-</button><br><button onclick="midkupumsuCountUI()" class="form-btn primary-default-btn transparent-btn">Mid Küpümsü</button><br><button onclick="highkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Mid</button><br><button onclick="lowkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Low</button><br><button onclick="otomidkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Mid Otonom</button>',
  'info',
)
document.getElementById("midkonicount").value = midkoni;
  }else{
    Swal.fire(
  'En üste yerleştirilen Koni (Mid Koni) <i class="fa-solid fa-tennis-ball"></i>',
  '<input class="form-input" type="number" onchange="SaveAsVariable()" placeholder="En üste yerleştirilen Koni sayısı (Mid Koni)" value="0" required id="midkonicount"><br><button onclick="midkoniAdd()" class="form-btn primary-default-btn transparent-btn">+</button><br><button onclick="midkoniReduce()" class="form-btn primary-default-btn transparent-btn">-</button><br><button onclick="midkupumsuCountUI()" class="form-btn primary-default-btn transparent-btn">Mid Küpümsü</button><br><button onclick="highkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Mid</button><br><button onclick="lowkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Low</button><br><button onclick="otomidkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Mid Otonom</button>',
  'info',

)
  }
  
}
function midkupumsuCountUI(){
  if (IsmidkupumsuAlreadySaved == 1) {
    console.log("Its already saved");
    console.log(midkupumsu);
    Swal.fire(
  'En üste yerleştirilen Küpümsü (MID Küpümsü) <i class="fa-solid fa-tennis-ball"></i>',
  '<input class="form-input" type="number" onchange="SaveAsVariable()" placeholder="En üste yerleştirilen Küpümsü sayısı (MID Küpümsü)" value="0" required id="midkupumsucount"><br><button onclick="midkupumsuAdd()" class="form-btn primary-default-btn transparent-btn">+</button><br><button onclick="midkupumsuReduce()" class="form-btn primary-default-btn transparent-btn">-</button><br><button onclick="midkoniCountUI()" class="form-btn primary-default-btn transparent-btn">MID Koni</button><br><button onclick="highkoniCountUI()" class="form-btn primary-default-btn transparent-btn">High</button><br><button onclick="lowkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Low</button><br><button onclick="otomidkupumsuCountUI()" class="form-btn primary-default-btn transparent-btn">Mid Küpümsü Otonom</button>',
  'info',
)
document.getElementById("midkupumsucount").value = midkupumsu;
  }else{
    Swal.fire(
  'En üste yerleştirilen Küpümsü (MID Küpümsü) <i class="fa-solid fa-tennis-ball"></i>',
  '<input class="form-input" type="number" onchange="SaveAsVariable()" placeholder="En üste yerleştirilen Küpümsü sayısı (MID Küpümsü)" value="0" required id="midkupumsucount"><br><button onclick="midkupumsuAdd()" class="form-btn primary-default-btn transparent-btn">+</button><br><button onclick="midkupumsuReduce()" class="form-btn primary-default-btn transparent-btn">-</button><br><button onclick="midkoniCountUI()" class="form-btn primary-default-btn transparent-btn">MID Koni</button><br><button onclick="highkoniCountUI()" class="form-btn primary-default-btn transparent-btn">High</button><br><button onclick="lowkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Low</button><br><button onclick="otomidkupumsuCountUI()" class="form-btn primary-default-btn transparent-btn">Mid Küpümsü Otonom</button>',
  'info',

)
  }
  
}
function otohighkoniCountUI(){
if (IsotohighkoniAlreadySaved == 1) {
console.log("Its already saved");
console.log(otohighkoni);
Swal.fire(
'OTONOM Periodunda otohigh konumuna yerleştirilen koniler (otohigh koni) <i class="fa-solid fa-tennis-ball"></i>',
'<input class="form-input" type="number" onchange="SaveAsVariable()" placeholder="Otonom periodunda En üst satıra yerleştirilen Koni sayısı (OTO HIGH Koni)" value="0" required id="otohighkonicount"><br><button onclick="otohighkoniAdd()" class="form-btn primary-default-btn transparent-btn">+</button><br><button onclick="otohighkoniReduce()" class="form-btn primary-default-btn transparent-btn">-</button><br><button onclick="otohighkupumsuCountUI()" class="form-btn primary-default-btn transparent-btn">High Küpümsü</button><br><button onclick="otomidkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Mid</button><br><button onclick="otolowkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Otonom Low</button><br><button onclick="highkoniUI()" class="form-btn primary-default-btn transparent-btn">High koni Teleop</button>',
'info',
)
document.getElementById("otohighkonicount").value = otohighkoni;
}else{
Swal.fire(
'OTONOM Periodunda otohigh konumuna yerleştirilen koniler (otohigh koni) <i class="fa-solid fa-tennis-ball"></i>',
'<input class="form-input" type="number" onchange="SaveAsVariable()" placeholder="Otonom periodunda En üst satıra yerleştirilen Koni sayısı (OTO HIGH Koni)" value="0" required id="otohighkonicount"><br><button onclick="otohighkoniAdd()" class="form-btn primary-default-btn transparent-btn">+</button><br><button onclick="otohighkoniReduce()" class="form-btn primary-default-btn transparent-btn">-</button><br><button onclick="otohighkupumsuCountUI()" class="form-btn primary-default-btn transparent-btn">High Küpümsü</button><br><button onclick="otomidkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Mid</button><br><button onclick="otolowkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Otonom Low</button><br><button onclick="highkoniUI()" class="form-btn primary-default-btn transparent-btn">High koni Teleop</button>',
'info',
)
}
}
function otomidkoniCountUI(){
if (IsotomidkoniAlreadySaved == 1) {
console.log("Its already saved");
console.log(otomidkoni);
Swal.fire(
'OTONOM Periodunda otomid konumuna yerleştirilen koniler (otomid koni) <i class="fa-solid fa-tennis-ball"></i>',
'<input class="form-input" type="number" onchange="SaveAsVariable()" placeholder="Otonom periodunda orta satıra yerleştirilen Küpümsü sayısı (OTO MID Küpümsü)" value="0" required id="otomidkonicount"><br><button onclick="otomidkoniAdd()" class="form-btn primary-default-btn transparent-btn">+</button><br><button onclick="otomidkoniReduce()" class="form-btn primary-default-btn transparent-btn">-</button><br><button onclick="otomidkupumsuCountUI()" class="form-btn primary-default-btn transparent-btn"> Otonom MID Kupumsu</button><br><button onclick="otohighkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Otonom High</button><br><button onclick="otolowkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Otonom Low</button><br><button onclick="midkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Mid koni Teleop</button>',
'info',
)
document.getElementById("otomidkonicount").value = otomidkoni;
}else{
Swal.fire(
'OTONOM Periodunda otomid konumuna yerleştirilen koniler (otomid koni) <i class="fa-solid fa-tennis-ball"></i>',
'<input class="form-input" type="number" onchange="SaveAsVariable()" placeholder="Otonom periodunda orta satıra yerleştirilen Küpümsü sayısı (OTO MID Küpümsü)" value="0" required id="otomidkonicount"><br><button onclick="otomidkoniAdd()" class="form-btn primary-default-btn transparent-btn">+</button><br><button onclick="otomidkoniReduce()" class="form-btn primary-default-btn transparent-btn">-</button><br><button onclick="otomidkupumsuCountUI()" class="form-btn primary-default-btn transparent-btn"> Otonom MID Kupumsu</button><br><button onclick="otohighkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Otonom High</button><br><button onclick="otolowkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Otonom Low</button><br><button onclick="midkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Mid koni Teleop</button>',
'info',
)
}
}
function otolowkoniCountUI(){
if (IsotolowkoniAlreadySaved == 1) {
console.log("Its already saved");
console.log(otolowkoni);
Swal.fire(
'OTONOM Periodunda otolow konumuna yerleştirilen koniler (otolow koni) <i class="fa-solid fa-tennis-ball"></i>',
'<input class="form-input" type="number" onchange="SaveAsVariable()" placeholder="Otonom periodunda En alta yerleştirilen Koni sayısı (OTO LOW Koni)" value="0" required id="otolowkonicount"><br><button onclick="otolowkoniAdd()" class="form-btn primary-default-btn transparent-btn">+</button><br><button onclick="otolowkoniReduce()" class="form-btn primary-default-btn transparent-btn">-</button><br><button onclick="otolowkupumsuCountUI()" class="form-btn primary-default-btn transparent-btn">Otonom Low Küpümsü</button><br><button onclick="otohighkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Otonom High</button><br><button onclick="otomidkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Otonom Mid</button><br><button onclick="lowkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Low koni Teleop</button>',
'info',
)
document.getElementById("otolowkonicount").value = otolowkoni;
}else{
Swal.fire(
'OTONOM Periodunda otolow konumuna yerleştirilen koniler (otolow koni) <i class="fa-solid fa-tennis-ball"></i>',
'<input class="form-input" type="number" onchange="SaveAsVariable()" placeholder="Otonom periodunda En alta yerleştirilen Koni sayısı (OTO LOW Koni)" value="0" required id="otolowkonicount"><br><button onclick="otolowkoniAdd()" class="form-btn primary-default-btn transparent-btn">+</button><br><button onclick="otolowkoniReduce()" class="form-btn primary-default-btn transparent-btn">-</button><br><button onclick="otolowkupumsuCountUI()" class="form-btn primary-default-btn transparent-btn">Otonom Low Küpümsü</button><br><button onclick="otohighkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Otonom High</button><br><button onclick="otomidkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Otonom Mid</button><br><button onclick="lowkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Low koni Teleop</button>',
'info',
)
}
}
function lowkoniCountUI(){
if (IslowkoniAlreadySaved == 1) {
console.log("Its already saved");
console.log(lowkoni);
Swal.fire(
'low konumuna yerleştirilen koniler (low koni) <i class="fa-solid fa-tennis-ball"></i>',
'<input class="form-input" type="number" onchange="SaveAsVariable()" placeholder="En alta yerleştirilen Koni sayısı (Low Koni)" value="0" required id="lowkonicount"><br><button onclick="lowkoniAdd()" class="form-btn primary-default-btn transparent-btn">+</button><br><button onclick="lowkoniReduce()" class="form-btn primary-default-btn transparent-btn">-</button><br><button onclick="lowkupumsuCountUI()" class="form-btn primary-default-btn transparent-btn">low Kupumsu</button><br><button onclick="highkoniCountUI()" class="form-btn primary-default-btn transparent-btn">High</button><br><button onclick="midkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Mid</button><br><button onclick="otolowkupumsuCountUI()" class="form-btn primary-default-btn transparent-btn">Low koni Otonom</button>',
'info',
)
document.getElementById("lowkonicount").value = lowkoni;
}else{
Swal.fire(
'low konumuna yerleştirilen koniler (low koni) <i class="fa-solid fa-tennis-ball"></i>',
'<input class="form-input" type="number" onchange="SaveAsVariable()" placeholder="En alta yerleştirilen Koni sayısı (Low Koni)" value="0" required id="lowkonicount"><br><button onclick="lowkoniAdd()" class="form-btn primary-default-btn transparent-btn">+</button><br><button onclick="lowkoniReduce()" class="form-btn primary-default-btn transparent-btn">-</button><br><button onclick="lowkupumsuCountUI()" class="form-btn primary-default-btn transparent-btn">low Kupumsu</button><br><button onclick="highkoniCountUI()" class="form-btn primary-default-btn transparent-btn">High</button><br><button onclick="midkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Mid</button><br><button onclick="otolowkupumsuCountUI()" class="form-btn primary-default-btn transparent-btn">Low koni Otonom</button>',
'info',
)
}
}
function otohighkupumsuCountUI(){
if (IsotohighkupumsuAlreadySaved == 1) {
console.log("Its already saved");
console.log(otohighkupumsu);
Swal.fire(
'OTONOM Periodunda otohigh konumuna yerleştirilen kupumsuler (otohigh kupumsu) <i class="fa-solid fa-tennis-ball"></i>',
'<input class="form-input" type="number" onchange="SaveAsVariable()" placeholder="Otonom periodunda En üst satıra yerleştirilen Küpümsü sayısı (OTO HIGH Küpümsü)" value="0" required id="otohighkupumsucount"><br><button onclick="otohighkupumsuAdd()" class="form-btn primary-default-btn transparent-btn">+</button><br><button onclick="otohighkupumsuReduce()" class="form-btn primary-default-btn transparent-btn">-</button><br><button onclick="midkoniCountUI()" class="form-btn primary-default-btn transparent-btn">High Koni</button><br><button onclick="otomidkupumsuCountUI()" class="form-btn primary-default-btn transparent-btn">Mid</button><br><button onclick="otolowkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Otonom Low</button><br><button onclick="highkupumsuUI()" class="form-btn primary-default-btn transparent-btn">High kupumsu Teleop</button>',
'info',
)
document.getElementById("otohighkupumsucount").value = otohighkupumsu;
}else{
Swal.fire(
'OTONOM Periodunda otohigh konumuna yerleştirilen kupumsuler (otohigh kupumsu) <i class="fa-solid fa-tennis-ball"></i>',
'<input class="form-input" type="number" onchange="SaveAsVariable()" placeholder="Otonom periodunda En üst satıra yerleştirilen Küpümsü sayısı (OTO HIGH Küpümsü)" value="0" required id="otohighkupumsucount"><br><button onclick="otohighkupumsuAdd()" class="form-btn primary-default-btn transparent-btn">+</button><br><button onclick="otohighkupumsuReduce()" class="form-btn primary-default-btn transparent-btn">-</button><br><button onclick="midkoniCountUI()" class="form-btn primary-default-btn transparent-btn">High Koni</button><br><button onclick="otomidkupumsuCountUI()" class="form-btn primary-default-btn transparent-btn">Mid</button><br><button onclick="otolowkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Otonom Low</button><br><button onclick="highkupumsuUI()" class="form-btn primary-default-btn transparent-btn">High kupumsu Teleop</button>',
'info',
)
}
}
function otomidkupumsuCountUI(){
if (IsotomidkupumsuAlreadySaved == 1) {
console.log("Its already saved");
console.log(otomidkupumsu);
Swal.fire(
'OTONOM Periodunda otomid konumuna yerleştirilen kupumsuler (otomid kupumsu) <i class="fa-solid fa-tennis-ball"></i>',
'<input class="form-input" type="number" onchange="SaveAsVariable()" placeholder="Otonom periodunda orta satıra yerleştirilen Küpümsü sayısı (OTO MID Küpümsü)" value="0" required id="otomidkupumsucount"><br><button onclick="otomidkupumsuAdd()" class="form-btn primary-default-btn transparent-btn">+</button><br><button onclick="otomidkupumsuReduce()" class="form-btn primary-default-btn transparent-btn">-</button><br><button onclick="otomidkoniCountUI()" class="form-btn primary-default-btn transparent-btn">MID Koni</button><br><button onclick="otohighkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Otonom High</button><br><button onclick="otolowkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Low</button><br><button onclick="midkupumsuCountUI()" class="form-btn primary-default-btn transparent-btn">Mid kupumsu Teleop</button>',
'info',
)
document.getElementById("otomidkupumsucount").value = otomidkupumsu;
}else{
Swal.fire(
'OTONOM Periodunda otomid konumuna yerleştirilen kupumsuler (otomid kupumsu) <i class="fa-solid fa-tennis-ball"></i>',
'<input class="form-input" type="number" onchange="SaveAsVariable()" placeholder="Otonom periodunda orta satıra yerleştirilen Küpümsü sayısı (OTO MID Küpümsü)" value="0" required id="otomidkupumsucount"><br><button onclick="otomidkupumsuAdd()" class="form-btn primary-default-btn transparent-btn">+</button><br><button onclick="otomidkupumsuReduce()" class="form-btn primary-default-btn transparent-btn">-</button><br><button onclick="otomidkoniCountUI()" class="form-btn primary-default-btn transparent-btn">MID Koni</button><br><button onclick="otohighkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Otonom High</button><br><button onclick="otolowkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Low</button><br><button onclick="midkupumsuCountUI()" class="form-btn primary-default-btn transparent-btn">Mid kupumsu Teleop</button>',
'info',
)
}
}
function otolowkupumsuCountUI(){
if (IsotolowkupumsuAlreadySaved == 1) {
console.log("Its already saved");
console.log(otolowkupumsu);
Swal.fire(
'OTONOM Periodunda otolow konumuna yerleştirilen kupumsuler (otolow kupumsu) <i class="fa-solid fa-tennis-ball"></i>',
'<input class="form-input" type="number" onchange="SaveAsVariable()" placeholder="Otonom periodunda En alta yerleştirilen Küpümsü sayısı (OTO LOW Küpümsü)" value="0" required id="otolowkupumsucount"><br><button onclick="otolowkupumsuAdd()" class="form-btn primary-default-btn transparent-btn">+</button><br><button onclick="otolowkupumsuReduce()" class="form-btn primary-default-btn transparent-btn">-</button><br><button onclick="otolowkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Otonom Low Koni</button><br><button onclick="otohighkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Otonom High</button><br><button onclick="otomidkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Otonom Mid</button><br><button onclick="lowkupumsuUI()" class="form-btn primary-default-btn transparent-btn">Low kupumsu Teleop</button>',
'info',
)
document.getElementById("otolowkupumsucount").value = otolowkupumsu;
}else{
Swal.fire(
'OTONOM Periodunda otolow konumuna yerleştirilen kupumsuler (otolow kupumsu) <i class="fa-solid fa-tennis-ball"></i>',
'<input class="form-input" type="number" onchange="SaveAsVariable()" placeholder="Otonom periodunda En alta yerleştirilen Küpümsü sayısı (OTO LOW Küpümsü)" value="0" required id="otolowkupumsucount"><br><button onclick="otolowkupumsuAdd()" class="form-btn primary-default-btn transparent-btn">+</button><br><button onclick="otolowkupumsuReduce()" class="form-btn primary-default-btn transparent-btn">-</button><br><button onclick="otolowkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Otonom Low Koni</button><br><button onclick="otohighkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Otonom High</button><br><button onclick="otomidkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Otonom Mid</button><br><button onclick="lowkupumsuUI()" class="form-btn primary-default-btn transparent-btn">Low kupumsu Teleop</button>',
'info',
)
}
}
function lowkupumsuCountUI(){
if (IslowkupumsuAlreadySaved == 1) {
console.log("Its already saved");
console.log(lowkupumsu);
Swal.fire(
'low konumuna yerleştirilen kupumsuler (low kupumsu) <i class="fa-solid fa-tennis-ball"></i>',
'<input class="form-input" type="number" onchange="SaveAsVariable()" placeholder="En alta yerleştirilen Küpümsü sayısı (Low Küpümsü)" value="0" required id="lowkupumsucount"><br><button onclick="lowkupumsuAdd()" class="form-btn primary-default-btn transparent-btn">+</button><br><button onclick="lowkupumsuReduce()" class="form-btn primary-default-btn transparent-btn">-</button><br><button onclick="lowkoniCountUI()" class="form-btn primary-default-btn transparent-btn">low Koni</button><br><button onclick="highkoniCountUI()" class="form-btn primary-default-btn transparent-btn">High</button><br><button onclick="midkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Mid</button><br><button onclick="otolowkupumsuCountUI()" class="form-btn primary-default-btn transparent-btn">Low kupumsu Otonom</button>',
'info',
)
document.getElementById("lowkupumsucount").value = lowkupumsu;
}else{
Swal.fire(
'low konumuna yerleştirilen kupumsuler (low kupumsu) <i class="fa-solid fa-tennis-ball"></i>',
'<input class="form-input" type="number" onchange="SaveAsVariable()" placeholder="En alta yerleştirilen Küpümsü sayısı (Low Küpümsü)" value="0" required id="lowkupumsucount"><br><button onclick="lowkupumsuAdd()" class="form-btn primary-default-btn transparent-btn">+</button><br><button onclick="lowkupumsuReduce()" class="form-btn primary-default-btn transparent-btn">-</button><br><button onclick="lowkoniCountUI()" class="form-btn primary-default-btn transparent-btn">low Koni</button><br><button onclick="highkoniCountUI()" class="form-btn primary-default-btn transparent-btn">High</button><br><button onclick="midkoniCountUI()" class="form-btn primary-default-btn transparent-btn">Mid</button><br><button onclick="otolowkupumsuCountUI()" class="form-btn primary-default-btn transparent-btn">Low kupumsu Otonom</button>',
'info',
)
}
}


function highkoniAdd(){
var Currenthighkoni = parseInt(document.getElementById("highkonicount").value);
if(isNaN(Currenthighkoni)){
  Currenthighkoni = 0;
}
var newhighkoni = Currenthighkoni + 1;
document.getElementById("highkonicount").value = newhighkoni;
SaveAsVariable();
}

function highkoniReduce(){
var Currenthighkoni = parseInt(document.getElementById("highkonicount").value);
if(isNaN(Currenthighkoni)){
  Currenthighkoni = 0;
}
var newhighkoni = Currenthighkoni - 1;
document.getElementById("highkonicount").value = newhighkoni;
SaveAsVariable();
}
function highkupumsuAdd(){
var Currenthighkupumsu = parseInt(document.getElementById("highkupumsucount").value);
if(isNaN(Currenthighkupumsu)){
  Currenthighkupumsu = 0;
}
var newhighkupumsu = Currenthighkupumsu + 1;
document.getElementById("highkupumsucount").value = newhighkupumsu;
SaveAsVariable();
}

function highkupumsuReduce(){
var Currenthighkupumsu = parseInt(document.getElementById("highkupumsucount").value);
if(isNaN(Currenthighkupumsu)){
  Currenthighkupumsu = 0;
}
var newhighkupumsu = Currenthighkupumsu - 1;
document.getElementById("highkupumsucount").value = newhighkupumsu;
SaveAsVariable();
}
function midkoniAdd(){
var Currentmidkoni = parseInt(document.getElementById("midkonicount").value);
if(isNaN(Currentmidkoni)){
  Currentmidkoni = 0;
}
var newmidkoni = Currentmidkoni + 1;
document.getElementById("midkonicount").value = newmidkoni;
SaveAsVariable();
}
function midkoniReduce(){
var Currentmidkoni = parseInt(document.getElementById("midkonicount").value);
if(isNaN(Currentmidkoni)){
  Currentmidkoni = 0;
}
var newmidkoni = Currentmidkoni - 1;
document.getElementById("midkonicount").value = newmidkoni;
SaveAsVariable();
}
function lowkoniAdd(){
var Currentlowkoni = parseInt(document.getElementById("lowkonicount").value);
if(isNaN(Currentlowkoni)){
  Currentlowkoni = 0;
}
var newlowkoni = Currentlowkoni + 1;
document.getElementById("lowkonicount").value = newlowkoni;
SaveAsVariable();
}
function lowkoniReduce(){
var Currentlowkoni = parseInt(document.getElementById("lowkonicount").value);
if(isNaN(Currentlowkoni)){
  Currentlowkoni = 0;
}
var newlowkoni = Currentlowkoni - 1;
document.getElementById("lowkonicount").value = newlowkoni;
SaveAsVariable();
}
function midkupumsuAdd(){
var Currentmidkupumsu = parseInt(document.getElementById("midkupumsucount").value);
if(isNaN(Currentmidkupumsu)){
  Currentmidkupumsu = 0;
}
var newmidkupumsu = Currentmidkupumsu + 1;
document.getElementById("midkupumsucount").value = newmidkupumsu;
SaveAsVariable();
}
function midkupumsuReduce(){
var Currentmidkupumsu = parseInt(document.getElementById("midkupumsucount").value);
if(isNaN(Currentmidkupumsu)){
  Currentmidkupumsu = 0;
}
var newmidkupumsu = Currentmidkupumsu - 1;
document.getElementById("midkupumsucount").value = newmidkupumsu;
SaveAsVariable();
}
function lowkupumsuAdd(){
var Currentlowkupumsu = parseInt(document.getElementById("lowkupumsucount").value);
if(isNaN(Currentlowkupumsu)){
  Currentlowkupumsu = 0;
}
var newlowkupumsu = Currentlowkupumsu + 1;
document.getElementById("lowkupumsucount").value = newlowkupumsu;
SaveAsVariable();
}
function lowkupumsuReduce(){
var Currentlowkupumsu = parseInt(document.getElementById("lowkupumsucount").value);
if(isNaN(Currentlowkupumsu)){
  Currentlowkupumsu = 0;
}
var newlowkupumsu = Currentlowkupumsu - 1;
document.getElementById("lowkupumsucount").value = newlowkupumsu;
SaveAsVariable();
}
function otohighkoniAdd(){
var Currentotohighkoni = parseInt(document.getElementById("otohighkonicount").value);
if(isNaN(Currentotohighkoni)){
  Currentotohighkoni = 0;
}
var newotohighkoni = Currentotohighkoni + 1;
document.getElementById("otohighkonicount").value = newotohighkoni;
SaveAsVariable();
}
function otohighkoniReduce(){
var Currentotohighkoni = parseInt(document.getElementById("otohighkonicount").value);
if(isNaN(Currentotohighkoni)){
  Currentotohighkoni = 0;
}
var newotohighkoni = Currentotohighkoni - 1;
document.getElementById("otohighkonicount").value = newotohighkoni;
SaveAsVariable();
}
function otomidkoniAdd(){
var Currentotomidkoni = parseInt(document.getElementById("otomidkonicount").value);
if(isNaN(Currentotomidkoni)){
  Currentotomidkoni = 0;
}
var newotomidkoni = Currentotomidkoni + 1;
document.getElementById("otomidkonicount").value = newotomidkoni;
SaveAsVariable();
}
function otomidkoniReduce(){
var Currentotomidkoni = parseInt(document.getElementById("otomidkonicount").value);
if(isNaN(Currentotomidkoni)){
  Currentotomidkoni = 0;
}
var newotomidkoni = Currentotomidkoni - 1;
document.getElementById("otomidkonicount").value = newotomidkoni;
SaveAsVariable();
}
function otolowkoniAdd(){
var Currentotolowkoni = parseInt(document.getElementById("otolowkonicount").value);
if(isNaN(Currentotolowkoni)){
  Currentotolowkoni = 0;
}
var newotolowkoni = Currentotolowkoni + 1;
document.getElementById("otolowkonicount").value = newotolowkoni;
SaveAsVariable();
}
function otolowkoniReduce(){
var Currentotolowkoni = parseInt(document.getElementById("otolowkonicount").value);
if(isNaN(Currentotolowkoni)){
  Currentotolowkoni = 0;
}
var newotolowkoni = Currentotolowkoni - 1;
document.getElementById("otolowkonicount").value = newotolowkoni;
SaveAsVariable();
}
function otohighkupumsuAdd(){
var Currentotohighkupumsu = parseInt(document.getElementById("otohighkupumsucount").value);
if(isNaN(Currentotohighkupumsu)){
  Currentotohighkupumsu = 0;
}
var newotohighkupumsu = Currentotohighkupumsu + 1;
document.getElementById("otohighkupumsucount").value = newotohighkupumsu;
SaveAsVariable();
}
function otohighkupumsuReduce(){
var Currentotohighkupumsu = parseInt(document.getElementById("otohighkupumsucount").value);
if(isNaN(Currentotohighkupumsu)){
  Currentotohighkupumsu = 0;
}
var newotohighkupumsu = Currentotohighkupumsu - 1;
document.getElementById("otohighkupumsucount").value = newotohighkupumsu;
SaveAsVariable();
}
function otomidkupumsuAdd(){
var Currentotomidkupumsu = parseInt(document.getElementById("otomidkupumsucount").value);
if(isNaN(Currentotomidkupumsu)){
  Currentotomidkupumsu = 0;
}
var newotomidkupumsu = Currentotomidkupumsu + 1;
document.getElementById("otomidkupumsucount").value = newotomidkupumsu;
SaveAsVariable();
}
function otomidkupumsuReduce(){
var Currentotomidkupumsu = parseInt(document.getElementById("otomidkupumsucount").value);
if(isNaN(Currentotomidkupumsu)){
  Currentotomidkupumsu = 0;
}
var newotomidkupumsu = Currentotomidkupumsu - 1;
document.getElementById("otomidkupumsucount").value = newotomidkupumsu;
SaveAsVariable();
}
function otolowkupumsuAdd(){
var Currentotolowkupumsu = parseInt(document.getElementById("otolowkupumsucount").value);
if(isNaN(Currentotolowkupumsu)){
  Currentotolowkupumsu = 0;
}
var newotolowkupumsu = Currentotolowkupumsu + 1;
document.getElementById("otolowkupumsucount").value = newotolowkupumsu;
SaveAsVariable();
}
function otolowkupumsuReduce(){
var Currentotolowkupumsu = parseInt(document.getElementById("otolowkupumsucount").value);
if(isNaN(Currentotolowkupumsu)){
  Currentotolowkupumsu = 0;
}
var newotolowkupumsu = Currentotolowkupumsu - 1;
document.getElementById("otolowkupumsucount").value = newotolowkupumsu;
SaveAsVariable();
}
function CheckBoxEventBall(){
 if(IsTriggered == 0){
  document.getElementById("ballcheckbox").value = 1;
  highkoniCountUI();
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

function otostationcheckbox(){
if(IsotoStationTriggered == 0){
document.getElementById("otostationcheckbox").value = 1;
otostation = 1
  IsotoStationTriggered = 1;
 }else{
  document.getElementById("otostationcheckbox").value = 0;
  IsotoStationTriggered = 0;
  otostation = 0
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
      '<button onclick="SaveStation(0)" class="form-btn primary-default-btn transparent-btn">Çıkmadı</button><button onclick="SaveStation(1 )" class="form-btn primary-default-btn transparent-btn">Taxi</button><br><button onclick="SaveStation(2)" class="form-btn primary-default-btn transparent-btn">Çıktı fakat dengesiz</button><br><button onclick="SaveStation(3)" class="form-btn primary-default-btn transparent-btn">Çıktı Ve Dengeli</button><br><input class="form-checkbox" onclick="otostationcheckbox()" value="otostation" <?php if($_POST){ if($_POST["otostationcheckbox"]==1){echo 'checked';}} ?> type="checkbox"><br<label id="successalertlabel"></label>',
  'info',
)
console.log(ChargingStationStatus)
  }else{
    Swal.fire(
  'Tırmanma',
  '<button onclick="SaveStation(0)" class="form-btn primary-default-btn transparent-btn">Çıkmadı</button><button onclick="SaveStation(1)" class="form-btn primary-default-btn transparent-btn">Taxi</button><br><button onclick="SaveStation(2)" class="form-btn primary-default-btn transparent-btn">Çıktı fakat dengesiz</button><br><button onclick="SaveStation(3)" class="form-btn primary-default-btn transparent-btn">Çıktı Ve Dengeli</button><br><input class="form-checkbox" onclick="otostationcheckbox()" value="otostation" <?php if($_POST){ if($_POST["otostationcheckbox"]==1){echo 'checked';}} ?> type="checkbox"><br<label id="successalertlabel"></label>',
  'info',

)
  }





}


function SaveStation(givenStationStatus){
  IsStationSaved = 1;
  ChargingStationStatus = givenStationStatus;
  document.getElementById('successalertlabel').innerHTML = 'Başarıyla kaydedildi';
}


function SaveAsVariable(){
  try{
if(IshighkoniAlreadySaved == 0){
IshighkoniAlreadySaved = 1;
}
highkoni = parseInt(document.getElementById("highkonicount").value);
console.log(highkoni);
}catch{
}
try{
if(IsotohighkoniAlreadySaved == 0){
IsotohighkoniAlreadySaved = 1;
}
otohighkoni = parseInt(document.getElementById("otohighkonicount").value);
console.log(otohighkoni);
}catch{
}
try{
if(IsmidkoniAlreadySaved == 0){
IsmidkoniAlreadySaved = 1;
}
midkoni = parseInt(document.getElementById("midkonicount").value);
console.log(midkoni);
}catch{
}
try{
if(IsotomidkoniAlreadySaved == 0){
IsotomidkoniAlreadySaved = 1;
}
otomidkoni = parseInt(document.getElementById("otomidkonicount").value);
console.log(otomidkoni);
}catch{
}
try{
if(IslowkoniAlreadySaved == 0){
IslowkoniAlreadySaved = 1;
}
lowkoni = parseInt(document.getElementById("lowkonicount").value);
console.log(lowkoni);
}catch{
}
try{
if(IsotolowkoniAlreadySaved == 0){
IsotolowkoniAlreadySaved = 1;
}
otolowkoni = parseInt(document.getElementById("otolowkonicount").value);
console.log(otolowkoni);
}catch{
}
try{
if(IshighkupumsuAlreadySaved == 0){
IshighkupumsuAlreadySaved = 1;
}
highkupumsu = parseInt(document.getElementById("highkupumsucount").value);
console.log(highkupumsu);
}catch{
}
try{
if(IsotohighkupumsuAlreadySaved == 0){
IsotohighkupumsuAlreadySaved = 1;
}
otohighkupumsu = parseInt(document.getElementById("otohighkupumsucount").value);
console.log(otohighkupumsu);
}catch{
}
try{
if(IsmidkupumsuAlreadySaved == 0){
IsmidkupumsuAlreadySaved = 1;
}
midkupumsu = parseInt(document.getElementById("midkupumsucount").value);
console.log(midkupumsu);
}catch{
}
try{
if(IsotomidkupumsuAlreadySaved == 0){
IsotomidkupumsuAlreadySaved = 1;
}
otomidkupumsu = parseInt(document.getElementById("otomidkupumsucount").value);
console.log(otomidkupumsu);
}catch{
}
try{
if(IslowkupumsuAlreadySaved == 0){
IslowkupumsuAlreadySaved = 1;
}
lowkupumsu = parseInt(document.getElementById("lowkupumsucount").value);
console.log(lowkupumsu);
}catch{
}
try{
if(IsotolowkupumsuAlreadySaved == 0){
IsotolowkupumsuAlreadySaved = 1;
}
otolowkupumsu = parseInt(document.getElementById("otolowkupumsucount").value);
console.log(otolowkupumsu);
}catch{
}
}


function AutoDraw(){
  document.getElementById("otohighkoni").value = otohighkoni;
  document.getElementById("otomidkoni").value = otomidkoni;
  document.getElementById("otolowkoni").value = otolowkoni;
  document.getElementById("lowkoni").value = lowkoni;
  document.getElementById("highkoni").value = highkoni;
  document.getElementById("midkoni").value = midkoni;
  document.getElementById("otohighkupumsu").value = otohighkupumsu;
  document.getElementById("otomidkupumsu").value = otomidkupumsu;
  document.getElementById("otolowkupumsu").value = otolowkupumsu;
  document.getElementById("lowkupumsu").value = lowkupumsu;
  document.getElementById("highkupumsu").value = highkupumsu;
  document.getElementById("midkupumsu").value = midkupumsu;
  document.getElementById("chargingstationstatus").value = ChargingStationStatus;
  document.getElementById("mainform").action = "form.php";
  document.getElementById("mainform").submit();
}


function SendForm(){
  document.getElementById("otohighkoni").value = otohighkoni;
  document.getElementById("otomidkoni").value = otomidkoni;
  document.getElementById("otolowkoni").value = otolowkoni;
  document.getElementById("lowkoni").value = lowkoni;
  document.getElementById("highkoni").value = highkoni;
  document.getElementById("midkoni").value = midkoni;
  document.getElementById("otohighkupumsu").value = otohighkupumsu;
  document.getElementById("otomidkupumsu").value = otomidkupumsu;
  document.getElementById("otolowkupumsu").value = otolowkupumsu;
  document.getElementById("lowkupumsu").value = lowkupumsu;
  document.getElementById("highkupumsu").value = highkupumsu;
  document.getElementById("midkupumsu").value = midkupumsu;
  document.getElementById("chargingstationstatus").value = ChargingStationStatus;
  document.getElementById("mainform").action = "save.php";
  document.getElementById("mainform").submit();
}

</script>
</body>

</html>