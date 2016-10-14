<?php
session_start();
//require("util/funcoes.php");
require("../model/doar.php");
$action = mysql_real_escape_string($_REQUEST['a']);
$cat = mysql_real_escape_string($_REQUEST['cat']);
$anu_codigo= $_REQUEST['anu_codigo'];
$img_codigo= $_REQUEST['img_codigo'];
$cli_codigo = $_SESSION['sessao_cli_codigo'];
$id = mysql_real_escape_string($_REQUEST['id']);

$fazer = new doarModel;

if ($action=="login"){
	$login = mysql_real_escape_string($_POST['login']);
	$senha = mysql_real_escape_string($_POST['password']);
 if ($execucao->loginDoador($login, md5($senha))):
	 echo '1';
 else:
	 echo mysql_errno();
 endif;
}
if ($action =="register") {
    $c['nome'] = mysql_real_escape_string($_POST['nome']);
    $c['email'] = mysql_real_escape_string($_POST['email']);
    $c['senha'] = mysql_real_escape_string($_POST['password']);
    $c['telemovel'] = mysql_real_escape_string($_POST['telemovel']);
    $campos = implode(',', array_keys($c));
    //print_r($c);
    $valores = '"'.implode('","', array_values($c)).'"';
    $execucao->register($campos, $valores);
}

if ($action=="views") {
		$fazer->viewProfile($id);
		$fazer->SetViews($id);
		$fazer->relationalProfiles($fazer->register->ID, 	$fazer->register->PROF_CODIGO);
		require_once("views/profile.php");
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
