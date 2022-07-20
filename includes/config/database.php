<?php

function conectarDB() : mysqli {
    $db = mysqli_connect('localhost', 'root', '748532', 'bienesraices');
 if(!$db){
    echo "no se pudo conectar";
    exit;
 }
 return $db;
}