<?php
// Incluir archivo de conexión a la base de datos
include "apis/conexionDB.php";
$id = $_GET["id"];
$sql=$conexion->query("SELECT * FROM registro WHERE id=$id");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifique el producto</title>
    <meta name="author" content="Joan David Gomezjurado Sánchez">
    <link rel="icon" href="imgs/img/logo.png" type="icono">
    <!-- Links externos -->
    <link rel="stylesheet" href="styles/perfilUsuario.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Barra de navegacion -->
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="Index.php">
                <img src="imgs/img/logo.png" alt="" width="60" height="60" class="d-inline-block align-text-top">
            </a>
            Bienvenido, modifica el producto
        </div>
    </nav>
    <!-- Formulario perfil Usuario -->
    <form class="col-8 p-3">
        <!-- PHP -->
        <?php
        include "apis/modificarProductoControl.php";
        while($datos=$sql->fetch_object()) {?>
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="nemeHelp" value="<?=$datos->name?>">
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" aria-describedby="apellidoHelp" value="<?=$datos->apellido?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?=$datos->email?>">
            </div>
            <div class="mb-3">
                <label for="adress" class="form-label">Direccion</label>
                <input type="text" class="form-control" id="adress" name="adress" aria-describedby="adressHelp" value="<?=$datos->adress?>">
            </div>
            <div class="mb-3">
                <label for="passC" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="passC" name="passC" aria-describedby="passCHelp" value="<?=$datos->passC?>">
            </div>
        <?php }
        ?>
        <!-- Fin PHP -->
        <button type="button" class="btn btn-danger" id="btnModificar">Guardar Cambios</button>
    </form>
    <!-- Archivos script externos -->
    <script src="scripts/validacionPerfilUsuario.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/72c5de2413.js" crossorigin="anonymous"></script>

    <script>
$(document).ready(function(){
    $("#btnModificar").click(function(){
        // Obtener los valores modificados
        var name = $("#name").val();
        var apellido = $("#apellido").val();
        var email = $("#email").val();
        var address = $("#adress").val();
        var passC = $("#passC").val();
        
        // Realizar la solicitud AJAX
        $.ajax({
            url: 'apis/modificarProductoControl.php',
            method: 'POST',
            data: {
                id: <?= $id ?>,
                name: name,
                apellido: apellido,
                email: email,
                address: address,
                passC: passC
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