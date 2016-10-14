<?php
class  doacaoModel {
  var $register;
  var $execute;

  function doacaoModel (){
    $this->con = new conexao ();
  }
  function publicarDoacao($campos, $valores){
    $arquivo = $_FILES['imagem'];
    //print_r($_POST);
    $permissao = array('image/jpg','image/jpeg','image/pjpeg','image/gif','image/png');
    $ext =($arquivo['type']=='image/png'? '.png' : ($arquivo['type']=='image/gif'? '.gif' : '.jpg') );
    $diretorio='../images/doacao/';
    $nome_arquivo = md5(time().$arquivo['tmp_name']).$ext;
    //$targetPath ='images/'.$nome_arquivo;
    if (in_array($arquivo['type'],$permissao)){
      if (move_uploaded_file($arquivo['tmp_name'],$diretorio.$nome_arquivo)){
        $sql = "INSERT INTO doacao ($campos,imagem) VALUES($valores,'".$nome_arquivo."')";
        if($this->execute = $this->con->banco->Execute($sql)){
          return true;
        }
        else{
          return false;
        }
      }
    }


  }

}


?>
