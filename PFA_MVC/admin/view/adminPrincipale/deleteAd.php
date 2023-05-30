<?php
session_start();
$title = "Supprimer Admin";
$idAd = $_SESSION['idAd'];
ob_start();
/* ay haja besh tektbeha binet ob_start() w ob_get_clean() 
besh tet'haz w tethat fil ob_get_clean (flushed out) w tet7at fil $content
*/

?>
<p>Voulez vous vraimenet supprimer l'Admin? ? :</p>
<a class="btn btn-danger" href="../../index.php?action=destroyAd&idAd=<?php echo $idAd ?>">Valider</a>
<a class ="btn btn-warning" href="../../index.php?action=listeAdmin">Annuler</a>
<?php

$content = ob_get_clean();
require_once('accueilAdP.php');

?>