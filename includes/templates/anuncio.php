<?php 
    //importar DB
    require 'includes/config/database.php';
    $db = conectarDB();
    //consultar
    $query = "SELECT * FROM propiedades LIMIT ${limite}";

    //obtener resultados
    $resultado = mysqli_query($db, $query);



?>


<div class="contenedor-anuncios">
    <?php while($propiedad = mysqli_fetch_assoc($resultado)): ?>
            <div class="anuncio">
           
                <img loading="lazy" src="/img/<?php echo $propiedad['imagen']; ?>" alt="anuncio 1">
               
                <div class="contenido-anuncio">
                    <h3><?php echo $propiedad['titulo']; ?></h3>
                    <p><?php echo $propiedad['descripcion']; ?></p>
                    <p class="precio">$ <?php echo $propiedad['precio']; ?></p>
                    <ul class="iconos-caracteristica">
                        <li>
                            <img class="icono" loading="lazy" src="build/img//icono_wc.svg" alt="icono wc">
                            <p><?php echo $propiedad['wc']; ?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img//icono_estacionamiento.svg" alt="cono_dormitorio">
                            <p><?php echo $propiedad['estacionamiento']; ?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img//icono_dormitorio.svg" alt="cono_dormitorio">
                            <p><?php echo $propiedad['habitaciones']; ?></p>
                        </li>
                    </ul>
                    <a class="boton-amarillo-block" href="detalleAnuncio.php?id=<?php echo $propiedad['id']; ?>">Ver Propiedad</a>
                </div>
            </div>
        <?php endwhile; ?>
        </div>

        <?php 
        //cerrar conexion
        mysqli_close($db);
        ?>