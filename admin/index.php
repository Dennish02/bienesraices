<?php
//importar funciones
require '../includes/funciones.php';
//importar la conexion
require '../includes/config/database.php';

$auth = estaAtuh();
if(!$auth){
    header('Location: /login.php');
}

$db =  conectarDB();
//escribir el query
$query = "SELECT * FROM propiedades";
//consultar base de datos
$resultadoDB = mysqli_query($db, $query);



//revisa por ese get y no existe entonces le pone null, muestra emmnsaje condicuiional
$resultado = $_GET['resultado'] ?? null;


if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    //$id = filter_var($id, FILTER_VALIDATE_INT);
    // echo "<pre>";
    // var_dump($id);
    // echo "</pre>";
    // exit;
    if ($id) {
        //eliminar el archivo
        $query = "SELECT imagen FROM propiedades WHERE id = ${id}";

        //mandar la consulta
        $resultado = mysqli_query($db, $query);
        //laimagen queda en propiedad
        $propiedad = mysqli_fetch_assoc($resultado);
       
        //eliminar
        unlink('../img/' . $propiedad['imagen']);

        //eliminar la propiedad
        $query = "DELETE FROM propiedades WHERE id = ${id}";

        $resultado = mysqli_query($db, $query);
        
        if ($resultado) {
            header('Location: /admin?resultado=3');
        }
    }
}


incluirTemplate('header');
?>
<main class="contenedor seccion">
    <h1>Administrador de Bienes y Raices</h1>
    <?php if (intval($resultado)  === 1) : ?>
        <h2 class="alerta exito">Anuncio Creado Correctamente </h2>
    <?php elseif (intval($resultado)  === 2) : ?>
        <h2 class="alerta exito">Anuncio Actalizado Correctamente </h2>
    <?php elseif (intval($resultado)  === 3) : ?>
        <h2 class="alerta alert">Anuncio Eliminado Correctamente </h2>
    <?php endif; ?>

    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>
            <?php while ($propiedad = mysqli_fetch_assoc($resultadoDB)) : ?>
                <tr>
                    <td><?php echo $propiedad['id']; ?></td>
                    <td><?php echo $propiedad['titulo']; ?></td>
                    <td><img src="/img/<?php echo $propiedad['imagen']; ?>" class="imagen-tabla"> </td>
                    <td>$ <?php echo $propiedad['precio']; ?></td>
                    <td>
                        <form action="" method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad['id']; ?>">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>

                        <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id'] ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>

    </table>
</main>
<?php
//cerrar la conexion a db
mysqli_close($db);

incluirTemplate('footer');
?>