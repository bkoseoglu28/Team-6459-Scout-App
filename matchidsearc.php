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
  <link rel="shortcut icon" href="./img/svg/logo.svg" type="image/x-icon">
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
                    <a class="active" href="index.html"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
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
                            <a href="search.php">Yeni Takım Ara</a>
                    </li>    
                    <li>
                            <a href="Rapor.php">Yeni Rapor</a>
                        </li>
                        <li>
                            <a href="cameraphoto.php">Robot Fotoğrafı Çek</a>
                        </li>
                    </ul>
               
        </div>
    </div>
    

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
    <!-- ! Main -->
    <main class="main users chart-page" id="skip-target">
      <div class="container">
        <h2 class="main-title"> <?php echo $_POST["matchid"]; ?> maçın sonuçları</h2>
          <?php
$matchid = $_POST["matchid"];
$sql = "SELECT * FROM data where matchid = '$matchid' ";
$result = $conn->query($sql);
$total = 0;
$count = 0;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
$count = $count + 1;  
$total = $total + $row["highauto"]; 

  ?> 
           <li>
           <div class="row">
           <div class="col-lg-3">
           <article class="white-block">
              <div class="top-cat-title">
                <h3>Team <?php echo $row["teamid"] ?></h3>
              </div>
              <ul class="top-cat-list">
                  <a href="details.php?id=<?php echo $row["id"]; ?>">
                    <div class="top-cat-list__title">
                      Toplam Puan <span><?php echo $row["totalpoint"] ?></span>
                    </div><br>
                    <div class="top-cat-list__subtitle">
                      Low Auto <span class="warning"><?php echo $row["lowauto"]; ?></span>
                    </div><br>
                    <div class="top-cat-list__subtitle">
                      Low Teleop <span class="warning"><?php echo $row["lowteleop"]; ?></span>
                    </div><br>
                    <div class="top-cat-list__subtitle">
                      High Auto <span class="warning"><?php echo $row["highauto"]; ?></span>
                    </div><br>
                    <div class="top-cat-list__subtitle">
                      High Teleop <span class="warning"><?php echo $row["highteleop"]; ?></span>
                    </div><br>
                    <?php 


                    $Hangar = "";

                    $Hangar = $row["hangartype"];

                    if($Hangar == 0){
                      $Hangar = "Tırmanma Yok";
                    }
                    if($Hangar == 1){
                      $Hangar = "LOW RUNG";
                    }
                    if($Hangar == 2){
                      $Hangar = "MID RUNG";
                    }
                    if($Hangar == 3){
                      $Hangar = "HIGH RUNG";
                    }
                     if($Hangar == 4){
                      $Hangar = "TRAVERSAL RUNG";
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
                    <div class="top-cat-list__subtitle">
                      Match ID <span class="success"><?php echo $row["matchid"]; ?></span>
                    </div>
                  </a>
                  </ul>
                </article>
                </div>
                </li>

    <?php
  }
} 






?>



              
         
        
      </div>
      <input type="button" name="" onclick="history.back()" style="background-color: red" class="form-btn primary-default-btn transparent-btn" value="Geri Dön">
    </main>
    <!-- ! Footer -->
    <footer class="footer">
  <div class="container footer--flex">
    <div class="footer-start">
      <p>-Team6459-<a href="##" target="_blank"
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