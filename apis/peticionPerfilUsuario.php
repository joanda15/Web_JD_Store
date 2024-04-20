<?php
    // Variables para conexion base de datos
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dataBase = "tiendas_jd";
    $port = 3306;
    // Linea Conexion a la base de datos
    $conexion = new mysqli ($serverName , $userName, $password, $dataBase, $port);
    // Verificar si se ha enviado un correo electrónico
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener el email enviado desde el formulario
        $email = $_POST['email'];
        // Consulta SQL para obtener la información del usuario
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $result = $conexion->query($sql);
        // Condicion
        if ($result->num_rows > 0) {
            // Mostrar los datos del usuario
            $row = $result->fetch_assoc();
            echo "<p>Nombre: " . $row["nombre"] . "</p>";
            echo "<p>Apellido: " . $row["apellido"] . "</p>";
            echo "<p>Email: " . $row["email"] . "</p>";
            echo '<button type="button" class="btn btn-warning">Modificar</button>';
            echo '<button type="button" class="btn btn-danger">Eliminar</button>';
        } else {
            echo "<p>No se encontraron usuarios con ese email.</p>";
        }
    }
    // Cerrar conexión
    $conexion->close();
?>
