
<?php
require_once("../config/conexao.php");
$geral = new conexao();
$sql ="SELECT doacao.*, doador.*, categoria.* FROM doacao
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
  <link rel="stylesheet" href="../css/font-awesome.css" media="screen" title="no title">
  <link rel="stylesheet" href="../css/carrousel/style3.css" media="all">
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
<body id="page">
    <ul class="cb-slideshow" style="list-style:none">
        <li><span></span><div><h4 class="w3-text-white w3-xxlarge"></h4></div></li>
        <li><span></span><div><h4 class="w3-text-white w3-xxlarge"></h4></div></li>
        <li><span><!--Image 03--></span><div><h4 class="w3-xxlarge w3-text-white"></h4></div></li>
        <li><span></span><div><h3></h3></div></li>
        <li><span></span><div><h3></h3></div></li>
        <li><span></span><div><h3></h3></div></li>
    </ul>
    <div class="filter">
      <div class="w3-container">
        <ul class="w3-ul w3-padding-32" style="float:none; margin: 0 auto">
            <li class="w3-padding-24 w3-border-0">
              <img src="../images/balloons.svg" class="w3-left" style="width:100px">
              <span class="w3-text-white w3-xlarge"></span><br>
              <span class="w3-text-white">Quando gastamos com outras pessoas, sentimo-nos melhor.</span>
            </li>
            <li class="w3-padding-24 w3-border-0">
              <img src="../images/gift.svg" class="w3-left" style="width:100px">
              <span class="w3-text-white w3-xlarge"></span><br>
              <span class="w3-text-white">Não deixe o consumismo consumir você, lembre-se que lixo de alguns é tesouro de outros</span>
            </li>
            <li class="w3-padding-24 w3-border-0">
              <img src="../images/musical.svg" class="w3-left" style="width:100px">
              <span class="w3-text-white w3-xlarge"></span><br>
              <span class="w3-text-white w3-medium">O segredo da vida, está nas coisas mais simples. </span>
            </li>
        </ul>
        <a href="?continue=true" class="w3-btn-block  w3-blue w3-border w3-padding">Continuar <i class="fa fa-arrow-right"></i></a>
        <a href="login.php" class="w3-btn-block w3-margin-top w3-transparent w3-border w3-padding">Doar agora <i class="fa fa-user"></i></a>
      </div>
    </div>
    <?php
        if (isset($_REQUEST['continue'])) {
          header("Location:index.php");
        }
     ?>

</body>
</html>
