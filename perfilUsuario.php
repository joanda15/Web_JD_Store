<?php
// Iniciar sesión para acceder a la información del usuario autenticado
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['correo'])) {
    // Si el usuario no ha iniciado sesión, redirigirlo al inicio
    header("Location: index.php");
    exit;
}

// Incluir archivo de conexión a la base de datos
include "apis/conexionDB.php";

// Obtener el correo del usuario que ha iniciado sesión
$correo = $_SESSION['correo'];

// Consultar la base de datos para obtener los datos del usuario que ha iniciado sesión
$stmt = $conexion->prepare("SELECT id, name, apellido, email, adress, passC FROM registro WHERE email=?");
$stmt->bind_param("s", $correo);
$stmt->execute();
$resultado = $stmt->get_result();

// Obtener los datos del usuario
$datos = $resultado->fetch_assoc();

// Cerrar la consulta preparada
$stmt->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
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
    <script>
        function eliminar(){
            var respuesta=confirm("Deseas eliminar la cuenta?");
            return respuesta
        }
    </script>
    <!-- Barra de navegacion -->
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="Index.php">
                <img src="imgs/img/logo.png" alt="" width="60" height="60" class="d-inline-block align-text-top">
            </a>
            Bienvenido al perfil del usuario
        </div>
    </nav>
    <!-- Controlador -->
    <?php
    include "apis/eliminarUsuario.php";
    ?>
    <!-- Tabla -->
    <div class="col-12 p-2">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <!-- <tr>
                        <th scope="row">ID:</th>
                        <td><?= $datos['id'] ?></td>
                    </tr> -->
                    <tr>
                        <th scope="row">Nombre:</th>
                        <td><?= $datos['name'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Apellido:</th>
                        <td><?= $datos['apellido'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Email:</th>
                        <td><?= $datos['email'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Dirección:</th>
                        <td><?= $datos['adress'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Contraseña:</th>
                        <td><input type="password" value="<?= $datos['passC'] ?>" readonly></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="text-center">
            <a href="modificarPoducto.php?id=<?= $datos['id'] ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
            <a onclick="return eliminar()" href="perfilUsuario.php?id=<?= $datos['id'] ?>" class="btn btn-danger"><i class="fa-solid fa-delete-left"></i> Eliminar Usuario</a>
        </div>
    </div>
    <!-- Archivos script externos -->
    <script src="scripts/validacionPerfilUsuario.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/72c5de2413.js" crossorigin="anonymous"></script>
</body>
</html>