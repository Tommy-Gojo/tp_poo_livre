<?php

namespace App\Models;

use App\Models\ModelClass as Model;
use App\Models\UserClass as User;

class UserManager extends Model{
    
    public function findUser($pseudo) {
        $sql = "SELECT * FROM users WHERE pseudo = :pseudo";
        $stmt = $this->getBdd()->prepare($sql);
        $stmt->execute([
            ":pseudo" => $pseudo
        ]);
        $data = $stmt->fetch(\PDO::FETCH_OBJ);
        if ($data) {
            $user = new User($data->id,$data->pseudo,$data->mail,$data->password,$data->role);
            return $user;
        } else {
            return null;
        }
    }
    public function findMail($mail) {
        $sql = "SELECT * FROM users WHERE email = :mail";
        $stmt = $this->getBdd()->prepare($sql);
        $stmt->execute([
            ":mail" => $mail
        ]);
        $data = $stmt->fetch(\PDO::FETCH_OBJ);
        if ($data) {
            $user = new User($data->id_user,$data->pseudo,$data->Mdp,$data->email);
            return $user;
        } else {
            return null;
        }
    }
    public function insertMail($pseudo, $Mdp, $email) {
        $sql = "INSERT INTO users (pseudo, Mdp, email)VALUES (:pseudo, :Mdp, :email)";
        $req = $this->getBdd()->prepare($sql);
        $result = $req->execute([
            ":pseudo"=>$pseudo,
            ":Mdp"=>$Mdp,
            ":email"=>$email
        ]);
    }
    
}