<?php
require_once 'Connexion.class.php';
require_once 'Restaurant.class.php';
require_once 'Avis.class.php';
$cnx = new Connexion();
$leResto = $cnx->unResto($_GET['idRestaurant']);
$lesAvis = $cnx->avisDUnResto($_GET['idRestaurant']);
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $leResto->getNom() ?> - Reste au rang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="container">

<div class="menu">
    <?php
    require_once 'header.php';
    ?>
</div>

<div class="contenu">

    <h1 class="titreResto"><?= $leResto->getNom() ?></h1>

    <p><?= $leResto->getAdresse() ?><br>
        <?= $leResto->getCodePostal() ?> <?= $leResto->getVille() ?><br>
        <?= $leResto->getTelephone() ?>
    </p>

    <h2>Description</h2>
    <p><?= $leResto->getDescription() ?></p>

    <h2>Avis</h2>
    <?php

    for ($i = 0; $i < count($lesAvis); $i++) {
        echo '<p><div class="auteur">' .
        ($lesAvis[$i]->getAuteur() != '' || $lesAvis[$i]->getAuteur() != null)
            ? '<b>' . $lesAvis[$i]->getAuteur() . '</b> ' : '<i>anonyme</i>' .
            '</div><br>';
        for ($j = 0; $j < 5; $j++) {
            if (($j + 1) <= $lesAvis[$i]->getNote()) {
                echo '▣';
            } else {
                echo '▢';
            }
        }

        echo '<p>' . $lesAvis[$i]->getCommentaire() . '</p></p>';
    }
    ?>

    <a class="btn" href="ajouterAvis.php?idRestaurant=<?= $leResto->getIdRestaurant() ?>">Ajouter un avis</a>
</div>
</body>
</html>