<?php

require_once 'Personne.php';

class Client extends Personne
{
    private string $adresse;

    function setCoord(string $adr){
        $this->adresse = $adr;
    }

    public function __toString() : string
    {
        return $this->nom . ' - ' . $this->prenom . ' - ' . $this->adresse;
    }
}