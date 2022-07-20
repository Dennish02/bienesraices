

    <?php
        $inicio = true;
        require 'includes/funciones.php';
        incluirTemplate('header', $inicio);
    ?>

    <main class="contenedor seccion">
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

    </main>
    <section class="seccion contenedor">
        <h2>Casas y Depas en Venta</h2>
        <?php 
        $limite = 3;
        include 'includes/templates/anuncio.php'; 
        ?>
        <div class="alinear-derecha">
            <a class="boton-verde" href="anuncios.php">Ver Todas</a>
        </div>
    </section>
    <section class="imagen-contacto">
        <h2>Encuentra la casa de tu sueños</h2>
        <p>llena el formulario de contacto</p>
        <a class="boton-amarillo" href="contacto.php">Contáctanos</a>
    </section>
    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpg">
                        <img src="build/img/blog1.jpg" alt="TExto entrada blog" loading="lazy">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">escrito el: <span>20/05/2022</span> por: <span>Admin</span> </p>
                    </a>
                    <p>Consejos para construir una terraza en el techo de tu casa para ahorrar dinero</p>
                </div>
            </article>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpg">
                        <img src="build/img/blog2.jpg" alt="TExto entrada blog" loading="lazy">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guia para la decoracion de tu hogar</h4>
                        <p class="informacion-meta">escrito el: <span>01/05/2022</span> por: <span>Admin</span> </p>
                    </a>
                    <p>Maximiza el espacio de tu hogar con esta Guia</p>
                </div>
            </article>
        </section>
        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena
                    atencion y la casa que me ofrecieron cumple
                    con todas mis expectativas
                </blockquote>
                <p>- Hesler Dennis</p>
            </div>
        </section>
    </div>
    <?php
    
        incluirTemplate('footer');
    ?>
