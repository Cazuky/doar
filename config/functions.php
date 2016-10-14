<?php

function configdate ($data){
  $data = explode(" ", $data);
  $data = $data[0];
  $data = explode("-", $data);
  $data = $data[2]."-".$data[1]."-".$data[0];
  return($data);
}
function configestado ($estado){
  $estado = ($estado==1 ? '<i class="fa fa-circle w3-text-green"></i>':($estado==2 ? '<i class="fa fa-circle w3-text-yellow"></i>':'<i class="fa fa-circle w3-text-red"></i>') );
  return $estado;
}
function configGenero ($genero){
  if ($genero==0) {
    echo '<span><i class="fa fa-male w3-text-blue"></i> Masculino</span>';
  }
  else{
    echo '<span><i class="fa fa-female w3-text-blue"></i> Feminino</span>';
  }
}
function configFoto ($foto){
  if ($foto == "") {
  echo '<p class="w3-grey w3-circle w3-row-padding w3-padding-32 w3-center" style="width:120px"><i class="fa fa-photo fa-4x w3-text-sand"></i> </p>';
  }
  else {
    echo '<span class="w3-center"><img class="w3-show-block w3-padding-32" src="../img/uploadFoto/'.$foto.'" width="100" style="float:none; margin: 0 auto"></img></span>';
  }
}
function configEndereco($provincia, $municipio, $complemento){
  $endereco = $provincia."".$municipio."".$complemento;
  $endereco = ($endereco=="" ? '<span class="w3-opacity">edite agora o seu endereço</span>' : $endereco);
  echo $endereco;
}
function configPacote ($pacote){
  $pacote = ($pacote ==0 ? "Base" : ($pacote==1 ? "Premium" : "Avançado"));
  return $pacote;
}
 ?>
