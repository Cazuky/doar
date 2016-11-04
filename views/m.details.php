<div class="w3-card-2 w3-white w3-margin-top">
  <img src="../images/doacao/<?= $fazer->register->IMAGEM?>" width="100%" alt="<?= $fazer->register->TITULO?> ">
  <div class="w3-container w3-center">
    <h6><?= strtoupper($fazer->register->TITULO);?></h6>
    <p>
      <?= $fazer->register->DESCRICAO?>
    </p>
  </div>
</div>
<div class="w3-card-2 w3-padding w3-white w3-margin-top">
  <p><i class="fa fa-tag w3-text-blue"></i> <?= $fazer->register->CATEGORIA?></p>
  <p><i class="fa fa-calendar w3-text-blue"></i> <?= configdate($fazer->register->DATA)?></p>
  <p><i class="fa fa-user w3-text-blue"></i> <?= $fazer->register->NOME?></p>
  <p><i class="fa fa-envelope w3-text-blue"></i> <?= $fazer->register->EMAIL?></p>
  <p><i class="fa fa-phone w3-text-blue"></i> <?= $fazer->register->TELEMOVEL?></p>
</div>
<div class="w3-card-2 w3-padding-16 w3-row-padding w3-white w3-margin-top">
  <h3 class="w3-opacity">Contacte agora:</h3>
  <form class="" action="" method="post">
    <input type="text" name="nome" placeholder="Nome" class="w3-input ">
    <textarea name="mensagem" class="w3-input w3-margin-top" rows="8" cols="35" placeholder="Estou interesado na sua publicação, por favor ligue-me, para que eu possa obter mais detalhes" style="resize:none; outline:none"></textarea>
    <input type="submit" name="name" value="Enviar mensagem" class="w3-btn-block w3-margin-top w3-blue">
  </form>
</div>
<br>
