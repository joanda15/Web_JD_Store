<?php
// Incluir archivo de conexión a la base de datos
include "apis/conexionDB.php";
$id = $_GET["id"];
$sql=$conexion->query("SELECT * FROM productos WHERE id=$id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
    <meta name="author" content="Joan David Gomezjurado Sánchez">
    <link rel="icon" href="imgs/img/logo.png" type="icono">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <!-- Barra de navegacion -->
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="Index.php">
                <img src="imgs/img/logo.png" alt="" width="60" height="60" class="d-inline-block align-text-top">
            </a>
            Por favor modifica el producto
        </div>
    </nav>
    <!-- Formulario modificacion producto -->
    <form class="p-3" action="apis/registrarTarjeta.php" method="post" enctype="multipart/form-data">
    <!-- PHP -->
    <?php
    include "apis/modificarPrendaControl.php";
    while($datos=$result->fetch_object()) { ?>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la prenda</label>
            <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp" required value="<?= $datos->nombre ?>">
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Busca la imagen de la prenda</label>
            <input type="file" class="form-control" id="imagen" name="imagen" required>
            <img src="<?= $datos->imagen ?>" alt="Imagen de la prenda" width="100">
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Ingrese una breve descripcion de la prenda</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" required value="<?= $datos->descripcion ?>">
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio de la prenda</label>
            <input type="number" step="0.01" class="form-control" id="precio" name="precio" aria-describedby="emailHelp" required value="<?= $datos->precio ?>">
        </div>
    <?php }
    ?>
    <!-- FIN PHP -->
        <button type="submit" class="btn btn-danger" name="btnregistrarPrenda" value="Guardar Producto">Modificar prenda</button>
    </form>
    <!-- Scripts externos -->
    <script src="https://kit.fontawesome.com/72c5de2413.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function(){
        $("#btnregistrarPrenda").click(function(e){
            e.preventDefault(); // Prevenir el envío del formulario por defecto
            
            // Obtener los valores modificados
            var nombre = $("#nombre").val();
            var imagen = $("#imagen").val();
            var descripcion = $("#descripcion").val();
            var precio = $("#precio").val();
            
            // Realizar la solicitud AJAX
            $.ajax({
                url: 'apis/modificarPrendaControl.php',
                method: 'POST',
                data: {
                    id: <?= $id ?>,
                    nombre: nombre,
                    imagen: imagen,
                    descripcion: descripcion,
                    precio: precio
                },
                success: function(response){
                    // Manejar la respuesta del servidor
                    alert('Los cambios han sido guardados correctamente.');
                },
                error: function(xhr, status, error){
                    // Manejar errores
                    console.error(xhr.responseText);
                    alert('Ha ocurrido un error al intentar guardar los cambios.');
                }
            });
        });
    });
    </script>
</body>
</html>
