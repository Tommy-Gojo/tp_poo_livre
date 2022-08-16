<?php ob_start() ?>

<?php
  if( isset($_GET['logout']) && $_GET['logout'] == 1 ) {
    session_destroy();
  }
?>

<?php
$titre = "Page d'accueil";
$content = ob_get_clean();
require_once "App/Views/template.php";