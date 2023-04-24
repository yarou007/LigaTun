<?php


function connexionDB(){
    try{
        $db = new PDO('mysql:host=localhost;dbname=testpfa','root','');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }catch(PDOException $ex){
        die($ex->getMessage());
    }
}
?>