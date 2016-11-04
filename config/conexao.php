<?php
require ("adodb/adodb.inc.php");
require("functions.php");
class conexao {
	var $banco;
	function conexao (){
		$this->banco = NewADOConnection ("mysql");
		$this->banco->dialect=3;
		$this->banco->debug=false;
		//$this->banco->connect ("localhost", "u162066525_root", "1q2w3e4r5t6y", "u162066525_doar")  or die($this->banco->ErrorMsg());
		$this->banco->connect ("localhost", "root", "", "doar")  or die($this->banco->ErrorMsg());

		$this->banco->Execute("SET NAMES 'utf8'");
		$this->banco->Execute('SET character_set_connection=utf8');
		$this->banco->Execute('SET character_set_client=utf8');
		$this->banco->Execute('SET character_set_results=utf8');
	}
}
$con = new conexao();


?>
