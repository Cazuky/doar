
<?php
session_start();
if ($_SESSION['sessaoIdDoador']) {
  header("Location: doador/");
}
else{
require("config/conexao.php");
print_r($_SESSION);
$con_geral = new conexao;

?>
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <title>Doar | Login</title>
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
    <meta name="viewport" content="width=device-width">
    <style media="screen">
    body{margin: 0; paddin: 0; box-sizing: border-box}
    input{outline: none}
    .backimg {background: url('images/02.jpg') no-repeat}
    .filter {width: 100%; height: 100%; position: fixed; background: rgba(0, 0, 0, 0.47)}
    a{text-decoration: none}
    .w3-display-middlemiddle{position:absolute;left:0;bottom:50%; top: 10%; width:100%;text-align:center}
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
    <div class="w3-container w3-padding-0" style=" margin-top: 4.39em">
      <form class="w3-container w3-col l3 w3-padding-64" autocomplete="off" action="" name="loginForm" method="post" style="float: none; margin: 0 auto">
        <h1 class="w3-xlarge w3-text-grey w3-left"> Entrar agora: </h1>
        <div class="w3-col l12 m12 s12 w3-text-sand w3-smal-round" id="respostalogin"></div>
        <input type="text" name="login" value="" placeholder="email ou telemóvel"
        class="w3-input w3-border-blue w3-border w3-padding-12 w3-light-blue-grey w3-margin-bottom w3-smal-round">
        <input type="password" name="password" value="" placeholder="senha"
        class="w3-input w3-border-blue w3-border w3-padding-12 w3-light-blue-grey w3-smal-round">
        <input type="submit" name="name" value="iniciar sessão"
        class="w3-btn-block w3-padding-12 w3-text-blue w3-medium w3-yellow w3-border w3-border-blue w3-margin-top w3-padding-8">
        <div id="resposta" class="w3-btn-block w3-margin-top w3-border-grey w3-border w3-padding-12 w3-pale-red w3-smal-round" style="display:none"></div>
         <a href="recovery/" class="w3-text-grey w3-medium w3-opacity w3-hover-text-red w3-show-inline-block w3-margin-top"> Esqueci a senha </a> <b class="w3-text-grey">|</b>
        <a href="javascript:void(0)" onclick="document.getElementById('id01').style.display='block'"  class="w3-text-grey w3-opacity w3-hover-text-red">  Não possuo conta </a> <b class="w3-text-white">
        </form>

        <!-- RODAPE -->
        <div class="w3-clear"><div>
      </div>
      <div id="id01" class="w3-modal w3-white">
        <div class="w3-modal-content w3-animate-top w3-transparent">
          <div class="w3-container w3-col l5 w3-align-center " style="margin: 0 auto; float: none">
            <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-xlarge">&times;</span>
            <form class="w3-container "action ="" autocomplete="off" name="formRegister" id="formRegister" method="post">
              <h2 class="w3-opacity">Regista-te agora:</h2>
              <input type="text" name="nome"  autocomplete="off" placeholder="digite seu nome"
              class="w3-input w3-border-grey w3-border w3-padding-12 w3-light-blue-grey w3-smal-round" required="require">
              <input type="email" name="email" placeholder="digite seu email"
              class="w3-input w3-border-grey w3-margin-top w3-border w3-padding-12 w3-light-blue-grey w3-smal-round" required="require">
              <input type="password" name="senha" placeholder="digite a senha"
              class="w3-input w3-border-grey w3-margin-top w3-border w3-padding-12 w3-light-blue-grey w3-smal-round" maxlength="8" required="require">
              <input type="password" name="password" placeholder="digite a senha novamente" class="w3-margin-top w3-input w3-border-grey w3-border w3-padding-12 w3-light-blue-grey w3-smal-round">
              <input type="tel" name="telemovel" placeholder="digite seu telemovel" maxlenght="9" class="w3-margin-top w3-input w3-border-grey w3-border w3-padding-12 w3-light-blue-grey w3-smal-round" required="require">
                <input type="submit"value="Regista-te" class="w3-btn-block w3-margin-top w3-border-red w3-border w3-padding-12 w3-pale-red w3-smal-round">
                <div id="resposta" class="w3-container w3-margin-top w3-border-grey w3-border w3-padding-12 w3-pale-red w3-smal-round" style="display:none">
                </div>
              </form>
            </div>
          </div>
        </div>
        <script>
        // Get the Sidenav
        var firstside = document.getElementById("firstside");

        // Get the DIV with overlay effect
        var secondside = document.getElementById("secondside");

        // Toggle between showing and hiding the sidenav, and add overlay effect
        function w3_open() {
          if (firstside.style.display === 'block') {
            firstside.style.display = 'none';
            secondside.style.display='block';
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
      <?php  } ?>
