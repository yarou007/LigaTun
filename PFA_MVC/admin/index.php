<?php
require_once("./controller/admin_controller.php");
//Creation de routter

if (isset($_GET['action'])) {
  $action = $_GET['action'];
  switch ($action) {
    case 'login':
      loginActionAd($_REQUEST['login'], $_REQUEST['pwd']);
      break;
    case 'listeClient':
      AffichesClients();
      break;
    case 'listeTerrain':
      AffichesTerrain();
      break;
    case 'createTerrain':
      createActionTerrain();
      break;
    case 'storeTerrain':
      storeTerrain();
      break;
    case 'deleteTerrain':
      deleteTerrainAction();
      break;
    case 'destroyTerrain':
      destroyTerrain();
      break;
    case 'updateTerrain':
      editTerrainAction();
      break;
    case 'editTerrain':
      updateTerrainAction();
      break;
    case 'deleteClient':
      deleteClientAction();
      break;
    case 'destroyClient':
      destroyClient();
      break;
    case 'listeRes':
      AffichesResrvationAdmin();
      break;
    case 'updateRes':

      //print_r($_REQUEST);

      updateResAction();
      break;

    case 'editRes':
      editRes();
      break;
    case 'deleteRes':
      deleteResAction();
      break;
    case 'listeAdmin':
      Affiches_admins();
      break;
      case 'chiffres':
        Affiches_chiffres();
        break;
    case 'AfficheHis':
      AfficheHis();
      break;
    case 'createAdmin':
      createAdmin();
      break;
    case 'ajoutAdmin':
      ajoutAdminAction();
      break;
    case 'listeClientNR':
      listeClientNR();
      break;
    case 'listeResAd':
      header('Location:./view/CS/listes_res_cs.php');
      break;
    case 'updateResAd':
      updateResCS();
      break;
    case 'editResCS':
      editResCS();
      break;
    case 'deleteResAd':
      destoryResCS();
      break;
    case 'PostClients':
      AffichePosts();
      break;
    case 'QuestionClients':
      AffichesQuestions();
      break;
    
    case 'questionModif':
      modifQuestion();
      break;
      case 'editQs':
         editQs();
        break;
      case 'deleteAd':
        deleteAdAction();
        break;
        case 'destroyAd':
          destroyAdAction();
          break;
    case 'logout':
      session_unset();
      session_destroy();
      header('location:login.php');
      exit();
  }
}
