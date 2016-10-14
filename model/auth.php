<?php
session_start();
class  authModel {
  var $register;
  var $execute;


  function authModel (){
    $this->con = new conexao ();
  }
  function registerDoador($campos, $valores){
      $sql = "INSERT INTO doador ($campos) VALUES($valores)";
      if($this->resultado = $this->con->banco->Execute($sql)){
        echo 111;
      }else {
        echo mysql_errno();
      }
    }
    function listarDoador(){
      $sql = "SELECT * FROM doador";
      $this->resultado = $this->con->banco->Execute($sql);
    }
    function loginDoador($login, $senha){
      $estado = 1;
      $sql = "SELECT * FROM doador
      WHERE (email = '".$login."' AND senha = '".$senha."' AND estado = '".$estado."'
      OR (telemovel = '".$login."'  AND senha = '".$senha."' AND estado = '".$estado."' ))" or die(mysql_error());
      $this->execute = $this->con->banco->Execute($sql);
      if($this->register = $this->execute->FetchNextObject()){
        $_SESSION['sessaoIdDoador'] = $this->register->ID;
        $_SESSION['sessaoNomeDoador'] = $this->register->NOME;
        $_SESSION['sessaoEmailDoador'] = $this->register->EMAIL;
        $_SESSION['sessaoFotoDoador'] = $this->register->FOTO;
        $_SESSION['sessaoTelemovelDoador'] = $this->register->TELEMOVEL;
        return true;
      }else {
       return false;
      }
    }

}


 ?>
