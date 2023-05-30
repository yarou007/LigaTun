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

<section id="historique_reservation">

    <div class="row" style="margin-left: 10%; " >
        <div class="col-lg-12 col-sm-12 my-4 text-center" >
            <div class="histo_reserv_box">
                <p> Modification des informations </p>
            </div>
        </div>
    </div>
    <form   method="post" action="../index.php?action=update" class="row g-3" onsubmit="return verif()" style="margin-left: 18%; ">
        
    <input type="hidden" name="cin" class="form-control" id="cin" value="<?= $cin ?>">
    <div class="col-md-5">
            <label for="Email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="<?= $email ?>">
        </div>
        <div class="col-md-5">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom"class="form-control" id="name" value="<?= $nom ?>">
        </div>
        <div class="col-md-5">
            <label for="prenom" class="form-label">Prenom</label>
            <input type="text" name="prenom" class="form-control" id="prenom"  value="<?= $pre ?>">
        </div>
        <div class="col-md-5">
            <label for="number" class="form-label">Number</label>
            <input type="number" name="number" class="form-control" id="number" value="<?= $number ?>">
        </div>
     
        <div class="col-md-5">
            <label for="pwd" class="form-label">New Password</label>
            <input type="password" name="pwd" class="form-control" id="pwd">
        </div>
        <div class="col-md-5">
            <label for="cpwd" class="form-label">Verfication de mot de passe</label>
            <input type="password" name ="cpwd" class="form-control" id="cpwd">
        </div>
        <div class="col-10">
            <label for="gv" class="form-label">Address</label>
            <input type="text" class="form-control" name="gv" id="gv" placeholder="Manouba" value="<?= $gv ?>">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Modifier</button>
        </div>
    </form>
    <div style="margin-top:3.3%;"> </div>

<script src="../assets/js/update.js"></script>



</section>

<?php require_once("./includes/footer.php"); ?>