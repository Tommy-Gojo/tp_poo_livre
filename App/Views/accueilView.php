<?php ob_start() ?>

<p>Accueil</p>

<?php
$titre = "Page d'accueil";
$content = ob_get_clean();
require_once "App/Views/template.php";