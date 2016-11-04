
<?php
session_start();
if (!$_SESSION['sessaoIdDoador']) {
  header("Location:../");
}
else {
require_once("../config/conexao.php");
$geral = new conexao();
$sql = "SELECT * FROM doacao WHERE doador_id=".$_SESSION['sessaoIdDoador'];
$resultado = $geral->banco->Execute($sql);
$sql_cat = "SELECT * FROM categoria";
$resuCat = $geral->banco->Execute($sql_cat);

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Doar</title>
  <link rel="shortcut icon" href="images/favicon.png">
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

  </style>
</head>
<body>
  <!-- Sidenav -->
  <nav class="w3-sidenav w3-white w3-card-2 w3-animate-top w3-center" style="display:none;padding-top:150px" id="mySidenav">
    <a href="javascript:void(0)" onclick="w3_close()" class="w3-closenav w3-right w3-display-topright" style="padding:6px 24px">
      <i class="fa fa-remove"></i>
    </a>
    <a href="javascript:void(0)" onclick="document.getElementById('id01').style.display='block'" class="w3-padding w3-margin w3-btn w3-yellow w3-hover-yellow w3-border w3-border-pale-blue w3-round-large w3-text-blue">Doar agora</a>
    <a href="javascript:void(0)" class="w3-text-grey w3-hover-blue">sobre nós</a>
    <a href="javascript:void(0)" class="w3-text-grey w3-hover-blue">como funciona </a>
    <a href="javascript:void(0)" class="w3-text-grey w3-hover-blue">Políticas e termos</a>
    <a href="javascript:void(0)" class="w3-text-grey w3-hover-blue">contactos</a>
  </nav>
  <!-- Top container -->
  <div class="w3-container w3-top w3-blue w3-large w3-padding" style="z-index:4">
    <button class="w3-btn w3-hide-large w3-padding-0 w3-hover-text-grey" onclick="w3_open();"><i class="fa fa-bars"></i></button>
    <img src="../images/logo.png" class="w3-image w3-margin-left" alt="" width="50em"/>
    <a href="#" class=" w3-right w3-padding"><i class="fa fa-facebook "></i></a>
    <a href="#" class=" w3-right w3-padding"><i class="fa fa-twitter-square "></i></a>
    <a href="#" class=" w3-right w3-padding"><i class="fa fa-google-plus-square "></i></a>
    <a href="../signout/index.php"class=" w3-right w3-padding"><i class="fa fa-sign-out "></i></a>
    <a href="javascript:void(0)" onclick="document.getElementById('id01').style.display='block'"  class="w3-right w3-hide-small w3-hide-medium w3-padding w3-btn w3-yellow w3-hover-yellow w3-border w3-border-pale-blue w3-round-large w3-text-blue">Publicar agora</a>
  </div>

  <div class="w3-main w3-padding-0" style=" margin-top:5em">
    <div class="w3-container w3-center w3-margin" style="">
      <img src="../images/banner_top.jpg" alt="" style="width: 100%" />
    </div>
    <div class="w3-container w3-light-grey">
      <div class="w3-col l10 s12 w3-padding-32" style="float:none; margin: 0 auto">
      <?php
        $page = $_REQUEST['page'];
        $paginas = array ("minhasdoacoes", "perfil","doacao");
        if (in_array($page, $paginas)) {
          require_once("../controller/".$page.".php");
        }
        else {
          require_once("../views/doadorinit.php");
        }

       ?>
      </div>
      <div class="w3-clear">  </div>

    <div id="id01" class="w3-modal">
      <div class="w3-modal-content w3-transparent">
        <div class="w3-container">
          <a href="javascript:void(0)" onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-text-white w3-cursor-pointer" style="cursor:pointer"><i class="fa fa-close"></i></a><br>
          <form class=" w3-container  w3-animate-left" enctype="multipart/form-data" action=""  autocomplete="off" method="post" style="float:none; margin: 0 auto;">
              <div class=" w3-col l6 w3-padding" style="float:none; margin: 0 auto">

                <input class="w3-input w3-padding-large w3-border w3-margin-bottom" type="file" name="imagem" style="outline:none">
                <input class="w3-input w3-padding-large w3-border w3-margin-bottom" type="text" name="titulo" placeholder="coloque um titulo atraente" style="outline:none">
                <textarea class="w3-input w3-padding-large w3-border w3-margin-bottom" type="text" name="descricao" placeholder="coloque uma descrição atraente" style="outline:none; resize:none"></textarea>
                <select class="w3-select w3-margin-bottom " name="categoria">
                  <option value="" disabled="disable">Selecione a categoria</option>
                  <?php while ($regCat = $resuCat->FetchNextObject()): ?>
                    <option  value="<?= $regCat->ID ?>"><?= $regCat->CATEGORIA ?></option>
                  <?php endwhile; ?>
                </select>
                <input type="hidden" name="page" value="doacao">
                <input type="hidden" name="action" value="anunciar">
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
<?php } ?>
