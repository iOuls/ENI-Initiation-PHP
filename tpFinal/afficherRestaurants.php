<?php
require_once 'Connexion.class.php';
require_once 'Restaurant.class.php';
$cnx = new Connexion();
$listeRestaurants = $cnx->listRestaurants();
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reste au rang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="container">

<div class="menu">
    <?php
    require_once 'header.php';
    ?>
</div>

<div class="contenu">
    <h1>Les restos</h1>

    <?php
    for ($i = 0; $i < count($listeRestaurants); $i++) {
        echo '<a href="afficherUnResto.php?idRestaurant=' . $listeRestaurants[$i]->getIdRestaurant()
            . '"><h2 class="card-title">' . $listeRestaurants[$i]->getNom() . '</h2></a>';
        echo '<div class="card"><i>' . $listeRestaurants[$i]->getVille() . '</i>';
        echo '<p>' . $listeRestaurants[$i]->getDescription() . '</p></div>';
    }
    ?>
</div>
</body>
</html>
