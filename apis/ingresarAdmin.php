<?php
    // Llamamos el archivo de conexion
    include 'conexionDB.php';
    // Validación de los campos enviados desde el formulario
    $idadmin = $_POST['idAdmin'];
    $passadmin = $_POST['passAdmin'];
    // Validacion de datos
    $validar_login = mysqli_query($conexion, "SELECT * FROM administrador WHERE idAdmin='$idadmin' and passAdmin='$passadmin'");
    // Condicion
    if(mysqli_num_rows($validar_login) > 0) {
        header("location: ../perfilAdmin.php");
        exit;
    } else {
        echo '<script>alert("Administrador no registrado, por favor contacte el Desarrollador");
        window.location = "../index.php";
        </script>';
        exit;
    }
?>
