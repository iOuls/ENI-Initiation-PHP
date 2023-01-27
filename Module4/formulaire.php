<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaires</title>
</head>
<body>
<form action="" method="POST">
    <fieldset>
        <legend>Calcul des taxes</legend>
        <label for="prixHT">Prix HT </label><input type="number" name="prixHT" id="prixHT" required> €<br>
        <label for="txTVA">Taux de TVA </label>
        <select name="txTVA" id="txTVA" required>
            <?php
            $taux = [2.1, 5.5, 10, 20];
            foreach ($taux as $idxTaux => $leTaux) {
                echo '<option value="' . $leTaux . '">' . $leTaux . "</option>";
            }
            ?>
        </select> %<br>
        <input type="submit" name="calculer" value="Calculer"><br>
        <?php
        $montantHT = 0;
        $montantTTC = 0;

        if (isset($_POST['calculer'])) {
            $message = '';
            $prixHT = filter_var($_POST['prixHT'], FILTER_VALIDATE_FLOAT);
            $txTVA = filter_var($_POST['txTVA'], FILTER_VALIDATE_FLOAT);

            if ($prixHT == 0 || $prixHT < 0) {
                $message .= "Le prix HT doit être un chiffre obligatoirement être supérieur à 0.<br>";
            }

            if ($txTVA <> 2.1 && $txTVA <> 5.5 && $txTVA <> 10 && $txTVA <> 20) {
                $message .= "Le taux de TVA ne fait pas partie de la liste prédéfinie.";
            }

            if (!$message) {

                $montantTVA = ($prixHT * $txTVA) / 100;
                $montantTTC = $prixHT + $montantTVA;

                echo '<label for="montantTVA">Montant de la TVA </label>
                <input type="number" name="montantTVA" id="montantTVA" value="' . $montantTVA . '"> €<br>';
                echo '<label for="montantTTC">Montant TTC </label>
                <input type="number" name="montantTTC" id="montantTTC" value="' . $montantTTC . '"> €';
            } else {
                echo $message;
            }
        }
        ?>
    </fieldset>
</form>
</body>
</html>