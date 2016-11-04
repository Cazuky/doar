
<?php
require_once("../config/conexao.php");
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
  .bgfilter {background: rgba(0, 0, 0, 0.47)}

  </style>
</head>
<body>
  <!-- Sidenav -->
  <nav class="w3-sidenav w3-white w3-card-2 w3-animate-top w3-center" style="display:none;padding-top:150px" id="mySidenav">
    <a href="javascript:void(0)" onclick="w3_close()" class="w3-closenav w3-right w3-display-topright">
      <i class="fa fa-remove"></i>
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
      <p>Powered by <a href="javascript:void(0)" target="_blank">CEG Developers &copy; <?= date("Y") ?></a></p>
    </footer>
  </nav>
  <!-- Top container -->
  <div class="w3-container w3-top w3-indigo w3-large w3-padding" style="z-index:4">
    <button class="w3-btn w3-transparent w3-right w3-hide-large w3-padding-0 w3-hover-text-grey" onclick="w3_open();"><i class="fa fa-bars fa-2x"></i></button>
    <a href="index.php"><img src="../images/logo.png" class="w3-image w3-margin-left" alt="" width="50em"/></a>
    </div>

  <div class="w3-main w3-padding-0 " style=" margin-top:5em">
    <!-- <div class="w3-bottom w3-padding w3-light-grey">
        <a href="javascript:void(0)" class="w3-left"><i class="fa fa-list w3-text-blue fa-2x"></i></a>
        <a href="javascript:void(0)" class="w3-right"><i class="fa fa-search w3-text-blue fa-2x"></i></a>
    </div> -->
    <div class="w3-container">
      <form class="w3-container w3-col l3 w3-padding-64" autocomplete="off" action="" name="loginForm" method="post" style="float: none; margin: 0 auto">
        <h1 class="w3-xlarge w3-text-grey w3-left"> Entrar agora: </h1>
        <div class="w3-col l12 m12 s12 w3-text-sand w3-smal-round" id="respostalogin"></div>
        <input type="text" name="login" value="" placeholder="email ou telemóvel"
        class="w3-input w3-padding-12 w3-light-blue-grey w3-margin-bottom w3-smal-round">
        <input type="password" name="password" value="" placeholder="senha"
        class="w3-input w3-padding-12 w3-light-blue-grey w3-smal-round">
        <input type="submit" name="name" value="iniciar sessão"
        class="w3-btn-block w3-padding-12 w3-medium w3-blue w3-border w3-border-blue w3-margin-top w3-padding-8">
        <div id="resposta" class="w3-btn-block w3-margin-top w3-border-grey w3-border w3-padding-12 w3-pale-red w3-smal-round" style="display:none"></div>
         <a href="recovery/" class="w3-text-grey w3-medium w3-opacity w3-hover-text-red w3-show-inline-block w3-margin-top"> Esqueci a senha </a> <b class="w3-text-grey">|</b>
        <a href="javascript:void(0)" onclick="document.getElementById('id01').style.display='block'"  class="w3-text-grey w3-opacity w3-hover-text-red">  Não possuo conta </a> <b class="w3-text-white">
        </form>
    </div>
    </div>
    <div id="id01" class="w3-modal bgfilter">
      <div class="w3-modal-content w3-animate-top w3-transparent">
        <div class="w3-container w3-col l5 w3-align-center w3-padding-32 " style="margin: 0 auto; float: none">
          <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-xlarge"> <i class="fa fa-close fa-2x"></i></span>
          <form class="w3-container w3-padding-32 "action ="" autocomplete="off" name="formRegister" id="formRegister" method="post">
            <h2 class="w3-opacity">Regista-te agora:</h2>
            <input type="text" name="nome"  autocomplete="off" placeholder="digite seu nome"
            class="w3-input w3-border-grey w3-border w3-padding-12 w3-light-blue-grey w3-smal-round" required="require">
            <input type="email" name="email" placeholder="digite seu email"
            class="w3-input w3-border-grey w3-margin-top w3-border w3-padding-12 w3-light-blue-grey w3-smal-round" required="require">
            <input type="password" name="senha" placeholder="digite a senha"
            class="w3-input w3-border-grey w3-margin-top w3-border w3-padding-12 w3-light-blue-grey w3-smal-round" maxlength="8" required="require">
            <input type="password" name="password" placeholder="digite a senha novamente" class="w3-margin-top w3-input w3-border-grey w3-border w3-padding-12 w3-light-blue-grey w3-smal-round">
            <input type="tel" name="telemovel" placeholder="digite seu telemovel" maxlenght="9" class="w3-margin-top w3-input w3-border-grey w3-border w3-padding-12 w3-light-blue-grey w3-smal-round" required="require">
              <input type="submit"value="Regista-te" class="w3-btn-block w3-margin-top w3-border-blue w3-border w3-padding-12 w3-yellow w3-smal-round">
              <div id="resposta" class="w3-container w3-margin-top w3-border-grey w3-border w3-padding-12 w3-pale-red w3-smal-round" style="display:none">
              </div>
            </form>
          </div>
        </div>
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
