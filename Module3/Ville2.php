<?php

class Ville2
{
    private string $nom;
    private int $departement;

    public function __construct(string $nom, int $departement)
    {
        $this->nom = $nom;
        $this->departement = $departement;
    }
}