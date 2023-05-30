<?php  
session_start();

require_once("./includes/sidebar.php");

$cin = $_SESSION["cin"];
$nom = $_SESSION["nom"];
$pre = $_SESSION["prenom"];
$gv = $_SESSION["gv"];
$email=$_SESSION['email'];
$number=$_SESSION['number'];

?>
<?php require_once ("../config/conf.php");   
$db=connexionDB();
try{
    $sql = "SELECT idTerrain,nomTerrain  FROM terrain ORDER BY idTerrain";
    $pdostat = $db->prepare($sql);
    $pdostat->execute();
    $terrains=$pdostat->fetchAll(PDO::FETCH_ASSOC);
}catch(PDOException $ex){
    die($ex->getMessage());

}


?>
<section id="reserver_terrain">
    <div class="row">
        <div class="text-center">
            <div class="col-lg-12 w-75" style="background-color : white ; font-weight:650 ; font-size : 1.20rem ; border-radius :10px ; margin-left : 15%; ">
                <p style="margin-top :1%"> Au cas où il vous manquerait des joueurs, cochez simplement "je cherche un joueur" <br> vous serez notifié si quelqu'un veut rejoindre </p>
            </div>
        </div>
    </div>
    <br>

    <form class="row g-3" action="../index.php?action=reserver "onsubmit="return verif()" method="post" style="margin-left: 18%; ">
        <div class="col-md-2">
            <label for="Email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="<?= $email ?>" disabled>
        </div>
        <div class="col-md-2">
            <label for="cin" class="form-label">Cin</label>
            <input type="text" name="cin" class="form-control" id="cin" value="<?= $cin ?>" >
        </div>
        <div class="col-md-2">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control" id="name" value="<?= $nom ?>" disabled>
        </div>
        <div class="col-md-2">
            <label for="prenom" class="form-label">Prenom</label>
            <input type="text" name="prenom" class="form-control" id="prenom" value="<?= $pre ?>" disabled>
        </div>
        
        <div class="col-3">
            <label for="gv" class="form-label">Address</label>
            <input type="text" name="gv" class="form-control" id="gv" placeholder="Manouba" value="<?= $gv ?>" disabled>
        </div>

        <div class="col-md-2">
            <select name="idTerrain" class="form-control">
                <option disabled selected>Choisissez le terrain </option>
                <?php foreach ($terrains as $terrain) { ?>
            <option value="<?php echo $terrain['idTerrain']; ?>"><?php echo $terrain['nomTerrain']; ?></option>
                           <?php } ?>
                <!-- lehne bch nfitchiw mel database el terrainette eli mawjoudin  -->
               <!-- <option valeu="1">Santiago Bernabéu</option>
                <option value="3" >Hamadi Agrbi</option>
                <option valeu="6">Manouba National Staduim</option>
                <option value="7" >Borj chekib</option> -->
            </select>
        </div>
        <div class="col-md-2">
            <input class="form-control" type="datetime-local" name="dtr" id="dtr" placeholder="Date de reservation">
        </div>
        <!-- <div class="col-md-2"> <input class="form-control" type="TIME" name="hr" id="hr" placeholder="l'heure de reservation"> </div> -->
        <div class="col-md-2"> <input class="form-control" type="number" name="nbp" id="nbp" placeholder="Nombre de personne"></div>
        <p style="color : black ;"><input type="checkbox" name="RechBlasa" value="0">&nbsp;&nbsp; Je cherche un joueur</p>
        <div class="col-lg-11 mb-3">
            <label for="exampleFormControlTextarea1" class="form-label"></label>
            <textarea class="form-control" name="Remarque" id="exampleFormControlTextarea1" rows="3" placeholder="Nsab7ou aala khatrek"></textarea>
        </div>
        <div class="col-12">
            <a href=""><button type="submit" class="btn btn-success"> Reserver</button></a>
            <a href=""><button type="submit" class="btn btn-danger"> Annuler</button></a>
        </div>
    </form>
    <div style="margin-top:1.8%;"> </div>
</section>

<?php require_once("./includes/footer.php"); ?>