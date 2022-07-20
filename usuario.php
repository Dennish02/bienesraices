<?php 

//importar conexion
require 'includes/config/database.php';
$db = conectarDB();

//crear email y pass
$email = 'correo@correo.com';
$password ='123456';

//hashear password 
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

//query para crear el usuaro
$query = "INSERT INTO usuarios (email, password) VALUES ('${email}','${passwordHash}')";

//agreara db

mysqli_query($db, $query);