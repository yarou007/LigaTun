<?php 
      session_start();
      $title="Posts";
    ob_start();
     ?>
     <table class="table table-striped">
         <thead>
            <tr>
            <th>id</th>
            <th>Cin</th>
            <th>Nom</th>
            <th>Content</th>
            <th>Date Post </th>
            
            </tr>
        </thead>
        <?php
        $posts = $_SESSION['posts'];
          foreach($posts as $p){
  ?>
        <tbody>
           <tr>
                <td><?php echo $p->idPost?></td>
                <td><?php echo $p->Cin ?></td>
                <td><?php echo $p->nom ?></td>
                <td class="col-md-7"><?php echo $p->content ?></td>
                <td><?php echo $p->dtPost ?></td>
                <td>
                  
                 <!-- <a href="../../index.php?action=AfficheHis&Cin=<?php //echo $c->Cin ?>" class="btn btn-success btn-sm">Historique</a> -->
                
                </td>
            </tr>
          <?php }
           ?>
        </tbody>
    </table>
    <?php $content=ob_get_clean(); ?>
    <?php require_once('AccueilCXP.php');?>



  
