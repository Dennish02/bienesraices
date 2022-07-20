<?php 

if(!isset($_SESSION)){
    session_start();
}
$auth = $_SESSION['loguin'] ?? null;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>

<header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="index.php">
                    <img class="img" src="/build/img/logo.svg" alt="LOGO">
                </a>
                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="icono menu resposive">
                </div>
                <div class="derecha">
                    <img src="/build/img/dark-mode.svg" alt="dark-mode" class="dark-mode-boton">
                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contactos.php">Contactos</a>
                        <?php if($auth): ?>
                        <a href="cerrarsesion.php">Cerrar Sesión</a>
                       <?php else :  ; ?>
                       <a href="login.php">Iniciar Sesión</a>
                        <?php endif; ?>
                    </nav>

                </div>
            </div>
           <?php 
           if($inicio){
            echo "<h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>";
           }
           ?>
        </div>
    </header>