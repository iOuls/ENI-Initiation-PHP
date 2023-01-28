<?php

require_once 'Restaurant.class.php';
require_once 'Avis.class.php';

class Connexion extends PDO
{
    // liste des requêtes
    private const SELECT_RESTAURANTS =
        'SELECT idRestaurant, nom, adresse, cp, ville, telephone, description 
            FROM restaurants;';

    private const SELECT_RESTAURANT =
        'SELECT idRestaurant, nom, adresse, cp, ville, telephone, description 
            FROM restaurants
            WHERE idRestaurant = :idRestaurant;';

    private const SELECT_AVIS_RESTAURANT =
        'SELECT idRestaurant, idAvis, auteur, note, commentaire 
            FROM avis
            WHERE idRestaurant = :idRestaurant;';

    private const INSERT_AVIS =
        'INSERT INTO avis (idRestaurant, idAvis, auteur, note, commentaire) VALUES
           (:idRestaurant, :idAvis, :auteur, :note, :commentaire);';

    private const SELECT_LAST_AVIS =
        'SELECT max(idAvis) FROM avis;';

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
                    $restaurant['nom'], $restaurant['ville'], $restaurant['adresse'],
                    $restaurant['cp'], $restaurant['telephone'], $restaurant['description']);
                $i++;
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $listeRestaurants;
    }

    public function unResto($idRestaurantRech): Restaurant
    {
        $leResto = null;

        try {
            $cnx = new Connexion();
            $pstmt = $cnx->connexion()->prepare(self::SELECT_RESTAURANT);
            $pstmt->bindValue(':idRestaurant', $idRestaurantRech);
            $pstmt->execute();
            $restaurant = $pstmt->fetch();

            $leResto = new Restaurant($restaurant['idRestaurant'],
                $restaurant['nom'], $restaurant['ville'], $restaurant['adresse'],
                $restaurant['cp'], $restaurant['telephone'], $restaurant['description']);

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $leResto;
    }

    public function avisDUnResto($idRest): array
    {
        $listeAvis = [];
        try {
            $cnx = new Connexion();
            $pstmt = $cnx->connexion()->prepare(self::SELECT_AVIS_RESTAURANT);
            $pstmt->bindValue(':idRestaurant', $idRest);
            $pstmt->execute();
            $resultats = $pstmt->fetchAll();

            $i = 0;
            foreach ($resultats as $item => $avis) {
                $listeAvis[$i] = new Avis($avis['idRestaurant'], $avis['idAvis'],
                    $avis['note'],
                    ($avis['auteur'] == null) ? '' : $avis['auteur'],
                    $avis['commentaire']);
                $i++;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $listeAvis;
    }

    public function lastAvis()
    {
        $idAvis = null;
        try {
            $cnx = new Connexion();
            $stmt = $cnx->connexion()->query(self::SELECT_LAST_AVIS);
            $stmt->execute();
            $idAvis = $stmt->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $idAvis;
    }

    public function ajouterAvis(Avis $avis)
    {
        try {
            $cnx = new Connexion();
            $stmt = $cnx->connexion()->prepare(self::INSERT_AVIS);
            $stmt->bindValue(':idRestaurant', $avis->getIdRestaurant());
            $stmt->bindValue(':idAvis', $avis->getIdAvis());
            $stmt->bindValue(':auteur', $avis->getAuteur());
            $stmt->bindValue(':note', $avis->getNote());
            $stmt->bindValue(':commentaire', $avis->getCommentaire());
            $stmt->execute();
            echo 'Avis enregistré avec succès.';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}