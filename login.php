<?php
require 'includes/config/database.php';
$db = conectarDB();


$errores = [];
//autenticar el usuario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $pass = mysqli_real_escape_string($db, $_POST['password']);

    if (!$email) {
        $errores[] = "El email es obligatorio o no es válido";
    }
    if (!$pass) {
        $errores[] = "La contraseña es obligatoria";
    }
    if(empty($errores)){
        
    }
}





require 'includes/funciones.php';
incluirTemplate('header');
?>
<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>
    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>

    <?php endforeach; ?>
    <form method="POST" class="formulario ">
        <fieldset>
            <legend>Email y Password</legend>

            <label for="email">Email:</label>
            <input name="email" type="email" placeholder="Tu email" id="email">

            <label for="password">Password:</label>
            <input name="password" type="password" placeholder="tu password" id="password">


        </fieldset>
        <input type="submit" value="Iniciar Sesion" class="boton boton-verde">
    </form>
</main>
<?php

incluirTemplate('footer');
?>