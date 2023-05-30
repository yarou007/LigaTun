<?php 
      session_start();
      $title="Listes admins";
    ob_start();
     ?>
     <a href="../../index.php?action=createAdmin" class="btn btn-primary">Ajouter</a>
     <table class="table table-striped">
         <thead>
            <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Departement</th>
            <th>Login</th>
            <th>Last Activity</th>
            <th>Action</th>
            </tr>
        </thead>
        <?php
        $admins = $_SESSION["admins"];
          foreach($admins as $ad){
  ?>
        <tbody>
           <tr>
                <td><?php echo $ad->idAd ?></td>
                <td><?php echo $ad->nomAd ?></td>
                <td><?php echo $ad->emailAd ?></td>
                <td><?php echo $ad->fonctionAd?></td>
                <td><?php echo $ad->loginAd ?></td>
                <td><?php echo $ad->LastTimeActivity ?></td>
                <td>
                  
                  <a href="../../index.php?action=deleteAd&idAd=<?php echo $ad->idAd ?>" class="btn btn-danger btn-sm">Supprimer</a>                
                </td>
            </tr>
          <?php }
           ?>
        </tbody>
    </table><?php $content=ob_get_clean(); ?>
    <?php require_once('accueilAdP.php');?>



  
