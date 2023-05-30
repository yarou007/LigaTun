<?php

require_once("config/conf.php");

function create()
{
  $db = connexionDB(); // $db de type pdo 
  $hashedPasswordCreate=sha1($_POST["pwd"]);
  /* fama 3 methode , fama methode hedhi w el methdoe mta3 el extract w fazet
el tableau w el ? ama masta w feha faille de securité */
  try {

    $sqlstat = $db->prepare("INSERT INTO client VALUES (:cin,:email,:nom,:prenom,:number,:gouvernorat,:pwd)");
    $sqlstat->bindParam(':cin', $_POST['cin']);
    $sqlstat->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
    $sqlstat->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
    $sqlstat->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
    $sqlstat->bindParam(':number', $_POST['number'], PDO::PARAM_INT);
    $sqlstat->bindParam(':gouvernorat', $_POST['gv'], PDO::PARAM_STR);
    $sqlstat->bindParam(':pwd',  $hashedPasswordCreate, PDO::PARAM_STR);
    return $sqlstat->execute();
  } catch (PDOException $ex) {
    die($ex->getMessage());
  }
  
 
}


function exits($email, $password) {
  $db = connexionDB();
  $hashedPasswordLogin=sha1($password);
  try {
    $sql = "SELECT * FROM client WHERE email = :email AND pwd = :password";
    $pdostat = $db->prepare($sql);
    $pdostat->bindParam(':email', $email, PDO::PARAM_STR);
    $pdostat->bindParam(':password', $hashedPasswordLogin, PDO::PARAM_STR);
    $pdostat->execute();
    return $pdostat->rowCount();
  } catch(PDOException $ex) {
    die($ex->getMessage());
  }
}

 function login($email, $password) {
  $db = connexionDB();
  $hashedPasswordLogin=sha1($password);
  try{
    $sql = "SELECT * FROM client where email=:email and pwd=:pwd";
    $pdostat = $db->prepare($sql);
     $pdostat->bindParam(':email',$email,PDO::PARAM_STR);
     $pdostat->bindParam(':pwd',$hashedPasswordLogin,PDO::PARAM_STR);
      $pdostat->execute();
    return  $rep = $pdostat->fetchObject();
  }catch(PDOException $ex){
    die($ex->getMessage());
  }
  
}

function modifieClient($cin,$email,$nom,$prenom,$password,$number,$gv)
{
  $hashedPasswordModif=sha1($password);
  $db = connexionDB();
  try {
    $pdostat = $db->prepare("UPDATE client SET Email=:email,nom=:nom,prenom=:prenom,number=:number,gouvernorat=:gv,pwd=:password WHERE cin=:cin");
  } catch (PDOexception $ex) {
    die($ex->getMessage());
  }

  $pdostat->bindValue(':cin', $cin, PDO::PARAM_INT);
  $pdostat->bindValue(':email', $email, PDO::PARAM_STR);
  $pdostat->bindValue(':nom', $nom, PDO::PARAM_STR);
  $pdostat->bindValue(':prenom', $prenom, PDO::PARAM_STR);
  $pdostat->bindValue(':number',$number, PDO::PARAM_INT);
  $pdostat->bindValue(':gv', $gv, PDO::PARAM_STR);
  $pdostat->bindValue(':password', $hashedPasswordModif, PDO::PARAM_STR);
  return $pdostat->execute();
}

function ReserveTerrain($cin){
  $db = connexionDB(); // $db de type pdo 

  /* fama 3 methode , fama methode hedhi w el methdoe mta3 el extract w fazet
el tableau w el ? ama masta w feha faille de securité */
  try {

    $sqlstat = $db->prepare("INSERT INTO reservation VALUES (null,:cin,:idTerrain,:nbp,:Remarque,'pending',:dtr,:RechBlasa)");
   $sqlstat->bindParam(':cin', $cin);
    $sqlstat->bindParam(':idTerrain',  $_REQUEST['idTerrain'], PDO::PARAM_INT);
    $sqlstat->bindParam(':nbp', $_REQUEST['nbp'], PDO::PARAM_INT);
    $sqlstat->bindParam(':dtr', $_REQUEST['dtr']);
    $sqlstat->bindParam(':Remarque', $_REQUEST['Remarque'], PDO::PARAM_STR);
    $sqlstat->bindParam(':RechBlasa', $_REQUEST['RechBlasa']);
    return $sqlstat->execute();
  } catch (PDOException $ex) {
    die($ex->getMessage());
  }
}

function liste_reservation($cin){
  $db = connexionDB();
    try{
      $sql = "SELECT * FROM reservation WHERE Cin=$cin ";
      $reservation = $db->query($sql)->fetchAll(PDO::FETCH_OBJ);
     return $reservation;
    }catch(PDOException $ex)
    {
      die($ex->getMessage());
    }
}

function destroyRes($idRes){

  $db= connexionDB();

  try{
    $pdostat =$db->prepare("DELETE FROM reservation where idRes=:id");
    
   
  }catch(PDOException $ex){
    die($ex->getMessage());
  }
  $pdostat->bindValue(':id', $idRes, PDO::PARAM_INT);
  return $pdostat->execute();
}

function createPost() 
{
  $db = connexionDB(); // $db de type pdo 

  /* fama 3 methode , fama methode hedhi w el methdoe mta3 el extract w fazet
el tableau w el ? ama masta w feha faille de securité */
  try {

    $sqlstat = $db->prepare("INSERT INTO posts(Cin,nom,content) VALUES (:cin,:nom,:content)");
    $sqlstat->bindParam(':nom', $_POST['nom']);
    $sqlstat->bindParam(':cin', $_POST['cin']);
    $sqlstat->bindParam(':content', $_POST['content'], PDO::PARAM_STR);
    
    return $sqlstat->execute();
  } catch (PDOException $ex) {
    die($ex->getMessage());
  }
  
}

function createRec(){
  $db = connexionDB(); // $db de type pdo 

  /* fama 3 methode , fama methode hedhi w el methdoe mta3 el extract w fazet
el tableau w el ? ama masta w feha faille de securité */
  try {

    $sqlstat = $db->prepare("INSERT INTO questions(Cin,nom,Question) VALUES (:cin,:nom,:question)");
    $sqlstat->bindParam(':nom', $_POST['nom']);
    $sqlstat->bindParam(':cin', $_POST['cin']);
    $sqlstat->bindParam(':question', $_POST['question'], PDO::PARAM_STR);
    
    return $sqlstat->execute();
  } catch (PDOException $ex) {
    die($ex->getMessage());
  }
  
}


?>