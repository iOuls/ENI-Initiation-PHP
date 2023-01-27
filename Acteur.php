<?php

require_once 'Artiste.php';
require_once 'FaireDeLaPromo.php';

class Acteur extends Artiste implements FaireDeLaPromo
{
    private bool $hallOfFame;
    private static int $nbActeurs = 0;

    public function __construct(bool $hallOfFame, string $nom, string $prenom)
    {
        parent::__construct($nom, $prenom);
        $this->hallOfFame = $hallOfFame;
        static::$nbActeurs++;
    }

    public static function getNbActeurs() : int
    {
        return self::$nbActeurs;
    }

    public function accepte($film){
        if ($film->budget > 1000000){
            $film->ajouterActeur($this);
        }
    }

    public function vendre()
    {
        echo 'Je vends un truc, OSEF!';
    }

}