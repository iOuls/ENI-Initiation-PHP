<!doctype html>
<html lang="fr">
<head>
    <meta name="OSEF des META POUR L INSTANT !">
    <title>Document</title>
</head>
<body>

<?php

echo '<h2>Exercice 1</h2>';
const MAX = 1000;
const MIN = 0;

function alea($nbre){
    if ($nbre > MAX || $nbre < MIN){
        return 'Nombre inférieur à '.MIN.' ou supérieur à '.MAX.'.';
    }else{
        $tirage=0;
        do{
            $tirage++;
        }while(rand(0,1000) != $nbre);
        return $tirage;
    }
}
echo alea(100);


echo '<h2>Exercice 2</h2>';
echo decroissant(1,2);
echo '<br>';
echo decroissant(3,2);

function decroissant($nb1, $nb2){
    if ($nb1 >= $nb2){
        echo $nb1.'-'.$nb2;
    }else{
        echo $nb2.'-'.$nb1;
    }
}


echo '<h2>Exercice 3</h2>';
echo pgdcRecurssive(100,10);

function pgdcRecurssive($a, $b){
    if ($b === 0)
        return $a;
    else
        return pgdcRecurssive($b, $a % $b);
}


echo '<h2>Exercice 4</h2>';
echo trianglePascal(15);

function trianglePascal($n){
    // $n = nombre de lignes
    $tableau[0][0]=1;
    for ( $i = 0; $i < $n; $i++) {
           for ($j = 0 ; $j <= $i ; $j++){
               if ($j== $i || $j==0){
                   $tableau[$i][$j] = 1;
               }else{
                   $tableau[$i][$j] = $tableau[$i-1][$j-1] + $tableau[$i-1][$j];
               }
           }
    }
    return $tableau;
}

?>

</body>
</html>
