<?php
require_once 'Connexion.class.php';
require_once 'Restaurant.class.php';
require_once 'Avis.class.php';
$cnx = new Connexion();
$leResto = $cnx->unResto($_GET['idRestaurant']);
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter un avis - <?= $leResto->getNom() ?> - Reste au rang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="container">

<div class="menu">
    <?php
    require_once 'header.php';
    ?>
</div>

<div class="contenu">

    <h1 class="titreResto">Ajouter un avis sur <?= $leResto->getNom() ?></h1>

    <form method="POST" action="">
        <div class='container'>
            <div class="menu">
                <label for="nom">Pseudo </label><br><br>
                <label for="note">Note </label><br><br>
                <label for="commentaire">Commentaire </label>
            </div>
            <div class="contenu">
                <input type="text" name="nom" id="nom"><br><br>
                <input type="range" min="0" max="5" name="note" id="note"><br><br>
                <textarea name="commentaire" id="commentaire" cols="30" rows="10"></textarea>
            </div>
        </div>
        <input class='btn' type="submit" name="envoyer" value="Envoyer l'avis"><br><br>


        <?php
        if (isset($_POST['envoyer'])) {
            $message = '';
            $cnx = new Connexion();
            $idAvis = ($cnx->lastAvis()[0]) + 1;

            if (!$leResto->getIdRestaurant()) {
                $message .= 'Restaurant inconnu.<br>';
            }

            if (isset($_POST['note']) < 0 || isset($_POST['note']) < 5) {
                $message .= 'La note doit etre comprise entre 0 et 5.<br>';
            }

            if (isset($_POST['commentaire']) < 0 || isset($_POST['commentaire']) < 5) {
                $message .= 'Le commentaire est obligatoire.<br>';
            }

            if (!$message) {
                $avis = new Avis($leResto->getIdRestaurant(), $idAvis, intval($_POST['note']), $_POST['nom'], $_POST['commentaire']);
                $cnx->ajouterAvis($avis);
            } else {
                echo $message;
            }

        }

        ?>
    </form>

</div>
</body>
</html>