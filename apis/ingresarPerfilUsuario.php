<?php
include 'conexionDB.php';

// Validación de los campos enviados desde el formulario
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

// Validacion de datos
$validar_login = mysqli_query($conexion, "SELECT * FROM registro WHERE email='$correo' and passC='$contrasena'");

// Condicion
if(mysqli_num_rows($validar_login) > 0) {
    // Iniciar sesión para el usuario autenticado
    session_start();
    $_SESSION['correo'] = $correo;
    header("location: ../perfilUsuario.php");
    exit;
} else {
    echo '<script>alert("Usuario no registrado");
    window.location = "../index.php";
    </script>';
    exit;
}
?>
