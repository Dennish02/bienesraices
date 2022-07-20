
<?php 
  require 'includes/funciones.php';
  incluirTemplate('header'); 
?>


    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>
        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp" >
                    <source srcset="build/img/nosotros.jpg" type="image/jpg" >
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Nosotrs">
                </picture>
            </div>
            <div class="texto-nosotros">
                <blockquote>
                    25 Años de experiencia
                </blockquote>
                <p>
                    Es un hecho establecido hace demasiado tiempo que un 
                    lector se distraerá con el contenido del texto de un
                     sitio mientras que mira su diseño. El punto de usar 
                     Lorem Ipsum es que tiene una distribución más o menos 
                     normal de las letras, al contrario de usar textos como 
                     por ejemplo "Contenido aquí, contenido aquí".
                      Estos textos hacen parecerlo un español que se puede 
                      leer. Muchos paquetes de autoedición y editores 
                      de 
                      páginas web usan el Lorem Ipsum como su texto por 
                      defecto, y al hacer una búsqueda de "Lorem Ipsum" 
                      va a dar por resultado muchos sitios web que usan 
                      este texto si se encuentran en 
                    estado de desarrollo. Muchas versiones han evolucionado
                     a través de los años, algunas veces por accidente, otras 
                     veces a propósito (por ejemplo insertándole humor y cosas por el estilo).
                </p>
                <p>
                    Es un hecho establecido hace demasiado tiempo que un 
                    lector se distraerá con el contenido del texto de un
                     sitio mientras que mira su diseño. El punto de usar 
                     Lorem Ipsum es que tiene una distribución más o menos 
                     normal de las letras, al contrario de usar textos como 
                     por ejemplo "Contenido aquí, contenido aquí".
                 </p>
            </div>
        </div>
    </main>
    <section class="contenedor seccion">
        <h1>Más Sobre nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur
                    adipisicing elit. Natus amet dolore soluta excepturi accusantium
                    ea quod, aut id reiciendis officia magni possimus maxime,
                    dolores incidunt, asperiores eos eius veniam consequatur.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur
                    adipisicing elit. Natus amet dolore soluta excepturi accusantium
                    ea quod, aut id reiciendis officia magni possimus maxime,
                    dolores incidunt, asperiores eos eius veniam consequatur.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur
                    adipisicing elit. Natus amet dolore soluta excepturi accusantium
                    ea quod, aut id reiciendis officia magni possimus maxime,
                    dolores incidunt, asperiores eos eius veniam consequatur.</p>
            </div>
        </div>

    </section>
    <?php
       incluirTemplate('footer');
    ?>
