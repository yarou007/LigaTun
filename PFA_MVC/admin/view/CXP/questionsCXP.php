<?php
session_start();
$title = "Questions";
ob_start();
$listes_questions=$_SESSION["Question"];


?>



<table class="table table-striped" style=" margin-left: 0px;">


    <form action="" method="POST">
            
        <tr>
            <td>id</td>
            <td>Cin</td>
            <td>Nom</td>
            <td>Question</td>
            <td>A Repondu?</td>
            <td>Date Question</td>
            
        </tr>

    
        <tr>
        <?php 
 foreach($listes_questions as $q){ ?>
            <td class="col-md-1"> <input type="text" class="form-control" name="idQuestion" value="<?= $q->idQuestion  ?>" ></td>
 
            <td class="col-md-2"> <input type="text" class="form-control" name="Cin" value="<?= $q->Cin ?>" disabled></td>
            <td class="col-md-2"> <input type="text" class="form-control" name="nom" value="<?= $q->nom ?>" disabled></td>
            <td class="col-md-6"> <input type="text" class="form-control" name="Question" value="<?= $q->Question ?>" disabled></td>
           
            <td class="col-md-2"> 
                
                <select name="Repondu" id="Repondu" class="form-control">
                      <option  selected disabled><?php echo $q->Repondu ?></option>
                   
                   
                </select>
                <td class="col-md-1"> <input type="datetime-local" class="form-control" name="qs" value="<?= $q->dtQuestion ?>" disabled>  </td>

        </td>
           
             <td> <a href="../../index.php?action=questionModif&idQuestion=<?php echo $q->idQuestion ?>" class="btn btn-success btn-sm">View</a></td>

        </tr>
   
        <?php } ?>
    </form>
   
</table>



<?php    

 $content = ob_get_clean(); ?>
<?php require_once('AccueilCXP.php'); ?>