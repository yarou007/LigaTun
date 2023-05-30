<?php
session_start();
require_once("model/client_model.php");




function storeAction()
{
    /// n3aytou lil model besh y'inserihom
    $isCreated = create();
    if (!$isCreated)
        echo "Il y a probleme de creation";


}

// besh nshoufou si l'utili exist fil database 
function loginAction($email, $password)
{

    $nb = exits($email, $password);
    echo $nb;
    if ($nb == 0) {
        $_SESSION['Error'] = "Mot de passe ou login incorrect :)";

        header('Location:../about.php');
    } else {
        $user = login($email, $password);
        if ($user) {
            session_start();
            $_SESSION['cin'] = $user->Cin;
            $_SESSION['nom'] = $user->Nom;
            $_SESSION['prenom'] = $user->prenom;
            $_SESSION['email'] = $email;
            $_SESSION['number'] = $user->number;
            $_SESSION['gv'] = $user->gouvernorat;
            $liste_res = liste_reservation($user->Cin);
            if (isset($liste_res)) {
                session_start();
                $_SESSION['liste_res'] = $liste_res;
            }else $_SESSION['liste_res']=array(
                'idRes' => 0,
                'Cin' => 0,
                'idTerrain' => 0,
                'Remarque' => '',
                'status' => 'pending',
                'dtTakwira' => '',
                'RechercheBlasa' => '0',
            );
            header('location:./view/layout.php');
        
    }
        exit();
    }
}

function updateAction()
{
    $cin = $_REQUEST['cin'];
    $email = $_REQUEST['email'];
    $nom = $_REQUEST['nom'];
    $prenom = $_REQUEST['prenom'];
    $number = $_REQUEST['number'];
    $password = $_REQUEST['pwd'];
    $gv = $_REQUEST['gv'];
    $isModified = modifieClient($cin, $email, $nom, $prenom, $password, $number, $gv);
    if ($isModified) {
        session_start();
        $_SESSION['nom'] = $nom;
        $_SESSION['prenom'] = $prenom;
        $_SESSION['email'] = $email;
        $number = $_SESSION['number'] = $number;
        $_SESSION['gv'] = $gv;
        header('location:./view/layout.php');
    } else
        echo "il y a probleme de mise a jour";
}

function reserverAction()
{
    $cin = $_SESSION["cin"];
    if (isset($_REQUEST['RechBlasa'])) {
        $_REQUEST['RechBlasa'] = '1';
    } else
        $_REQUEST['RechBlasa'] = '0';
     ReserveTerrain($cin);
     $liste_res = liste_reservation($cin);
     if (isset($liste_res)) {
        session_start();
        $_SESSION['liste_res'] = $liste_res;
    header('location:./view/layout.php');
     }
}

function AffichesResrvation()
{
    $cin = $_SESSION["cin"];
    
    ///...Actions mte3na
    $liste_res = liste_reservation($cin);
   //var_dump($liste_res);
    if (isset($liste_res)) {
        session_start();
        $_SESSION['liste_res'] = $liste_res;
        header('location:./view/historiqueTakwira.php');

    }
}

function deleteRes(){
     $idRes=$_GET['idRes'];
     $cin = $_SESSION['cin'];
     $deleted = destroyRes($idRes);
     $liste_res = liste_reservation($cin);
  
     if (isset($liste_res)) {
        session_start();
        $_SESSION['liste_res'] = $liste_res;
    header('location:./view/layout.php');
     }

}

function storePost(){
 $recCreated = createPost();
    if (!$recCreated)
        echo "Il y a probleme de creation";
    else   header('location:./view/layout.php');

}

function storeRec(){
    $recCreated = createRec();
    if (!$recCreated)
        echo "Il y a probleme de creation";
    else   header('location:./view/layout.php');
}




?>