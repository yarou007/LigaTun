<?php
require_once("model/client_model.php");




function storeAction(){
    /// n3aytou lil model besh y'inserihom
    $isCreated = create();
    if ($isCreated)
    header('location:clientview.php');
    else echo"Il y a probleme de creation";
  
}





?>