<?php

require '../../includes/config/database.php';
$db =  conectarDB();

//consultar por vendedores 

$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);


//arreglo con mensajes de errores
$errores = [];

$titulo = '';
$precio = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$vendedorId = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // echo "<pre>";
        // var_dump($_POST);
        // echo "<pre/>";

  

    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio =mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion =mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones =mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc =mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento =mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $vendedorId =mysqli_real_escape_string($db, $_POST['vendedor']);
    $creado = date('Y/m/d');

    //asignar fles a una variable 
    $imagen = $_FILES['imagen'];
    // echo "<pre>";
    // var_dump($imagen);
    // echo "<pre/>";
    //validar
    if (!$titulo) {
        $errores[] = "Debes Añadir un Título";
    }
    if (!$precio) {
        $errores[] = "Debes Añadir un Precio";
    }
    if (strlen($descripcion) < 50) {
        $errores[] = "Debes añadir una descripción y debe tener al menos 50 caracteres";
    }
    if (!$habitaciones) {
        $errores[] = "Debes añadir cantidad de habitaciones";
    }
    if (!$wc) {
        $errores[] = "Debes añadir la cantidad de Baños";
    }
    if (!$estacionamiento) {
        $errores[] = "Debes Añadir una cantidad de estacionamientos";
    }
    if (!$vendedorId) {
        $errores[] = "Debes seleccionar un vendedor";
    }
    if(!$imagen['name'] || $imagen['error']){
        $errores[] = "La imagen es obligatoria";
    }
    //validar por tamaño
    $medida = 1000 * 200;
    if($imagen['size'] > $medida){
        $errores[] = "La imagen es muy pesada";
    }

    //revisar el arreglo de errores

    if (empty($errores)) {

        /** SUBIDA DE ARCHIVOS **/
        //crear carpetas
        $carpetaImagenes = '../../img';

        if(!is_dir($carpetaImagenes)){
            mkdir($carpetaImagenes);
        }
        //generar un nombre unico
        $nombreImagen = md5( uniqid(rand(), true) ).'.jpg';
       //subir imagenes
        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes .'/' . $nombreImagen );


        //insertar en la bd
        $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedorId) 
            VALUES ('$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitaciones', '$wc','$estacionamiento', '$creado', '$vendedorId')";

        $resultado = mysqli_query($db, $query);
        if ($resultado) {
            //redireccion al crear
            header('Location: /admin?resultado=1');
        }else{
            echo "<pre>";
            var_dump($resultado);
            echo "<pre/>";
        }
        


    }
}

require '../../includes/funciones.php';
incluirTemplate('header');
?>
<main class="contenedor seccion">
    <h1>Crear</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php 
   
    foreach($errores as $error):  ?>
        <div class="alerta error">
            <?php 
            echo $error; 
            ?>
        </div>

    <?php endforeach; ?>


    <form 
        action="/admin/propiedades/crear.php" 
        class="formulario" 
        method="POST"
        enctype="multipart/form-data"
    >

        <fieldset>
            <legend>Informacion general</legend>
            <label for="titulo">Titulo Propiedad:</label>
            <input 
                value="<?php echo $titulo; ?>" 
                name="titulo" 
                type="text" 
                id="titulo" 
                placeholder="Titulo Propiedad">

            <label for="precio">Precio Propiedad:</label>
            <input 
                value="<?php echo $precio; ?>" 
                type="number" 
                name="precio" 
                id="precio"
                placeholder="precio Propiedad">

            <label for="imagen">Imagen Propiedad:</label>
            <input 
                name="imagen"
                type="file" 
                id="imagen" 
                accept="image/jpeg, image/png">

            <label for="descripcion">Descripcion:</label>
            <textarea 
                id="descripcion" 
                name="descripcion" 
               >
                    <?php echo trim($descripcion) ; ?>
            </textarea>
        </fieldset>

        <fieldset>
            <legend>Informacion de la Propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input 
                value="<?php echo $habitaciones; ?>" 
                type="number" name="habitaciones" 
                id="habitaciones" 
                placeholder="Ej: 3" 
                min="1" max="9">

            <label for="wc">Baños:</label>
            <input 
                value="<?php echo $wc; ?>" 
                type="number" 
                name="wc" 
                id="wc" 
                placeholder="Ej: 3" 
                min="1" 
                max="9">

            <label for="estacionamiento">Estacionamiento:</label>
            <input 
                value="<?php echo $estacionamiento; ?>" 
                type="number" 
                name="estacionamiento" 
                id="estacionamiento" 
                placeholder="Ej: 3"
                min="1" 
                max="9">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            <select name="vendedor" id="option">
                <option value="">--Seleccione--</option>
                <?php while($row = mysqli_fetch_assoc($resultado)): ?>
                    <option  <?php echo $vendedorId === $row['id'] ? 'selected' : ''; ?> value="<?php echo $row['id'] ?>"><?php echo $row['nombre']. " ". $row['apellido'] ;?>  </option>
                <?php endwhile; ?>
            </select>
        </fieldset>
        <input 
            type="submit" 
            value="Crear Propiedad" 
            class="boton boton-verde">
    </form>
</main>
<?php

incluirTemplate('footer');
?>