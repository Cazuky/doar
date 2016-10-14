<?php
class dadosmodel {
	var $registos;
	var $resultados;


	function dadosmodel (){
		$this->con = new conexao();
		}
	function mudarinformacoes(){
			$sql="SELECT * FROM tbl_clientes WHERE cli_codigo=".$_SESSION['sessao_cli_codigo'];
			$this->resultados = $this->con->banco->Execute($sql);
			$this->registos = $this->resultados->FetchNextObject();
		}
	function salvarmudancaspessoas(){
		$sql="UPDATE tbl_clientes SET cli_nome = '".$_REQUEST['cli_nome']."', cli_sobrenome = '".$_REQUEST['cli_sobrenome']."', cli_telemovel = '".$_REQUEST['cli_telemovel']."', cli_tipo = '".$_REQUEST['cli_tipo']."' WHERE cli_codigo=".$_SESSION['sessao_cli_codigo'];
		if($this->resultados = $this->con->banco->Execute($sql))
			sucesso("Informações alteradas");
		else
			erro ("Verifique os campos");
	}
}

?>
