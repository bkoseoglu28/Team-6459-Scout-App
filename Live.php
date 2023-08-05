<?php include 'connection/connection.php'; ?>

<!DOCTYPE html>
<html lang="tr">

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
                            <a href="Rapor.php">Yeni Rapor</a>
                        </li>
                        <li>
                            <a href="searchteam.php">Takım Ara</a>
                        </li>
                        <li>
                            <a href="searchwithmatchid.php">Maç Numarası ile Ara</a>
                        </li>
                        <li>
                            <a href="cameraphoto.php">Robot Fotoğrafı Çek</a>
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
                            <a href="Rapor.php">Manual
                            </a>
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
        <h2 class="main-title">Suggested Teams</h2>
        <div class="row">
          <div class="col-lg-3">
            <article class="white-block">
            <ul class="top-cat-list">
            <?php
            $sql = "SELECT MAX(`highteleop`) AS maxteleop FROM `data` WHERE hangartype = 4;";
            $result = $conn->query($sql);
            if ($result->num_rows > 0){
            while ($row = $result->fetch_assoc()) {
              $maxteleop = $row["maxteleop"];
              $asql = "SELECT * FROM `data` WHERE highteleop='$maxteleop'";
              $aresult = $conn->query($asql);
              while ($row = $aresult->fetch_assoc()){
                echo $row["teamid"];
              }
            }
            }
          ?>
            </ul>
            </article>
          </div>
        </div>
      </div>
    </main>
    <!-- ! Footer -->
    <footer class="footer">
  <div class="container footer--flex">
    <div class="footer-start">
      <p>-2022 © Vually-<a href="##" target="_blank"
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