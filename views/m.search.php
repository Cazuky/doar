<?php
if ($fazer->execute->numRows() ==0) {
  echo '<h1 class="w3-center w3-padding-128 w3-text-grey w3-white">Nenhum anúncio nesta categoria</h1><br><br><br><br><br><br>';
}else{
  //print_r($fazer->execute->FetchNextObject());
  while($fazer->register = $fazer->execute->FetchNextObject()): ?>
<div class="w3-card-4">
  <header class="w3-container w3-light-grey">
    <h6 class="w3-center"><?= strtoupper($fazer->register->TITULO);?></h6>
  </header>
  <div class="w3-container">
    <img src="../images/doacao/<?= $fazer->register->IMAGEM?>" alt="<?=  $fazer->register->IMAGEM->TITULO?> " width="100" height="100" class="w3-left w3-margin-right">
    <p class="w3-justify"><?= $fazer->register->DESCRICAO?></p>
  </div>
  <div class="w3-container">
    <span class="w3-right">&nbsp;|&nbsp;<i class="fa fa-calendar w3-text-blue"></i> <?= configdate($fazer->register->DATA)?></span>
    <span class="w3-right"><i class="fa fa-map-marker w3-text-blue"></i> <?= $fazer->register->LOCALIZACAO?> </span>
  </div>
  <a href="?page=desapego&action=details&id=<?= $fazer->register->DOAID?>" class="w3-btn-block w3-blue w3-margin-top">Receber desapego</a>
</div>
<?php endwhile; } ?>
