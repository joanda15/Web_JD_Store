<?php
    // Variables base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tiendas_jd";
    $port = 3306;

    // Conexion a base de datos
    $conexion = new mysqli($servername, $username, $password, $dbname, $port);
    if ($conexion->connect_error) {
        die("Conexion fallida: " . $conexion->connect_error);
    }
    // Obtener los datos del cuerpo de la solicitud JSON
    $data = json_decode(file_get_contents("php://input"), true);
    $name = $data["name"];
    $email = $data["email"];
    $comment = $data["comment"];
    // Insertar por medio de SQL
    $sql = "INSERT INTO mensajes (name, email, comment) VALUES ('$name', '$email', '$comment')";
    // Condicion
    if ($conexion->query($sql) === TRUE) {
        $response = array("status" => "success", "message" => "Mensaje enviado con éxito");
    } else {
        $response = array("status" => "error", "message" => "Error: " . $sql . "<br>" . $conexion->error . "Error de conexión");
    }
    // Cerrar conexion
    $conexion->close();
    header("Content-Type: application/json");
    echo json_encode($response);
?>
