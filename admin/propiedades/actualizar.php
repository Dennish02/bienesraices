
<?php

//validar por u id de propiedad valido
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if(!$id){
    header('Location: /admin');
}


require '../../includes/config/database.php';
$db =  conectarDB();

//consulta para traer los datos ed la propiedad
$consultaPropiedad = "SELECT * FROM propiedades WHERE id = ${id}";
$resultadoPorpiedad = mysqli_query($db, $consultaPropiedad);
$propiedad = mysqli_fetch_assoc($resultadoPorpiedad);
//consultar por vendedores 

$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);


//arreglo con mensajes de errores
$errores = [];

$titulo = $propiedad['titulo'];
$precio = $propiedad['precio'];
$descripcion = $propiedad['descripcion'];
$habitaciones = $propiedad['habitaciones'];
$wc = $propiedad['wc'];
$estacionamiento = $propiedad['estacionamiento'];
$vendedorId = $propiedad['vendedorId'];
$imagenPropiedad = $propiedad['imagen'];


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
    //validar por tamaño
    $medida = 1000 * 200;
    if($imagen['size'] > $medida){
        $errores[] = "La imagen es muy pesada";
    }

    //revisar el arreglo de errores

    if (empty($errores)) {

         //crear carpetas
         $carpetaImagenes = '../../img';

         if(!is_dir($carpetaImagenes)){
             mkdir($carpetaImagenes);
         }
        /** SUBIDA DE ARCHIVOS **/
        $nombreImagen = '';
        //verificar si el usuario cambio la imagen
        if($imagen['name']){
            //eliminar la imagen previa
            unlink($carpetaImagenes . $propiedad['imagen']);
             //generar un nombre unico
             $nombreImagen = md5( uniqid(rand(), true) ).'.jpg';
             //subir imagenes
             move_uploaded_file($imagen['tmp_name'], $carpetaImagenes .'/' . $nombreImagen );
 
        }else{
            $nombreImagen = $propiedad['imagen'];
        }
       
       

        //insertar en la bd
        $query = "UPDATE propiedades SET titulo = '${titulo}' , precio = '${precio}', imagen = '${nombreImagen}', descripcion = '${descripcion}',
         habitaciones = ${habitaciones}, wc = ${wc}, estacionamiento = ${estacionamiento}, vendedorId = ${vendedorId} WHERE id = ${id}";

        $resultado = mysqli_query($db, $query);
        if ($resultado) {
            //redireccion al crear
            header('Location: /admin?resultado=2');
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
    <h1>Actualizar propiedad</h1>

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
            <img src="/img/<?php echo $imagenPropiedad; ?>" alt="Imagen Propiedad" class="imagen-small">
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
            value="Actualizar Propiedad" 
            class="boton boton-verde">
    </form>
</main>
<?php

incluirTemplate('footer');
?>