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
        //revisar si existe el usuario

        $query = "SELECT * FROM usuarios WHERE email = '${email}'";
        $resultado = mysqli_query($db, $query);

        if($resultado->num_rows){
            //revisar el password
            $usuario = mysqli_fetch_assoc($resultado);

            $auth = password_verify($pass, $usuario['password']);
            //auth queda en true si es correcta
            if($auth){
                //usuario autenticado con superglobal session_Start

                session_start();
                //llenar el arreglo de la sesion

                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['loguin'] = true;
                header('Location: /admin');
            }else{
                $errores[]= "Password es incorrecto";
            }
        }else{
            $errores[]="El usuario no existe";
        }
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