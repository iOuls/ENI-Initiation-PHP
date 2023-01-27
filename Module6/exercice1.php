<?php

function creationCookie(string $fond, string $texte): void
{
    setcookie('fond', $fond, time() + (30 * 60 * 60 * 24 * 30 * 2));
    setcookie('texte', $texte, time() + (30 * 60 * 60 * 24 * 30 * 2));
}

function verifCookie(): array
{
    (isset($_POST['fond'])) ? $fond = $_POST['fond'] :
        ((isset($_COOKIE['fond'])) ? $fond = $_COOKIE['fond'] : $fond = null);
    
    (isset($_POST['texte'])) ? $texte = $_POST['texte'] :
        ((isset($_COOKIE['texte'])) ? $texte = $_COOKIE['texte'] : $texte = null);

    return [$fond, $texte];
}