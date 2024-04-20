<?php
// Incluir archivo de conexión a la base de datos
include "conexionDB.php";

// Verificar si se recibieron los datos del formulario
if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['apellido']) && isset($_POST['email']) && isset($_POST['address']) && isset($_POST['passC'])) {
    // Sanitizar y asignar los valores recibidos
    $id = $_POST['id'];
    $name = $_POST['name'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $passC = $_POST['passC'];
    
    // Preparar la consulta SQL para actualizar los datos
    $sql = "UPDATE registro SET name=?, apellido=?, email=?, adress=?, passC=? WHERE id=?";
    
    // Preparar la sentencia
    $stmt = $conexion->prepare($sql);
    
    // Vincular los parámetros
    $stmt->bind_param("sssssi", $name, $apellido, $email, $address, $passC, $id);
    
    // Ejecutar la sentencia
    if($stmt->execute()) {
        // La actualización fue exitosa
        echo "Los datos han sido actualizados correctamente.";
    } else {
        // Error al ejecutar la sentencia
        echo "Error al intentar actualizar los datos: " . $stmt->error;
    }
    
    // Cerrar la sentencia y la conexión
    $stmt->close();
    $conexion->close();
} else {
    // Si no se recibieron todos los datos esperados
    echo "Todos los campos son requeridos.";
}
?>
