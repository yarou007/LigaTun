<?php
require_once("model/admin_model.php");


function AffichesClients()
{
    ///...Actions mte3na
    $clients = liste_clients();
    if (isset($clients)) {

        session_start();
        $_SESSION['clients'] = $clients;
        header('Location:./view/adminPrincipale/listes_clients.php');

    }
}
function loginActionAd($login, $password)
{

    $nb = exitsAd($login, $password);
    echo $nb;
    if ($nb == 0) {
        $_SESSION['Error'] = "Mot de passe ou login incorrect :)";

        header('Location:../about.php');
    } else {
          $Admin = loginAd($login, $password);
        if ($Admin->fonctionAd == 'superAdmin') {
            $clients = liste_clients();
            session_start();
            $_SESSION['id'] = $Admin->idAd;
            $_SESSION['nom'] = $Admin->nomAd;
            $_SESSION['loginAd'] = $Admin->loginAd;
            $_SESSION['email'] = $Admin->emailAd;
            $_SESSION['fn'] = $Admin->fonctionAd;
            $_SESSION['clients'] = $clients;
            header('Location:./view/adminPrincipale/listes_clients.php');
        } 
     else if ($Admin->fonctionAd == 'MKT&SALES') {
        $clients = liste_clientsNR(); 
        session_start();
        $_SESSION['id'] = $Admin->idAd;
        $_SESSION['nom'] = $Admin->nomAd;
        $_SESSION['loginAd'] = $Admin->loginAd;
        $_SESSION['email'] = $Admin->emailAd;
        $_SESSION['fn'] = $Admin->fonctionAd;
        $_SESSION['clients'] = $clients;
        header('Location:./view/MKT&SALES/listes_clientNR.php');

    } else
    if ($Admin->fonctionAd == 'CS') {
        $liste_res = liste_reservationAdmin();
        session_start();
        $_SESSION['id'] = $Admin->idAd;
        $_SESSION['nom'] = $Admin->nomAd;
        $_SESSION['loginAd'] = $Admin->loginAd;
        $_SESSION['email'] = $Admin->emailAd;
        $_SESSION['fn'] = $Admin->fonctionAd;
        $_SESSION['liste_res'] = $liste_res;
       header('Location:./view/CS/listes_res_cs.php');

    } else if ($Admin->fonctionAd == 'CXP') {
        $clients = liste_clients();
            session_start();
            $_SESSION['id'] = $Admin->idAd;
            $_SESSION['nom'] = $Admin->nomAd;
            $_SESSION['loginAd'] = $Admin->loginAd;
            $_SESSION['email'] = $Admin->emailAd;
            $_SESSION['fn'] = $Admin->fonctionAd;
            $_SESSION['clients'] = $clients;
       header('Location:./view/CXP/listes_clients_CXP.php');

    }else {
        header('Location:./login.php');
    }
    exit();
} 
}




function AffichesTerrain()
{
    $terrains = listes_terrain();
    if (isset($terrains)) {
        session_start();
        $_SESSION['terrains'] = $terrains;
        header('Location:./view/adminPrincipale/listes_terrains.php');
    }
}

function createActionTerrain()
{
    header('Location:./view/adminPrincipale/ajoutTerrain.php');
}

function storeTerrain()
{
    // n3aytou lil model besh y'inserihom
    $isCreated = createTerrain();
    if (!$isCreated)
        echo "Il y a probleme de creation terrain";
    else {
        $terrains = listes_terrain();
        session_start();
        $_SESSION['terrains'] = $terrains;
        header('Location:./view/adminPrincipale/listes_terrains.php');
    }
}

function  deleteTerrainAction(){
    $idTerrain = $_REQUEST['idTerrain'];
    if (isset($idTerrain)){
        session_start();
        $_SESSION['idTerrain']=$idTerrain;
        header('Location:./view/adminPrincipale/deleteTerrain.php');
    }
}
function destroyTerrain(){
   $id = $_GET['idTerrain'];
    /*$isDeleted = */ destroyTerr($id);
   /* if ($isDeleted) echo"jawek behi";
    else echo"Non";*/
    header('location:index.php?action=listeTerrain');
}   

// juste besh t'hezek twarini l page taa l modif behs nmodifi
function editTerrainAction(){

    $id = $_GET['idTerrain'];
    $terrain = viewTerrain($id);
    if (isset($terrain)){
        session_start();
        $_SESSION['idTerrain']=$terrain->idTerrain;
        $_SESSION['nomTerrain']=$terrain->nomTerrain;
        $_SESSION['adrTerrain']=$terrain->adrTerrain;
        header('Location:./view/adminPrincipale/editTerrain.php');

    }
}

function updateTerrainAction(){
    $idTerrain = $_POST["idTerrain"];
    $nomTerrain = $_POST["nomTerrain"];
    $adrTerrain = $_POST["adrTerrain"];
    $ok = editTerrain($idTerrain,$nomTerrain,$adrTerrain);
    if ($ok){
        AffichesTerrain();
}
}

function   deleteClientAction(){

    $Cin = $_REQUEST['Cin'];
    if (isset($Cin)){
        session_start();
        $_SESSION['Cin']=$Cin;
        header('Location:./view/adminPrincipale/deleteClient.php');
    }
}

function destroyClient(){
    $Cin = $_GET['Cin'];
    /*$isDeleted = */ destroyCl($Cin);
   /* if ($isDeleted) echo"jawek behi";
    else echo"Non";*/
    header('location:index.php?action=listeClient');
}


function AffichesResrvationAdmin(){
    $liste_res = liste_reservationAdmin();
    //var_dump($liste_res);
     if (isset($liste_res)) {
         session_start();
         $_SESSION['liste_res'] = $liste_res;
         header('Location:./view/adminPrincipale/listes_reservations.php');
 
     }
 }


 function updateResAction(){
  
    $idRes = $_GET['idRes'];
    $reservation = viewResrvation($idRes);
    if (isset($reservation)){
        session_start();
        $_SESSION['idRes']=$reservation->idRes;
        $_SESSION['Cin']=$reservation->Cin;
        $_SESSION['idTerrain']=$reservation->idTerrain;
        $_SESSION['nbPersonnes']=$reservation->nbPersonnes;
        $_SESSION['Remarque']=$reservation->Remarque;
        $_SESSION['dtTakwira']=$reservation->dtTakwira;
        $_SESSION['status']=$reservation->status;
        $_SESSION['RechercheBlasa']=$reservation->RechercheBlasa;
       header('Location:./view/adminPrincipale/modifierRes.php');

    }
}

function updateResCS(){
    $idRes = $_GET['idRes'];
    $reservation = viewResrvation($idRes);
    if (isset($reservation)){
        session_start();
        $_SESSION['idRes']=$reservation->idRes;
        $_SESSION['Cin']=$reservation->Cin;
        $_SESSION['idTerrain']=$reservation->idTerrain;
        $_SESSION['nbPersonnes']=$reservation->nbPersonnes;
        $_SESSION['Remarque']=$reservation->Remarque;
        $_SESSION['dtTakwira']=$reservation->dtTakwira;
        $_SESSION['status']=$reservation->status;
        $_SESSION['RechercheBlasa']=$reservation->RechercheBlasa;
       header('Location:./view/CS/modifierResCS.php');

    }
}
function editResCS(){
    
        $idRes = $_POST["idRes"];
        $status = $_POST["status"];
        
        $ok = updateRes($idRes,$status);         
         if ($ok)  { 
            $liste_res = liste_reservationAdmin();
            //var_dump($liste_res);
             if (isset($liste_res)) {
                 session_start();
                 $_SESSION['liste_res'] = $liste_res;
            header('Location:./view/CS/listes_res_cs.php');
             }
            } else echo "ERROR";
}

function editRes(){
       $idRes = $_POST["idRes"];
       $status = $_POST["status"];
       
       $ok = updateRes($idRes,$status);
       if ($ok){
        AffichesResrvationAdmin();
       }
       /*if ($ok){
        AffichesResrvationAdmin();
        }*/
}
function   Affiches_admins(){
     $admins = liste_admin();
    if (isset($admins)) {
        session_start();
        $_SESSION['admins'] = $admins;
        header('Location:./view/adminPrincipale/listes_admins.php');

    }
}

function Affiches_chiffres(){
    $nb_cl = numbers_cl(); 
    $nb_cl_nr = round((numbers_cl_nr()/$nb_cl)*100,2);  
    $nb_ad = numbers_ad();  
    $nb_res = numbers_res();
    $nb_res_pending = round((numbers_res_pending()/$nb_res)*100,2); 
    /*echo $nb_cl; echo "<br>";
    echo $nb_res; echo "<br>";
   echo " pourcentage : " .$nb_res_pending; echo "<br>";*/
    $nb_res_confirmed = round((numbers_res_confirmed()/$nb_res)*100,2);
    $nb_res_canceled = round((numbers_res_canceled()/$nb_res)*100,2);  
    if (isset($nb_cl) &&  isset($nb_ad)  ) {
        session_start(); 
        $_SESSION['nb_clients'] = $nb_cl;
        $_SESSION['nb_cl_nr'] = $nb_cl_nr;
        $_SESSION['nb_res'] = $nb_res;
        $_SESSION['nb_res_pending'] = $nb_res_pending;
        $_SESSION['nb_res_confirmed'] = $nb_res_confirmed; 
        $_SESSION['nb_res_canceled'] = $nb_res_canceled;
        header('Location:./view/adminPrincipale/chiffres.php');

    }
}



function createAdmin()
{
    header('Location:./view/adminPrincipale/AjoutAdmin.php');
}

function ajoutAdminAction(){
    $isCreated = ajoutAdmin();
    if (!$isCreated)
        echo "Il y a probleme de creation terrain";
    else {
        $admins = liste_admin();
        if (isset($admins)) {
            session_start();
            $_SESSION['admins'] = $admins;
            header('Location:./view/adminPrincipale/listes_admins.php');
    
        }
    }
}

function  deleteResAction(){
    $id = $_GET['idRes'];
    /*$isDeleted = */ destoryRes($id);
   /* if ($isDeleted) echo"jawek behi";
    else echo"Non";*/
    header('location:index.php?action=listeRes');
}

function AfficheHis(){
    
        $cin = $_REQUEST["Cin"];
        
        ///...Actions mte3na
        $liste_res = liste_reservationCL($cin); 
         $Nomclient= clientInfos($cin);
     

       // echo $Nomclient;
       //var_dump($liste_res);
    if (isset($Nomclient)){
        session_start();
        $_SESSION['nomCl']=$Nomclient[0];
        if (isset($liste_res) ) { 
            
            $_SESSION['liste_res'] = $liste_res;
           
          //  $_SESSION['client'] = $client;
        }
        
        header('Location:./view/adminPrincipale/histo_res_client.php');

        }
    }

   function listeClientNR(){
    header('Location:./view/MKT&SALES/listes_clientNR.php');

    }

    function  destoryResCS(){
        $id = $_GET['idRes'];
        $isDeleted =  destoryRes($id);
       /* if ($isDeleted) echo"jawek behi";
        else echo"Non";*/
       if ($isDeleted){
        $liste_res = liste_reservationAdmin(); 
        session_start();
      
        $_SESSION['liste_res'] = $liste_res;
       header('Location:./view/CS/listes_res_cs.php');
       }
    }
    
    function AffichePosts(){
        
        $listes_posts = Posts();
        session_start();
        $_SESSION['posts'] = $listes_posts;
        header('Location:./view/CXP/listes_posts.php');

    }

function AffichesQuestions(){

    $listes_questions=questions();
    
    session_start();
    $_SESSION["Question"]= $listes_questions;
    
    header('Location:./view/CXP/questionsCXP.php');

}



function modifQuestion(){
    $id = $_REQUEST['idQuestion'];
    $qs = viewQuestion($id);
    if (isset($qs)){ 
       session_start();
        $_SESSION['idQuestion']=$qs->idQuestion;
        $_SESSION['CinQs']=$qs->Cin;
        $_SESSION['nomQS']=$qs->idTerrain;
        $_SESSION['question']=$qs->Question;
        $_SESSION['Repondu']=$qs->Repondu;
        $_SESSION['dtQuestion']=$qs->dtQuestion;
       header('Location:./view/CXP/modifQuestion.php');

    }
}
  
function editQS(){
    $id = $_POST["idQuestion"];
    $rep = $_POST["Repondu"];
    
    $ok = modifqs($id,$rep);
    if ($ok){
        AffichesQuestions();
    }
    /*if ($ok){
     AffichesResrvationAdmin();
     }*/
}


function   deleteAdAction(){

    $idAd = $_REQUEST['idAd'];
    if (isset($idAd)){
        session_start();
        $_SESSION['idAd']=$idAd;
        header('Location:./view/adminPrincipale/deleteAd.php');
    }
}



function destroyAdAction(){
    $idAd = $_GET['idAd'];
    /*$isDeleted = */ destroyAd($idAd);
   /* if ($isDeleted) echo"jawek behi";
    else echo"Non";*/
    header('location:index.php?action=listeAdmin');
}
