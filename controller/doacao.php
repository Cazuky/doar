<?php

require("../model/doacao.php");
$action = mysql_real_escape_string($_REQUEST['action']);

$fazer = new doacaoModel;


if ($action=="anunciar") {
  $c['titulo'] = mysql_real_escape_string($_REQUEST['titulo']);
  $c['descricao'] = mysql_real_escape_string($_REQUEST['descricao']);
  $c['categoria_id'] =$_POST['categoria'];
  $c['doador_id'] = $_SESSION['sessaoIdDoador'];
 print_r($_POST);
  $campos = implode(',', array_keys($c));
  //print_r($c);
  $valores = '"'.implode('","', array_values($c)).'"';
  echo $campos.", imagem";
		if ($fazer->publicarDoacao($campos, $valores)) {
		header("Location: index.php");
		}
    else{
      echo "Erro na doacao";
    }
		//require_once("views/profile.php");
	}
if ($action=="profiles") {
	$fazer->showProfiles($cat);
	require_once("views/profiles.php");
	}
if ($action=="search") {
	$searchfor = mysql_real_escape_string($_GET['q']);
	$fazer->search($searchfor);
	require_once("views/search.php");
}
 ?>
