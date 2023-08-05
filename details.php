<?php 
include 'connection/connection.php';

$id = $_GET["id"];


$sql = "SELECT * FROM data where id= '$id' ";
$result = $conn->query($sql);

$row = $result->fetch_assoc();

$image = $row["imagerawdata"];


 ?>





 <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width,initial scale=1">
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
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

<body onload="init()">
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
    <form class="sign-up-form form" action="" id="scform" method="POST" style="margin-top: 3%;" class="col-sm-10 col-md-4 col-lg-2">
<input type="hidden" name="imagerawdata" id="imagerawdata" value="">
<input type="hidden" name="lowteleop" id="lowteleop" value="0">
<input type="hidden" name="lowauto" id="lowauto" value="0">
<input type="hidden" name="highteleop" id="highteleop" value="0">
<input type="hidden" name="highauto" id="highauto" value="0">
<input type="hidden" name="hangartype" id="hangartype" value="0">
<input type="hidden" name="notes" id="notes" value="">
<input type="hidden" name="teamid" id="teamid" value="">
<input type="hidden" name="matchid" id="matchid" value="">
      <input type="hidden" name="hangarcheckbox" id="hangarcheckbox" value="0">
      <input type="hidden" name="ballcheckbox" id="ballcheckbox" value="0">
      <input type="hidden" name="defanscheckbox" id="defanscheckbox" value="0">

      <div id="sketchpadapp">
        <div class="leftside">

          <div class="rightside">
            <img id="canvasimg" style="display:none;background-image: url('field.png'); background-size: 100% 100%;">
          </div>
        </div>
      </div>
      <script type="text/javascript">
	var dataURL = "<?php echo $image; ?>";
	document.getElementById("canvasimg").style.border = "2px solid";
    document.getElementById("canvasimg").src = dataURL;
    document.getElementById("canvasimg").style.display = "inline";
</script>



      <input type="button" name="" value="Geri Dön" onclick="history.back()" class="form-btn primary-default-btn transparent-btn">
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

  
</script>
</body>

</html>