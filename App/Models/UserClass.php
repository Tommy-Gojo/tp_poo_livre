<?php

namespace App\Models;

class UserClass {

    private $id;
    private $pseudo;
    private $mail;
    private $password;
    private $role;

    public function __construct($id, $pseudo, $mail, $password){
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->mail = $mail;
        $this->password = $password;
        
    }

    public function getId(){
        return $this->id;
    }
    public function getPseudo(){
        return $this->pseudo;
    }
    public function getMail(){
        return $this->mail;
    }
    public function getPassword(){
        return $this->password;
    }
   

    public function setId($id){
        $this->id = $id;
    }
    public function setPseudo($pseudo){
        $this->pseudo = $pseudo;
    }
    public function setMail($mail){
        $this->mail = $mail;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    
}