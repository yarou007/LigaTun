<?php 
      session_start();
      $title="Overall dashboad in numbers";
    ob_start();
    $nb_cl = $_SESSION['nb_clients'];
    $nb_cl_nr = $_SESSION['nb_cl_nr'];
    $nb_res = $_SESSION['nb_res'] ; 
    $nb_res_pending =$_SESSION['nb_res_pending'];
    $nb_res_confirmed =  $_SESSION['nb_res_confirmed'] ; 
    $nb_res_canceled = $_SESSION['nb_res_canceled'] ;
     ?>
     <table class="table table-striped">
         <thead>
            <tr>
            <th>Clients</th>
            <th>Reservations</th>
            <th>% of clients with no Reservation</th>
            <th>% of Pending</th>
            <th>% of Confirmed</th>
            <th>% of Canceled</th>
          
            </tr>
        </thead>
       
        <tbody>
           <tr>
                <td><?php echo $nb_cl ?></td>
                <td><?php echo $nb_res ?></td>
                <td><?php echo $nb_cl_nr ?></td>
                <td><?php echo $nb_res_pending ?></td>
                <td><?php echo $nb_res_confirmed ?></td>
                <td><?php echo $nb_res_canceled  ?></td>
                
            </tr>
       
        </tbody>
    </table><?php $content=ob_get_clean(); ?>
    <?php require_once('accueilAdP.php');?>



  
