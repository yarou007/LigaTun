<?php
session_start();
$title = "Edit Terrain";
  ob_start();
 $idTerrain = $_SESSION['idTerrain'];
 $nomTerrain = $_SESSION['nomTerrain'];
 $adrTerrain = $_SESSION['adrTerrain']
?>

<form action="../../index.php?action=editTerrain" method="post">
         <div class="form-group">
            <input type="hidden" class="form-control" name="idTerrain" value="<?= $idTerrain ?>">
        </div>
        <div class="form-group">
            <label>Nom</label>
            <input type="text" class="form-control" name="nomTerrain" value="<?= $nomTerrain ?>">
        </div>
        <div class="form-group">
            <label>Adresse</label>
            <input type="text" class="form-control" name="adrTerrain" value="<?= $adrTerrain ?>">
        </div>
     
        <div class="form-group">
            <input type="submit" class="btn btn-success my-2" value="Modifier" name="modifier" >
        </div>
    </form>
 
    <?php  $content= ob_get_clean(); ?> 
    <?php require_once('accueilAdP.php');?>
