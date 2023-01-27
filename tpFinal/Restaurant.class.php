<?php

class Restaurant
{
    private int $idRestaurant;
    private string $nom;
    private string $adresse;
    private string $codePostal;
    private string $ville;
    private string $telephone;
    private string $description;
    private array $avis;

    public function __construct(int    $idRestaurant, string $nom, string $adresse = '', string $codePostal = '',
                                string $ville, string $telephone = '', string $description = '', array $avis = [])
    {
        $this->idRestaurant = $idRestaurant;
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->codePostal = $codePostal;
        $this->ville = $ville;
        $this->telephone = $telephone;
        $this->description = $description;
        $this->avis = $avis;
    }

    public function setAvis(array $avis)
    {
        $this->avis = $avis;
    }

    public function getAvis(): array
    {
        return $this->avis;
    }

    public function getIdRestaurant(): int
    {
        return $this->idRestaurant;
    }

    public function setIdRestaurant(int $idRestaurant): void
    {
        $this->idRestaurant = $idRestaurant;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function getAdresse(): string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): void
    {
        $this->adresse = $adresse;
    }

    public function getCodePostal(): string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): void
    {
        $this->codePostal = $codePostal;
    }

    public function getVille(): string
    {
        return $this->ville;
    }

    public function setVille(string $ville): void
    {
        $this->ville = $ville;
    }

    public function getTelephone(): string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): void
    {
        $this->telephone = $telephone;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}