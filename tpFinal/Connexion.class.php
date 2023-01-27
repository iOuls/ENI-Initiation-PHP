<?php

require_once 'Restaurant.class.php';

class Connexion extends PDO
{
    // liste des requêtes
    private const SELECT_RESTAURANTS = 'SELECT idRestaurant, nom, adresse, cp, ville, telephone, description FROM restaurants;';


    // infos de connexion

    private static $dsn = 'mysql:host=localhost;dbname=restaurant';
    private static $id = 'root';
    private static $pass = 'Passw0rd';

    // singleton de connexion
    private static $_instance = false;

    public function __construct()
    {
    }

    private static function connexion()
    {
        if (!self::$_instance) {
            try {
                self::$_instance = new PDO(self::$dsn, self::$id, self::$pass);
                return self::$_instance;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        return self::$_instance;
    }

    // liste les restaurants de la bdd pour afficherRestaurants.php
    public function listRestaurants(): array
    {
        $resultats = null;
        try {
            $cnx = new Connexion();
            $pstmt = $cnx->connexion()->prepare(self::SELECT_RESTAURANTS);
            $pstmt->execute();
            $resultats = $pstmt->fetchAll();

            $listeRestaurants = [];
            $i = 0;
            foreach ($resultats as $item => $restaurant) {
                $listeRestaurants[$i] = new Restaurant($restaurant['idRestaurant'],
                    $restaurant['nom'], $restaurant['adresse'], $restaurant['cp'], $restaurant['ville']
                    , $restaurant['telephone'], $restaurant['descrition']);
                $i++;
            }

        } catch (PDOException $e) {
            $e->getMessage();
        }
        return $listeRestaurants;
    }

}