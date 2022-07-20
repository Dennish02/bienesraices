
    <?php
    require 'includes/funciones.php';
    incluirTemplate('header');
    ?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en Venta</h1>
        <picture>
            <source srcset="build/img/destacada.webp" type="iamge/wepb">
            <source srcset="build/img/destacada.jpg" type="iamge/jpg">
            <img loading="lazy" src="build/img/destacada.jpg" alt="imagen propiedad">
        </picture>
        <div class="resumen-propiedad">
            <p class="informacion-meta">Escrito el: <span>20/05/2022</span> por: <span>Admin</span> </p>
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing e
                lit. Labore modi obcaecati vitae omnis quod itaque quas
                tenetur provident? Consequuntur quia dolore temporibus dignissimos,
                impedit vel voluptatum! Minus dolore nihil cumque.
                Hay muchas variaciones de los pasajes de Lorem Ipsum
                disponibles, pero la mayoría sufrió alteraciones en
                alguna manera, ya sea porque se le agregó humor, o palabras aleatorias que no parecen ni un poco creíbles. Si vas a utilizar un pasaje de Lorem Ipsum, necesitás estar seguro de que no hay nada avergonzante escondido en el medio del texto. Todos los generadores de Lorem Ipsum que se encuentran en Internet tienden a repetir trozos predefinidos cuando sea necesario, haciendo a este el único generador verdadero (válido) en la Internet. Usa un diccionario de mas de 200 palabras provenientes del latín, combinadas con estructuras muy útiles de sentencias, para generar texto de Lorem Ipsum que parezca razonable. Este Lorem Ipsum generado siempre estará libre de repeticiones, humor agregado o palabras no características del lenguaje, etc.
            </p>
        </div>
    </main>
    <?php
    incluirTemplate('footer');
    ?>
