<?php

  if ($resultado->numRows()==0) {
      echo '<p class="w3-center w3-xxlarge w3-opacity"> Nehuma doação feita, publique agora</p>';
  }else {
    while ($registos = $resultado->FetchNextObject()):
 ?>
<div class="w3-card-4 w3-margin w3-white" style="height:auto">
  <img src="../images/doacao/<?= $registos->IMAGEM?>" alt="" class="w3-col l25 m3 s6" />
  <div class="w3-container">
    <h3 class=""><?= $registos->TITULO ?></h3>
    <div class="w3-row-padding ">
      <p>
        <?= $registos->DESCRICAO?>
      </p>
      <span class="w3-right"> <i class="fa fa-map-marker w3-text-blue"></i>&nbsp; Luanda, Samba</span>
      <span class="w3-right"> <i class="fa fa-calendar w3-text-blue"></i>&nbsp; 10-Out-2016 &nbsp;</span>
      <span class="w3-right"> <i class="fa fa-user w3-text-blue"></i>&nbsp; <?= $_SESSION['sessaoNomeDoador'] ?> &nbsp;</span><br>

    </div>
  </div>
</div>
<?php endwhile; } ?>
