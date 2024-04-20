<?php
    // Verificamos el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Variables para conexion base de datos
        $serverName = "localhost";
        $userName = "root";
        $password = "";
        $dataBase = "tiendas_jd";
        $port = 3306;
        // Linea Conexion a la base de datos
        $conexion = new mysqli ($serverName , $userName, $password, $dataBase, $port);
        // Obtener el correo electrónico del formulario
        $email = $_POST['emailRecuperacion'];
        // Verificamos si el correo electrónico existe en la base de datos
        $sql = "SELECT * FROM registro WHERE email='$email'";
        $result = $conexion->query($sql);
        // Condicion
        if ($result->num_rows > 0) {
            echo '<script>alert("Se ha enviado un mensaje de confirmación a tu correo electrónico.");
            window.location = "../index.php";
            </script>';
        } else {
            echo '<script>alert("No se encontro correo");
            window.location = "../index.php";
            </script>';
            exit;
        }
        // Cerrar la conexión a la base de datos
        $conn->close();
    }
?>
