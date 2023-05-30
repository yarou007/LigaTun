<?php
$ROOT = __DIR__; // Chemin complet du projet
$DS = DIRECTORY_SEPARATOR;

//require_once("../user/controller/client_controller.php");
//Creation de routter

require_once($ROOT.$DS."controller".$DS."client_controller.php");

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'home':
            require_once "./user/view/layout.php";
        case 'create':
            storeAction();
            header('location: ../messages.php');
            break;
        case 'login':
            loginAction($_REQUEST['email'], $_REQUEST['pwd']);
            break;
        case 'reserver':
             reserverAction();
                break;
        case 'update':
            updateAction();
            break;
        case 'ListeReservation':
             AffichesResrvation();
            break;
        case 'deleteRes':
             deleteRes();
            break;
        case 'post':
          storePost();
             break;
        case 'reclamation':
            storeRec();
            break;
            case "logout":
            session_unset();
            session_destroy();
          header('location:../about.php');
            break;
    }
    
}
