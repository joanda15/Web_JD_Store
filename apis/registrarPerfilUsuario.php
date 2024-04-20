<?php
    // Variables DB
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tiendas_jd";
    $port = 3306;
    // Conexión a la base de datos
    $conexion = new mysqli($servername, $username, $password, $dbname, $port);
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }
    // Obtener los datos del cuerpo de la solicitud JSON
    $data = json_decode(file_get_contents("php://input"), true);
    $name = $data["name"];
    $apellido = $data["apellido"];
    $email = $data["email"];
    $adress = $data["adress"];
    $pass = $data["pass"];
    // Consulta SQL con una declaración preparada para evitar la inyección de SQL
    $sql = "INSERT INTO registro (name, apellido, email, adress, passC) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssss", $name, $apellido, $email, $adress, $pass);
    // Condicion
    if ($stmt->execute()) {
        $response = array("status" => "success", "message" => "Registro exitoso");
    } else {
        $response = array("status" => "error", "message" => "Error al insertar datos: " . $conexion->error);
    }
    // Cerrar
    $stmt->close();
    $conexion->close();
    header("Content-Type: application/json");
    echo json_encode($response);
?>
