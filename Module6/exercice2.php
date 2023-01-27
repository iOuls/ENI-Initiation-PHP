<?php
function creationCookie(string $login, string $hashMdp, int $jours): void
{
    setcookie('login', $login, time() + (30 * 60 * 60 * 24 * 30 * 2));
    setcookie('hashMdp', $hashMdp, time() + ($jours * 60 * 60 * 24 * 30 * 2));
}

function verifCookie(): array
{
    (isset($_POST['login'])) ? $login = $_POST['login'] : $login = null;
    (isset($_POST['hashMdp'])) ? $hashMdp = $_POST['hashMdp'] : $hashMdp = null;
    return [$login, $hashMdp];
}