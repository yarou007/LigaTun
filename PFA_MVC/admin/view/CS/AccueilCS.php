<?php  
//session_start();
$nom = $_SESSION['nom'];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MKT & SALES</title>
</head>
<body>
  <?php require_once('../CS/includes/header.php')  ?>
  <div class="container mt-2">
        <h2><?= $title ?></h2>
       <hr>
       <?= $content ?>
     </div>



<?php require_once "./../adminPrincipale/includes/footer.php"  ?>


</body>
</html>