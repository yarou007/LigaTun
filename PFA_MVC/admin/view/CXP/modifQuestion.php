<?php
session_start();
$title = "Edit Question";
ob_start();
$idqs = $_SESSION['idQuestion'];
$Cin =    $_SESSION['CinQs'];
$nom =  $_SESSION['nomQS'];
$question =  $_SESSION['question'];
$dtq = $_SESSION['dtQuestion'];
$Repondu =  $_SESSION['Repondu'];

?>



<table class="table table-striped" style=" margin-left: 0px;">
    <form action="../../index.php?action=editQs" method="post">
        <tr>
        <td>id</td>
            <td>Cin</td>
            <td>Nom</td>
            <td>Question</td>
            <td>A Repondu?</td>
            <td>Date Question</td>
            
        </tr>
        <tr>

            <td class="col-md-1"> <input type="text" class="form-control" name="idQuestion" value="<?= $idqs  ?>"></td>

            <td class="col-md-2"> <input type="text" class="form-control" name="Cin" value="<?= $Cin ?>" disabled></td>
            <td class="col-md-2"> <input type="text" class="form-control" name="nom" value="<?= $nom ?>" disabled></td>
            <td class="col-md-6"> <input type="text" class="form-control" name="Question" value="<?= $question ?>" disabled></td>

            <td class="col-md-2">

                <select name="Repondu" id="Repondu" class="form-control">
                    <option selected disabled><?php echo $Repondu ?></option>
                    <option value="Oui">Oui</option>
                    <option value="Non">Non</option>

                </select>
            <td class="col-md-1"> <input type="datetime-local" class="form-control" name="qs" value="<?= $dtq ?>" disabled> </td>

            </td>

            <td><input type="submit" class="btn btn-success" value="Modifier" name="modifier" style="margin-left:10px;"></td>


        </tr>


    </form>
</table>


<?php $content = ob_get_clean(); ?>
<?php require_once('AccueilCXP.php'); ?>