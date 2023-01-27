<?php
const LISTE = ['acheter', 'vendre', 'louer'];
foreach (LISTE as $item) {
    if (isset($_POST["$item"])) {
        header("location: ./$item.php");
    }
}
function afficher()
{
    foreach (LISTE as $item) {
        echo '<input type="submit" name="' . $item . '" value="' . $item . '">';
    }
}

?>
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
        <legend>Vous souhaitez...</legend>
        <?=
        afficher()
        ?>
    </fieldset>
</form>
</body>
</html>