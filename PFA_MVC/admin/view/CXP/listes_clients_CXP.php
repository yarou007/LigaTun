<?php 
      session_start();
      $title="Listes clients";
    ob_start();
     ?>
     <table class="table table-striped">
         <thead>
            <tr>
            <th>Cin</th>
            <th>Email</th>
            <th>Nom</th>
            <th>Prenom </th>
            <th>Age</th>
            <th>Gouvernorat</th>
            <th>Action</th>
            </tr>
        </thead>
        <?php
        $clients = $_SESSION['clients'];
          foreach($clients as $c){
  ?>
        <tbody>
           <tr>
                <td><?php echo $c->Cin ?></td>
                <td><?php echo $c->Email ?></td>
                <td><?php echo $c->Nom ?></td>
                <td><?php echo $c->prenom ?></td>
                <td><?php echo $c->number ?></td>
                <td><?php echo $c->gouvernorat ?></td>
                <td>
                  
                 <!-- <a href="../../index.php?action=AfficheHis&Cin=<?php //echo $c->Cin ?>" class="btn btn-success btn-sm">Historique</a> -->
                
                </td>
            </tr>
          <?php }
           ?>
        </tbody>
    </table><?php $content=ob_get_clean(); ?>
    <?php require_once('AccueilCXP.php');?>



  
