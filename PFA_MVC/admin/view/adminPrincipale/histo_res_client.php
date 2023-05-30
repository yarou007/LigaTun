<?php
session_start();

$cl =  $_SESSION['nomCl'] ;
$title = "Historique de ".$cl;
ob_start();
?>


<form method="POST" action="#">
    <table class="table table-striped" style=" margin-left: 0px;">
        <thead>
            <tr>
                <th>Num Res</th>
                <th>Cin</th>
                <th>Terrain</th>
                <th>Personnes</th>
                <th>Status</th>
                <th>Date</th>
                <th>Blasa</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php $reservation =   $_SESSION['liste_res'];
        if (isset($reservation)) {
            foreach ($reservation as $res) {
        ?>
                <tbody>
                    <tr>

                        <!-- class="bg-gradient -->
                        <td class="col-md-1"> <input type="text" name="idRes" class="form-control" id="idRes" value="<?php echo $res->idRes ?>" disabled> </td>
                        <td class="col-sm-2"> <input type="text" name="Cin" class="form-control" id="Cin" value="<?= $res->Cin ?>" disabled> </td>
                        <td class="col-sm-1"> <input type="text" name="idTerrain" class="form-control" id="idTerrain" value="<?= $res->idTerrain ?>" disabled> </td>
                        <?php $_SESSION['idRes'] = $res->idRes; 
                             $_SESSION['cin'] = $res->Cin;
                             ?>
                        <td class="col-md-1"><?php echo  $res->nbPersonnes ?></td>
                        <td class="col-md-2"> <input type="text" name="idTerrain" class="form-control" id="idTerrain" value="<?= $res->status ?>" disabled> </td>

                        <td><?php echo  $res->dtTakwira ?></td>
                        <td class="bg-gradient"> <?php if ($res->RechercheBlasa == 1) echo "Oui";
                                                    else echo "Non"; ?></td>

                        <td>
                            <a href="../../index.php?action=updateRes&idRes=<?php echo $res->idRes ?>" class="btn btn-success btn-sm">Modifier</a>
                             <a href="../../index.php?action=deleteRes&idRes=<?php  echo $res->idRes ?>" class="btn btn-warning btn-sm">Supprimer</a> 

                        </td>
                    </tr>
            <?php }
        }

            ?>
                </tbody>
    </table>
</form>
<?php $content = ob_get_clean(); ?>
<?php require_once('accueilAdP.php'); ?>