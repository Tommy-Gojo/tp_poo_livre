<?php ob_start() ?>

<div class="row">
    <div class="col-6">
        <img src="<?=URL?>public/images/<?=$livre->getImage()?>" alt="">
    </div>
    <div class="col-6">
        <p>Titre : <?=$livre->getTitre()?></p>
        <p>Pages : <?=$livre->getNbPages()?></p>
    </div>
</div>

<?php
$titre = $livre->getTitre();
$content = ob_get_clean();
require_once "App/Views/template.php";