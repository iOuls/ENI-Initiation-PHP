<?php

class Electeur extends Personne
{
    private string $bureau_de_vote;
    private bool $vote;

    function avote(){
        $this->vote = true;
    }
}