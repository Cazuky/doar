<?php
class  doarModel {
  var $register;
  var $execute;
  var $searchexecute;
  var $searchregister;
  var $regdoarModel;
  var $resudoarModel;
  var $relational;
  var $regRelational;

  function doarModel (){
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
      WHERE (email = '".$login."' AND senha = '".md5($senha)."' AND estado = '".$estado."'
      OR (telemovel = '".$login."'  AND senha = '".md5($senha)."' AND estado = '".$estado."' )))" or die(mysql_error());
      $this->resultado = $this->con->banco->Execute($sql);
      if($this->registos = $this->resultado->FetchNextObject()){
        $_SESSION['sessaoIdDoador'] = $this->registos->ID;
        $_SESSION['sessaoNomeDoador'] = $this->registos->NOME;
        $_SESSION['sessaoEmailDoador'] = $this->registos->EMAIL;
        $_SESSION['sessaoFotoDoador'] = $this->registos->FOTO;
        $_SESSION['sessaoTelemovelDoador'] = $this->registos->TELEMOVEL;
        return true;
      }else {
       return false;
      }
    }
    function doadorPerfil($aluno){
      $sql = "SELECT * FROM doador WHERE doador.id=".$aluno;
      $this->resultado = $this->con->banco->Execute($sql);
      $this->registos = $this->resultado->FetchNextObject();
    }
  function salvarperfil($aluno){
    $sql = "UPDATE doador set nome = '".$_POST['nome']."', email = '".$_POST['email']."', n_matricula = '".$_POST['n_matricula']."',  telemovel = '".$_POST['telemovel']."', provincia = '".$_POST['provincia']."',
    municipio = '".$_POST['municipio']."', complemento = '".$_POST['complemento']."' WHERE alunos.id=".$aluno;
    $this->resultado = $this->con->banco->Execute($sql);
  }
  }

	function viewProfile($id){
		#SELECT tbl_doarModel.*, tbl_clientes.* FROM tbl_clientes JOIN tbl_doarModel ON tbl_clientes.cli_codigo = tbl_doarModel.cli_codigo
		$sql = "SELECT tbl_clientes.*, tbl_doarModel.*, tbl_provincias.*, tbl_CatdoarModel.* FROM tbl_doarModel
    JOIN tbl_CatdoarModel ON tbl_CatdoarModel.id = tbl_doarModel.cat_id
    JOIN tbl_provincias ON tbl_provincias.prov_codigo = tbl_doarModel.prov_codigo
    JOIN tbl_clientes ON tbl_clientes.cli_codigo = tbl_doarModel.cli_codigo WHERE tbl_doarModel.prof_codigo=".$id;
		$this->execute = $this->con->banco->Execute($sql);
		$this->register = $this->execute->FetchNextObject();
	}
  function showProfiles($id){
    $sql = "SELECT tbl_clientes.*, tbl_doarModel.*, tbl_CatdoarModel.*, tbl_provincias.* FROM tbl_doarModel
      JOIN tbl_CatdoarModel ON tbl_CatdoarModel.id = tbl_doarModel.cat_id
      JOIN tbl_clientes   ON tbl_clientes.cli_codigo = tbl_doarModel.cli_codigo
      JOIN tbl_provincias ON tbl_provincias.prov_codigo = tbl_doarModel.prov_codigo WHERE tbl_doarModel.cat_id=".$id;
		$this->resudoarModel = $this->con->banco->Execute($sql);
  }
  function setViews($id){
    $sql="UPDATE tbl_doarModel SET prof_views = prof_views+1 WHERE prof_codigo = ".$id;
    $this->execute = $this->con->banco->Execute($sql);
  }
  function moreannounces($user, $anucode){
    $sql = "SELECT tbl_imagens.*, tbl_anuncios.* from tbl_anuncios
    JOIN tbl_imagens on tbl_anuncios.anu_codigo = tbl_imagens.anu_codigo
    WHERE tbl_anuncios.cli_codigo = $user AND tbl_anuncios.anu_codigo != $anucode
    AND tbl_anuncios.anu_estado = 'Activo'
    GROUP BY tbl_imagens.anu_codigo
    ORDER BY RAND(tbl_anuncios.anu_codigo)";
    $this->moreexecute = $this->con->banco->Execute($sql);
  }

    function relationalProfiles ($catcode, $anucode){
      $sql = "SELECT tbl_clientes.*, tbl_doarModel.*, tbl_provincias.*, tbl_CatdoarModel.* FROM tbl_doarModel
      JOIN tbl_CatdoarModel ON tbl_CatdoarModel.id = tbl_doarModel.cat_id
      JOIN tbl_provincias ON tbl_provincias.prov_codigo = tbl_doarModel.prov_codigo
      JOIN tbl_clientes ON tbl_clientes.cli_codigo = tbl_doarModel.cli_codigo";
    /*   WHERE tbl_doarModel.cat_id = $catcode
      AND  tbl_doarModel.prof_codigo != $anucode
      ORDER BY RAND() LIMIT 4*/
    $this->relational = $this->con->banco->Execute($sql);
    }
    function search ($searchfor){
      $sql ="SELECT tbl_clientes.*, tbl_doarModel.*, tbl_provincias.*, tbl_CatdoarModel.* FROM tbl_doarModel
      JOIN tbl_CatdoarModel ON tbl_CatdoarModel.id = tbl_doarModel.cat_id
      JOIN tbl_provincias ON tbl_provincias.prov_codigo = tbl_doarModel.prov_codigo
      JOIN tbl_clientes ON tbl_clientes.cli_codigo = tbl_doarModel.cli_codigo
      WHERE (tbl_CatdoarModel.nome LIKE '%$searchfor%' OR (tbl_doarModel.prof_sobremim LIKE '%$searchfor%' OR (tbl_clientes.cli_nome LIKE '%$searchfor%')))";
      $this->execute = $this->con->banco->Execute($sql);
    }

    #COMPLETE OR SAVE PROFILE

    function saveprofile($campos, $values){
      $sql = "INSERT INTO tbl_doarModel ($campos) VALUES ($values)";
      $this->execute = $this->con->banco->Execute($sql) or die(mysql_error());
    }
}


 ?>
