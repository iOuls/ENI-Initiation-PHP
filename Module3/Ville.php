<?php

class Ville
{
    private string $nom;
    private int $departement;
    private static string $nomPlusLong = '';

    public function __construct(string $nom, int $departement)
    {
        $this->nom = $nom;
        $this->departement = $departement;
        if (strlen($this->nom) > strlen(static::$nomPlusLong)){
            static::$nomPlusLong = $this->nom;
        }
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function getDepartement(): int
    {
        return $this->departement;
    }

    public function setDepartement(int $departement): void
    {
        $this->departement = $departement;
    }


}