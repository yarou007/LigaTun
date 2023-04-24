<?php

require_once("config/conf.php");
function create()
{
  $db = connexionDB(); // $db de type pdo 

  /* fama 3 methode , fama methode hedhi w el methdoe mta3 el extract w fazet
el tableau w el ? ama masta w feha faille de securité */
  try {

    $sqlstat = $db->prepare("INSERT INTO client VALUES (:cin,:email,:nom,:prenom,:age,:gouvernorat,:pwd)");
    
  } catch (PDOException $ex) {
    die($ex->getMessage());
  }
  
  $sqlstat->bindParam(':cin', $_POST['cin']);
  $sqlstat->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
  $sqlstat->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
  $sqlstat->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
  $sqlstat->bindParam(':age', $_POST['age'], PDO::PARAM_INT);
  $sqlstat->bindParam(':gouvernorat', $_POST['gv'], PDO::PARAM_STR);
  $sqlstat->bindParam(':pwd', $_POST['pwd'], PDO::PARAM_STR);
  return $sqlstat->execute();
}

?>