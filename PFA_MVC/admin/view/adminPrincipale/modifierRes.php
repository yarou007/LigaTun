<?php
session_start();
$title = "Edit Reservation";
ob_start();
$idRes = $_SESSION['idRes'];
$Cin = $_SESSION['Cin'];
$rm = $_SESSION['Remarque'];
$idTerrain = $_SESSION['idTerrain'];
$nbPersonnes = $_SESSION['nbPersonnes'];
$status = $_SESSION['status'];
$dtr = $_SESSION['dtTakwira'];
$RB = $_SESSION['RechercheBlasa'];
if ($RB == 0) {
    $RB = "Non";
} else $RB = "Oui"
?>



<table class="table table-striped" style=" margin-left: 0px;">
    <form action="../../index.php?action=editRes" method="post">
        <tr>
            <td>Cin</td>
            <td>idTerrain</td>
            <td>date</td>
            <td>Nombres</td>
            <td>status</td>
            <td>Remarquee</td>
            <td>Recherche blasa</td>
        </tr>
        <tr>

            <input type="hidden" class="form-control" name="idRes" value="<?= $idRes ?>">
 
            <td class="col-md-2"> <input type="text" class="form-control" name="Cin" value="<?= $Cin ?>" disabled></td>
            
            <td class="col-sm-2"> <input type="text" name="idTerrain" class="form-control" id="idTerrain" value="<?php if ($idTerrain==1) echo "Santiago Bernabéu";
                        else if ($idTerrain==3) echo "Hamadi Agrbi"; 
                        else if ($idTerrain==6) echo "Manouba National Staduim"; 
                        else if ($idTerrain==10) echo "Stade de Prince"; 
                        else if ($idTerrain==12) echo "Stade barça"; 
                        else if ($idTerrain==13) echo "EZZAHRA STADUIM";
                        ?>" disabled> </td>
            <td class="col-md-1"> <input type="datetime-local" class="form-control" name="idTerrain" value="<?= $dtr ?>" disabled>  </td>
            <td class="col-md-1"><input type="text" class="form-control" name="nbPersonnes" value="<?= $nbPersonnes ?>"disabled></td>

            <td class="col-md-2"> 
                
                <select name="status" id="status" class="form-control">
                      <option disabled><?php echo $status ?></option>
                      <option value="pending">pending</option>
                    <option value="confirmed">confirmed</option>
                    <option value="canceled">canceled</option>
                </select>
        
        </td>
            <td> <input type="text" class="form-control" name="dtr" value="<?= $rm ?>" disabled>
            </td>
            <td> <input type="text" class="form-control" name="Cin" value="<?= $RB ?>" disabled></td>
             <td><input type="submit" class="btn btn-success" value="Modifier" name="modifier" style="margin-left:10px;"></td>

        </tr>


    </form>
</table>



<!--
<table>
<form action="../../index.php?action=editRes" method="post">
         <div class="form-group">
            <input type="hidden" class="form-control" name="idRes" value="<?= $idTerrain ?>" disabled>
        </div>
        <div class="form-group">
            <label>Cin</label>
            <input type="text" class="form-control" name="Cin" value="<?= $Cin ?>" disabled>
        </div>
        <div class="form-group">
            <label>idTerrain</label>
            <input type="text" class="form-control" name="idTerrain" value="<?= $idTerrain ?>" >
        </div>
        <div class="form-group">
            <label>Date Time</label>
            <input type="datetime-local" class="form-control" name="idTerrain" value="<?= $dtr ?>">
        </div>
        <div class="form-group">
            <label>nbPersonnes</label>
            <input type="text" class="form-control" name="nbPersonnes" value="<?= $nbPersonnes ?>">
        </div>
        <div class="form-group">
            <label>status</label>
            <input type="text" class="form-control" name="dtr" value="<?= $status ?>">
        </div>
        <div class="form-group">
            <label>Remarque</label>
            <input type="text" class="form-control" name="dtr" value="<?= $rm ?>">
        </div>
        <div class="form-group">
            <label>Recherche blasa </label>
            <input type="text" class="form-control" name="dtr" value="<?= $RB ?>" disabled>
        </div>
     
        <div class="form-group">
            <input type="submit" class="btn btn-success my-2" value="Modifier" name="modifier" >
        </div>
    </form>
    </table> -->
<?php $content = ob_get_clean(); ?>
<?php require_once('accueilAdP.php'); ?>