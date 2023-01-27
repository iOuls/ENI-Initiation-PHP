<?php
require_once 'exercice1.php';
(verifCookie()[0] == null) ? $fond = null : $fond = verifCookie()[0];
(verifCookie()[1] == null) ? $texte = null : $texte = verifCookie()[1];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercice 1</title>
</head>
<body style="color:<?= (!$texte == null) ? $texte : '' ?>;
        background-color:<?= (!$fond == null) ? $fond : '' ?>;
        ">

<h1>Module 6 - Exercice 1</h1>

<form action="" method="POST">
    <label for="fond">Fond</label>
    <select name="fond">
        <option value="blueviolet">Violet</option>
        <option value="black">Noir</option>
    </select><br><br>

    <label for="texte">Texte</label>
    <select name="texte">
        <option value="white">Blanc</option>
        <option value="lightgrey">Gris</option>
    </select><br><br>

    <input type="submit" name="changer" value="Changer">

    <?php
    if (isset($_POST['changer'])) {
        creationCookie($_POST['fond'], $_POST['texte']);
        $fond = $_POST['fond'];
        $texte = $_POST['texte'];
    }
    ?>
</form>

</body>
</html>