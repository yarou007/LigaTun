<?php require_once "config/config.php";


function createTerrain()
{
  $db = connexionDB(); // $db de type pdo 
  /* fama 3 methode , fama methode hedhi w el methdoe mta3 el extract w fazet
el tableau w el ? ama masta w feha faille de securité */
  try {

    $sqlstat = $db->prepare("INSERT INTO terrain VALUES (null,:nomTerrain,:adrTerrain)");
    $sqlstat->bindValue(':nomTerrain', $_REQUEST['nomTerrain'], PDO::PARAM_STR);
    $sqlstat->bindValue(':adrTerrain', $_REQUEST['adrTerrain'], PDO::PARAM_STR);
    return $sqlstat->execute();
  } catch (PDOException $ex) {
    die($ex->getMessage());
  }
}

function liste_clients()
{

  $db = connexionDB();
  try {
    $sql = "SELECT * FROM client";
    $clients = $db->query($sql)->fetchAll(PDO::FETCH_OBJ);
    return $clients;
  } catch (PDOException $ex) {
    die($ex->getMessage());
  }
}

function listes_terrain()
{
  $db = connexionDB();
  try {
    $sql = "SELECT * FROM terrain";
    $terrains = $db->query($sql)->fetchAll(PDO::FETCH_OBJ);
    return $terrains;
  } catch (PDOException $ex) {
    die($ex->getMessage());
  }
}

function destroyTerr($id)
{
  $db = connexionDB(); // $db de type pdo 
  try {
    //prep de requ besh traja pdo stat 
    $PdoStat = $db->prepare('DELETE FROM terrain WHERE idTerrain=:id ');
  } catch (PDOException $ex) {
    die($ex->getMessage());
  }
  $PdoStat->bindValue(':id', $id, PDO::PARAM_INT);
  return $PdoStat->execute();

  // liaison de donneés 

}

function destroyCl($Cin)
{
  $db = connexionDB();
  try {
    $PdoStat = $db->prepare('DELETE FROM client WHERE Cin=:Cin ');
    $PdoStat->bindValue(':Cin', $Cin, PDO::PARAM_INT);
    return $PdoStat->execute();
  } catch (PDOException $ex) {
    die($ex->getMessage());
  }
}

function viewTerrain($id)
{
  $db = connexionDB();
  try {
    $pdostat = $db->prepare("SELECT * FROM terrain WHERE idTerrain=:id");
  } catch (PDOexception $ex) {
    die($ex->getMessage());
  }

  $pdostat->bindValue(':id', $id, PDO::PARAM_INT);
  $pdostat->execute();
  return $pdostat->fetch(PDO::FETCH_OBJ);
}



function exitsAd($login, $password)
{
  $db = connexionDB();
  try {
    $sql = "SELECT * FROM admin WHERE LoginAd=:login AND pwdAd=:password";
    $pdostat = $db->prepare($sql);
    $pdostat->bindParam(':login', $login, PDO::PARAM_STR);
    $pdostat->bindParam(':password', $password, PDO::PARAM_STR);
    $pdostat->execute();
    return $pdostat->rowCount();
  } catch (PDOException $ex) {
    die($ex->getMessage());
  }
}

function loginAd($login, $password)
{
  $db = connexionDB();
  try {
    $sql = "SELECT * FROM admin where LoginAd=:login and pwdAd=:pwd";
    $sql2 = "UPDATE admin SET LastTimeActivity=now() WHERE LoginAd=:login and pwdAd=:pwd";
    $pdostat2 = $db->prepare($sql2);
    $pdostat2->bindParam(':login', $login, PDO::PARAM_STR);
    $pdostat2->bindParam(':pwd', $password, PDO::PARAM_STR);
    $pdostat2->execute();
   
    $pdostat = $db->prepare($sql);
    $pdostat->bindParam(':login', $login, PDO::PARAM_STR);
    $pdostat->bindParam(':pwd', $password, PDO::PARAM_STR);
    $pdostat->execute();
    return  $rep = $pdostat->fetchObject();
  } catch (PDOException $ex) {
    die($ex->getMessage());
  }
}

function editTerrain($idTerrain, $nomTerrain, $adrTerrain)
{
  $db = connexionDB();
  try {
    $pdostat = $db->prepare("UPDATE terrain SET nomTerrain=:nomTerrain,adrTerrain=:adr WHERE idTerrain=:id");
  } catch (PDOException $ex) {
    die($ex->getMessage());
  }
  $pdostat->bindValue(':id', $idTerrain, PDO::PARAM_INT);
  $pdostat->bindValue(':nomTerrain', $nomTerrain, PDO::PARAM_STR);
  $pdostat->bindValue(':adr', $adrTerrain, PDO::PARAM_STR);
  return $pdostat->execute();
}


function liste_reservationAdmin()
{
  $db = connexionDB();
  try {
    $sql = "SELECT * FROM reservation ";
    $reservation = $db->query($sql)->fetchAll(PDO::FETCH_OBJ);
    return $reservation;
  } catch (PDOException $ex) {
    die($ex->getMessage());
  }
}



function updateRes($idRes, $status)
{
  
  $db = connexionDB();
  try {

    $pdostat = $db->prepare("UPDATE reservation SET status=:s WHERE idRes=:id  ");
  } catch (PDOException $ex) {
    die($ex->getMessage());
  }

  $pdostat->bindValue(':id', $idRes);
  $pdostat->bindValue(':s', $status);
  return $pdostat->execute();
}

function viewResrvation($id){
$db = connexionDB();

try{

  $pdostat = $db->prepare("SELECT * FROM reservation WHERE idRes=:id");

}catch(PDOException $ex){
 die ($ex->getMessage());

}

$pdostat->bindValue(':id', $id, PDO::PARAM_INT);
 $pdostat->execute();

return $pdostat->fetch(PDO::FETCH_OBJ);
}

function liste_admin(){
  $db = connexionDB();
  try{
    $sql = "SELECT * FROM admin";
    $admins = $db->query($sql)->fetchAll(PDO::FETCH_OBJ);
    return $admins;
  }catch(PDOException $ex){
    die($ex->getMessage());
  }

} 

function ajoutAdmin()
{
  $db = connexionDB(); // $db de type pdo 
  /* fama 3 methode , fama methode hedhi w el methdoe mta3 el extract w fazet
el tableau w el ? ama masta w feha faille de securité */
  try {

    $sqlstat = $db->prepare("INSERT INTO admin VALUES (null,:nomAd,:emailAd,:pwdAd,:fonctionAd,:loginAd,null)");
    $sqlstat->bindValue(':nomAd', $_REQUEST['nomAd'], PDO::PARAM_STR);
    $sqlstat->bindValue(':emailAd', $_REQUEST['emailAd'], PDO::PARAM_STR);
    $sqlstat->bindValue(':pwdAd', $_REQUEST['pwdAdmin'], PDO::PARAM_STR);
    $sqlstat->bindValue(':fonctionAd', $_REQUEST['fonctionAd']);
    $sqlstat->bindValue(':loginAd', $_REQUEST['loginAd'], PDO::PARAM_STR);
    return $sqlstat->execute();
  } catch (PDOException $ex) {
    die($ex->getMessage());
  }
}

function destoryRes($id){
  $db = connexionDB();
  try{
    $PdoStat = $db->prepare('DELETE FROM reservation WHERE idRes=:id ');
    $PdoStat->bindValue(':id', $id, PDO::PARAM_INT);
    return $PdoStat->execute();
  }catch(PDOException $ex){
    die($ex->getMessage());
  }
}


function liste_reservationCL($cin){
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

function clientInfos($cin){
  $db = connexionDB();
  try{
    
    $sql = "SELECT Nom FROM client WHERE Cin=:cin ";
    $PdoStat = $db->prepare($sql);
    $PdoStat->bindValue(':cin', $cin, PDO::PARAM_INT);
    
   $client = $PdoStat->execute();
   return  $c= $PdoStat->fetch();
  }catch(PDOException $ex)
  {
    die($ex->getMessage());
  }
}

function liste_clientsNR(){
  $db = connexionDB();
  try{
    
    $sql = "SELECT c.* FROM client c LEFT JOIN reservation r ON c.Cin = r.Cin WHERE r.idRes IS NULL";
    $clients = $db->query($sql)->fetchAll(PDO::FETCH_OBJ);
    return $clients;
  }catch(PDOException $ex)
  {
    die($ex->getMessage());
  }
}

function Posts(){
   $db = connexionDB();
 
    try{
      $sql = "SELECT * FROM posts";
      $posts = $db->query($sql)->fetchAll(PDO::FETCH_OBJ);
      return $posts;    
   }catch(PDOException $ex){
    die($ex->getMessage());
   }
}

function questions(){
  $db = connexionDB();
  try{
    $sql = "SELECT * FROM questions";
    $questions = $db->query($sql)->fetchAll(PDO::FETCH_OBJ);
    return $questions;  
  }catch(PDOException $ex){
    die($ex->getMessage());
  }
}


function modifqs($id,$rep){
 $db = connexionDB();
  try{
    $pdostat = $db->prepare("UPDATE questions SET Repondu=:rep WHERE idQuestion=:id  ");

  }catch(PDOException $ex){
    die($ex->getMessage());
  }
  $pdostat->bindValue(':id', $id);
  $pdostat->bindValue(':rep', $rep);
  return $pdostat->execute();

}

function viewQuestion($id){
  
  $db = connexionDB();
  try {
    $pdostat = $db->prepare("SELECT * FROM questions WHERE idQuestion=:id");
  } catch (PDOexception $ex) {
    die($ex->getMessage());
  }

  $pdostat->bindValue(':id', $id, PDO::PARAM_INT);
  $pdostat->execute();
  return $pdostat->fetch(PDO::FETCH_OBJ);
}


function destroyAd($idAd)
{
  $db = connexionDB();
  try {
    $PdoStat = $db->prepare('DELETE FROM admin WHERE idAd=:idAd ');
    $PdoStat->bindValue(':idAd', $idAd, PDO::PARAM_INT);
    return $PdoStat->execute();
  } catch (PDOException $ex) {
    die($ex->getMessage());
  }
}

function numbers_cl(){
  $db = connexionDB();
  try {
    $sql = 'SELECT COUNT(*) FROM client';
    $pdostat = $db->query($sql);
    return $pdostat->fetchColumn();  //the fetchColumn() called on the pdostat object besh tjib number of counts. 
  } catch (PDOException $ex) { 
    die($ex->getMessage());
  }
}

function numbers_cl_nr(){
  $db = connexionDB();
  try {
    $sql = "SELECT COUNT(*) FROM client c LEFT JOIN reservation r ON c.Cin = r.Cin WHERE r.idRes IS NULL";
    $pdostat = $db->query($sql);
    return $pdostat->fetchColumn();  //the fetchColumn() called on the pdostat object besh tjib number of counts. 
  } catch (PDOException $ex) { 
    die($ex->getMessage());
  }
}
function numbers_ad(){
  $db = connexionDB();
  try {
    $sql = 'SELECT COUNT(*) FROM admin';
    $pdostat = $db->query($sql);
    return $pdostat->fetchColumn();  //the fetchColumn() called on the pdostat object besh tjib number of counts. 
  } catch (PDOException $ex) { 
    die($ex->getMessage());
  }
}


function numbers_res(){
  $db = connexionDB();
  try{
    $sql = 'SELECT COUNT(*) FROM reservation';
    $pdostat = $db->query($sql);
    return $pdostat->fetchColumn();  //the fetchColumn() called on the pdostat object besh tjib number of counts. 
  }catch(PDOException $ex){
    die($ex->getMessage());
  }
}

function numbers_res_pending(){
  $db = connexionDB();
  try{
    $sql = 'SELECT COUNT(*) FROM reservation WHERE status="pending" ';
    $pdostat = $db->query($sql);
    return $pdostat->fetchColumn();
  }catch(PDOException $ex){
    die($ex->getMessage());
  }
}

function numbers_res_confirmed(){
  $db = connexionDB();
  try{
    $sql = 'SELECT COUNT(*) FROM reservation WHERE status="confirmed" ';
    $pdostat = $db->query($sql);
    return $pdostat->fetchColumn();
  }catch(PDOException $ex){
    die($ex->getMessage());
  }
}

function numbers_res_canceled(){
  $db = connexionDB();
  try{
    $sql = 'SELECT COUNT(*) FROM reservation WHERE status="canceled" ';
    $pdostat = $db->query($sql);
    return $pdostat->fetchColumn();
  }catch(PDOException $ex){
    die($ex->getMessage());
  }
}