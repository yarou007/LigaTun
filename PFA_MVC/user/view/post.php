<?php session_start();
require_once("./includes/sidebar.php");



$cin = $_SESSION["cin"];
$nom = $_SESSION["nom"];
$pre = $_SESSION["prenom"];

?>


<section id="historique_reservation">

    <div class="row" style="margin-left: 10%; ">
        <div class="col-lg-12 col-sm-12 my-4 text-center">
            <div class="histo_reserv_box">
                <p> Un moment a partagez? </p>
            </div>
        </div>
    </div>
    <form method="post" action="../index.php?action=post" class="row g-3" style="margin-left: 18%; ">

        <input type="hidden" name="cin" class="form-control" id="cin" value="<?= $cin ?>">

        <div class="col-md-5">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control" id="name" value="<?= $nom ?>">
        </div>
        <div class="col-md-5">
            <label for="prenom" class="form-label">Prenom</label>
            <input type="text" name="prenom" class="form-control" id="prenom" value="<?= $pre ?>">
        </div>
        <div class="col-lg-10 mb-3">
            <label for="exampleFormControlTextarea1" class="form-label"></label>
            <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3" placeholder="Moment avec LIGATUN"></textarea>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    <div style="margin-top:8.8%;"> </div>

    <script src="../assets/js/update.js"></script>



</section>

<?php require_once("./includes/footer.php"); ?>