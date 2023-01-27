<?php
require_once 'exercice2.php';
(verifCookie()[0] == null) ? $login = null : $login = verifCookie()[0];
(verifCookie()[1] == null) ? $mdp = null : $mdp = verifCookie()[1];
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Exercice 2</title>
</head>
<body>

<h1>Module 6 - Exercice 2</h1>

<form action="" method="POST">
    <div class="container">
        <label for="login">Login : </label>
        <input type="text" name="login" id="login" value="<?= ($login = null) ? $login : '' ?>"><br>
    </div>

    <div class="container">
        <label for="mdp">Mot de passe : </label>
        <input type="password" name="mdp" id="mdp" value="<?= ($mdp = null) ? sha1($mdp) : '' ?>"><br>
    </div>

    <div class="container">
        <label for="jours">Conserver ces informations pendant : </label>
        <input type="text" name="jours" id="jours"><br>
    </div>

    <div class="container">
        <input type="submit" name="valider" value="Se connecter">
    </div>

    <?php
    if (isset($_POST['valider'])) {
        creationCookie($_POST['login'], hash('sha256', $_POST['mdp']), $_POST['jours']);
        $login = $_POST['login'];
        $mdp = hash('sha256', $_POST['mdp']);
    }
    ?>

</form>

</body>
</html>
