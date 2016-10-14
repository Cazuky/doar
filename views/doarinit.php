<div class="w3-twothird w3-padding-32">
<?php while($RegisterDoar = $ExecuteDoar->FetchNextObject()):?>
<div class="w3-card-4 w3-margin w3-white" style="height:15em">
  <img src="images/doacao/<?= $RegisterDoar->IMAGEM?>" alt="" class="w3-col l3 m3 s6"  width="140px"height="100%" />
  <div class="w3-container">
    <h3 class=""><?= $RegisterDoar->TITULO?></h3>
    <div class="w3-row-padding ">
      <p>
        <?= $RegisterDoar->DESCRICAO?>
      </p>
      <span class="w3-right"> <i class="fa fa-map-marker w3-text-blue"></i>&nbsp; Luanda, Samba</span>
      <span class="w3-right"> <i class="fa fa-calendar w3-text-blue"></i>&nbsp; <?= configdate($RegisterDoar->DATAREGISTO)?> &nbsp;</span>
      <span class="w3-right"> <i class="fa fa-user w3-text-blue"></i>&nbsp; <?= $RegisterDoar->NOME?> &nbsp;</span><br>
      <a href="javascript:void(0)" class=" hvr-curl-b w3-btn w3-right w3-yellow w3-margin-top w3-text-blue w3-margin-bottom w3-border  w3-border-blue">Receber doação</a>
    </div>
  </div>
</div>
</div>
<?php endwhile; ?>

<div class="w3-third w3-padding-16">
  <h2 class="w3-bottombar w3-border-blue w3-center">Vê também</h2>
  <ul class="w3-ul w3-card-4">
    <li class="w3-padding-16 w3-container w3-white">
      <img src="images/doacao/sandalia.jpg" class="w3-col l3 s2" style="">
      <h4 class="">Doo uma calção de praia</h4>
      <span class="w3-center"> <i class="fa fa-map-marker w3-text-blue"></i>&nbsp; Luanda, Samba</span>
      <span class="w3-center"> <i class="fa fa-calendar w3-text-blue"></i>&nbsp; 10-Out-2016 &nbsp;</span>
    </div>
  </li>
</ul>
