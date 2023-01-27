<?php

class Avis
{
    private int $idRestaurant;
    private int $idAvis;
    private string $auteur;
    private int $note;
    private string $commentaire;

    public function __construct(int $idRestaurant, int $idAvis, string $auteur = '',
                                int $note, string $commentaire = '')
    {
        $this->idRestaurant = $idRestaurant;
        $this->idAvis = $idAvis;
        $this->auteur = $auteur;
        $this->note = $note;
        $this->commentaire = $commentaire;
    }

    public function getIdRestaurant(): int
    {
        return $this->idRestaurant;
    }

    public function setIdRestaurant(int $idRestaurant): void
    {
        $this->idRestaurant = $idRestaurant;
    }

    public function getIdAvis(): int
    {
        return $this->idAvis;
    }

    public function setIdAvis(int $idAvis): void
    {
        $this->idAvis = $idAvis;
    }

    public function getAuteur(): string
    {
        return $this->auteur;
    }

    public function setAuteur(string $auteur): void
    {
        $this->auteur = $auteur;
    }

    public function getNote(): int
    {
        return $this->note;
    }

    public function setNote(int $note): void
    {
        $this->note = $note;
    }

    public function getCommentaire(): string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): void
    {
        $this->commentaire = $commentaire;
    }


}