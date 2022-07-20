
<?php 
 require 'includes/funciones.php';
 incluirTemplate('header'); 
?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Nuestro Blog</h1>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp" >
                    <source srcset="build/img/blog1.jpg" type="image/jpg" >
                    <img src="build/img/blog1.jpg" alt="TExto entrada blog" loading="lazy">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p>escrito el: <span>20/05/2022</span> por: <span>Admin</span> </p>
                </a>
                <p>Consejos para construir una terraza en el techo de tu casa para ahorrar dinero</p>
            </div>  
        </article>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp" >
                    <source srcset="build/img/blog2.jpg" type="image/jpg" >
                    <img src="build/img/blog2.jpg" alt="TExto entrada blog" loading="lazy">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guia para la decoracion de tu hogar</h4>
                    <p>escrito el: <span>01/05/2022</span> por: <span>Admin</span> </p>
                </a>
                <p>Maximiza el espacio de tu hogar con esta Guia</p>
            </div>  
        </article>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog3.webp" type="image/webp" >
                    <source srcset="build/img/blog3.jpg" type="image/jpg" >
                    <img src="build/img/blog3.jpg" alt="TExto entrada blog" loading="lazy">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p>escrito el: <span>20/05/2022</span> por: <span>Admin</span> </p>
                </a>
                <p>Consejos para construir una terraza en el techo de tu casa para ahorrar dinero</p>
            </div>  
        </article>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog4.webp" type="image/webp" >
                    <source srcset="build/img/blog4.jpg" type="image/jpg" >
                    <img src="build/img/blog4.jpg" alt="TExto entrada blog" loading="lazy">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guia para la decoracion de tu hogar</h4>
                    <p>escrito el: <span>01/05/2022</span> por: <span>Admin</span> </p>
                </a>
                <p>Maximiza el espacio de tu hogar con esta Guia</p>
            </div>  
        </article>
    </main>
    <?php
        incluirTemplate('footer');
    ?>
