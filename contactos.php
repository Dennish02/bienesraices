
  <?php 
   require 'includes/funciones.php';
   incluirTemplate('header'); 
  ?>

    <main class="contenedor seccion">
        <h1>Contacto</h1>
        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp" >
            <source srcset="build/img/destacada3.jpg" type="image/jpg" >
            <img src="build/img/destacada3.jpg" alt="Imagen contacto" loading="lazy">
        </picture>
        <h2>Llene el formulario de contacto</h2>
        <form action="" class="formulario">
            <fieldset>
                <legend>Informacion Personal</legend>
                <label for="nombre" >Nombre:</label>
                <input type="text" placeholder="Tu Nombre" id="nombre">

                <label for="email" >Email:</label>
                <input type="email" placeholder="Tu email" id="email">

                <label for="email" >Telefono:</label>
                <input type="tel" placeholder="Tu telefono" id="telefono">

                <label for="mensaje" >mensaje:</label>
                <textarea id="mensaje"></textarea>
            </fieldset>
            <fieldset>
                <legend>Informacion sobre la Propiedad</legend>
                <label for="opciones" >Vende o Compra</label>
                <select id="opciones">
                    <option value="" disabled selected>--Seleccione--</option>
                    <option value="compra">Compra</option>
                    <option value="vende">Vende</option>
                </select>
                <label for="presupuesto" >Precio o presupuesto:</label>
                <input type="number" placeholder="Tu precio o presupuesto" id="presupuesto">
            </fieldset>
            <fieldset>
                <legend>Contacto</legend>
                <p>Como desea ser contactado</p>
                <div class="formaContacto">
                    <label for="contactar-telefono">Telefono</label>
                    <input name="contacto" type="radio" value="telefono" id="contactar-telefono">

                    <label for="contactar-email">email</label>
                    <input name="contacto" type="radio" value="email" id="contactar-email">
                </div>
                <p>Si eligió teléfono elija la fecha y hora</p>
                <label for="fecha">Fecha:</label>
                <input type="date"  id="fecha" min="09:00" max="18:00">

                <label for="hora">Hora:</label>
                <input type="time"  id="hora">
            </fieldset>
            <input type="submit" value="enviar" class="boton-verde">
        </form>
    </main>
    <?php
       incluirTemplate('footer');
    ?>
