<?php
  session_start();
  require_once("conexao.php");
  $conexao = new conexao;
  $foto = $_FILES['foto'];


  $ext = ($foto['type']== "image/png" ? ".png" : ($foto['type']== "image/gif" ? ".gif" : "jpg"));
  $permissao = array("image/png", "image/jpg", "image/pjpg", "image/jpeg", "image/gif");
  $directorio = "../img/uploadFoto/";
  if (in_array($foto['type'], $permissao)) {
    $nomeDaFoto = md5(time()."".date("d-m-yyyy")."".$foto['name']).$ext;
    if (move_uploaded_file($foto['tmp_name'], $directorio.$nomeDaFoto )) {
      $sql= "UPDATE alunos SET foto = '".$nomeDaFoto."' WHERE alunos.id=".$_SESSION['sessaoAlunCodigo'];
      if ($conexao->banco->Execute($sql)) {
        echo '<img src="'.$directorio.$nomeDaFoto.'" class="w3-padding-32 w3-show-block" style="float:none; margin: 0 auto" width="100"></img>';
      }
      else {
        echo "Erro ao salvar a imagem, contacte ao ADMINISTRADOR";
      }
    }
  }

 ?>
