<?php

namespace App\Controllers;


use Exception;
use App\Models\LivreManager;
use App\Controllers\GlobalController;
// require_once "models/LivreManager.php";


class LivreController {

    private $livreManager;

    public function __construct() {
        $this->livreManager = new LivreManager();
        $this->livreManager->chargementLivres();
    }

    public function afficherLivres() {
        $livres = $this->livreManager->getLivres();
        require "views/livresView.php";
    }

    public function afficherLivre($id) {
        $livre = $this->livreManager->getLivreById($id);
        if (!$livre) {
            throw new Exception('Le livre que vous recherchez n\'existe pas.');
        }
        require "views/afficherLivreView.php";
    }

    public function ajoutLivre() {
        require "views/ajoutLivreView.php";
    }

    public function ajoutLivreValidation() {
        $file = $_FILES['image'];
        $repertoire = "public/images/";
        $image = GlobalController::ajoutImage($_POST['titre'],$file,$repertoire);
        $this->livreManager->ajoutLivreBD($_POST['titre'],$_POST['nbPages'],$image);
        header("location:".URL."livres");
    }

    public function supprimerLivre($id) {
        $monImage = $this->livreManager->getLivreById($id)->getImage();
        unlink("public/images/".$monImage);
        $this->livreManager->supprimerLivreBD($id);
        GlobalController::alert("success","Livre supprimé");
        header("location:".URL."livres");
    }

    public function modifierLivre($id) {
        $livre = $this->livreManager->getLivreById($id);
        require "views/modifierLivreView.php";
    }

    public function modifierLivreValider() {
        $imgActuelle = $this->livreManager->getLivreById($_POST['id'])->getImage();
        $file = $_FILES['image'];

        if ($file['size'] > 0) {
            unlink("public/images/".$imgActuelle);
            $repertoire = "public/images/";
            $imgToAdd = GlobalController::ajoutImage($_POST['titre'],$file,$repertoire);
        } else {
            $imgToAdd = $imgActuelle;
        }
        $this->livreManager->modifierLivreBD($_POST['id'],$_POST['titre'],$_POST['nbPages'],$imgToAdd);
        header("location:".URL."livres");
    }

}