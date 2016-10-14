<?php
session_start();
require_once("../../util/conexao.php");
$con = new conexao;
$sqlcliente = $con->banco->Execute("SELECT * FROM tbl_profissional WHERE tbl_profissional.cli_codigo = ".$_SESSION['sessionusercode']);
if(is_array($_FILES)) {
  $arquivo = $_FILES['imgprofile'];
  //print_r($arquivo);
  $permissao = array('image/jpg','image/jpeg','image/pjpeg','image/gif','image/png');
  $ext =($arquivo['type']=='image/png'? '.png' : ($arquivo['type']=='image/gif'? '.gif' : '.jpg') );
  $diretorio='../../images/';
      $nome_arquivo = md5(time().$arquivo['tmp_name']).$ext;
        $targetPath ='images/'.$nome_arquivo;
      if (in_array($arquivo['type'],$permissao)){
        if (move_uploaded_file($arquivo['tmp_name'],$diretorio.$nome_arquivo)){
            $sqlUpdate=$con->banco->Execute("UPDATE tbl_profissional SET prof_foto = '".$nome_arquivo."' WHERE tbl_profissional.cli_codigo=".$_SESSION['sessionusercode']);
            if ($sqlUpdate) {?>
              <img src="<?php echo $targetPath; ?>" class="w3-circle w3-margin-right w3-margin-bottom" style="width:10em; height:10em; cursor:pointer"/>
            <?php
       }
     }
     }
   }
if ($_POST['a']) {
  $c['cat_id'] = mysql_real_escape_string($_POST['profissao']);
  $c['prov_codigo'] = mysql_real_escape_string($_POST['provincia']);
  $datadenascimento = implode("-", array_values($_POST['data']));
  $c['prof_datadenascimento'] = $datadenascimento;
  $c['prof_sobremim'] = mysql_real_escape_string($_POST['sobremim']);
  $c['cli_codigo'] = $_SESSION['sessionusercode'];
  $campos = implode(",", array_keys($c));
  $values = "'".implode("','", array_values($c))."'";
  $sql = "INSERT INTO tbl_profissional ($campos) VALUES ($values)";
  if ($execute = $con->banco->Execute($sql)) {
    echo '1';
  }
  else {
    echo '0';
  }

}
?>
