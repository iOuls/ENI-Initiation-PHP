<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
try {
    // chaine de connexion à la base
    $dsn = 'mysql:host=localhost;dbname=phpeni';

    // optionel : encodage UTF8 pour MySQL
    // $options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'];

    // création d'une instance de connexion à la BDD
    // et ouverture connexion
    $pdo = new PDO($dsn, 'root', 'Passw0rd');

    // test de requête
    $query = 'SELECT nom, prenom FROM utilisateurs;';
    $pstmt = $pdo->prepare($query);
    $pstmt->execute();
    $resultat = $pstmt->fetchAll();
    echo '<ul>';
    foreach ($resultat as $item) {
        echo '<li>' . $item["nom"] . ' ' . $item["prenom"] . '</li>';
    }
    echo '</ul>';

} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
</body>
</html>