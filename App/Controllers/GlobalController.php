<?php 
namespace App\Controllers;
use Exception;
abstract class GlobalController{

    public static function ajoutImage($title,$file,$dir){
        if(!isset($file['name']) || empty($file['name']))
            throw new Exception("Vous devez indiquer une image");
            //verifier s'il y a une image dans le form
    
        $extension = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        //extension du fichier 
        $random = rand(0,99999);
        //numéro aléatoire

        $file['name']=str_replace(" ","_",$title.".".$extension);
        // Ajout des _ sur les espaces et remplacement du titre du fichier par le nom du livre et l'extension
        
        $target_file = $dir.$random."_".$file['name'];
        //nom définitif
        
        //ci-dessous tout les tests necessaires et l'upload definitif
        if(!getimagesize($file["tmp_name"]))
            throw new Exception("Le fichier n'est pas une image");
        if($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
            throw new Exception("L'extension du fichier n'est pas reconnu");
        if(file_exists($target_file))
            throw new Exception("Le fichier existe déjà");
        if($file['size'] > 1000000)
            throw new Exception("Le fichier est trop gros");
        if(!move_uploaded_file($file['tmp_name'], $target_file))
            throw new Exception("l'ajout de l'image n'a pas fonctionné");
        else return ($random."_".$file['name']);
    }

    public static function alert($type,$message){
        $_SESSION['alert'] = [
            "type" => $type,
            "msg" => $message
        ];
        return $_SESSION['alert'];
    }
    
}