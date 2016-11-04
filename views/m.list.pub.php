<?php while($registos = $ExecuteDoar->FetchNextObject()): ?>
<div class="w3-card-4">
  <header class="w3-container w3-light-grey">
    <h6 class="w3-center"><?= strtoupper($registos->TITULO);?></h6>
  </header>
  <div class="w3-container">
    <img src="../images/doacao/<?= $registos->IMAGEM?>" alt="Avatar" width="100" height="100" class="w3-left w3-margin-right">
    <p class="w3-justify"><?= $registos->DESCRICAO?></p>
  </div>
  <div class="w3-container">
    <span class="w3-right">&nbsp;| &nbsp;<i class="fa fa-calendar w3-text-blue"></i> <?= configdate($registos->DATA)?></span>
    <span class="w3-right"><i class="fa fa-map-marker w3-text-blue"></i> <?= $registos->LOCALIZACAO?> </span>
  </div>
  <a href="?page=desapego&action=details&id=<?= $registos->DOAID?>" class="w3-btn-block w3-blue w3-margin-top">Receber desapego</a>
</div>
<?php endwhile; ?>
