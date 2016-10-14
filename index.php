
<?php
require_once("config/conexao.php");
$geral = new conexao();
$sql ="SELECT doacao.*, doador.*, categoria.* FROM doacao
JOIN categoria ON categoria.id = doacao.categoria_id
JOIN doador ON doador.id = doacao.doador_id";

$ExecuteDoar = $geral->banco->Execute($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Doar</title>
  <link rel="shortcut icon" href="images/favicon.png">
  <link rel="stylesheet" href="css/w3.css" media="all">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="css/hover.css" media="all">
  <link rel="stylesheet" href="css/font-awesome.css" media="screen" title="no title">
  <link rel="stylesheet" type="text/css" href="css/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="css/slick/slick-theme.css"/>
  <link rel="stylesheet" href="css/custom.css" media="all">
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="css/slick/slick.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>

  <style media="screen">
  body{margin: 0; paddin: 0; box-sizing: border-box}
  input{outline: none}
  .backimg {background: url('img/back.jpg') no-repeat}
  .filter {width: 100%; height: 100%; position: fixed; background: rgba(0, 0, 0, 0.47)}
  a{text-decoration: none}
  .cursor-pointer {cursor: pointer}

  </style>
</head>
<body>
  <!-- Sidenav -->
  <nav class="w3-sidenav w3-white w3-card-2 w3-animate-top w3-center" style="display:none;padding-top:150px" id="mySidenav">
    <a href="javascript:void(0)" onclick="w3_close()" class="w3-closenav w3-right w3-display-topright" style="padding:6px 24px">
      <i class="fa fa-remove"></i>
    </a>
    <a href="javascript:void(0)" class="w3-padding w3-margin w3-btn w3-yellow w3-hover-yellow w3-border w3-border-pale-blue w3-round-large w3-text-blue">Doar agora</a>
    <a href="javascript:void(0)" class="w3-text-grey w3-hover-blue">sobre nós</a>
    <a href="javascript:void(0)" class="w3-text-grey w3-hover-blue">como funciona </a>
    <a href="javascript:void(0)" class="w3-text-grey w3-hover-blue">Políticas e termos</a>
    <a href="javascript:void(0)" class="w3-text-grey w3-hover-blue">contactos</a>
  </nav>
  <!-- Top container -->
  <div class="w3-container w3-top w3-blue w3-large w3-padding" style="z-index:4">
    <button class="w3-btn w3-hide-large w3-padding-0 w3-hover-text-grey" onclick="w3_open();"><i class="fa fa-bars"></i></button>
    <img src="images/logo.png" class="w3-image w3-margin-left" alt="" width="50em"/>
    <a href="#" class=" w3-right w3-padding"><i class="fa fa-facebook "></i></a>
    <a href="#" class=" w3-right w3-padding"><i class="fa fa-twitter-square "></i></a>
    <a href="#" class=" w3-right w3-padding"><i class="fa fa-google-plus-square "></i></a>
    <a href="javascript:void(0)" onclick="document.getElementById('id01').style.display='block'" class=" w3-right w3-padding"><i class="fa fa-search "></i></a>
    <a href="login.php" class="w3-right w3-hide-small w3-hide-medium w3-padding w3-btn w3-yellow w3-hover-yellow w3-border w3-border-pale-blue w3-round-large w3-text-blue">Doar agora</a>
  </div>

  <div class="w3-main w3-padding-0" style=" margin-top:5em">
    <div class=" w3-display-container " style="width: 100%">
      <div class="SlideSlick">
        <div><img class="" src="images/banner1.jpg" style="width:100%"></div>
        <div><img class="" src="images/banner2.jpg" style="width:100%"></div>
        <div><img class="" src="images/banner4.jpg" style="width:100%"></div>
      </div>
    </div>
    <div class="w3-container w3-center w3-margin" style="">
      <img src="images/banner_top.jpg" alt="" style="width: 100%" />
    </div>
    <div class="w3-container w3-light-grey">
      <?php
        $page = $_REQUEST['page'];
        $paginas = array ("minhasdoacoes", "perfil","doacao");
        if (in_array($page, $paginas)) {
          require_once("../controller/".$page.".php");
        }
        else {
          require_once("views/doarinit.php");
        }
        ?>


    </div>
    <!-- PORTIFOLIO -->
    <div class="w3-row w3-white " >
      <div class=" w3-container " style="width:80%; margin:0 auto; height:100%; position:relative;">

        <div class="w3-content w3-padding-hor-64" style="">
          <h3 class="vn-title w3-padding-32 w3-center " id="portifolio" style="width:100%">
            NOSSOS PARCEIROS
          </h3>
          <div class="w3-row">
            <div class="w3-col l2 s4 w3-padding">
              <a href="www.kanjaya.net">
                <img class="w3-image" src="images/kanjaya.png" alt="Kanjaya Logo" style="widt%" />
              </a>
            </div>
            <div class="w3-col l2 s4  w3-padding ">
              <a href="#"><img  class="w3-image " src="images/vandjalogo.png" alt="Vandja Media logo" style="width:60k%" /></a>
            </div>
            <div class="w3-col l2 s4 w3-padding ">
              <img src="images/firme.png" alt=""  class="w3-image   " style="width:60l%" />
            </div>
            <div class="w3-col l2 s4 w3-padding ">
              <img src="images/unia.png" alt=""  class="w3-image   " style="width:6l0%" />
            </div>
            <div class="w3-col l2 s4  w3-padding">
              <img src="images/king.png" alt=""  class="w3-image   " style="width:60l%" />
            </div>
            <div class="w3-col l2 s4  w3-padding">
              <a href="#"><img  class="w3-image " src="images/vivasapatos.png" alt="Vandja Media logo" style="width:60k%" /></a>          </div>
            </div>
          </div>
        </div>
      </div>

      <!-- MODAL SEARCH

      -->
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
      <!-- Footer -->
      <footer class="w3-container w3-padding-16 w3-light-grey w3-center">
        <img src="images/logo.png" alt="" width="70px" />
        <p>Powered by <a href="javascript:void(0)" target="_blank">CEG Developers &copy; <?= date("Y") ?></a></p>
      </footer>
    </div>
  <script>
  // Get the Sidenav
  var mySidenav = document.getElementById("mySidenav");

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

  // Close the sidenav with the close button
  function w3_close() {
    mySidenav.style.display = "none";
    overlayBg.style.display = "none";
  }
  </script>
</body>
</html>
