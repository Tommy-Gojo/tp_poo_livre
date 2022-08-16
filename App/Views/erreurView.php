<?php ob_start() ?>

<div class="alert alert-danger text-center my-5">
    <?=$msg?>
</div>

<?php
$titre = "Erreur";
$content = ob_get_clean();
require_once "App/Views/template.php";