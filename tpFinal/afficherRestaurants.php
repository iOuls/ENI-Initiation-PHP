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
</head>
<body>

<?php
require_once 'header.php';
?>

<h1>Vos restaurants préférés</h1>

<?php

for ($i = 0; $i < count($listeRestaurants); $i++) {
    echo '<a href="?idRestaurant=' . $listeRestaurants[$i]->getIdRestaurant()
        . '"><h2>' . $listeRestaurants[$i]->getNom() . '</h2></a>';
    echo '<p><i>' . $listeRestaurants[$i]->getVille() . '</p></i>';
    echo '<p>' . $listeRestaurants[$i]->getDescription() . '</p>';
    echo '<hr>';
}
?>

</body>
</html>
