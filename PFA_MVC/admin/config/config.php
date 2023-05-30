<?php


function connexionDB(){
    try{
        $db = new PDO('mysql:host=mysql-ligatun.alwaysdata.net;dbname=ligatun_db','ligatun','esenmanager');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }catch(PDOException $ex){
        die($ex->getMessage());
    }
}
?>