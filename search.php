<?php 
include 'connection/connection.php';

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Team #6459 | Scout App</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="FRCLogo2.png" type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href="./css/style.min.css">
</head>

<body>
  <div class="layer"></div>
<!-- ! Body -->
<a class="skip-link sr-only" href="#skip-target">Skip to content</a>
<div class="page-flex">
  <!-- ! Sidebar -->
  <aside class="sidebar">
    <div class="sidebar-start">
        <div class="sidebar-head">
            <a href="index.html" class="logo-wrapper" title="Home">
                <span class="sr-only">Home</span>
                <span class="icon logo" aria-hidden="true"></span>
                <div class="logo-text">
                    <span class="logo-title">Team #6459</span>
                    <span class="logo-subtitle">Scout App</span>
                </div>

            </a>
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                <span class="sr-only">Toggle menu</span>
                <span class="icon menu-toggle" aria-hidden="true"></span>
            </button>
        </div>
        <div class="sidebar-body">
            <ul class="sidebar-body-menu">
                <li>
                    <a class="active" href="index.html"><span class="icon home" aria-hidden="true"></span>Scout App Anasayfa</a>
                </li>
                <li>
                    <a class="show-cat-btn" href="##">
                        <span class="icon document" aria-hidden="true"></span>Raporlar
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="Rapor.php">Yeni Rapor</a>
                        </li>
                       
                        <li>
                            <a href="cameraphoto.php">Robot Fotoğrafı Çek</a>
                        </li>
                    </ul>
                    <a class="show-cat-btn" href="##">
                        <span class="icon document" aria-hidden="true"></span>Arama
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                    <li>
                            <a href="searchteam.php">Takım Ara</a>
                        </li>
                        <li>
                            <a href="searchwithmatchid.php">Maç Numarası ile Ara</a>
                        </li>
                        <li>
                            <a href="searcholdteam.php">Eski Yıllarla Takımları Arama</a>
                        </li>
                    </ul>
                    <a class="show-cat-btn" href="##">
                        <span class="icon document" aria-hidden="true"></span>FRC 2022
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="Manuel.php">Manual
                            </a>
                        </li>
                    </ul>
               
        </div>
    </div>
    <style type="text/css">.top-cat-list__subtitlep {
    display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;
  font-size: 12px;
  line-height: 1.2;
  letter-spacing: -0.4px;
  color: #59ff00;
  background-color: #000000;
  }
</style>
<style type="text/css">.top-cat-list__titlez {
    display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;
  font-weight: 600;
  font-size: 16px;
  line-height: 1.2;
  letter-spacing: -0.4px;
  color: #ff0000;
  margin-bottom: 4px;
  background-color: #000000;
  }
  .grid-object{
  max-width: 10%;
  height: auto;
  background-size: cover;
}
</style>
</aside>
  <div class="main-wrapper">
    <!-- ! Main nav -->
    <nav class="main-nav--bg">
  <div class="container main-nav">
    <div class="main-nav-end">
      <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
        <span class="sr-only">Toggle menu</span>
        <span class="icon menu-toggle--gray" aria-hidden="true"></span>
      </button>
      <button class="theme-switcher gray-circle-btn" type="button" title="Switch theme">
        <span class="sr-only">Switch theme</span>
        <i class="sun-icon" data-feather="sun" aria-hidden="true"></i>
        <i class="moon-icon" data-feather="moon" aria-hidden="true"></i>
      </button>
    </div>
  </div>
</nav>
<?php 
      $code ='py veriçekme.py '.$_POST["teamid"].'';
      $command = escapeshellcmd($code);
    $output = shell_exec($command);
      $lastoutput=explode('|', $output);
 ?>
 <?php 
   
 ?>
    <!-- ! Main -->
    <main class="main users chart-page" id="skip-target">
      <div class="container">
        <h2 class="main-title">Team <?php echo $_POST["teamid"]; ?> için sonuçlar</h2>
        <a style="background-color: green" class="form-btn primary-default-btn transparent-btn" href="https://www.thebluealliance.com/team/<?php echo $_POST["teamid"]; ?>">Takımın The Blue Alliance Sayfasına Git</a>
        <div class="row">
          <div class="col-lg-3" style="flex: 0 0 100%;max-width: 100%;">
            <article class="white-block">
            <?php 
$teamid = $_POST["teamid"];
$psql = "SELECT * FROM robotphoto where pteamid = '$teamid' ";
$presult = $conn->query($psql);
if ($presult->num_rows > 0) {
  // output data of each row
  while($row = $presult->fetch_assoc()) {
$robotphoto = $row["robotphoto"];
}
} 
else{
  echo "Fotoğraf yok";
}
 ?>      
              <img id="canvasimg" style="width: min-content;display:none;">
              <br>
              <div class="top-cat-list__titlez">Rankings</div>
              <div class="top-cat-list__subtitlep"><?php 
              
              
              for ($i = 0; $i < count($lastoutput)-1; ++$i) {
                $tamveriler=explode(';',$lastoutput[$i]);
                for ($x = 0; $x < count($tamveriler); ++$x) {
                  echo "$tamveriler[$x]<br>";
                  
                }
                echo "<br>";
              }
                  
             
             

              ?></div>

                 
              <ul class="top-cat-list">
              <script type="text/javascript">
	var dataURL = "<?php echo $robotphoto; ?>";
	document.getElementById("canvasimg").style.border = "2px solid";
    document.getElementById("canvasimg").src = dataURL;
    document.getElementById("canvasimg").style.display = "inline";
</script>
<?php







$sql = "SELECT * FROM data where teamid = '$teamid' ";
$result = $conn->query($sql);
$total = 0;
$count = 0;



if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
$count = $count + 1;  
$total = $total + $row["totalpoint"]; 



  ?> 



                <li>
                  <a href="details.php?id=<?php echo $row["id"]; ?>" >
                    <br>
                    <div id="grid-col-1"> 
                    <?php
                    $grid = explode(",", $row["grid"]);
                    
                    for ($i = 0; $i < 9; $i++) {
                      if ($i == 1 || $i == 4 || $i == 7) {
                          if (intval($grid[$i]) == 1) {
                              echo('<img id="High' . ($i+1) . '" class="grid-object" style="background-image: url(img/frc2023cube.jpg);" src="img/placed.png" alt="0">');
                              
                            } elseif (intval($grid[$i]) == 2) {
                              echo('<img id="High' . ($i+1) . '" class="grid-object" style="background-image: url(img/frc2023cube.jpg);" src="img/oto-placed.png" alt="0">');
                              
                            } else {
                              echo('<img id="High' . ($i+1) . '" class="grid-object" src="img/frc2023cube.jpg" alt="0">');
                              
                            }
                      }else{
                        if (intval($grid[$i]) == 1) {
                          echo('<img id="High' . ($i+1) . '" class="grid-object" style="background-image: url(img/frc2023cone.jpg);" src="img/placed.png" alt="0">');
                        
                        } elseif (intval($grid[$i]) == 2) {
                          echo('<img id="High' . ($i+1) . '" class="grid-object" style="background-image: url(img/frc2023cone.jpg);" src="img/oto-placed.png" alt="0">');
                          
                        } else {
                          echo('<img id="High' . ($i+1) . '" class="grid-object" src="img/frc2023cone.jpg" alt="0">');
                          
                        }
                      }
                  }
                    ?>
                    </div>
                    <div id="grid-col-2"> 
                    <?php
                    

                    for ($i = 9; $i < 18; $i++) {
                      if ($i == 10 || $i == 13 || $i == 16) {
                          if (intval($grid[$i]) == 1) {
                              echo('<img id="Mid' . ($i+1) . '" class="grid-object" style="background-image: url(img/frc2023cube.jpg);" src="img/placed.png" alt="0">');
                          } elseif (intval($grid[$i]) == 2) {
                              echo('<img id="Mid' . ($i+1) . '" class="grid-object" style="background-image: url(img/frc2023cube.jpg);" src="img/oto-placed.png" alt="0">');
                          } else {
                              echo('<img id="Mid' . ($i+1) . '" class="grid-object" src="img/frc2023cube.jpg" alt="0">');
                          }
                      }else{
                        if (intval($grid[$i]) == 1) {
                          echo('<img id="Mid' . ($i+1) . '" class="grid-object" style="background-image: url(img/frc2023cone.jpg);" src="img/placed.png" alt="0">');
                      } elseif (intval($grid[$i]) == 2) {
                          echo('<img id="Mid' . ($i+1) . '" class="grid-object" style="background-image: url(img/frc2023cone.jpg);" src="img/oto-placed.png" alt="0">');
                      } else {
                          echo('<img id="Mid' . ($i+1) . '" class="grid-object" src="img/frc2023cone.jpg" alt="0">');
                      }
                      }
                  }
                    ?>
                    </div>
                    <div id="grid-col-3"> 
                    <?php
                    

                    for ($i = 18; $i < 27; $i++) {
                      if ($i == 19 || $i == 22 || $i == 24) {
                          if (intval($grid[$i]) == 1) {
                              echo('<img id="Low' . ($i+1) . '" class="grid-object" style="background-image: url(img/anythinglogo.jpg);" src="img/placed.png" alt="0">');
                          } elseif (intval($grid[$i]) == 2) {
                              echo('<img id="Low' . ($i+1) . '" class="grid-object" style="background-image: url(img/anythinglogo.jpg);" src="img/oto-placed.png" alt="0">');
                          } else {
                              echo('<img id="Low' . ($i+1) . '" class="grid-object" src="img/anythinglogo.jpg" alt="0">');
                          }
                      }else{
                        if (intval($grid[$i]) == 1) {
                          echo('<img id="Low' . ($i+1) . '" class="grid-object" style="background-image: url(img/anythinglogo.jpg);" src="img/placed.png" alt="0">');
                      } elseif (intval($grid[$i]) == 2) {
                          echo('<img id="Low' . ($i+1) . '" class="grid-object" style="background-image: url(img/anythinglogo.jpg);" src="img/oto-placed.png" alt="0">');
                      } else {
                          echo('<img id="Low' . ($i+1) . '" class="grid-object" src="img/anythinglogo.jpg" alt="0">');
                      }
                      }
                  }
                    ?>
                    </div>
                    <br>
                    <div class="top-cat-list__subtitle">
                      Auto Total <span class="warning"><?php echo $row["autototal"]; ?></span>
                    </div><br>
                    <div class="top-cat-list__subtitle">
                      Teleop Total <span class="warning"><?php echo $row["teletotal"]; ?></span>
                    </div><br>
                    <div class="top-cat-list__title">
                      Toplam Puan <span><?php echo $row["totalpoint"] ?></span>
                    </div><br>
                    <?php 


                    $Hangar = "";

                    $Hangar = $row["chargingstationstatus"];

                    if($Hangar == 0){
                      $Hangar = "Tırmanma Yok";
                    }
                    if($Hangar == 1){
                      $Hangar = "Taxi";
                    }
                    if($Hangar == 2){
                      $Hangar = "Çıktı Fakat Dengesiz";
                    }
                    if($Hangar == 3){
                      $Hangar = "Çıktı Ve Dengeli";
                    }

                     ?>
                    <div class="top-cat-list__subtitle">
                      Hangar Type <span class="success"><?php echo $Hangar; ?></span>
                    </div><br>
                    <div class="top-cat-list__subtitle">
                      Penalties <span class="success"><?php echo $row["penalties"]; ?></span>
                    </div>
                    <div class="top-cat-list__subtitle">
                      Notes <span class="success"><?php echo $row["notes"]; ?></span>
                    </div>
                  </a>
                </li>

    <?php
  }
  echo "<br> Ortalama Puanları = ".$total/$count;
} else {
  echo "0 results";
}






?>




              </ul>
            </article>
          </div>
        </div>
      </div>
      <input type="button" name="" onclick="history.back()" style="background-color: red" class="form-btn primary-default-btn transparent-btn" value="Geri Dön">
    </main>
    <!-- ! Footer -->
    <footer class="footer">
  <div class="container footer--flex">
    <div class="footer-start">
      <p>-Vually-<a href="##" target="_blank"
          rel="noopener noreferrer">#Team 6459</a></p>
    </div>

  </div>
</footer>
  </div>
</div>
<!-- Chart library -->
<script src="./plugins/chart.min.js"></script>
<!-- Icons library -->
<script src="plugins/feather.min.js"></script>
<!-- Custom scripts -->
<script src="js/script.js"></script>
</body>

</html>