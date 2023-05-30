<?php
session_start();
$title = "Ajouter Terrain";
  ob_start();  
?>
<center>
<form class="justify-content-around align-items-center"  action="../../index.php?action=storeTerrain" method="post">
        <div class="form-group col-lg-6">
            <label>Nom Terrain</label>
            <input type="text" class="form-control" name="nomTerrain">
        </div>
        <div class="form-group col-lg-6">
            <label>Adresse</label>
            <input type="text" class="form-control" name="adrTerrain">
        </div>
     
        <div class="form-group">
            <input type="submit" class="btn btn-success my-2" value="Ajouter" name="ajouter">
        </div>
    </form>
    </center>
    <?php  $content= ob_get_clean(); ?> 
    <?php require_once('accueilAdP.php');?>