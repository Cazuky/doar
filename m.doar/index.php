
<?php
require_once("../config/conexao.php");
$geral = new conexao();
$sql ="SELECT doacao.*, doador.*, categoria.*, doacao.ID as doaid FROM doacao
JOIN categoria ON categoria.id = doacao.categoria_id
JOIN doador ON doador.id = doacao.doador_id";
$ExecuteDoar = $geral->banco->Execute($sql);
$sqlCat = "SELECT * FROM categoria";
$executeCat = $geral->banco->Execute($sqlCat);

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Doar</title>
  <link rel="shortcut icon" href="../images/favicon.png">
  <link rel="stylesheet" href="../css/w3.css" media="all">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="../css/hover.css" media="all">
  <link rel="stylesheet" href="../css/font-awesome.css" media="screen" title="no title">
  <link rel="stylesheet" type="text/css" href="../css/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="../css/slick/slick-theme.css"/>
  <link rel="stylesheet" href="../css/custom.css" media="all">
  <script type="text/javascript" src="../js/jquery.js"></script>
  <script type="text/javascript" src="../css/slick/slick.min.js"></script>
  <script type="text/javascript" src="../js/script.js"></script>

  <style media="screen">
  body{margin: 0; paddin: 0; box-sizing: border-box}
  input{outline: none}
  .backimg {background: url('img/back.jpg') no-repeat}
  .filter {width: 100%; height: 100%; position: fixed; background: rgba(0, 0, 0, 0.47)}
  a{text-decoration: none}
  .cursor-pointer {cursor: pointer}
  .height{min-height: 15em; height: auto}

  </style>
</head>
<body>
  <!-- Sidenav -->
  <nav class="w3-sidenav w3-white w3-card-2 w3-animate-top w3-center" style="display:none;padding-top:150px" id="mySidenav">
    <a href="javascript:void(0)" onclick="w3_close()" class="w3-closenav w3-right w3-display-topright">
      <i class="fa fa-remove w3-xlarge"></i>
    </a>
    <!-- Footer -->
    <a href="login.php" class="w3-btn w3-margin w3-blue w3-padding">Publicar agora</a>
    <div class="w3-center">
      <a href="#" class="w3-show-inline-block"><i class="fa fa-facebook"></i></a>
      <a href="#" class="w3-show-inline-block"><i class="fa fa-twitter"></i></a>
      <a href="#" class="w3-show-inline-block"><i class="fa fa-youtube"></i></a>
    </div>
    <div class="w3-clear">

    </div>
    <footer class="w3-container w3-padding-16 w3-center">
      <p>Powered by <a href="javascript:void(0)" target="_blank">VenusDEV.Inc &copy; <?= date("Y") ?></a></p>
    </footer>
  </nav>
  <!-- CATEGORIAS -->
  <nav class="w3-sidenav w3-white w3-card-2 w3-animate-top w3-center" style="width:90%; display:none;padding-top:20px" id="sideNavCategory">
    <a href="javascript:void(0)" onclick="w3_closecategory()" class="w3-closenav w3-display-topright">
      <i class="fa fa-remove w3-xlarge"></i>
    </a>
    <ul class="w3-ul w3-margin-0 w3-left">
      <?php while($regCat = $executeCat->FetchNextObject()): ?>
      <li class="w3-border-0"><a href="?page=desapego&action=category&id=<?= $regCat->ID?>" class="w3-left"><?= $regCat->CATEGORIA?></a></li>
    <?php endwhile; ?>
    </ul>
  </nav>
  <!-- FIM CATEGORIAS -->
  <!-- Top container -->
  <div class="w3-container w3-top w3-indigo w3-large w3-padding" style="z-index:4">
    <button class="w3-btn w3-transparent w3-right w3-hide-large w3-padding-0 w3-hover-text-grey" onclick="w3_open();"><i class="fa fa-bars fa-2x"></i></button>
    <a href="index.php">    <img src="../images/logo.png" class="w3-image w3-margin-left" alt="" width="50em"/></a>
  </div>
  <div class="w3-main w3-padding-0" style=" margin-top:5em">
    <div class="w3-bottom w3-padding w3-light-grey w3-card-16">
      <a href="javascript:void(0)" onclick="w3_openCategory()" class="w3-left"><i class="fa fa-list w3-text-blue fa-2x"></i></a>
      <a href="javascript:void(0)" onclick="document.getElementById('searchContainer').style.display='block'; document.getElementById('searchInput').focus()" class="w3-right"><i class="fa fa-search w3-text-blue fa-2x"></i></a>
    </div>
    <div class="w3-container w3-light-grey w3-padding-12">
      <div class="w3-container w3-margin-bottom w3-padding-0 w3-margin-0" id="searchContainer" style="display:none">
        <a href="javascript:void(0)" onclick="document.getElementById('searchContainer').style.display='none'" class="w3-closebtn w3-text-blue w3-cursor-pointer" style="cursor:pointer"><i class="fa fa-close"></i></a><br>
        <form class="" action="" method="post">
          <input type="text" class="w3-input" name="search" value="" placeholder="o que procuras ?" id="searchInput">
          <input type="hidden" name="page" value="desapego">
          <input type="hidden" name="action" value="searchmobile">
        </form>
      </div>
      <?php
      $pagina = $_REQUEST['page'];
      $paginas = array("desapego");
      if (in_array($pagina, $paginas)) {
        require_once("../controller/".$pagina.".php");
      }else{
        require_once("../views/m.list.pub.php");
      }
     ?>
    </div>

    <div id="id01" class="w3-modal">
      <div class="w3-modal-content w3-transparent">
        <div class="w3-container">
          <a href="javascript:void(0)" onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-text-white w3-cursor-pointer" style="cursor:pointer"><i class="fa fa-close"></i></a><br>
          <form class=" w3-container  w3-animate-left" action="" autocomplete="off" method="get" style="float:none; margin: 0 auto;">
            <div class=" w3-twothird w3-padding">
              <input class="w3-input w3-padding-large w3-border" type="text" name="q" placeholder="O que procuras?" style="outline:none">
              <input type="hidden" name="p" value="doar">
              <input type="hidden" name="a" value="search">
            </div>
            <div class=" w3-container w3-quarter w3-padding">
              <input  class="w3-btn-block w3-border-0 w3-yellow w3-text-blue w3-padding-large w3-border w3-border-blue w3-hover-yellow"type="submit" name="btn-seacrh" value="Procurar"></input>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
  // Get the Sidenav
  var mySidenav = document.getElementById("mySidenav");
  var sideNavCategory = document.getElementById("sideNavCategory");

  // Get the DIV with overlay effect
  var overlayBg = document.getElementById("myOverlay");

  // Toggle between showing and hiding the sidenav, and add overlay effect
  function w3_open() {
    if (mySidenav.style.display === 'block') {
      mySidenav.style.display = 'none';
      overlayBg.style.display = "none";
    } else {
      mySidenav.style.display = 'block';
      overlayBg.style.display = "block";
    }
  }
  function w3_openCategory() {
    if (sideNavCategory.style.display === 'block') {
      sideNavCategory.style.display = 'none';
    } else {
      sideNavCategory.style.display = 'block';
    }
  }

  // Close the sidenav with the close button
  function w3_close() {
    mySidenav.style.display = "none";
    overlayBg.style.display = "none";
  }
  function w3_closecategory() {
    sideNavCategory.style.display = "none";
  }
  $(function(){
    var searchContainer = $("#searchContainer");
  })
  </script>
</body>
</html>
