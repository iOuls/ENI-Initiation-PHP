<?php
require_once 'Connexion.class.php';
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter un nouveau modèle</title>
    <link rel="stylesheet" href="css\style.css">
</head>
<body>

<div class="titre">
    <h1>Gestion des CONS cession</h1>
</div>

<h2>Exercice 1</h2>
<table>
    <?php
    $query = 'SELECT id_modele, marque, modele, carburant FROM modeles;';
    $cnx = new Connexion();
    $pstmt = $cnx->connexion()->prepare($query);
    $pstmt->execute();
    $resultat = $pstmt->fetchAll();

    echo '<tr class="btn">';
    echo '<td style="font-weight: bold">Identifiant</td>';
    echo '<td style="font-weight: bold">Marque</td>';
    echo '<td style="font-weight: bold">Modèle</td>';
    echo '<td style="font-weight: bold">Carburant</td>';
    echo '</tr>';

    foreach ($resultat as $item) {
        echo '<tr>';
        echo '<td>' . $item["id_modele"] . '</td>';
        echo '<td>' . $item["marque"] . '</td>';
        echo '<td>' . $item["modele"] . '</td>';
        echo '<td>' . $item["carburant"] . '</td>';
        echo '</tr>';
    }

    ?>
</table>

<h2>Exercice 2</h2>
<form action="" method="POST">
    <fieldset>
        <legend>Ajouter un modèle de bagnole</legend>
        <label for="identifiant">Identitifiant</label>
        <input type="text" name="identifiant" id="identifiant" required><br>

        <label for="marque">Marque</label>
        <input type="text" name="marque" id="marque" required><br>

        <label for="modele">Modèle</label>
        <input type="text" name="modele" id="modele" required><br>

        <select name="energie" id="energie" required>
            <?php
            $energie = ['Essence', 'Diesel', 'GPL', 'Électrique'];
            foreach ($energie as $item => $valeur) {
                echo '<option value="' . $valeur . '">' . $valeur . "</option>";
            }
            ?>
        </select><br>

        <input class="btn" type="submit" name="ajouter" value="Ajouter">
        <?php
        if (isset($_POST['ajouter'])) {
            try {
                $message = '';

                $query = 'INSERT INTO modeles (id_modele, marque, modele, carburant)
                VALUES (:idModele, :marque, :modele, :carburant);';

                // verification de la connexion
                $cnx = new Connexion();
                $pstmt = $cnx->connexion()->prepare($query);

                $identifiant = $_POST['identifiant'];
                $marque = $_POST['marque'];
                $modele = $_POST['modele'];
                $energie = $_POST['energie'];

                if (!$identifiant) {
                    $message .= 'L\'identifiant doit être renseigné.<br>';
                }
                if (!$marque) {
                    $message .= 'La marque doit être renseignée.<br>';
                }
                if (!$modele) {
                    $message .= 'Le modèle doit être renseigné.<br>';
                }

                if (!$energie) {
                    $message .= 'L\'énergie doit être renseignée.<br>';
                }

                if (!$message) {
                    // config requête : :idModele, :marque, :modele, :carburant
                    $pstmt->bindValue(':idModele', $identifiant);
                    $pstmt->bindValue(':marque', $marque);
                    $pstmt->bindValue(':modele', $modele);

                    switch ($energie) {
                        case 'Essence' :
                            $pstmt->bindValue(':carburant', 'essence');
                            break;
                        case 'Diesel' :
                            $pstmt->bindValue(':carburant', 'diesel');
                            break;
                        case 'GPL' :
                            $pstmt->bindValue(':carburant', 'gpl');
                            break;
                        case 'Électrique' :
                            $pstmt->bindValue(':carburant', 'électrique');
                            break;
                    }

                    $pstmt->execute();
                    echo '<p>Ajout effectué avec succès !</p>';

                } else {
                    // affichage message
                    echo '<p>' . $message . '</p>';
                }
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        ?>
    </fieldset>
</form>

<h2>Exercice 3</h2>

<?php
$connexion = false;
$prenom = null;
$adresse = null;
$codepostal = null;
$ville = null;

(isset($_POST['usernumber'])) ? $usernumber = $_POST['usernumber'] : $usernumber = null;
(isset($_POST['lastname'])) ? $lastname = $_POST['lastname'] : $lastname = null;
?>
<form action="" method="POST">
    <fieldset>
        <legend>Accédez à vos informations</legend>

        <label for="usernumber">Numéro d'authentification</label>
        <input type="text" name="usernumber" id="usernumber"
               value="<?= ($usernumber != null) ? $usernumber : '' ?>"><br>

        <label for="lastname">Nom de famille</label>
        <input type="text" name="lastname" id="lastname"
               value="<?= ($lastname != null) ? $lastname : '' ?>"><br>

        <input class="btn" type="submit" name="connexion" value="Connexion"><br>

        <?php

        if (isset($_POST['connexion'])) {
            try {
                $message = '';
                $query = 'SELECT id_pers, nom, prenom, adresse, codepostal, ville 
                            FROM proprietaires 
                            WHERE id_pers = :identifiant AND nom = :nom;';
                $cnx = new Connexion();
                $pstmt = $cnx->connexion()->prepare($query);

                $usernumber = $_POST['usernumber'];
                $lastname = $_POST['lastname'];

                $pstmt->bindValue(':identifiant', $usernumber);
                $pstmt->bindValue(':nom', $lastname);

                $pstmt->execute();
                $resultat = $pstmt->fetch();

                if (count($resultat) > 0) {
                    $connexion = true;

                    $prenom = $resultat['prenom'];
                    $adresse = $resultat['adresse'];
                    $codepostal = $resultat['codepostal'];
                    $ville = $resultat['ville'];
                }

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        ?>
    </fieldset>
</form>

<?php
if ($connexion === true) {
    ?>

    <form action="" method="POST">
        <fieldset>

            <label for="lastname">Nom de famille</label>
            <input type="text" name="lastname" id="lastname" value="<?= $lastname ?>"><br>

            <label for="fistname">Prénom</label>
            <input type="text" name="fistname" id="fistname" value="<?= $prenom ?>"><br>

            <label for="adress">Adresse</label>
            <input type="text" name="adress" id="adress" value="<?= $adresse ?>"><br>

            <label for="codepostal">Code Postal</label>
            <input type="text" name="codepostal" id="codepostal" value="<?= $codepostal ?>"><br>

            <label for="ville">Ville</label>
            <input type="text" name="ville" id="ville" value="<?= $ville ?>"><br>

            <input class="btn" type="submit" name="saveuser" value="Enregistrer"><br>

            <?php
            if (isset($_POST['saveuser'])) {
                try {
                    $message = '';
                    $query = 'UPDATE proprietaires 
                                SET nom = :nom, prenom = :prenom, adresse = :adresse, codepostal = :codepostal, ville = :ville
                                WHERE id_pers = :usernumber;';

                    $cnx = new Connexion();
                    $pstmt = $cnx->connexion()->prepare($query);

                    $pstmt->bindValue(':nom', $lastname);
                    $pstmt->bindValue(':prenom', $prenom);
                    $pstmt->bindValue(':adresse', $adresse);
                    $pstmt->bindValue(':codepostal', $codepostal);
                    $pstmt->bindValue(':ville', $ville);
                    $pstmt->bindValue(':usernumber', $usernumber);

                    $pstmt->execute();

                    echo '<p>Mise à jour terminée.</p>';

                } catch (PDOException $e) {
                    die($e->getMessage());
                }
            }
            ?>
        </fieldset>
    </form>

    <?php
}
?>

</body>
</html>