<?php

namespace App\Models;

use Exception;
use PDO;

require_once "ModelClass.php";
require_once "LivreClass.php";

class LivreManager extends ModelClass {

    private $livres;

    public function ajoutLivre($livre) {
        $this->livres[] = $livre;
    }

    public function getLivres() {
        return $this->livres;
    }

    public function getLivreById($id) {
        foreach($this->livres as $livre) {
            if ($livre->getId() === $id) {
                return $livre;
            }
        }
        throw new Exception('Le livre que vous cherchez n\'existe pas');
    }

    public function chargementLivres() {
        $sql = "SELECT * FROM livres";
        $req = $this->getBdd()->prepare($sql);
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        foreach($data as $value) {
            $add = new Livre($value->id_livre,$value->titre_livre,$value->nBPage_livre,$value->img_livre);
            $this->ajoutLivre($add);
        }
    }

    public function ajoutLivreBD($titre,$nbPages,$image){
        $sql = "INSERT INTO livre (titre, nbPages, image) values (:titre,:nbPages,:image)";
        $req = $this->getBdd()->prepare($sql);
        $result = $req->execute([
            ":titre"=>$titre,
            ":nbPages"=>$nbPages,
            ":image"=>$image
        ]);
    }

    public function supprimerLivreBD($id) {
        $sql = "DELETE FROM livre WHERE id = :id";
        $req = $this->getBdd()->prepare($sql);
        $result = $req->execute([
            ":id" => $id
        ]);
    }

    public function modifierLivreBD($id,$titre,$nbPages,$image) {
        $sql = "UPDATE livre SET titre = :titre, nbPages = :nbPages, image = :image WHERE id = :id";
        $req = $this->getBdd()->prepare($sql);
        $req->execute([
            ":titre" => $titre,
            ":nbPages" => $nbPages,
            ":image" => $image,
            ":id" => $id
        ]);
    }
}