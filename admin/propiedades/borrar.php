
    <?php
    require '../../includes/funciones.php';
    $auth = estaAtuh();
    if(!$auth){
        header('Location: /login.php');
    }


    incluirTemplate('header');
    ?>
    <main class="contenedor seccion">
        <h1>Borrar</h1>

    </main>
    <?php

    incluirTemplate('footer');
    ?>