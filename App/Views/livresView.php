<?php 
ob_start();

if (!empty($_SESSION['alert'])) {
?>
<div class="alert alert-<?=$_SESSION['alert']['type']?> text-center">
    <?=$_SESSION['alert']['msg']?>
</div>
<?php
unset($_SESSION['alert']);
}
?>

<table class="table text-center">
    <tr class="table-dark">
        <th>Image</th>
        <th>Titre</th>
        <th>Nombre de pages</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php
    foreach($livres as $livre) {
    ?>
    <tr>
        <td class="align-middle"><img src="public/images/<?=$livre->getImage()?>" alt="" width="60px;"></td>
        <td class="align-middle"><a href="<?=URL?>livres/lire/<?=$livre->getId()?>"><?= $livre->getTitre() ?></a></td>
        <td class="align-middle"><?= $livre->getNbPages() ?></td>
        <td class="align-middle"><a href="<?=URL?>livres/modifier/<?=$livre->getId()?>" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle"><form action="<?=URL?>livres/supprimer/<?=$livre->getId()?>" onsubmit="confirm('voulez vous vraiment supprimer ce livre ?')"><button class="btn btn-danger">Supprimer</button></form></td>
    </tr>
    <?php
    }
    ?>
</table>
<a href="<?=URL?>livres/ajouter" class="btn btn-success d-block">Ajouter</a>

<?php
$titre = "Liste des livres";
$content = ob_get_clean();
require_once "App/Views/template.php";