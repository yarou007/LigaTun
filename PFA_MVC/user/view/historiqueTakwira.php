<?php session_start();

require_once("./includes/sidebar.php");

?>

<section id="historique_reservation" style="margin-left: 80px; ">
    <div class="row">
        <div class="col-lg-8 col-sm-12 my-1 text-center">
            <div class="histo_reserv_box">
                <p>Historique des reservations </p>
            </div>
        </div>
    </div>
    <div class="row">
        <table class="table table-striped" style="width:75%; margin-left: 100px;">
            <thead>
                <tr>
                    <th>Numero</th>
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
                            <td class="bg-gradient"><?php echo $res->idRes ?></td>
                            <td><?php echo  $res->Cin ?></td>
                            <td class="bg-gradient"><?php  if ($res->idTerrain=='1') {echo "Santiago Bernabéu";} else  if ($res->idTerrain=='3') {echo "Hamadi Agrbi";}
                             if ($res->idTerrain=='6') {echo "Manouba National Staduim";} else  if ($res->idTerrain=='10') {echo "Stade de Prince";}
                             if ($res->idTerrain=='12') {echo "Stade barça";} else  if ($res->idTerrain=='13') {echo "EZZAHRA STADUIM";} ?></td>
                            <td><?php echo  $res->nbPersonnes ?></td>
                            <td class="bg-gradient"><?php echo  $res->status ?></td>
                            <td><?php echo  $res->dtTakwira ?></td>
                            <td class="bg-gradient"><?php if  ($res->RechercheBlasa=='0') echo "Non"; else echo "Oui"; ?></td>

                            <td>
                                <a href="#" style="color : black ;"><i class="bi bi-eye "></i></a>&nbsp;&nbsp;&nbsp;
                                <a href="../index.php?action=deleteRes&idRes=<?php echo $res->idRes ?>" style="color : red ; "><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                <?php }
            }
                ?>
                    </tbody>
        </table>
    </div>
    <div style="margin-top:75px;"></div>
    <div class="row">
        <div class="d-flex justify-content-center">
            <a href="#" class="text-center" style="text-decoration:none; background-color : white ; color : black ; margin-left : 65%; border-radius : 20px; width:9rem; height : 2rem; font-weight:bold;">Supprimer tous</a>
        </div>
    </div>

    <br><br><br><br>
</section>

<?php require_once("./includes/footer.php"); ?>