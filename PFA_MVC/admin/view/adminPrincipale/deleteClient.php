<?php
session_start();
$title = "Supprimer Client";
$Cin = $_SESSION['Cin'];
ob_start();
/* ay haja besh tektbeha binet ob_start() w ob_get_clean() 
besh tet'haz w tethat fil ob_get_clean (flushed out) w tet7at fil $content
*/

?>
<p>Voulez vous vraimenet supprimer le Client? ? :</p>
<a class="btn btn-danger" href="../../index.php?action=destroyClient&Cin=<?php echo $Cin ?>">Valider</a>
<a class ="btn btn-warning" href="../../index.php?action=listeClient">Annuler</a>
<?php

$content = ob_get_clean();
require_once('accueilAdP.php');

?>