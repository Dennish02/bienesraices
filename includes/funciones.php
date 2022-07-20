<?php

require 'app.php';

function incluirTemplate( string $nombre , bool $inicio = false){
    include TEMPLATES_URL . "/${nombre}.php";
}
function estaAtuh(): bool
{
    session_start();
    $auth = $_SESSION['loguin'];
    if ($auth) {
        return true;
    }
    return false;
}