<?php

namespace App\Models;

abstract class ModelClass{
    private static $Pdo; 
    
    private function setBdd(){
        SELF::$Pdo = new \pdo ("mysql:host=localhost;dbname=les_livres;charset=utf8","root","");
        SELF::$Pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);
        
    }

    protected function getBdd(){
        if(SELF::$Pdo === null){
            $this->setBdd();
        }
        return SELF::$Pdo;
    }
    
}


?>