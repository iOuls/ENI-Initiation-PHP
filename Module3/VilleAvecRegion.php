<?php

require_once 'Ville.php';

class VilleAvecRegion extends Ville
{
    private string $region;

    public function __construct(string $nom, int $departement, string $region)
    {
        parent::constructor($nom, $departement);
        $this->region = $region;
    }

    public function afficher(){
        echo 'la ville ' . $this->getNom() . ' est dans le département ' . $this->getDepartement() .
            ' de la région ' . $this->region;
    }
}