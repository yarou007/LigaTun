<?php 
      session_start();
      $title="Listes Terrain";
    ob_start();
     ?>
<a href="../../index.php?action=createTerrain" class="btn btn-primary">Ajouter</a>
     <table class="table table-striped">
         <thead>
            <tr>
            <th>Id Terrain</th>
            <th>Nom Terrain</th>
            <th>Adresse</th>
            
            <th>Action</th>
            </tr>
        </thead>
        <?php
        $terrains = $_SESSION['terrains'];
          foreach($terrains as $ter){
  ?>
        <tbody>
           <tr>
                <td><?php echo $ter->idTerrain ?></td>
                <td><?php echo $ter->nomTerrain ?></td>
                <td><?php echo $ter->adrTerrain ?></td>
               
         
                <td>
                  <a href="../../index.php?action=deleteTerrain&idTerrain=<?php echo $ter->idTerrain ?>" class="btn btn-danger btn-sm">Supprimer</a>
                  <a href="../../index.php?action=updateTerrain&idTerrain=<?php echo $ter->idTerrain ?>" class="btn btn-success btn-sm">Modifier</a>
                
                </td>
            </tr>
          <?php }
           ?>
        </tbody>
    </table>
    <?php $content=ob_get_clean(); ?>
    <?php require_once('accueilAdP.php');?>



  
