<?php
session_start();
require_once("../config/conexao.php");
require_once("../model/auth.php");
$action = mysql_real_escape_string($_REQUEST['action']);

$execucao = new authModel;

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
    $c['senha'] = md5(mysql_real_escape_string($_POST['password']));
    $c['telemovel'] = mysql_real_escape_string($_POST['telemovel']);
    $campos = implode(',', array_keys($c));
    //print_r($c);
    $valores = '"'.implode('","', array_values($c)).'"';
    $execucao->registerDoador($campos, $valores);
}


 ?>
