
<?php
    //validar por u id de propiedad valido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header('Location: /admin');
    }
     //importar DB
     require 'includes/config/database.php';
     $db = conectarDB();
     //consultar
     $query = "SELECT * FROM propiedades WHERE id = ${id}";
 
     //obtener resultados
     $resultado = mysqli_query($db, $query);
     if(!$resultado->num_rows){
        header('Location: /');
     }
     $propiedad = mysqli_fetch_assoc($resultado);
    //  echo "<pre>";
    //  var_dump($propiedad);
    //  echo "<pre/>";
    //  exit;

 require 'includes/funciones.php';
 incluirTemplate('header'); 
?>
    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad['titulo']; ?></h1>
    <img loading="lazy" src="/img/<?php echo $propiedad['imagen']; ?>" alt="imagen propiedad" >
       
        <div class="resumen-propiedad">
            <p class="precio">
                $ <?php echo $propiedad['precio']; ?>
            </p>
            <ul class="iconos-caracteristica">
                <li>
                    <img loading="lazy" src="build/img//icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad['wc']; ?></p>
                </li>
                <li>
                    <img loading="lazy" src="build/img//icono_estacionamiento.svg" alt="cono_dormitorio">
                    <p><?php echo $propiedad['estacionamiento']; ?></p>
                </li>
                <li>
                    <img loading="lazy" src="build/img//icono_dormitorio.svg" alt="cono_dormitorio">
                    <p><?php echo $propiedad['habitaciones']; ?></p>
                </li>
            </ul>
            <p><?php echo $propiedad['descripcion']; ?></p>
        </div>
    </main>
    <?php
        mysqli_close($db);
       incluirTemplate('footer');
    ?>
