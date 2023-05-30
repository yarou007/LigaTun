<?php
session_start();
$title = "Supprimer Terrain";
$idTerrain = $_SESSION['idTerrain'];
ob_start();
/* ay haja besh tektbeha binet ob_start() w ob_get_clean() 
besh tet'haz w tethat fil ob_get_clean (flushed out) w tet7at fil $content
*/

?>
<p>Voulez vous vraimenet supprimer le terrain ? :</p>
<a class="btn btn-danger" href="../../index.php?action=destroyTerrain&idTerrain=<?php echo $idTerrain ?>">Valider</a>
<a class ="btn btn-warning" href="../../index.php?action=listeTerrain">Annuler</a>
<?php

$content = ob_get_clean();
require_once('accueilAdP.php');

?>