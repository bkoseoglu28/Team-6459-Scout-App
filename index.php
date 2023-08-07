<?php 

include 'connection/connection.php';

function getAverage($teamid){
  global $conn;
$sql = "SELECT * FROM data where teamid = '$teamid' ";
$result = $conn->query($sql);
$total = 0;
$count = 0;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
$count = $count + 1;  
$total = $total + $row["totalpoint"];
}

return $total/$count;
}
}





function getHTAverage($teamid){
  global $conn;
$sql = "SELECT * FROM data where teamid = '$teamid' ";
$result = $conn->query($sql);
$total = 0;
$count = 0;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
$count = $count + 1;  
$total = $total + $row["highteleop"];
}

return $total/$count;
}
}






 ?>

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
                <span class="icon logo" style="background-image:0;" aria-hidden="true"><img src="./img/svg/apple-touch-icon.png"></span>
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
                        <span class="icon document" aria-hidden="true"></span>FRC 2023
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
        <h2 class="main-title">Sıralamalar</h2>
        <div class="row">
          <div class="col-lg-3">
            <article class="white-block">
              <div class="top-cat-title">
                <h3>Robot Raporlarında Bulunan Ortalama Puan Sıralaması</h3>
              </div>
              <ul class="top-cat-list">
                
<?php



$sql = "SELECT * FROM data";
$result = $conn->query($sql);
$teamarray = array();
$averagearray = array();
$multiarray = array("Null team" => 0);
$total = 0;
$count = 0;

class Person
{
    public $name;

    public $age;

    public function getName(){
      global $name;
      return $name;
    }

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

}

class PersonComparer
{
    public static function compare(Person $x, Person $y)
    {
        return $x->age <=> $y->age;
    }
}

$group = [];
$highteleopgroup = [];





if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
$teamid = $row["teamid"];
if(!in_array($teamid, $teamarray)){

  array_push($teamarray, $teamid);


  array_push($group, new Person('"'.$teamid.'"', getAverage($teamid)));
  array_push($highteleopgroup, new Person('"'.$teamid.'"', getHTAverage($teamid)));

  array_push($averagearray, getAverage($teamid));
  echo '<script>console.log('.getAverage($teamid).');</script>';



// Berk githuba eklenicek -> Vually

 ?> 




    <?php
  }
  }

usort($group, ['PersonComparer', 'compare']);
usort($highteleopgroup, ['PersonComparer', 'compare']);
$multiple_array = array();
$arrlength = count($averagearray);


sort($averagearray);
//sort($teamarray);

//print_r($teamarray);

//print_r($group);


function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

$isthefirst = 1;
$group = array_reverse($group);
$highteleopgroup = array_reverse($highteleopgroup);
foreach($group as $value){
  foreach ($value as $v){
    if($isthefirst == 1){
      $isthefirst = 0;
      $printableteamid = get_string_between($v, '"','"');
      $returned_value = $printableteamid;
      $isreturned = 0;
   }else{
    $average = str_replace($printableteamid, '', $v);
    $returned_value = $returned_value."->".$average;
    $isreturned = 1;
    $isthefirst = 1;
   }
   if($isthefirst == 1){
    $parseable_value = "<prefix>".$returned_value."<suffix>";
    $teamname = get_string_between($parseable_value, '<prefix>','->');
    $realaverage = get_string_between($parseable_value,'->','<suffix>');
    echo '     <li>
                  <a onclick="sendit('.$teamname.')">
                    <div class="top-cat-list__title">
                      Team '.$teamname.' <span>'.$realaverage.'</span>
                    </div>
                    <div class="top-cat-list__subtitle">
                      TOTAL POINT AVG. '.$realaverage.' <span class="success">'.$realaverage.'</span>
                    </div>
                  </a>
                </li>';
   }
    }
   
  } 




} else {
  echo "0 results";
}

?>





           
              </ul>
            </article>
          </div>
          <div class="col-lg-3">
            <article class="white-block">
              <div class="top-cat-title">
                <h3>Robot Top Atma Sıralaması</h3>
              </div>
              <ul class="top-cat-list">





<?php 

foreach($highteleopgroup as $value){
  foreach ($value as $v){
    if($isthefirst == 1){
      $isthefirst = 0;
      $printableteamid = get_string_between($v, '"','"');
      $returned_value = $printableteamid;
      $isreturned = 0;
   }else{
    $average = str_replace($printableteamid, '', $v);
    $returned_value = $returned_value."->".$average;
    $isreturned = 1;
    $isthefirst = 1;
   }
   if($isthefirst == 1){
    $parseable_value = "<prefix>".$returned_value."<suffix>";
    $teamname = get_string_between($parseable_value, '<prefix>','->');
    $realaverage = get_string_between($parseable_value,'->','<suffix>');
    echo '     <li>
                  <a onclick="sendit('.$teamname.')">
                    <div class="top-cat-list__title">
                      Team '.$teamname.' <span>'.$realaverage.'</span>
                    </div>
                    <div class="top-cat-list__subtitle">
                      HIGH TELEOP AVG. '.$realaverage.' <span class="success">'.$realaverage.'</span>
                    </div>
                  </a>
                </li>';
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
      <p>-2023 © Vually-<a href="##" target="_blank"
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
<script type="text/javascript">

  function post(path, params, method='post') {

  // The rest of this code assumes you are not using a library.
  // It can be made less verbose if you use one.
  const form = document.createElement('form');
  form.method = method;
  form.action = path;

  for (const key in params) {
    if (params.hasOwnProperty(key)) {
      const hiddenField = document.createElement('input');
      hiddenField.type = 'hidden';
      hiddenField.name = key;
      hiddenField.value = params[key];

      form.appendChild(hiddenField);
    }
  }

  document.body.appendChild(form);
  form.submit();
}

function sendit(inputteamid){
  post('search.php', {"teamid": inputteamid});
}

</script>
</body>

</html>