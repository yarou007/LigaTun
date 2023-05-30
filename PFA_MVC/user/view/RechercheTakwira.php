<?php session_start();
 require_once("./includes/sidebar.php"); ?>

<section id="recherche_takwira">
<div class="row">
    <div class="col-lg-12 w-75" style="background-color : white ; font-weight:600 ; font-size : 1.20rem ; border-radius :20px ; margin-left : 15%; ">
        <p style="margin-top :1%;"> Veuillez ajouter le date , le temps et la gouvernorat ou vous etes disponible <br> et s'il ya une disponibilité de rejoindre une Takwira , vous sera notifié </p>
    </div>
</div>
<br>
<div class="row">
    <div class="form_recherche">
        <br>
        <div class="col-lg-12 text-center">
            <form action="" method="POST">
                <p><input type="text" name="cin" id="cin" placeholder="Cin"></p>
                <p><input type="text" name="name" id="name" placeholder="Name"></p>
                <p><input type="text" name="prenom" id="prenom" placeholder="Prenom"></p>
                <p><input type="date" name="dd" id="dd" placeholder="Date de disponibilite"></p>
                <p><input type="text" name="hd" id="hd" placeholder="l'heure de diposibilite"></p>
                <p><input type="text" name="gv" id="gv" placeholder="Gouvernorat"></p>
                <p><textarea style="border-top-right-radius: 15px ; border-top-left-radius: 15px; height : 4.2rem; width : 17rem;" rows="3" placeholder="Anything to say ?"></textarea>
                <div class="btns">
                    <input type="submit" value="Confirmer">
                    <input type="reset" value="Annuler">
                </div>
               
            </form>
        </div>
    </div>
</div>
<div style="margin-top:1.9%;"> </div>
</section>

<?php require_once("./includes/footer.php"); ?>