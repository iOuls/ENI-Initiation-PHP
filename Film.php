<?php

class Film
{
    private int $budget;
    private $acteurs;

    public function __construct(int $budget = 0)
    {
        $this->budget = $budget;
        $this->acteurs = array();
    }

    public function getBudget(): int
    {
        return $this->budget;
    }

    public function setBudget(int $budget): void
    {
        $this->budget = $budget;
    }

    public function getActeurs(): array
    {
        return $this->acteurs;
    }

    public function setActeurs(array $acteurs): void
    {
        $this->acteurs = $acteurs;
    }

    public function ajouterActeur($acteur){
        $this->acteurs[] = $acteur;
    }
}